<?php
class AccountController extends BaseController {

	public function getSignIn(){
		return View::make('account.signin');
	}

	public function postSignIn(){
		$validator = Validator::make(Input::all(), 
			array(
				'email' 			=> 'required',
				'password' 			=> 'required',
				));
	
		if($validator->fails()){
			return Redirect::route('home')
			->withErrors($validator)
			->withInput();
		}
		
		else{

			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'email' => Input::get('email'),

				'password' => Input::get('password'),
				'active' => 1
				), $remember);
			$auth1 = Auth::attempt(array(
				'username' => Input::get('email'),

				'password' => Input::get('password'),
				'active' => 1
				), $remember);

			if($auth or $auth1){
				return Redirect::intended('/');
			}
			
			else{
				return  Redirect::route('home')
						->with('global', 'Incorrect email or password');
			}
		}
		return Redirect::route('home')
		->with('global', 'Sorry we couldn`t sign you in.');
	}

	public function getSignOut(){
		Auth::logout();
		return Redirect::route('home');
	}
	public function getCreate(){
		return View::make('account.create');
	}
	public function postCreate(){
		
		$validator = Validator::make(Input::all(), 
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'username' 			=> 'required|max:20|min:3|unique:users',
				'name'				=> 'required',
				'password' 			=> 'required|min:6',
				'password_again' 	=> 'required|same:password'
				));
		if($validator->fails()){
			return Redirect::route('account-create')
			->withErrors($validator)
			->withInput();
		}
		else{
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');
			$name		= Input::get('name');
			//Activation code
			$code 		= str_random(60);

			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'password' => Hash::make($password),
				'name' => $name,
				'code' => $code,
				'active' => 0
				));
			if($user){

				Mail::send('emails.auth.activate', array(
					'link' => URL::route('account-activate', $code),
					'username' => $username
					), 
				function($message) use ($user){
					$message->to($user->email, $user->username)->subject('Activation Mail');
				});

				return Redirect::route('home')
							->with('global', 'You have been registered! We have send the activation code to your email address. To complete the registeration click the link in the mail.');


			}
			
		}
	}
	public function getActivate($code) {
		 $user = User::where('code', '=', $code)->where('active', '=', 0);


		 if($user->count()){
		 	$user = $user->first();
		 	//user activation
		 	$user->active = 1;
		 	$user->code = '';
		 	


		 	if($user->save()){
		 		return Redirect::route('home')->with('global', 'Activated. You can now sign in');

		 	}
		 }
		 return Redirect::route('home')->with('global', 'Sorry, we could not activate you. Try again later.');
	}

	public function getChangePassword(){
		return View::make('account.changepassword');
	}

	public function postChangePassword(){
		$validator = Validator::make(Input::all(), array(
			'old_password' => 'required',
			'password' => 'required|min:6',
			'password_again' => 'required|same:password'
		));
		if($validator->fails()){
			return 	Redirect::route('account-change-password')
					->withErrors($validator);

		}else{
			$user = User::find(Auth::user()->id);

			$old_password  = Input::get('old_password');
			$password      = Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())){
				$user->password = Hash::make($password);
				if($user->save()){
					return Redirect::route('home')
							->with('global', 'Password changed');
				}else{
					return  Redirect::route('account-change-password')
							->with('global', 'Your old password is incorrect.');
					}
				}
			return  Redirect::route('account-change-password')
				->with('global', 'We could not change your password . Try again later');
	
		}

	}
}
