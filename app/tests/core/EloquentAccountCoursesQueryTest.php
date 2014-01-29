<?php

use Mockery as m;

use EduFocal\Course\EloquentAccountCoursesQuery;

class EloquentAccountCoursesQueryTest extends TestCase {

    public function tearDown()
    {
        m::close();
    }

    public function testGetCourses()
    {
        $q = new EloquentAccountCoursesQuery();
        $user = User::where('username', '=', 'teacher')->first();
        $courses = $q->getCourses($user->account_id);
        $this->assertCount(3, $courses);

        $fail = $q->getCourses(2000);
        $this->assertCount(0, $fail);
    }

}
