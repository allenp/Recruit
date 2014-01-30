<?php

use EduFocal\Course\EnrolledCoursesQueryInterface;

class StudentDashboardController extends AuthrorizedController {

    protected $courseQuery;

    public function __construct(EnrolledCoursesQueryInterface $courseQuery)
    {
        $this->courseQuery = $courseQuery;
    }

    public function getIndex()
    {
        $user = Auth::user();
        $courses = $courseQuery->getCourses($user->id);
        return View::make('student/dashboard.index', compact('courses'));
    }
}
