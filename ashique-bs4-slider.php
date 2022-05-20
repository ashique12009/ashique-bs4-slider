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

// If this file is called directly, abort.
if (! defined('ABSPATH')) {
	die('Invalid request.');
}

/**
 * The main plugin class
 */
final class Bs4_Slider
{

    const version = '1.0.0';

    public function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);
        
        add_action('plugins_loaded', [$this, 'initialize_plugin']);
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

    /**
     * Define all necessary constants
     */
    public function define_constants()
    {
        define('ASHIQUE_BS4_SLIDER_VERSION', self::version);
        define('ASHIQUE_BS4_SLIDER_FILE', __FILE__);
        define('ASHIQUE_BS4_SLIDER_PATH', __DIR__);
        define('ASHIQUE_BS4_SLIDER_URL', plugins_url('', ASHIQUE_BS4_SLIDER_FILE));
        define('ASHIQUE_BS4_SLIDER_ASSETS', ASHIQUE_BS4_SLIDER_URL . '/assets');
    }

    /**
     * Create slider table during activation of plugin
     */
    public function activate()
    {
        require_once ASHIQUE_BS4_SLIDER_PATH . '/admin/Table_Installer.php';
        new Table_Installer();
    }

    public function initialize_plugin()
    {
        
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