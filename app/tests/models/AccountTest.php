<?php

use Mockery as m;
use Woodling\Woodling;

class AccountTest extends TestCase {

    public function testExistenceOfFields()
    {
        $account = Woodling::retrieve('ConsultingAccount');
        $this->assertEquals( $account->email, 'blue@example.org' );
        $this->assertEquals( $account->name, 'Blueprint Consulting' );
        $this->assertEquals( $account->timezone, 'America/Jamaica' );
        $this->assertEquals( $account->activated, 1 );
        $this->assertEquals( $account->slug, 'Blueprint-Consulting' );
    }

    public function testCreationOfSlugWhenSettingName()
    {
        $account = Woodling::retrieve('ConsultingAccount');
        $account->name = 'Some value @ for a name %';
    }
}
