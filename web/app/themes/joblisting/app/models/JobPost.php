<?php

namespace Models;

use Models\ACFModel;
use Helpers\CachingHelper;

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
        $this->views    = get_post_meta($this->id,'view_count',true);
        $this->published_date = get_post_timestamp($this->id);
    }

    /**
     * Retrieve all job posts.
     *
     * @return array An array of JobPost objects.
     */
    public static function getAll() {
        $args = [
            'post_type' => static::POST_TYPE,
            'post_status' => 'publish',
             
        ];

        $qry = new \WP_Query($args);
 

        return [
            'posts' => array_map(function($post) {
                return new Self($post->ID);
            }, $qry->posts)          
        ];
    }

    /**
     * Get a filtered list of job posts.
     *
     * @return array An array of JobPost objects.
     */
    public static function getResults($filters) {
        $args = [
            'post_type' => static::POST_TYPE,
            'post_status' => 'publish',
            'posts_per_page' => -1  
        ];

        error_log(print_r($filters,true).PHP_EOL,3,'c:/xampp_server/htdocs/joblisting/_a.log');  

        $cache_key = CachingHelper::generateCacheKey($filters);
        
        $cached_results = CachingHelper::get($cache_key);
        if ($cached_results !== false) {
            error_log("Cache found".PHP_EOL,3,'c:/xampp_server/htdocs/joblisting/_a.log');    
            return $cached_results;  
        }else{
            error_log("Cache not found, key=".$cache_key.PHP_EOL,3,'c:/xampp_server/htdocs/joblisting/_a.log');    
        }

        
        
        if (!empty($filters)) {
            if (!empty($filters['category'])) {
                $args['category_name'] = $filters['category'];
            }
            if (!empty($filters['location'])) {
                $args['meta_query'][] = [
                    'key'     => 'location',
                    'value'   => $filters['location'],
                    'compare' => 'LIKE'
                ];
            }
            
            if (!empty($filters['employment_type'])) {
                if (is_array($filters['employment_type'])) {
                    $args['meta_query'][] = [
                        'key'     => 'employment_type',
                        'value'   => $filters['employment_type'],   
                        'compare' => 'IN'
                    ];
                }   
                
            }

            if (!empty($filters['experience_level'])) {
                if (is_array($filters['experience_level'])) {
                    $args['meta_query'][] = [
                        'key'     => 'experience_level',
                        'value'   => $filters['experience_level'],
                        'compare' => 'IN'
                    ];
                }
            }
            

            if (!empty($filters['date_posted'])) {
                $date_query = [];
         
                if ($filters['date_posted'] === 'today') {
                    $date_query = [
                        'after' => 'today',
                        'inclusive' => true   
                    ];
                } elseif ($filters['date_posted'] === '7days') {
                    $date_query = [
                        'after' => '7 days ago',
                        'inclusive' => true   
                    ];
                } elseif ($filters['date_posted'] === '30days') {
                    $date_query = [
                        'after' => '30 days ago',
                        'inclusive' => true  
                    ];
                }
        
                 
                $args['date_query'] = [$date_query];
            }

            if (!empty($filters['sort_by']) && $filters['sort_by'] === 'popular') {                 
                $args['meta_query'][] = [
                    'relation' => 'OR',
                    [
                        'key' => 'view_count',
                        'compare' => 'NOT EXISTS',  
                    ],
                    [
                        'key' => 'view_count',
                        'compare' => 'EXISTS',   
                    ],
                ];
                 
                $args['meta_key'] = 'view_count';
                $args['orderby'] = [
                    'meta_value_num' => 'DESC',  
                    'date' => 'DESC'            
                ];
            }

            if (!empty($filters['keyword'])) {
                error_log($filters['keyword'] . PHP_EOL, 3, 'c:/xampp_server/htdocs/joblisting/_a.log'); 
                $args['s'] = $filters['keyword'];                 
            }
             
        }    
        $query = new \WP_Query($args);    
        error_log($query->request . PHP_EOL, 3, 'c:/xampp_server/htdocs/joblisting/_a.log');    

        $return_data =  array_map(function($post) {
            return new self($post->ID);  
        }, $query->posts);

        //error_log(print_r($return_data,true).PHP_EOL,3,'c:/xampp_server/htdocs/joblisting/_a.log');    

        CachingHelper::set($cache_key, $return_data);
        CachingHelper::appendCacheKey($cache_key);

        return $return_data;
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
