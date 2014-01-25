<?php

class SubjectsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('subjects')->delete();

        $subjects = array(
            array(
                'name' => 'Mathematics',
                'permalink' => 'mathematics',
                'abbrev' => 'Math',
                'level' => 'GSAT',
                'rank' => 1,
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        );

        DB::table('subjects')->insert( $subjects );
    }
}
