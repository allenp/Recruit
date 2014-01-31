<?php

use EduFocal\Course\CourseRepositoryInterface;
use EduFocal\Course\CoursesForAccountQueryInterface;

class CourseController extends AuthorizedController {

    protected $courses;
    protected $courseQuery;

    public function __construct(
        CourseRepositoryInterface $courses,
        CoursesForAccountQueryInterface $courseQuery)
    {
        $this->courses = $courses;
        $this->courseQuery = $courseQuery;
    }

    public function getIndex()
    {
        $user = Auth::user();
        $courses = $courseQuery->getCourses($user->account_id);

        return View::make('courses/list', compact('courses'));
    }

    public function getCreate()
    {
        return View::make('courses/create');
    }

    public function postCreate()
    {
        $rules = array(
            array('name' => 'required|min:3'),
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $course = $courses->find(array('id' => $id));
            $course->name = Input::post('name');
            $course->description = Input::post('description');
            $course->invite_only = Input::post('invite_only');
            $this->courses->save($course);
        } else {
            return Redirect::to_action('CourseController@getCreate')
                             ->withErrors($validator);
        }
    }

    public function getEdit($course)
    {
        $course = $this->courses->findById($course);
        return View::make('courses/edit', compact('course'));
    }

    public function postEdit()
    {
    }
}
