<?php namespace EduFocal\Testing;

interface TestRepositoryInterface {

    public function find($options);
    public function create($options);
    public function save($test);

}
