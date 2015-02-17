<?php
class StatusController extends BaseController{
	public function getStatus(){
		return View::make('status.updatestatus');
	}

	public function postStatus(){
		$user_id = Auth::user()->id;
		$post =  Input::get('status');

		$group = Group::where('foreignid', '=', $user_id);
		$group = $group->first();
		$primarygroup = $group->primarygroup;

		$status = Status::create(array(
			'user_id' => $user_id,
			'post' => $post,
			'primarygroup' => $primarygroup
		));
		if($status->save()){
		 		return Redirect::route('home')->with('global', 'Posted');

		 	}
		 return Redirect::route('home')->with('global', 'Couldn`t be posted');
	}
}