<?php

class TestsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tests')->delete();

        $user = User::where('username', '=', 'applicant')->first();
        $teacher = User::where('username', '=', 'teacher')->first();
        $topic = Topic::first();
        $tests = array(
            array(
                'user_id' => $user->id,
                'teacher_id' => $teacher->id,
                'course_id' => $topic->course_id,
                'topic_id' => $topic->id,
                'started_at' => Carbon::now(),
                'percentage' => 0,
                'weight' => array(),
                'format' => 'multiple',
                'max_questions' => 10,
                'page_size' => 5
            )
        );

        DB::table('tests')->insert( $tests );
    }

}
