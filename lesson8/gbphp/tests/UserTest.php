<?php

namespace App\tests;

use App\repositories\GoodRepository;
use App\services\BasketServices;
use App\services\Request;
use App\services\UserService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use App\entities\User;

class UserTest extends TestCase
{

    private $user;

    protected function setUp(): void
    {
        $this->user = new User;
        $this->user->setLogin('User');
    }
    /**
     * @dataProvider userProvider
     */
    public function testLogin($login)
    {
        $this->assertEquals($login, $this->user->getLogin());
    }

    public function userProvider()
    {
        return [
            ['User'],
            ['Evgenij'],
            ['John']
        ];
    }
 
}
