<?php
class GroupController extends BaseController{
	public function Apple(){
		$posts = Status::where('primarygroup', '=', 'Apple')->get();
		
		return  View::make('group.apple')
				->with('posts', $posts);
	}
	public function Ball(){
		$posts = Status::where('primarygroup', '=', 'Ball')->get();

		return  View::make('group.ball')
				->with('posts', $posts);
	}
	public function group(){
		return View::make('group.group');
	}
}