<?php namespace EduFocal\Course;

interface EnrollmentRepositoryInterface {

    public function save($enrollment);
    public function create($options);
    public function find($user_id, $course_id);

}
