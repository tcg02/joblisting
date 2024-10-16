<?php

use Models\JobPost;

class JobPostRestController extends WP_REST_Controller {

    // Here initialize our namespace and resource name.
    public function __construct() {
        $this->namespace     = 'joblisting/v1';
        $this->resource_name = 'jobpost';
    }

    public function register_routes() {
        /*
        * GETS
        */
        register_rest_route( $this->namespace, '/' . $this->resource_name . '/job-posts' , [
            [
                'methods'   => 'GET',
                'callback'  => array( $this, 'get_job_posts' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ]
       ] );

        /*
        * POSTS
        */
        register_rest_route( $this->namespace, '/' . $this->resource_name . '/job-post/(?P<post_id>\d+)' , [
             [
                 'methods'   => 'POST',
                 'callback'  => array( $this, 'create_job_post' ),
                 'permission_callback' => array( $this, 'user_permissions_check' ),
             ]
        ] );

        /*
        * PUTS
        */
        register_rest_route( $this->namespace, '/' . $this->resource_name . '/job-post/(?P<post_id>\d+)' , [
            [
                'methods'   => 'PUT',
                'callback'  => array( $this, 'update_job_post' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ]
       ] );

        /*
        * DELETES
        */
        register_rest_route( $this->namespace, '/' . $this->resource_name . '/job-post/(?P<post_id>\d+)' , [
            [
                'methods'   => 'DELETE',
                'callback'  => array( $this, 'delete_job_post' ),
                'permission_callback' => array( $this, 'user_permissions_check' ),
            ]
       ] );
    }

    /**
     * Check permissions for a job post
     *
     * @param WP_REST_Request $request Current request.
     */
    public function user_permissions_check( $request ) {
        return true;
    }

    /**
     * Gets the job posts
     *
     * @param WP_REST_Request $request Current request.
     */
    public function get_job_posts( $request ) {
        $filters = $request['filters'];

        $job_posts = JobPost::getResults($filters);

        return [
            'success' => !empty($job_posts ? true : false), 
            'message' => ($success ? 'Job Posts retrieved':'Job Posts could not be retrieved'),
            'data'    => $job_posts
        ];
    }

    /**
     * Create a job post
     *
     * @param WP_REST_Request $request Current request.
     */
    public function create_job_post( $request ) {
        //
    }

    /**
     * Update a job post
     *
     * @param WP_REST_Request $request Current request.
     */
    public function update_job_post( $request ) {
        //
    }

    /**
     * Delete a job post
     *
     * @param WP_REST_Request $request Current request.
     */
    public function delete_job_post( $request ) {
        //
    }

}

// Register controller routes
function job_post_register_rest_routes() {
    $controller = new JobPostRestController();
    $controller->register_routes();
}
add_action( 'rest_api_init', 'job_post_register_rest_routes' );

