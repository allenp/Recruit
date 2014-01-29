<?php namespace EduFocal\Course;

use DB;

/**
 *
 * Author: Paul Allen
 * January, 2014
 *
 */
class EloquentAccountCoursesQuery implements CourseQueryInterface {

    public function getCourses($account_id)
    {

        /*
         * Select * from courses
         * inner join account_course on courses.id = account_course.course_id
         * inner join accounts on accounts.id = account_course.id
         * where accounts.id = :account_id
         *
         */

        $result = DB::table('courses')
            ->join('account_course', 'courses.id', '=', 'account_course.course_id')
            ->join('accounts', 'account_course.account_id', '=', 'accounts.id')
            ->where('accounts.id', '=', $account_id)
            ->select('courses.*')
            ->get();

        return $result;

    }

}
