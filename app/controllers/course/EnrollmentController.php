<?php

use EduFocal\Course\EnrollmentRepositoryInterface;

class EnrollmentController extends BaseController {

    protected $accounts;
    protected $courses;
    protected $enrollments;

    public function __construct(
        EnrollmentRepositoryInterface $enrollments,
        AccountRepositoryInterface $accounts,
        CourseRepositoryInterface $courses)
    {
        $this->accounts = $accounts;
        $this->courses = $courses;
        $this->enrollments = $enrollments;
    }

    public function getIndex($account_link, $course_link)
    {
        $course_link = strtolower(trim($course_link));
        $account_link = strtolower(trim($account_link));

        $course = $this->courses
                       ->find(array('permalink', $course_link));

        $account = $this->accounts
                        ->find(array('permalink', $account_link));

        //TODO: check for empty course or account
        //and show an alternate error view
        return View::make('enrollments/enroll',
                            compact('course', 'account'));
    }

    public function getSuccess()
    {
        //TODO: show user that they have been enrolled to
        //the course successfully.
    }

    public function postIndex()
    {
        $rules = array(
            array('account' => 'required'),
            array('course' => 'required')
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $this->enrollment->create($options);
            //TODO: show successful enrollment, and need for approval
            //for the course.
        } else {
            return Redirect::to_action('CourseController@getIndex')
                             ->withErrors($validator);
        }
    }
}
