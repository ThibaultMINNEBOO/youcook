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

        $I->see('Prénom', 'form > .form-group > label[for="profile_firstname"]');
        $I->see('Nom', 'form > .form-group > label[for="profile_lastname"]');
        $I->see('Email', 'form > .form-group > label[for="profile_email"]');
        $I->seeElement("form > .form-group > input#profile_firstname[value='{$user->getFirstname()}']");
        $I->seeElement("form > .form-group > input#profile_lastname[value='{$user->getLastname()}']");
        $I->seeElement("form > .form-group > input#profile_email[value='{$user->getEmail()}']");

        $I->seeResponseCodeIs(200);
    }

    public function testRedirectToLoginWhenNotAuthenticated(ControllerTester $I)
    {
        $I->amOnPage('/profile');
        $I->seeCurrentRouteIs('app_login');
    }

    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
    }
}
