<?php
function localize_ajax_url()
{
    wp_localize_script('jquery', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'localize_ajax_url');


require_once 'init/ajax.php';
require_once 'init/menu-icon.php';
require_once 'init/post-types.php';
require_once 'init/helpers.php';
require_once 'init/user-avatar.php';

function calculate_reading_time($content)
{
    // Get the number of words in the content
    $word_count = str_word_count(strip_tags($content));

    // Set an assumed reading speed (words per minute)
    $words_per_minute = 200;

    // Calculate the reading time
    $reading_time = ceil($word_count / $words_per_minute);

    echo $reading_time;
}

function my_pre_get_posts($query)
{
    if (
        !is_admin() && $query->is_main_query() &&
        is_post_type_archive('stories')
    ) {
        $query->set('posts_per_page', 3);
    }
}

add_action('pre_get_posts', 'my_pre_get_posts');
