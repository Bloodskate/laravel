<?php
class Reply extends Eloquent{
	
	protected $table = 'replies';
	
	protected $fillable = array('user_id', 'status_id', 'reply');
	
	public function status(){
	
		return $this->belongsTo('Status');
	
	}
	
	public function user(){
	
		return $this->belongsTo('User');
	
	}

}