<?php
class ProfileController extends BaseController{
	public function user($username) {
		$user = User::where('username', '=', $username);
		
		if($user->count()){
		$user = $user->first();
		$posts = Status::where('user_id', '=', $user->id)->get();
		$posts = $posts->sortByDesc('created_at');
		
		return  View::make('profile.profile')
				->with('user', $user)
				->with('posts', $posts);

		}
		
		return App::abort(404);

	}

	public function allusers(){
		$users = User::all();
		return View::make('profile.users')->with('users', $users);
	}
	
}