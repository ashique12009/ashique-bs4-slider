<?php 

/**
 * Assets class 
 */
class Assets 
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets($hook)
    {        
        if ($hook == 'toplevel_page_bs4-slider') {
            wp_enqueue_media();
            wp_enqueue_script('admin-js', ASHIQUE_BS4_SLIDER_ASSETS . '/js/admin-js.js', ['jquery'], false, false);
        }
    }
}