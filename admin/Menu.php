<?php

/**
 * The menu class
 */
class Menu 
{
    function __construct() 
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * Admin menu callback
     */
    public function admin_menu() 
    {
        add_menu_page( 
            __('BS4 Slider', 'ashique-bs4-slider'), 
            __('BS4 Slider', 'ashique-bs4-slider'),
            'manage_options', 
            'bs4-slider', 
            [$this, 'bs4_slider_admin_manages_slider'], 
            'dashicons-images-alt', 
            11 
        );
    }

    function bs4_slider_admin_dashboard_view() {
        require_once ASHIQUE_BS4_SLIDER_PATH . '/admin/views/list.php';
    }

    /**
     * Manages views of slider.
     *
     * @return void
     */
    public function bs4_slider_admin_manages_slider()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';
        $id     = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ('delete' === $action && $id > 0) {
            
        }

        switch ($action) {
            case 'add_new':

            case 'edit':

            default:
                
                $template = ASHIQUE_BS4_SLIDER_PATH . '/admin/views/slider/slider-list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        } else {
            wp_die(
                __('It appears the view template may be missing.', 'ashique-bs4-slider'),
                __('View not found!', 'ashique-bs4-slider')
            );
        }
    }
}