<?php

class GroupController extends BaseController{
	public function group($ongroup){
		$group = Allgroups::where('group', '=', $ongroup)->get();
		if($group->count()){
			return View::make('group.group')->with('ongroup', $ongroup);
		}
		else{
			return Redirect::route('allgroups')->with('global','group not found');
		}
	}

	public function allgroups(){
		$all = Allgroups::all();
		return View::make('group.allgroups')->with('all', $all);
	}
}