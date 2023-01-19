<?php

use JSONRAPII\Includes\UsersData;

class UsersDataTest extends \PHPUnit\Framework\TestCase
{
    public function testGetUsersData()
    {
        $usersData = new UsersData();

        $data = $usersData->getUsersData();

        $this->assertNotEmpty($data);

        foreach ($data as $item) {
            $this->assertArrayHasKey('id', $item);
            $this->assertArrayHasKey('name', $item);
            $this->assertArrayHasKey('username', $item);
        }

        $transient = get_transient('users_data');
        $this->assertEquals($data, $transient);
    }

    public function testGetUsersDataError()
    {
        $response = new WP_Error('error', 'Error message');
        $mock = $this->getMockBuilder(UsersData::class)
            ->setMethods(['wp_remote_get'])
            ->getMock();
        $mock->expects($this->any())
            ->method('wp_remote_get')
            ->willReturn($response);

        $data = $mock->getUsersData();
        $this->assertNotEmpty($data);

        $transient = get_transient('users_data');
        $this->assertEquals($data, $transient);
    }
}
