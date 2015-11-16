<?php namespace Application\Admin\Helpers;



class Main{

    public static function redirect($url='', $status = '302', $message= '', $title = '', $type = '',$icon='',$class=''){
        if(\Request::ajax()){
            \Session::put('message.type',$type);
            \Session::put('message.title',$title);
            \Session::put('message.message',$message);
            \Session::put('message.icon',$icon);
            \Session::put('message.class',$class);
        }else{
            \Redirect::to($url,$status);
        }
    }

}