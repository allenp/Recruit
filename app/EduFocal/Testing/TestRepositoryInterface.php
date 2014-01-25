<?php namespace EduFocal\Testing;

interface TestRepositoryInterface {

    public function findById($id);
    public function create($options);
    public function save($test);

}
