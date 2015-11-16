<?php namespace Application\Admin\Helpers;



class Main{

    public static function redirect($url='', $status = '302', $message= '', $title = '', $type = ''){
        if(\Request::ajax()){

        }else{
            \Redirect::to($url,$status);
        }
    }

}