<?php
class StatusController extends BaseController{
	public function getStatus(){
		return View::make('status.updatestatus');
	}

	public function postStatus($presentgroup){
		$user_id = Auth::user()->id;
		$post =  Input::get('status');

		$ongroup = $presentgroup;

		$status = Status::create(array(
			'user_id' => $user_id,
			'post' => $post,
			'ongroup' => $ongroup
		));
		if($status->save()){
		 		return Redirect::route('home')->with('global', 'Posted');

		 	}
		 return Redirect::route('home')->with('global', 'Couldn`t be posted');
	}
	
}