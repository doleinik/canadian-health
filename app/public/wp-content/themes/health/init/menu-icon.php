<?php

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $parts = explode("/", rtrim($item->url, "/"));
        $slug = end($parts);
        $output .= "<li id='menu-item-$slug' class='menu-item menu-item-depth-$depth'>";
        $output .= '<a href="' . esc_url($item->url).'">';
        if (file_exists(get_template_directory() . '/assets/images/menu-icon/' . $slug . '.svg')) {
            $output .= file_get_contents(get_template_directory() . '/assets/images/menu-icon/' . $slug . '.svg');
        }
        $output .= '<span>' . esc_html($item->title) . '</span>';
        $output .= '</a>';
    }
}


 
?>