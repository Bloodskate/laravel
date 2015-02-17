<?php
class ProfileController extends BaseController{
	public function user($username) {
		$user = User::where('username', '=', $username);
		
		if($user->count()){
		$user = $user->first();
		$group = Group::where('foreignid', '=', $user->id);
		$group = $group->first();
		$posts = Status::where('user_id', '=', $user->id)->get();
		$posts = $posts->sortByDesc('created_at');
		
		return  View::make('profile.user')
				->with('user', $user)
				->with('group', $group)
				->with('posts', $posts);

		}
		
		return App::abort(404);

	}
	
}