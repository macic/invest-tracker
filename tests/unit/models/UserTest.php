<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testCreateUserSuccessful()
    {
        # dwa sposoby na posiadanie danych w bazie:
        # 1. recznie w testach + pogrupowanie w metodzie _before - patrz poczatek przykladu ponizej
        # 2. uzycie fixturek - https://www.yiiframework.com/doc/guide/2.0/pl/test-fixtures
        $user = new User();
        $user->username = 'username';

        $this->assertTrue($user->save());
    }
    public function testFindUse1rById()
    {
        expect_that($user = User::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentityByAccessToken('non-existing'));        
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('admin'));
        expect_not(User::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('admin');
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}
