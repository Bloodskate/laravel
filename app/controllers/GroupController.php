<?php
class GroupController extends BaseController{
	public function Apple(){
		$posts = Status::where('ongroup', '=', 'Apple')->get();
		$posts = $posts->sortByDesc('created_at');
		$presentgroup = "Apple";
		
		return  View::make('group.apple')
				->with('posts', $posts)
				->with('presentgroup', $presentgroup);
	}
	public function Ball(){
		$posts = Status::where('ongroup', '=', 'Ball')->get();
		$posts = $posts->sortByDesc('created_at');
		$presentgroup = "Ball";

		return  View::make('group.ball')
				->with('posts', $posts)
				->with('presentgroup', $presentgroup);
	}
	public function group($ongroup){
		$posts = Status::all();
		return View::make('group.group')
				->with('posts', $posts)
				->with('ongroup', $ongroup);
	}
	public function groups(){
		$a = array('Apple', 'Ball');
		return  View::make('group.groups')
				->with('a', $a);
	}
}