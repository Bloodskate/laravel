<?php
class Group extends Eloquent{
	
	protected $table = 'groups';
	
	protected $fillable = array('user_id','group1','group2','group3','group4','group5');
	
	public function user(){
	
		return $this->belongsTo('User');
	
	}

}