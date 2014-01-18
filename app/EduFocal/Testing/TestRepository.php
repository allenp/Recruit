<?php namespace EduFocal\Testing;

class TestRepository {

    protected $test;

    public function __construct(Test $test)
    {
        $this->test = $test;
    }

    public function getById($id)
    {
        return $this->test->where('id', '=', $id);
    }

}
