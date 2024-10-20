<?php

namespace Helpers;
 
class CachingHelper {

    public static function set($key, $value, $expiration = 3600) {
        if (wp_using_ext_object_cache()) {
            wp_cache_set($key, $value, '', $expiration);
        } else {
            set_transient($key, $value, $expiration);
        }
    }

    public static function get($key) {
        if (wp_using_ext_object_cache()) {
            return wp_cache_get($key);
        } else {
            return get_transient($key);
        }
    }

    public static function delete($key) {
        if (wp_using_ext_object_cache()) {
            wp_cache_delete($key);
        } else {
            delete_transient($key);
        }
    }

    public static function generateCacheKey($filters) {
        return 'job_results_' . md5(serialize($filters));
    }

    public static function appendCacheKey($cache_key) {
        $all_cache_keys = get_option('job_cache_keys', []);
        if (!in_array($cache_key, $all_cache_keys)) {
            $all_cache_keys[] = $cache_key;
            update_option('job_cache_keys', $all_cache_keys);
        }
    }

    public static function deleteAllJobPostCache() {
        $all_cache_keys = get_option('job_cache_keys', []);
        foreach ($all_cache_keys as $cache_key) {
            self::delete($cache_key);
        }
        update_option('job_cache_keys', []);
    }
}
 