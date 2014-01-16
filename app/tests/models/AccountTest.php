<?php

use Mockery as m;
use Woodling\Woodling;

class AccountTest extends TestCase {

    public function testFields()
    {
        $account = Woodling::retrieve('ConsultingAccount');
        $this->assertEquals( $account->email, 'blue@example.org' );
        $this->assertEquals( $account->name, 'Blueprint Consulting' );
        $this->assertEquals( $account->timezone, 'America/Jamaica' );
        $this->assertEquals( $account->activated, 1 );
    }
}
