<?php

// Declare strict types.
declare(strict_types=1);

namespace JSONRAPII\Includes;

class CustomEndpoint
{
    /**
     * CustomEndpoint constructor.
     */
    public function __construct(array $data)
    {
        global $usersData;
        $usersData = $data;
        add_action('init', [$this, 'registerEndpoint']);
        add_action('template_redirect', [$this, 'handleEndpoint']);
        add_action('wp_ajax_get_user_details', [$this, 'renderUserDetailsAjax']);
        add_action('wp_ajax_nopriv_get_user_details', [$this, 'renderUserDetailsAjax']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        register_activation_hook(plugin_dir_url(JSONRAPII_URL), [$this, 'init']);
    }

    public function init()
    {
        flush_rewrite_rules();
    }

    /**
     * Register the custom endpoint
     */
    public function registerEndpoint()
    {
        add_rewrite_endpoint('show-table-users', EP_ROOT);
    }

    /**
     * Handle the custom endpoint
     */
    public function handleEndpoint()
    {
        global $wp;
        global $wp_query;
        $currentUrl = home_url(add_query_arg([], $wp->request));
        if ($currentUrl !== home_url('/show-table-users')) {
            return;
        }

        $wp_query->is_404 = '';
        $wp_query->is_page = 1;

        $templatePath = JSONRAPII_DIR . '/templates/page-show-table.php';
        if (file_exists($templatePath)) {
            status_header(200);
            require $templatePath;
            exit;
        }
    }

    public function renderUserDetailsAjax(): void
    {
        check_ajax_referer('userstable_script_nonce', 'nonce');
        if (!isset($_POST['user_id'])) {
            wp_send_json_error('User ID is not set');
            return;
        }
        $userId = intval($_POST['user_id']);
        $transientName = 'user_details_' . $userId;
        $uData = get_transient($transientName);

        if ($uData) {
            wp_send_json_success($uData);
            return;
        }

        $response = wp_remote_get('https://jsonplaceholder.typicode.com/users/' . $userId);

        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
            return;
        }

        $userData = json_decode(wp_remote_retrieve_body($response));
        set_transient($transientName, $userData, HOUR_IN_SECONDS);
        wp_send_json_success($userData);
    }

    public static function enqueueScripts(): void
    {
        wp_localize_script('script-js', 'userstable_script', [
          'url' => admin_url('admin-ajax.php'),
          'nonce' => wp_create_nonce('userstable_script_nonce'),
        ]);
    }
}
