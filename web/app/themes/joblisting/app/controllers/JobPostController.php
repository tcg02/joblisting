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
        //
    }
}
