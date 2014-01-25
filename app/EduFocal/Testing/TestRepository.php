<?php namespace EduFocal\Testing;

use \Test;

class TestRepository implements TestRepositoryInterface {

    public function findById($id)
    {
        return Test::where('id', '=', $id);
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
