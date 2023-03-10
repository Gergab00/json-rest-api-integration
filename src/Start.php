<?php

// Declare strict types.
declare(strict_types=1);

namespace JSONRAPII;

use JSONRAPII\Includes\Settings;
use JSONRAPII\Includes\UsersData;
use JSONRAPII\Includes\CustomEndpoint;
use JSONRAPII\Blocks\UsersTable\UsersTable;

class Start
{
    public function __construct()
    {
        $settings = new Settings();
        $usersData = new UsersData();
        $customEndpoint = new CustomEndpoint($usersData->showUsersData());
    }
}
