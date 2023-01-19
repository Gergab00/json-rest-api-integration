<?php

// Declare strict types.
declare(strict_types=1);

namespace JSONRAPII\Includes;

/**
 * Class UsersData
 * @package JSONRAPII\Includes
 */
class UsersData
{
    /**
     * UsersData constructor.
     */
    public function __construct()
    {
        // Add the action to get the data from the API
        add_action('init', [ $this, 'showUsersData' ]);
    }

    public function showUsersData(): array
    {
      // Check the user data is already stored in the cache
        $data = get_transient('users_data');

        if (false !== $data) {
            return $data;
        }
        try {
          // Get the data from the API
            $response = wp_remote_get('https://jsonplaceholder.typicode.com/users');

            if (is_wp_error($response)) {
                throw new Exception($response->get_error_message());
            }
                $data = json_decode(wp_remote_retrieve_body($response));

                $filteredData = array_map(static function (\stdClass $user): array {
                    return [
                      'id' => $user->id,
                      'name' => $user->name,
                      'username' => $user->username,
                    ];
                }, $data);

              // Store the data in the cache
                set_transient('users_data', $filteredData, HOUR_IN_SECONDS);
                return $filteredData;
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

        return $data;
    }
}
