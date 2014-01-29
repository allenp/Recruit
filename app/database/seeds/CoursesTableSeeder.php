<?php

class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        $courses = array(
            array(
                'name' => 'Mathematics',
                'permalink' => 'mathematics',
                'abbrev' => 'Math',
                'level' => 'CSEC',
                'rank' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => 'English',
                'permalink' => 'english',
                'abbrev' => 'English',
                'level' => 'CSEC',
                'rank' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => 'Spanish',
                'permalink' => 'spanish',
                'abbrev' => 'Spanish',
                'level' => 'CSEC',
                'rank' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        );

        DB::table('courses')->insert( $courses );

        $account = Account::first();
        $math = Course::where('permalink', '=', 'mathematics')->first();
        $eng = Course::where('permalink', '=', 'english')->first();
        $span = Course::where('permalink', '=', 'spanish')->first();

        $account_courses = array(
            array(
                'account_id' => $account->id,
                'course_id' => $math->id
            ),
            array(
                'account_id' => $account->id,
                'course_id' => $eng->id
            ),
            array(
                'account_id' => $account->id,
                'course_id' => $span->id
            )
        );

        DB::table('account_course')->insert( $account_courses );
    }
}
