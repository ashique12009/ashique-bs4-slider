<?php
namespace ashique_bs4_slider\frontned;

/**
* The shorcode handler class
*/
class Shortcode_Handler 
{

    function __construct() 
    {
        add_action('init', [$this, 'ashique_add_custom_shortcode']);
    }
  
    public function ashique_add_custom_shortcode() 
    {
        add_shortcode('ashique-bs4-slider', [$this, 'ashique_bs4_slider_output']);
    }

    public function ashique_bs4_slider_output($userAttrs, $content, $shortcode_name)
    {        
        $attr = shortcode_atts(
            array(
                'prev_icon' => 'carousel-control-prev-icon',
                'prev_text' => __('Previous', 'ashique-bs4-slider'),
                'next_icon' => 'carousel-control-next-icon',
                'next_text' => __('Next', 'ashique-bs4-slider'),
            ),
            $userAttrs,
            $shortcode_name
        );

        $slides = get_slider_for_shortcode();

        ob_start();

        include ASHIQUE_BS4_SLIDER_FRONTEND_PATH . '\views\bs4-slider.php';

        return ob_get_clean();
    }
}