<?php
class GroupController extends BaseController{
	public function Apple(){
		return  View::make('group.apple');
	}
	public function Ball(){
		return View::make('group.ball');
	}
}