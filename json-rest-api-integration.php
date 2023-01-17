<?php

/*
@package json-rest-api-integration
@author Gerardo Gonzalez
@license GPL-2.0-or-later
@wordpress-plugin
Plugin Name: JSON REST API integration
Description: This plugin allows you to display a HTML table of users on your WordPress site, using data from a third-party REST API.
Author: Gerardo Gonzalez
Author URI: https://gerardo-gonzalez.dev/
Version: 1.0
Requires at least: 6.0
Requires PHP:      7.4
License:           GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

JSON REST API integration is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
JSON REST API integration is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with JSON REST API integration. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

define('JSONRAPII_URL', plugin_dir_url(__FILE__));
define('JSONRAPII_DIR', __DIR__);

require __DIR__ . '/vendor/autoload.php';

use JSONRAPII\Start;

$start = new Start();
