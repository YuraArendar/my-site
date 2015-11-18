<?php
namespace Application\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Application\Admin\Helpers\Main;
use Illuminate\Http\Request;

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

    protected $validation;

    public function __construct()
    {
        Main::init();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        view()->share('title','Create new '.$this->itemName);
        return view('admin::'.$this->template.'.create');
    }

}