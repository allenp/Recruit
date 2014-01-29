<?php namespace EduFocal\Course;

class EloquentEnrollmentRepository implements EnrollmentRepositoryInterface {

    protected $enrollment;

    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function save($enrollment)
    {
        return $enrollment->save();
    }

    public function craete($options)
    {
        return $this->enrollment->create($options);
    }

    public function find($user_id, $course_id)
    {
        return $this->enrollment
                    ->where('user_id', '=', $user_id)
                    ->where('course_id', '=', $course_id)
                    ->first();
    }
}
