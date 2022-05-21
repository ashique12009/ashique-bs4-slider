<?php
function getSliderRow($args) {
    global $wpdb;
  
    $defaults = array(
      'offset' => 0,
      'number' => 5,
    );
  
    $args = wp_parse_args($args, $defaults);

    $query = "SELECT id,
                    title,
                    image,
                    link,
                    status,
                    created_at,
                    updated_at  
                FROM {$wpdb->prefix}ashique_bs4_slider";
    
    if (isset($args['orderby'])) {
        $query .= " ORDER BY " . $args['orderby'] . " " . $args['order'] . " LIMIT {$args['offset']}, {$args['number']}";
    } else {
        $query .= " ORDER BY id DESC LIMIT {$args['offset']}, {$args['number']}";
    }
  
    return $wpdb->get_results($query, ARRAY_A);
}

function getTotalSliderRows($args) {
    global $wpdb;
  
    $defaults = array(
      'offset' => 0,
      'number' => 5,
    );
  
    $args = wp_parse_args($args, $defaults);
    
    $query = "SELECT id,
                    title,
                    image, 
                    link, 
                    status, 
                    created_at, 
                    updated_at
                FROM {$wpdb->prefix}ashique_bs4_slider";
  
    $udata = $wpdb->get_results($query, ARRAY_A);
  
    if (is_array($udata) && count($udata) > 0) {
        return count($udata);
    } else {
        return 0;
    }
}