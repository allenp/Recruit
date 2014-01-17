<?php

use Allenp\Helpers\String;

class Account extends Eloquent {

	protected $guarded = array();
	public static $rules = array();

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = String::slug($value);
        $this->attributes['name'] = $value;
    }

}
