# JSON REST API integration Plugin

This plugin allows you to display a HTML table of users on your WordPress site, using data from a third-party REST API.

## Description
This project has been developed as a test sample of my skills as a specialized Wordpress programmer, I have chosen to use Bootstrap in its 5.2 version because it is a plugin to be used and helps to make responsive sites. I have also used DataTables.js, which is a JQuery plugin, because it helps to render tables with information. This shows my skills using jQuery and Javascript.

For the unit tests I have decided to use PHPUnit because it is the Framework that is recommended in the documentation and forums of the Official Wordpress page. It is the same Framework that is used for the unit tests of the Wordpress Core.

## Features 
- Display a HTML table of users on the frontend of your site, with columns for id, name, and username.
- Each row in the table contains links that, when clicked, display additional details about the user.
- The plugin makes requests to the third-party API to retrieve the user data, and does not store it in the WordPress database.
- The plugin adds a custom endpoint to your site, so that the user table is displayed when visiting a specific URL (e.g. https://example.com/show-table-users/).
- The plugin uses AJAX to retrieve and display user details, so the page does not need to be reloaded when viewing user details.
- The plugin implements caching for the API requests to improve performance
- The plugin handle errors for the external requests and display custom messages to the user.

## Requirements
WordPress 6.0 or higher
PHP 7.4 or higher

## Installation
1. Download the plugin from the WordPress repository or from GitHub
2. Go to your website's WordPress dashboard and navigate to Plugins > Add New
3. Click on the "Upload Plugin" button and select the plugin zip file you downloaded
4. Click on the "Install Now" button and wait for the plugin to be installed
5. Click on the "Activate" button to activate the plugin

## Setup
To start using all the tools that come with `JSON REST API integration Plugin` you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

## Usage
- To show the user table it is necessary to enter for example http://example.com/show-table-users

## Support
If you encounter any issues or need assistance, please open an issue on the [GitHub repository](https://github.com/Gergab00/json-rest-api-integration) or contact us via our [mail](contact@gerardo-gonzalez.dev).

## Contribution
We welcome any contributions to the plugin, please fork the repository and submit a pull request with your changes.

### Requirements

`JSON REST API integration Plugin` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [Bootstrap](https://getbootstrap.com/)

## Available CLI commands

`JSON REST API integration Plugin` comes packed with CLI commands tailored for WordPress plugin development:

- `npm run build`: This command runs the "wp-scripts build" script with options to copy PHP and JS files, and specify the source and output directories for webpack.
- `npm run start`: This command runs the "wp-scripts start" script with options to copy PHP and JS files, and specify the source and output directories for webpack.
- `npm run watch-run-css`: This command runs the "nodemon" script to watch for changes in the "src/sass" directory and automatically run the "compile:css" script when changes are detected.
- `npm run compile:css`: This command runs the "sass" script to compile the "src/sass/style.scss" file into the "css/style.css" file.
- `npm run lint:scss`: This command runs the "wp-scripts lint-style" script to lint the SCSS files.
- `npm run lint:js`: This command runs the "wp-scripts lint-js" script to lint the JS files.
- `npm run bundle`: This command uses `dir-archiver` to create a zip archive of the plugin, excluding certain files and directories like .DS_Store, .stylelintrc.json, .git, README.md, etc.
- `npm run format`: This command runs `wp-scripts format` to format the plugin's code.
- `npm run copy-assets`: This command runs a node script that copies assets to the appropriate location.
- `npm run js-compile`: This command runs rollup with a specified config file to compile the plugin's javascript.
- `composer lint:wpcs`: This command runs `phpcs` to check the plugin's code against the WordPress coding standards, ignoring the vendor and node_modules directories.
- `composer lint:php`: This command runs `parallel-lint` to check the plugin's code for syntax errors, ignoring the .git and vendor directories.
- `composer make-pot`: This command runs `wp i18n make-pot` to create a .pot file for localization.
- `composer lint:inpsyde`: This command runs `phpcs` to check the plugin's code against the Inpsyde coding standards, ignoring the vendor and node_modules directories.
- `composer fix`: This command runs `php-cs-fixer` to automatically fix coding standard violations in the plugin's code.
- `composer fix:inpsyde`: This command runs `phpcbf` to automatically fix coding standard violations in the plugin's code, using the Inpsyde standard, ignoring the vendor and node_modules directories.
- `composer test`: This command runs `phpunit` to run the plugin's unit tests.

## Changelog
-1.0: Initial release

## License
This plugin is licensed under the GPLv2 license.

## Author
[Gerardo Gabriel Gonzalez Velazquez](https://gerardo-gonzalez.dev)

## Disclaimer
This plugin is provided "as is" with no guarantee or warranty. Use it at your own risk. We shall not be held liable for any damages resulting from the use of this plugin.