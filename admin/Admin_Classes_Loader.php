<?php 

/**
 * All admin classes will be loaded here
 */
class Admin_Classes_Loader 
{
    /**
     * Class constructor
     */
    public function __construct() 
    {
        require_once ASHIQUE_BS4_SLIDER_PATH . '/admin/Menu.php';
        new Menu();
    }
}