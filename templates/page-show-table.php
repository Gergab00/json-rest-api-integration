<?php

/**
 * Template Name: Show Users Table
 *
 * @package json-rest-api-integration
 * @author Gerardo Gonzalez
 * @license GPL-2.0-or-later
 *
 */

// Declare strict types.
declare(strict_types=1);

// Exit if accessed directly.
defined('ABSPATH') || exit;

global $usersData;

get_header();

?>

<div class="container p-4">
    <div class="row">
        <div class="col my-4">
            <h1 class="py-4">Table of Users</h1>
            <section class="row" id="show-users-table">

                <table id="users-table" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersData as $user) : ?>
                        <tr>
                            <td>
                                <a href="<?php echo esc_url(add_query_arg('user_id', esc_html($user["id"]), get_permalink())); ?>"
                                    class="btn btn-link user-details-link" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <?php echo esc_html($user["id"]); ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo esc_url(add_query_arg('user_id', esc_html($user["id"]), get_permalink())); ?>"
                                    class="btn btn-link user-details-link" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <?php echo esc_html($user["name"]); ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo esc_url(add_query_arg('user_id', esc_html($user["id"]), get_permalink())); ?>"
                                    class="btn btn-link user-details-link" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <?php echo esc_html($user["username"]); ?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" 
                     id="staticBackdrop" 
                     data-bs-backdrop="static" 
                     data-bs-keyboard="false"
                     tabindex="-1" 
                     aria-labelledby="staticBackdropLabel" 
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                    User Details
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" 
                                    class="btn btn-secondary user-details-close-btn"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>

    <?php

    get_footer();