<?php
/**
 * Plugin Name:       Bootstrap 4 Carousel Slider
 * Plugin URI:        https://ashique12009.blogspot.com/
 * Description:       A simple bootstrap 4 carousel slider.
 * Version:           1.0.0
 * Author:            Khandoker Ashique Mahamud
 * Author URI:        https://ashique12009.blogspot.com/
 * License:           GPL v2 or later
 * Text Domain:       ashique-bs4-slider
 * Domain Path:       /languages
 */

/**
 * The main plugin class
 */
final class Bs4_Slider
{
    public function __construct()
    {
        
    }

    /**
     * Initializes a singleton instance
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }
}

/**
 * Start plugin function
 */
function start_plugin()
{
    return Bs4_Slider::init();
}

start_plugin();