<?php
class StatusController extends BaseController{
	
	public function postStatus(){
		$user_id = Auth::user()->id;
		$post =  Input::get('status');
		$post = htmlentities($post);
		$username = Auth::user()->username;
		$status = Status::create(array(
			'user_id' => $user_id,
			'post' => $post,
		));
		if($status->save()){
		 		return Redirect::route('profile-user', $username)->with('global', 'Posted');

		 	}
		 return Redirect::route('profile-user')->with('global', 'Couldn`t be posted');
	}
	
	public function getDelete($post_id){
		$status = Status::where('id', '=', $post_id)->delete();
		$username = Auth::user()->username;
		return Redirect::route('profile-user', $username)->with('global', 'Deleted');
	}

	public function getReply($onstatusid){
		return View::make('status.reply')->with('onstatusid', $onstatusid);
	}

	public function postReply($onstatusid){
		$post = Input::get('reply');
		$post = htmlentities($post);
		$user_id = Auth::user()->id;
		$username = Auth::user()->username;
		$status = Status::where('id', '=', $onstatusid)->first(); //onstatusid ko status leko 
		$reply = Reply::create(array(
			'user_id' => $user_id,
			'status_id' => $onstatusid,
			'reply' => $post
		));

		if($reply->save()){
			return Redirect::route('profile-user', $status->user->username)->with('global', 'posted');
		}
		 return Redirect::route('profile-user')->with('global', 'Couldn`t be posted');
	}
}