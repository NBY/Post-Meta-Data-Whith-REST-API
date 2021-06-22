<?php
/**
 * Plugin Name: Post Meta Data With REST API
 * Plugin URI:  https://github.com/NBY/Post-Meta-Data-Whith-REST-API
 * Description: Allows add meta data when posting posts using rest api. Example code please visit github.
 * Version:     0.0.1
 * Author:      Alexander Nie
 * Author URI:  https://nby.me
 * License:     GPL2+
 */
 
add_action('rest_api_init', function () {
//The ‘post’ post type in the next line can also be other custom post types; ‘metadata’ is the metadata array submitted by the front end
    register_rest_field('post', 'metadata', array(
        // When displaying the data, we can attach this custom data to the Json data returned by the Rest API article interface in the function
        'get_callback' => function ($object) {
            return get_post_meta($object->ID);//Modify the data that needs to be returned by yourself, here is the content returned by using the Get Content method
        },
        // Save the location information of the data, here is the place to save the post meta
        'update_callback' => function ($meta, $post) {
            $postId = $post->ID;
            foreach ($meta as $data) {
                update_post_meta($postId, $data['key'], $data['value']);
            }
            return true;
        },
    ));
});
