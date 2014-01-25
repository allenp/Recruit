<?php

class TopicsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('topics')->delete();

        $subject = Subject::where('permalink','=', 'mathematics')->first();

        $topics = array(
            array(
                'name' => 'Functions and Graphs',
                'subject_id' => $subject->id,
                'permalink' => 'functions_graphs',
                'multiple_choice' => 1,
                'short_answer' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'name' => 'Geometry/Trigonometry',
                'subject_id' => $subject->id,
                'permalink' => 'geometry_trigonometry',
                'multiple_choice' => 1,
                'short_answer' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        );

        DB::table('topics')->insert( $topics );
    }
}
