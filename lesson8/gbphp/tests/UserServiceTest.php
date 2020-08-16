<?php

namespace App\tests;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use App\services\userService;

class UserServiceTest extends TestCase
{
   public function testNoData()
   {
      $userServiceMock = $this->getMockBuilder(userService::class)
         ->getMock();

      $userServiceMock
         ->expects($this->never())
         ->method('isDataExists')
         ->willReturn(true);

      $service = new userService();
      $result = $service->save(0,0);
      $this->assertNull($result);
   }

   

}

