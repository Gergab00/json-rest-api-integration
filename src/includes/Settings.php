<?php

// Declare strict types.
declare(strict_types=1);

namespace JSONRAPII\Includes;

class Settings
{
    /**
     * Settings constructor.
     */
    public function __construct()
    {
        $this->defineVersion();
        add_action('wp_enqueue_scripts', [ $this, 'enqueueScripts' ]);
    }

    public function defineVersion()
    {

        $pluginData = get_file_data(JSONRAPII_DIR . '/json-rest-api-integration.php', [ 'Version' => 'Version' ]);
        define('JSONRAPII_VERSION', $pluginData['Version']);
    }

    public function enqueueScripts()
    {

        wp_enqueue_style('datatables-css', JSONRAPII_URL . 'css/jquery.dataTables.min.css', [], JSONRAPII_VERSION);
        wp_enqueue_style('style-css', JSONRAPII_URL . 'css/style.css', [], JSONRAPII_VERSION);

        wp_enqueue_script('datatables-js', JSONRAPII_URL . 'js/dataTables.dataTables.min.js', [ 'jquery' ], JSONRAPII_VERSION, true);
        wp_enqueue_script('bootstrap-js', JSONRAPII_URL . 'js/bootstrap.js', [ 'jquery' ], JSONRAPII_VERSION, true);
        wp_enqueue_script('script-js', JSONRAPII_URL . 'js/script.js', [ 'jquery', 'datatables-js', 'bootstrap-js' ], JSONRAPII_VERSION, true);
    }
}
