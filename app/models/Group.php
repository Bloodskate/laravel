<?php
class Group extends Eloquent{
	protected $table = 'group';
	protected $fillable = array('user_id', 'group1');
	public function user(){
		return $this->belongsTo('User');
	}


}