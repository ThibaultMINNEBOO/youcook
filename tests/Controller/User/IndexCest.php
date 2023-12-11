<?php

namespace App\Tests\Controller\User;

use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class IndexCest
{
    public function testShowProfileWhenAuthenticated(ControllerTester $I)
    {
        $user = UserFactory::createOne()->object();
        $I->amLoggedInAs($user);

        $I->amOnPage('/profile');

        $I->seeInTitle("{$user->getFirstname()} | Profile");
        $I->seeElement('form');

        $I->seeResponseCodeIs(200);
    }

    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
    }
}
