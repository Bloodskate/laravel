<?php
class Status extends Eloquent{
	protected $table = 'posts';
	protected $fillable = array('user_id', 'primarygroup', 'post');
	public function user(){
		return $this->belongsTo('User');
	}
}