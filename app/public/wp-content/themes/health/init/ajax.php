<?php

function load_shorts()
{
    if (isset($_POST['next_id']) || $_POST['product_action']) {
        $next_id = $_POST['next_id'];
        ob_start();

        renderComponent('shorts/item', ['id' => $next_id]);
        $short_item = ob_get_clean();

        echo json_encode(array('short_item' => $short_item));
    }
    wp_die();
}

add_action('wp_ajax_load_shorts', 'load_shorts');
add_action('wp_ajax_nopriv_load_shorts', 'load_shorts');


function get_next_post_id($current_post_id = false)
{

    $args = array(
        'post_type' => 'shorts',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $shorts = new WP_Query($args);

    $found_current_post = false;

    if ($shorts->have_posts()) :
        while ($shorts->have_posts()) : $shorts->the_post();
            if (!$current_post_id) {
                return get_the_ID();
            }
            if ($found_current_post) {
                return get_the_ID();
            }

            if (get_the_ID() == $current_post_id) {
                $found_current_post = true;
            }
        endwhile;
        wp_reset_postdata();
    endif;

    return 'end';
}