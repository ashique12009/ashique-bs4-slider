<?php
function get_slider_for_shortcode() {
    global $wpdb;

    $query = "SELECT id,
                    title,
                    image,
                    link,
                    status,
                    created_at,
                    updated_at  
                FROM {$wpdb->prefix}ashique_bs4_slider
                WHERE status=1";
  
    return $wpdb->get_results($query, ARRAY_A);
}