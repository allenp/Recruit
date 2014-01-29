<?php namespace EduFocal\Testing;

use \Test;
use DB;

class EloquentTestRepository implements TestRepositoryInterface {

    public function find($options)
    {
        $query = DB::table('tests');
        foreach ($options as $key => $value) {
            $query->where($key, '=', $value);
        }
        return $query->first();
    }

    public function create($options=array())
    {
        $test = Test::create($options);
        return $test;
    }

    public function save($test)
    {
        return $test->save();
    }

}
