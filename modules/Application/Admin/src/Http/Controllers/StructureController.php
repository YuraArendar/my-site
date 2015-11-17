<?php namespace Application\Admin\Http\Controllers;

class StructureController extends BaseController
{
    public function getIndex()
    {
        $build = new TreeBuilder();
        $structures = $this->currentModel->get()->sortBy('position');

        foreach ($structures as $key=>$struct) {
            $lang = $this->langModel->where(['structure_id'=>$struct['id'],'language_id'=>\LaravelLocalization::getCurrentLocale()])->first();
            if($lang){
                $structures[$key]->name = $lang->name;
                $structures[$key]->link = action('\Administration\Http\Controllers\StructureController@getEdit',['id'=>$struct['id']]);
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
            '<script src="/assets/cms/vendor/jquery-nestable/jquery.nestable.js"></script>',
            '<script src="/assets/cms/javascripts/ui-elements/examples.nestable.js"></script>',
            '<script src="/assets/cms/vendor/ios7-switch/ios7-switch.js"></script>',
        ]);

        view()->share('title','Structures list');

        return view('admin::structure.index',compact('view'));
       // return view('admin::layout.default.layout');
    }
}