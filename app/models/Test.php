<?php

class Test extends Eloquent {

    protected $guarded = array('id');
    
    public function getWeights()
    {
        return $this->weight;
    }

    public function setWeightAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['weight'] = json_encode($value);
        } else {
            if (is_numeric($value)) {
                $weights = $this->getWeightAttribute();
                $weights[] = $value;
                $this->attributes['weight'] = json_encode($weights);
            }
        }
    }

    public function getWeightAttribute()
    {
        $weights = isset($this->attributes['weight']) ?
            json_decode($this->attributes['weight']) : array();
        if (! is_array($weights)) {
            return array();
        } else {
            return $weights;
        }
    }
}
