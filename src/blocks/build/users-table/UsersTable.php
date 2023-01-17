<?php

// Declare strict types.
declare(strict_types=1);

namespace JSONRAPII\Blocks\UsersTable;

class UsersTable
{
    /**
     * UsersTable constructor.
     */
    public function __construct(array $usersData)
    {
        define('USERSDATA', $usersData);
        add_action('init', [ $this, 'register' ]);
        add_action('wp_ajax_get_user_details', [ $this, 'renderUserDetailsAjax' ]);
        add_action('wp_ajax_nopriv_get_user_details', [ $this, 'renderUserDetailsAjax' ]);
        add_action('wp_enqueue_scripts', [ $this, 'enqueueScripts' ]);
    }

    public function register(): void
    {
        register_block_type(
            __DIR__,
            [
             /**
              * Render callback function.
              *
              * @param array    $attributes The block attributes.
              * @param string   $content    The block content.
              * @param WP_Block $block      Block instance.
              *
              * @return string The rendered output.
              */
              'render_callback' => [$this, 'renderCallback'],
            ]
        );
    }

    public static function renderCallback(): string
    {

        ob_start();
        require __DIR__ . '/render.php';
        return ob_get_clean();
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
        $userData = get_transient($transientName);

        if ($userData) {
            wp_send_json_success($userData);
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
