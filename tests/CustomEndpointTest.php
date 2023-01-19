<?php

use PHPUnit\Framework\TestCase;
use JSONRAPII\Includes\CustomEndpoint;

class CustomEndpointTest extends TestCase {
    protected $usersData = [
        ['id' => 1, 'name' => 'John Doe'],
        ['id' => 2, 'name' => 'Jane Doe'],
    ];

    public function testConstructor() {
        $endpoint = new CustomEndpoint($this->usersData);
        $this->assertInstanceOf(CustomEndpoint::class, $endpoint);
    }

    public function testInit() {
        $endpoint = new CustomEndpoint($this->usersData);
        $endpoint->init();
        $this->assertTrue(true);
    }

    public function testRegisterEndpoint() {
        $endpoint = new CustomEndpoint($this->usersData);
        $endpoint->registerEndpoint();
        $this->assertTrue(true);
    }

    public function testHandleEndpoint() {
        $endpoint = new CustomEndpoint($this->usersData);
        $endpoint->handleEndpoint();
        $this->assertTrue(true);
    }

    public function testEnqueueScripts() {
        $endpoint = new CustomEndpoint($this->usersData);
        $endpoint->enqueueScripts();
        $this->assertTrue(true);
    }
}