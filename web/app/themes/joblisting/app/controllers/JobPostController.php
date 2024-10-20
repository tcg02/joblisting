<?php

namespace Controllers;

use Models\JobPost;

Class JobPostController {
    private $post_id;

    function __construct($post_id=null) {
        $this->post_id = $post_id;
    }

    /**
     * Jobs Post listing page view data.
     *
     * @return Array
     */
    public function index() {      

        return [
            'job_posts' => JobPost::getAll()
        ];
    }

    /**
     * Jobs Post singles page view data.
     *
     * @return Array
     */
    public function show() {

        if(empty($this->post_id)){
            error_log('Post ID is empty or invalid');
        }
         
        $job_post = new JobPost($this->post_id);

        //for sort by most popular I am saving a meta value for post impression, 
        //This feature can be very resourse intensive(have to come up with alternative solution)
        $current_count = get_post_meta($this->post_id, 'view_count', true);
        if (empty($current_count)) {
            $current_count = 0;
        }
        $new_count = $current_count + 1;
        update_post_meta($this->post_id, 'view_count', $new_count);

        return [
            'job_post' => $job_post
        ];
    }

    /**
     * create a new job post.
     *
     * @return Array
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Required fields validation
            $required_fields = [
                'job_title',
                'job_description',
                'employment_type',
                'state',
                'country',
                'salary_min',
                'salary_max',
                'experience_level',
            ];
    
            foreach ($required_fields as $field) {
                if (empty($_POST[$field])) {
                    return ['error' => 'Please fill in all required fields.']; // Return error if any field is missing
                }
            }
    
            // Sanitize input data
            $title = sanitize_text_field($_POST['job_title']);
            $description = sanitize_textarea_field($_POST['job_description']);
            $employment_type = sanitize_text_field($_POST['employment_type']);
            $location = sanitize_text_field($_POST['state']) . ", " . sanitize_text_field($_POST['country']);
            $salary_min = sanitize_text_field($_POST['salary_min']);
            $salary_max = sanitize_text_field($_POST['salary_max']);
            $experience_level = sanitize_text_field($_POST['experience_level']);
    
            // Prepare post data
            $post_data = [
                'post_title'   => $title,
                'post_content' => $description,
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ];
    
            // Insert the post
            $post_id = wp_insert_post($post_data);
    
            if (!is_wp_error($post_id)) {
                // Add custom meta data
                update_post_meta($post_id, 'employment_type', $employment_type);
                update_post_meta($post_id, 'location', $location);
                update_post_meta($post_id, 'salary_min', $salary_min);
                update_post_meta($post_id, 'salary_max', $salary_max);
                update_post_meta($post_id, 'salary', $salary_max);
                update_post_meta($post_id, 'experience_level', $experience_level);
                update_post_meta($post_id, 'view_count', 0); // Initialize view count to 0
    
                // Redirect to the newly created job post
                wp_redirect(get_permalink($post_id));
                exit;
            } else {
                return ['error' => 'Failed to create job post.'];
            }
        }
    
        return [];
    }
    
    
}
