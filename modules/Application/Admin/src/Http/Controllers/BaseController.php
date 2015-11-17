<?php
namespace Application\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Application\Admin\Helpers\Main;
use Illuminate\Http\Request;

class BaseController extends Controller{

    public function __construct()
    {
        Main::init();
    }

}