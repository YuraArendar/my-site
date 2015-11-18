<?php namespace Application\Admin\Http\Controllers;


use Application\Admin\Helpers\TreeBuilder;
use Application\Admin\Structure;
use Application\Admin\StructureLang;
use Illuminate\Http\Request;

class StructureController extends BaseController
{
    public function __construct(Request $request)
    {
        parent::__construct();

        $this->currentModel = new Structure();
        $this->langModel =  new StructureLang();
        $this->validation = \Validator::make($request->all(), [
            'name' => 'required:structure|max:255',
        ]);


        $this->itemName = 'Structure';
        $this->template = 'structure';
        view()->share('partition',$this->itemName);
        view()->share('title',$this->itemName);
        $structures = $this->currentModel->all()->toArray();
        foreach ($structures as $key=>$struct) {
            $lang = $this->langModel->where(['structure_id'=>$struct['id'],'language_id'=>\Lang::getLocale()])->first();
            if($lang){
                $structures[$key]['name'] = $lang->name;
            }else{
                unset($structures[$key]);
            }
        }

        $list = [
            0 => 'Root'
        ];
        foreach($structures as $struct){
            $list[$struct['id']] = $struct['name'];
        }

        view()->share('listStructures',$list);


    }

    public function getIndex()
    {
        $build = new TreeBuilder();
        $structures = $this->currentModel->get()->sortBy('position');

        foreach ($structures as $key=>$struct) {
            $lang = $this->langModel->where(['structure_id'=>$struct['id'],'language_id'=>\Lang::getLocale()])->first();
            if($lang){
                $structures[$key]->name = $lang->name;
                $structures[$key]->link = action('\Application\Admin\Http\Controllers\StructureController@getEdit',['id'=>$struct['id']]);
            }else{
                unset($structures[$key]);
            }

        }

        $structures->linkNodes();

        $str =  $structures->toArray();
        $activeTemplate =  '<span class="switch switch-sm switch-primary check-active pull-right">'.
            '<input type="checkbox"  name="switch" data-plugin-ios-switch {cheked} /></span>';
        $editTemplate = '<span class="edit-buttons pull-right">'.
            '<a href="{link}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>'.
            '<a href="#modalBasic" class="on-default remove-row"><i class="fa fa-trash-o"></i></a></span>';
        $view = $build->view(
            $str,
            '<ol class="dd-list">{val}</ol>',
            '<li class="dd-item" data-id="{id}">'.$activeTemplate.$editTemplate.'<div class="dd-handle">{name}</div></li>',
            '<li class="dd-item" data-id="{id}">'.$activeTemplate.$editTemplate.'<div class="dd-handle">{name}</div><ol class="dd-list">{|}</ol></li>'
        );

        view()->share('scripts', [
            '<script type="text/javascript" src="/assets/admin/js/structure/jquery.nestable.js"></script>',
            '<script type="text/javascript" src="/assets/admin/js/structure/nestable.js"></script>',
        ]);

        view()->share('styles', [
            '<link href="/assets/admin/css/nestable.css" rel="stylesheet" type="text/css">',
        ]);

        view()->share('title','Structures list');

        return view('admin::structure.index',compact('view'));
    }



    public function postRebuild(Request $request){

        $build = new TreeBuilder();

        $data =json_decode($request->input('data'),true);

        $newRelations = $build->generateRelations($data);
        foreach($newRelations as $item){
            $struct = $this->currentModel->find($item['id']);
            $struct->parent_id = $item['parent_id'];
            $struct->position = $item['position'];
            $struct->save();
        }

        Structure::fixTree();

        return $newRelations;
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
                'required',
                'regex:/^[a-zа-я\d-]+$/',
                'unique:structure',
                'max:255']
        );
        if($this->validation->fails()){
            return $this->validation->errors()->toJson();
        }
        $structure =  new Structure();

        $data = $request->all();
        $position =  $this->currentModel->where('parent_id',null)->max('position');
        $structure->alias = $data['alias'];
        $structure->parent_id = $data['parent_id'];
        $structure->controller = $data['controller'];
        $structure->position = ++$position;


        $structure->save();
        $structure->structureLang()->create([
            'name'=>$data['name'],
            'language_id'=>$data['language_id'],
            'description'=>$data['description']
        ]);

        \Session::put('message.type','success');
        \Session::put('message.title','Saved');
        \Session::put('message.message','Structure was saved');

        return Main::redirect(
            action('Application\Admin\Http\Controllers\StructureController@getEdit',['id' => $structure->id]),
            '302','Structure was saved','Saved','success'
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
        $structure = $this->currentModel->with('structureLang')->find($id)->toArray();

        $lang = $this->langModel->where('structure_id',$id)
            ->where('language_id',\LaravelLocalization::getCurrentLocale())
            ->first();
        if($lang)
            $lang->toArray();

        $structure['lang'] = $lang;
        view()->share('title','Edit structure '.$structure['lang']['name']);
        return view('administration::structure.edit',compact('structure'));
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
            'regex:/[a-zа-я-\d]+/',
            'max:255'
        ]);
        if($this->validation->fails()){
            return $this->validation->errors()->toJson();
        }
        $objectStructure = $this->currentModel->find($id);

        $data = $request->all();

        $objectStructure->alias = $data['alias'];
        $objectStructure->parent_id = $data['parent_id'];
        $objectStructure->controller = $data['controller'];
        $objectStructure->save();
        $langStructure =  $this->langModel->where('structure_id',$id)
            ->where('language_id',\LaravelLocalization::getCurrentLocale())
            ->first();
        if($langStructure){
            $langStructure->name = $data['name'];
            $langStructure->description = $data['description'];
            $langStructure->save();
        }else{
            $langStructure =  new StructureLang();
            $langStructure->structure_id = $objectStructure->id;
            $langStructure->language_id = \LaravelLocalization::getCurrentLocale();
            $langStructure->name = $data['name'];
            $langStructure->description = $data['description'];
            $langStructure->save();
        }

        return ['message'=>[
            'title'=>'Saved',
            'type' => 'success',
            'message'=>'Structure was saved'
        ]];
    }
}