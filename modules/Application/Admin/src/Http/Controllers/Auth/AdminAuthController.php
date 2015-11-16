<?php namespace Application\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;


class AdminAuthController extends AuthController {

	protected $redirectTo = '/admin';

	protected $validation;

	public function getLogin()
	{
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

//	public function postLogin(Request $request)
//	{
//		$this->validate($request, [
//				$this->loginUsername() => 'required', 'password' => 'required',
//		]);
//
//		// If the class is using the ThrottlesLogins trait, we can automatically throttle
//		// the login attempts for this application. We'll key this by the username and
//		// the IP address of the client making these requests into this application.
//		$throttles = $this->isUsingThrottlesLoginsTrait();
//
//		if ($throttles && $this->hasTooManyLoginAttempts($request)) {
//			return $this->sendLockoutResponse($request);
//		}
//
//		$credentials = $this->getCredentials($request);
//
//		if (Auth::attempt($credentials, $request->has('remember'))) {
//			return $this->handleUserWasAuthenticated($request, $throttles);
//		}
//
//		// If the login attempt was unsuccessful we will increment the number of attempts
//		// to login and redirect the user back to the login form. Of course, when this
//		// user surpasses their maximum number of attempts they will get locked out.
//		if ($throttles) {
//			$this->incrementLoginAttempts($request);
//		}
//
//		return  $this->getFailedLoginMessage();
//	}

}
