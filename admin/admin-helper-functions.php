<?php
function get_slider_row($args) {
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

function get_total_slider_rows($args) {
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

function remove_slider($id) {
    global $wpdb;
    
    $wpdb->delete(
        $wpdb->prefix . 'ashique_bs4_slider', // table to delete from
        ['id' => $id], // value in column to target for deletion
        ['%d'] // format of value being targeted for deletion
    );

    return true;
}

function get_slider_data($id) {
    global $wpdb;

    $query = "SELECT id,
                    title,
                    image, 
                    link, 
                    status, 
                    created_at, 
                    updated_at
                FROM {$wpdb->prefix}ashique_bs4_slider
                WHERE id={$id}";
  
    return $wpdb->get_row($query);
}