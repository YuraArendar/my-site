<?php namespace Application\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthController;
use Application\Admin\Helpers\Main;
use Illuminate\Http\Request;


class AdminAuthController extends AuthController {

	protected $redirectTo = '/admin';

	protected $redirectPath = '/admin';


	protected $validation;


	public function getLogin()
	{
		if(\Auth::check()){
			return Main::redirect('/admin');
		}
		return view('admin::auth.login');
	}

	public  function postSign(Request $request){
		$this->validation = \Validator::make($request->all(), [
				'email' => 'required',
				'password' => 'required'
		]);
		if($this->validation->fails()){
			return $this->validation->errors()->toJson();
		}else{
			$throttles = $this->isUsingThrottlesLoginsTrait();

			if ($throttles && $this->hasTooManyLoginAttempts($request)) {
				return $this->sendLockoutResponse($request);
			}
			$credentials = $this->getCredentials($request);

			if (\Auth::attempt($credentials, $request->has('remember'))) {
				return array('redirect'=>'/admin');
			}
		}
	}

}
