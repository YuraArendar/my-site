<?php namespace Application\Admin\Helpers;



class Main{

    public static function init()
    {
        if(\Session::has('message') && \Session::get('message') != ''){
            $message = \Session::pull('message');
            $onLoad = "new PNotify({";
            if(!empty($message['title']))
                $onLoad.="title:'".$message['title']."',";
            if(!empty($message['message']))
                $onLoad.="text:'".$message['message']."',";
            if(!empty($message['type']))
                $onLoad .= "type:'".$message['type']."',";
            if(!empty($message['icon']))
                $onLoad .= "icon:'".$message['icon']."',";
            if(!empty($message['class']))
                $onLoad .= "addclass:'".$message['class']."'";
            $onLoad .= "});";
            view()->share("onLoad",$onLoad);
        }
    }

    public static function redirect($url='', $status = '302', $message= '', $title = '', $type = '',$icon='',$class='')
    {
        if($message != ''){
            \Session::put('message.type',$type);
            \Session::put('message.title',$title);
            \Session::put('message.message',$message);
            \Session::put('message.icon',$icon);
            \Session::put('message.class',$class);
        }

        if(\Request::ajax()){
            return array('redirect'=>$url);
        }else{
            \Redirect::to($url,$status);
        }
    }

    public static function message($message= '', $title = '', $type = '',$icon='',$class='')
    {
        return [
            'message'=>$message,
            'title'=>$title,
            'type'=>$type,
            'icon'=>$icon,
            'class'=>$class
        ];
    }

}