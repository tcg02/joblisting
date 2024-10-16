<?php

namespace Models;

use Models\ACFModel;

Class JobPost extends ACFModel {
    public $id;
    public $title;
    public $category;
    public $permalink;
    public $salary;
    public $employment_type;
    public $experience_level;
    public $company;
    public $location;

    const POST_TYPE = 'post';

    function __construct($post_id) {
        $this->id = $post_id;
        $this->title = $this->get_title();
        $this->category = $this->get_category();
        $this->permalink = $this->get_permalink();
        $this->salary = get_field('salary', $this->id);
        $this->employment_type = get_field('employment_type', $this->id);
        $this->experience_level = get_field('experience_level', $this->id);
        $this->company = get_field('company', $this->id);
        $this->location = get_field('location', $this->id);
    }

    /**
     * Retrieve all job posts.
     *
     * @return array An array of JobPost objects.
     */
    public static function getAll() {
        $posts = get_posts([
            'post_type' => static::POST_TYPE,
            'post_status' => 'publish',
            'numberposts' => -1
        ]);

        return array_map(function($post) {
            return new Self($post->ID);
        }, $posts);
    }

    /**
     * Get a filtered list of job posts.
     *
     * @return array An array of JobPost objects.
     */
    public static function getResults($filters) {
        //
    }

    /**
     * Determine user permissions
     *
     * @return boolean whether or not user can access
     */
    public function user_can_access() {
        return true;
    }
}
