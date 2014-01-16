<?php

use Woodling\Woodling;

class PermissionTest extends TestCase {

    public function testName()
    {
        $permission = Woodling::retrieve('manage_users');

        $this->assertEquals( $permission->name, 'manage_users' );
        $this->assertEquals( $permission->display_name, 'manage users' );
    }
}
