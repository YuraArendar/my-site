<?php
namespace Application\Admin\Http\Controllers;

use app\Http\Controllers\Controller;
use Illuminate\Http\Request;
use shop\Language;

class BaseController extends Controller{

    /**
     * array for data for to send to views
     * @var array
     */
    public $dataView = [];


    /**
     * the object of current model
     * @var
     */
    public $currentModel ;

    /**
     * the object of Language Model
     * @var
     */
    public $langModel;

    /**
     * tempates name for controller
     * folder name
     * @var string
     */
    public $template='';


    /**
     * current controller
     * @var string
     */
    public $controller = '';

    /**
     * Name of current item
     * @var string
     */
    public $itemName ='';


    public function __construct(){

        $widgetMenu = new WidgetMenu();

        if(\Session::has('message')){
            $message = \Session::pull('message');
            $onLoad = "new PNotify({title:'".$message['title']."',text:'".$message['message']."',type:'".$message['type']."'});";
            view()->share("onLoad",$onLoad);
        }

        $name = \Route::current()->getActionName();
        $name = explode('@',$name)[0];
        $this->controller =  $name;

        view()->share('locale',\Lang::getLocale());
        view()->share('locales',\LaravelLocalization::getSupportedLocales());
        view()->share('menu',$widgetMenu->view());
        view()->share('template',$this->template);
        view()->share('controller',$this->controller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postDelete($id)
    {
        $item = $this->currentModel->find($id);

        if(isset($item->parent_id)){
            $this->currentModel->where(['parent_id'=>$id])->delete();
        }
        $item->delete();

        \Session::put('message.type','success');
        \Session::put('message.title','Deleted');
        \Session::put('message.message','Structure was deleted');

        return ['status'=>'ok'] ;
    }

    /**
     * change status published of item
     * @param int $id
     * @return Response
     */
    public function postActive(Request $request,$id){
        $item = $this->currentModel->find($id);
        $item->published = $request->input('active');
        $item->save();

        return ['status'=>'ok'] ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        view()->share('title','Create new '.$this->itemName);
        return view('administration::'.$this->template.'.create');
    }




}