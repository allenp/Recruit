<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        //integrity constraints
        DB::table('assigned_roles')->delete();

        DB::table('users')->delete();

        $account = Account::first()->id;

        $users = array(
            array(
                'username'      => 'admin',
                'email'      => 'admin@example.org',
                'password'   => Hash::make('admin'),
                'confirmed'   => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'account_id' => $account
            ),
            array(
                'username'      => 'manager',
                'email'      => 'manager@example.org',
                'password'   => Hash::make('manager'),
                'confirmed'   => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'account_id' => $account
            ),
            array(
                'username' => 'teacher',
                'email' => 'teacher@example.com',
                'password' => Hash::make('teacher'),
                'confirmed' => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'account_id' => $account
            ),
            array(
                'username' => 'applicant',
                'email' => 'applicant@example.com',
                'password' => Hash::make('teacher'),
                'confirmed' => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'account_id' => null
            )
        );

        DB::table('users')->insert( $users );
    }

}
