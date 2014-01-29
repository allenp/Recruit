<?php namespace EduFocal\Course;

interface CourseRepositoryInterface {

    public function create($options);

    public function save($course);

    public function find($options);

}
