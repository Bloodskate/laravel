<?php
class GroupController extends BaseController{
	public function Apple(){
		$posts = Status::where('primarygroup', '=', 'Apple')->get();
		$users = User::where('user_id', '=', $posts->id);
		return  View::make('group.apple')
				->with('posts', $posts)
				->with('users', $users);
	}
	public function Ball(){
		return View::make('group.ball');
	}
}