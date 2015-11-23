<?php

namespace Application\Admin\Http\Controllers;

use Application\Admin\Content;
use Application\Admin\ContentLang;
use Application\Admin\Helpers\Main;
use Application\Admin\Helpers\TreeBuilder;
use Application\Admin\Structure;
use Application\Admin\StructureLang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Application\Admin\Helpers\FormLang;
use App\Http\Requests;
use Illuminate\Support\Str;

class ContentController extends BaseController
{
    public function __construct(Request $request)
    {
        $this->currentModel = new Content();
        $this->langModel =  new ContentLang();
        $this->validation = \Validator::make($request->all(), [
            'name' => 'required:structure|max:255',
        ]);

        $modelStructure = new Structure();
        $treeStructure =  $modelStructure->get()->sortBy('position');

        foreach ($treeStructure as $key=>$struct) {
            $lang = StructureLang::where(['structure_id'=>$struct['id'],'language_id'=>FormLang::getCurrentLang()])->first();
            if($lang){
                $treeStructure[$key]->name = $lang->name;
                $treeStructure[$key]->link = action('\Application\Admin\Http\Controllers\StructureController@getEdit',['id'=>$struct['id']]);
            }else{
                unset($treeStructure[$key]);
            }

        }

        $treeStructure->linkNodes();

        $str = $treeStructure->toArray();

        $witgetStructureTree =  new TreeBuilder();

        $TreeStructure = $witgetStructureTree->view(
            $str,
            '<ul>{val}</ul>',
            '<li data-href="/admin/content/structure/{id}">{name}</li>',
            '<li data-href="/admin/content/structure/{id}" class="folder expanded">{name}<ul>{|}</ul></li>'
        );

        view()->share('StructureTree',$TreeStructure);
        view()->share('id_structure',$request->route('id_structure'));

        $this->itemName = 'Content';
        $this->template = 'content';
        $this->layout = 'dual_sidebars';



        parent::__construct();
    }

    public function getIndex()
    {
        return view('admin::content.index');
    }

    public function getList($id_structure)
    {
        return view('admin::content.index',compact('id_structure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postStore(Request $request)
    {
        $this->validation->mergeRules('alias',[
                'regex:/^[a-zа-я\d-]+$/',
                'max:255']
        );
        if($this->validation->fails()){
            return $this->validation->errors()->toJson();
        }
        $content =  new Content();

        $data = $request->all();
        $position =  $this->currentModel->max('position');
        if(empty($data['alias'])){
            $content->alias = Str::slug($data['name'],'-');
        }else{
            $content->alias = $data['alias'];
        }


        $content->date_start = Main::getDateFromPicker($data['date_start']);
        $content->position = ++$position;

        $content->save();
        $content->structure()->attach($data['structure_id']);
        $content->contentLang()->create([
            'name'=>$data['name'],
            'language_id'=>$data['language_id'],
            'description'=>$data['description'],
            'content'=>$data['content']
        ]);

        return Main::redirect(
            Route('edit_content',['id'=>$content->id]),
            '302','Content was saved','Saved','success'
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $content = $this->currentModel->with('contentLang')->with('structure')->find($id)->toArray();
        $lang = $this->langModel->where('content_id',$id)
            ->where('language_id',FormLang::getCurrentLang())
            ->first();
        if($lang)
            $lang->toArray();

        $content['lang'] = $lang;
        view()->share('title','Edit content '.$content['lang']['name']);
        view()->share('id_structure',$content['structure'][0]['id']);
        return view('admin::content.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function postUpdate(Request $request, $id)
    {
        $this->validation->mergeRules('alias',['required',
            'regex:/^[a-zа-я\d-]+$/',
            'max:255'
        ]);
        if($this->validation->fails()){
            return $this->validation->errors()->toJson();
        }
        $content = $this->currentModel->find($id);


        $data = $request->all();

        $image = $request->file('image');
        $path = public_path().'/img/content/'.$request->get('structure_id').'/';
        $name = time() . '-' . $image->getClientOriginalName();
        if(!(\File::exists($path))){
            \File::makeDirectory($path, 0775);
        }
        $image->move($path,$name);

        $content->alias = $data['alias'];
        $content->date_start = $content->date_start = Main::getDateFromPicker($data['date_start']);
        $content->save();
        $langContent =  $this->langModel->where('content_id',$id)
            ->where('language_id',FormLang::getCurrentLang())
            ->first();
        if($langContent){
            $langContent->name = $data['name'];
            $langContent->description = $data['description'];
            $langContent->content = $data['content'];
            $langContent->save();
        }else{
            $langContent =  new ContentLang();
            $langContent->content_id = $content->id;
            $langContent->language_id = FormLang::getCurrentLang();
            $langContent->name = $data['name'];
            $langContent->description = $data['description'];
            $langContent->content = $data['content'];
            $langContent->save();
        }

        return Main::redirect(
            '',
            '302',
            'Content was saved',
            'Saved',
            'success'
        );
    }
}
