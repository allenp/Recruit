<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        //integrity constraints
        DB::table('permission_role')->delete();

        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $managerRole = new Role;
        $managerRole->name = 'manager';
        $managerRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );

        $user = User::where('username','=','manager')->first();
        $user->attachRole( $managerRole );
    }

}
