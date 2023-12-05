<?php

class Vacancies_Controller extends WP_REST_Controller
{
    public function __construct()
    {
        $this->namespace = 'nameless/v1';
        $this->rest_base = 'vacancies';
    }

    public function register_routes()
    {
        register_rest_route($this->namespace, '/' . $this->rest_base . '/items', [
            [
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => [$this, 'get_items'],
                'permission_callback' => '__return_true',
            ],
        ]);

        register_rest_route($this->namespace, '/' . $this->rest_base . '/create', [
            [
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => [$this, 'create_item'],
                'permission_callback' => function () {
                    return current_user_can('edit_posts');
                },
            ],
        ]);

        register_rest_route($this->namespace, '/' . $this->rest_base . '/(?P<id>\d+)', [
            'args' => [
                'id' => [
                    'validate_callback' => function ($param, $request, $key) {
                        return is_numeric($param);
                    },
                ],
            ],
            [
                'methods'             => WP_REST_Server::EDITABLE,
                'callback'            => [$this, 'update_item'],
                'permission_callback' => function () {
                    return current_user_can('edit_posts');
                },
            ],
            [
                'methods'             => WP_REST_Server::DELETABLE,
                'callback'            => [$this, 'delete_item'],
                'permission_callback' => function () {
                    return current_user_can('delete_posts');
                },
            ],
        ]);
    }

    public function get_items($request)
    {
        // Logic to retrieve and return custom post type items

        // Get the parameters from the request
        $params = $request->get_params();

        // Set default arguments for querying custom post type items
        $args = [
            'post_type'      => 'vacancy', // Replace with your custom post type name
            'posts_per_page' => isset($params['per_page']) ? $params['per_page'] : 10,
            'paged'          => isset($params['page']) ? $params['page'] : 1,
        ];

        // You can add more parameters based on your specific requirements

        // Query custom post type items
        $custom_type_items = get_posts($args);

        // Initialize an empty array to store formatted response
        $response = [];

        // Loop through each item and format the response
        foreach ($custom_type_items as $item) {
            $formatted_item = [
                'id'      => $item->ID,
                'title'   => $item->post_title,
                'content' => $item->post_content,
            ];

            // Add the formatted item to the response array
            $response[] = $formatted_item;
        }

        // Return the formatted response
        return rest_ensure_response($response);
    }

    public function create_item($request)
    {
        // Logic to create a new custom post type item

        // Get the data from the request
        $data = $request->get_params();

        // Set the post data for the new custom post type item
        $post_data = [
            'post_type'    => 'vacancy', // Replace with your custom post type name
            'post_title'   => isset($data['title']) ? sanitize_text_field($data['title']) : '',
            'post_content' => isset($data['content']) ? wp_kses_post($data['content']) : '',
            'post_status'  => 'publish',
        ];

        // Insert the new custom post type item
        $post_id = wp_insert_post($post_data, true);

        // Check if the insertion was successful
        if (!is_wp_error($post_id)) {
            // Return a success response
            $response = [
                'message' => 'Vacancy created successfully.',
                'post_id' => $post_id,
            ];
            return rest_ensure_response($response);
        } else {
            // Return an error response
            return rest_ensure_response(['error' => $post_id->get_error_message()], 500);
        }
    }

    public function update_item($request)
    {
        // Logic to update an existing custom post type item

        // Get the data from the request
        $data = $request->get_params();

        // Check if the post ID is provided
        if (empty($data['id'])) {
            // Return an error response if the post ID is missing
            return rest_ensure_response(['error' => 'Vacancy ID is required for updating an item.'], 400);
        }

        // Set the post data for updating the custom post type item
        $post_data = [
            'ID' => absint($data['id']),
            'post_type'    => 'vacancy', // Replace with your custom post type name
            'post_title'   => isset($data['title']) ? sanitize_text_field($data['title']) : '',
            'post_content' => isset($data['content']) ? wp_kses_post($data['content']) : '',
            'post_status'  => 'publish',
        ];

        // Update the custom post type item
        $updated = wp_update_post($post_data, true);

        // Check if the update was successful
        if (!is_wp_error($updated)) {
            // Return a success response
            $response = [
                'message' => 'Vacancy updated successfully.',
                'post_id' => $updated,
            ];
            return rest_ensure_response($response);
        } else {
            // Return an error response
            return rest_ensure_response(['error' => $updated->get_error_message()], 500);
        }
    }

    public function delete_item($request)
    {
        // Logic to delete a custom post type item

        // Get the data from the request
        $data = $request->get_params();

        // Check if the post ID is provided
        if (empty($data['id'])) {
            // Return an error response if the post ID is missing
            return rest_ensure_response(['error' => 'Vacancy ID is required for deleting an item.'], 400);
        }

        // Delete the custom post type item
        $deleted = wp_delete_post(absint($data['id']), true);

        // Check if the deletion was successful
        if ($deleted) {
            // Return a success response
            $response = [
                'message' => 'Vacancy deleted successfully.',
                'post_id' => absint($data['id']),
            ];
            return rest_ensure_response($response);
        } else {
            // Return an error response
            return rest_ensure_response(['error' => 'Failed to delete the vacancy.'], 500);
        }
    }
}

function register_vacancies_controller()
{
    $controller = new Vacancies_Controller();
    $controller->register_routes();
}
add_action('rest_api_init', 'register_vacancies_controller');
