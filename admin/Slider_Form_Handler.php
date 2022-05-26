<?php 
namespace ashique_bs4_slider\admin;

/**
 * Slider form handler class
 */
class Slider_Form_Handler
{
    public function __construct()
    {
        add_action('admin_post_bs4_slider_action', [$this, 'handle_slider_form_post_data']);
        add_action('admin_post_bs4_slider_edit_action', [$this, 'handle_slider_form_post_edit_data']);
    }

    public function handle_slider_form_post_data()
    {
        global $wpdb;

        if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'bs4_slider_nonce')) {
            $title      = $_POST['slide_title'];
            $image_id   = $_POST['slide_image'];
            $slide_url  = $_POST['slide_url'];
            $status     = $_POST['status'];

            global $wpdb;
            $table  = $wpdb->prefix . 'ashique_bs4_slider';
            $data   = ['title' => $title, 'image' => $image_id, 'link' => $slide_url, 'status' => $status];
            $format = ['%s','%s', '%s', '%d'];
            $wpdb->insert($table, $data, $format);
        }

        $redirect_slider_list_page = admin_url('admin.php?page=bs4-slider');
        wp_redirect($redirect_slider_list_page);
        exit;
    }

    public function handle_slider_form_post_edit_data()
    {
        global $wpdb;

        if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'bs4_slider_edit_nonce')) {
            $title      = $_POST['slide_title'];
            $image_id   = $_POST['slide_image'];
            $slide_url  = $_POST['slide_url'];
            $status     = $_POST['status'];
            $id         = $_POST['field_id'];

            $data           = ['title' => $title, 'image' => $image_id, 'link' => $slide_url, 'status' => $status];
            $format         = ['%s', '%s', '%s', '%d'];
            $where          = ['id' => $id];
            $where_format   = ['%d'];
            $wpdb->update($wpdb->prefix . 'ashique_bs4_slider', $data, $where, $format, $where_format);
        }

        $redirect_slider_list_page = admin_url('admin.php?page=bs4-slider');
        wp_redirect($redirect_slider_list_page);
        exit;
    }
}
