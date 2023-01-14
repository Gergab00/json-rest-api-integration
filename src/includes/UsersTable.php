<?php

namespace JSONRAPII\Includes;

/**
 * Class UsersTable
 * @package JSONRAPII_URL\Includes
 */
class UsersTable
{
    /**
     * UsersTable constructor.
     */
    public function __construct()
    {
        // Add the action to get the data from the API
        add_action('init', [ $this, 'getUsersData' ]);
    }

    public function getUsersData()
    {
      // Check the user data is already stored in the cache
        $data = get_transient('users_data');
        if (false === $data) {
            try {
              // Get the data from the API
                $response = wp_remote_get('https://jsonplaceholder.typicode.com/users');

                if (is_wp_error($response)) {
                    throw new Exception($response->get_error_message());
                } else {
                    $data = json_decode(wp_remote_retrieve_body($response));

                  // Store the data in the cache
                    set_transient('users_data', $data, HOUR_IN_SECONDS);
                }
            } catch (Exception $exception) {
              // If the request fails, use the transient data
                $data = get_transient('users_data');
                if (false === $data) {
                    $data = [
                    [
                    'id' => 0,
                    'name' => $exception->getMessage(),
                    ],
                    ];
                }
            }
        }
    }
}
new UsersTable();
