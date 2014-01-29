<?php

class EnrollmentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('enrollments')->delete();

        $user1 = User::where('username', '=', 'applicant')->first();
        $manager1 = User::where('username', '=', 'manager')->first();
        $course1 = Course::where('permalink', '=', 'mathematics')->first();
        $course2 = Course::where('permalink', '=', 'english')->first();

        $enrollments = array(
            array(
                'user_id' => $user1->id,
                'course_id' => $course1->id,
                'approved' => true,
                'approved_by' => $manager1->id,
                'approved_dt' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'user_id' => $user1->id,
                'course_id' => $course2->id,
                'approved' => false,
                'approved_by' => $manager1->id,
                'approved_dt' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
        );

        DB::table('enrollments')->insert( $enrollments );
    }
}
