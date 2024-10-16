<?php

namespace Models;

Class ACFModel {

    const POST_TYPE = "";

    public $id;

    function __construct($id) {
        $id = $this->get_id();

        if(empty($id))
            throw new NotFoundException('Post does not exist');

        $this->id = $id;
    }

    public function get_post() {
        return get_post($this->id);
    }

    public function get_title() {
        $application = $this->get_post();
        if(empty($application))
            return null;

        return $application->post_title;
    }

    public function get_category() {
        $categories = get_the_category($this->id);
        if (!empty($categories)) {
            return $categories[0]->name;
        }
        return 'Uncategorized'; // Fallback if no category is set
    }


    public function get_id() {
        return $this->get_post()->ID;
    }

    public function created_by() {
        $user = get_user_by('ID', $this->get_author());
        if(empty($user))
            return null;
            
        return get_user_by('ID', $this->get_author())->display_name;
    }

    public function get_date_created() {
        return get_the_date( \Config::$casp_date_format, $this->id );
    }

    public function get_author() {
        return $this->get_post()->post_author;
    }

    public function get_permalink() {
        return get_permalink($this->id);
    }

    public function get_admin_link() {
        return add_query_arg([
            'post' => $this->get_id(),
            'action' => 'edit'
        ], admin_url('post.php'));
    }

    public function get_field($field_name) {
        return get_field($field_name, $this->id);
    }

    public function get_the_tags() {
        return get_the_tags($this->id);
    }

    public static function get_one($post_id) {
        return new ACFModel($post_id);
    }

    public static function getAll() {
        $posts = get_posts([
            'post_type' => POST_TYPE,
            'post_status' => 'publish',
            'numberposts' => 1
        ]);

        return array_map(function($post) {
            return new ACFModel($post->ID);
        }, $posts);
    }
}
