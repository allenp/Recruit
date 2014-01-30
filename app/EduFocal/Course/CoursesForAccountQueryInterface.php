<?php namespace EduFocal\Course;

/**
 *
 * Author: Paul Allen
 * January, 2014
 *
 */
interface CoursesForAccountQueryInterface {

    public function getCourses(/* mixed */ $account_id);

}
