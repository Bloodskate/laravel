<?php
class Group extends Eloquent{
	protected $table = 'group';
	protected $fillable = array('foreignid', 'primarygroup');

}