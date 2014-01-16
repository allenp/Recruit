<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();

        $admin_id = Role::where('name', '=', 'admin')->first()->id;

        //$admin_id = 1;

        $permissions = array(
            array(
                'name'      => 'manage_users',
                'display_name'      => 'manage users'
            ),
            array(
                'name'      => 'manage_roles',
                'display_name'      => 'manage roles'
            ),
        );

        DB::table('permissions')->insert( $permissions );

        $manage_users = Permission::where('name', '=', 'manage_users')->first()->id;
        //$manage_users = 1;
        $manage_roles = Permission::where('name', '=', 'manage_roles')->first()->id;
        //$manage_roles = 2;

        $permissions = array(
            array(
                'role_id'      => $admin_id,
                'permission_id' => $manage_users
            ),
            array(
                'role_id'      => $admin_id,
                'permission_id' =>  $manage_roles
            ),
        );

        DB::table('permission_role')->insert( $permissions );
    }

}
