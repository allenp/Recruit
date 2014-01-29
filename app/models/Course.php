<?php

use Allenp\Helpers\String;

class Course extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

    public function setNameAttribute($value)
    {
        $this->attributes['permalink'] = String::slug($value);
        $this->attributes['name'] = $value;
    }
}
