<?php
namespace Application\Admin\Http\Controllers;

use app\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Application\Admin\Helpers;

class BaseController extends Controller{

    public function __construct(){

        if(\Session::has('message')){
            $message = \Session::pull('message');
            $onLoad = "new PNotify({
                title:'".$message['title']."',
                text:'".$message['message']."',
                type:'".$message['type']."',
                icon:'".$message['icon']."',
                addclass:'".$message['class']."'
            });";
            view()->share("onLoad",$onLoad);
        }

    }

}