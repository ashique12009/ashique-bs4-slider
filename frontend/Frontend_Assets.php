<?php 
namespace ashique_bs4_slider\frontned;

/**
 * Frontend Assets class 
 */
class Frontend_Assets 
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'frontend_enqueue_assets']);
    }

    public function frontend_enqueue_assets()
    {
        wp_enqueue_style('bs4-css', ASHIQUE_BS4_SLIDER_ASSETS . '/css/bootstrap.min.css');
        wp_enqueue_script('bs4-js', ASHIQUE_BS4_SLIDER_ASSETS . '/js/bootstrap.min.js', ['jquery'], false, false);
        wp_enqueue_script('frontend-js', ASHIQUE_BS4_SLIDER_ASSETS . '/js/frontend-js.js', ['jquery'], false, false);
    }
}