<?php

class AccountsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('accounts')->delete();

        $bluePants = new Account;
        $bluePants->name = 'Blue Pants Accounting';
        $bluePants->email = 'blue@example.org';
        $bluePants->timezone = 'America/Jamaica';
        $bluePants->activated = true;
        $bluePants->activation_key = md5(microtime().Config::get('app.key'));
        $bluePants->save();
    }

}


