<?php namespace Application\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Application\Admin\Helpers\FormLang;
use Application\Admin\Helpers\Main;
use Illuminate\Http\Request;

class AjaxController extends Controller{

    public function postChangeLang(Request $request){
        if($request->has('language')){
            return FormLang::setCurrentLang($request->get('language'));
        }else{
            return Main::message(
                'Wrong parameters!',
                'Error',
                'error'
            );
        }
    }

}