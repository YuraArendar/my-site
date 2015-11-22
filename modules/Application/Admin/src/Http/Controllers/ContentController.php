<?php

namespace Application\Admin\Http\Controllers;

use Application\Admin\Helpers\TreeBuilder;
use Application\Admin\Structure;
use Application\Admin\StructureLang;
use Illuminate\Http\Request;
use Application\Admin\Helpers\FormLang;
use App\Http\Requests;

class ContentController extends BaseController
{
    public function __construct(Request $request)
    {
//        $this->currentModel = new Structure();
//        $this->langModel =  new StructureLang();
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

        if(!$id_structure)
            $id_structure = 0;
        return view('admin::content.nestable',compact('id_structure'));
    }
}
