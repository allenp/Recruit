<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        // Add calls to Seeders here
        $this->call('AccountsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('CoursesTableSeeder');
        $this->call('TopicsTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('EnrollmentsTableSeeder');
    }

}
