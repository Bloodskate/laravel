<?php
class Allgroups extends Eloquent{
	
	protected $table = 'all_groups';
	
	public function user(){
	
		return $this->belongsTo('User');
	
	}

}