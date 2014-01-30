<?php namespace EduFocal\Course;

use DB;
use EnrolledCoursesQueryInterface;

/**
 *
 * Author: Paul Allen
 * January, 2014
 *
 */

class EloquentEnrolledCoursesQuery implements EnrolledCoursesQueryInterface {

    public function getCourses($user_id)
    {
        /*
         * select * from courses, enrollments
         * inner join enrollments on courses.id = enrollments.course_id
         * where enrollments.user_id = ?
         * order by approved_dt desc
         * 
         */

        $result = DB::table('courses')
            ->join('enrollments', 'courses.id', '=', 'enrollments.course_id')
            ->where('enrollments.user_id', '=', $user_id)
            ->orderBy('enrollments.approved_dt', 'desc')
            ->select('courses.*,
                      enrollments.created_dt enroll_dt,
                      enrollments.approved_dt enroll_approved_dt,
                      enrollments.approved_by enroll_approved_by,
                      enrollments.approved enroll_approved')
            ->get();

        return $result;
    }
}
