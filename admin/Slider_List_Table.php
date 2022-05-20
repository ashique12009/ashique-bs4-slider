<?php

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Slider list table class
 */
class Slider_List_Table extends \WP_List_Table 
{
    /** 
     * Text displayed when no customer data is available 
    */
    public function no_items() 
    {
        _e('No slider avaliable.', 'ashique-bs4-slider');
    }

    /**
     * Set table classes
     *
     * @return array
     */
    function get_table_classes()
    {
        return array('widefat', 'fixed', 'striped', $this->_args['plural']);
    }

    public function get_columns() 
    {
        $columns = [
            'cb'            => '<input type="checkbox" />',
            'title'         => __('Title', 'ashique-bs4-slider'),
            'image'         => __('Image', 'ashique-bs4-slider'),
            'status'        => __('Status', 'ashique-bs4-slider'),
            'created_at'    => __('Created At', 'ashique-bs4-slider'),
        ];
        return $columns;
    }

    /**
     * Default column values if no callback found
     *
     * @param  object  $item
     * @param  string  $column_name
     *
     * @return string
     */
    function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'title':
                return $item['title'];

            case 'image':
                return '<img src="' . wp_get_attachment_image_src($item['image'])[0] . '" height="75px" />';

            case 'status':
                return ('1' === $item['status']) ? __('Active', 'ashique-bs4-slider') : __('Inactive', 'ashique-bs4-slider');

            case 'created_at':
                return '<em>' . date('F j, Y', strtotime($item['created_at'])) . '</em>';

            default:
                return isset($item[$column_name]) ? $item[$column_name] : '';
        }
    }

    public function get_bulk_actions() 
    {
        $actions = [
            'bulk-delete' => 'Delete',
        ];
        return $actions;
    }

    public function delete_slider($id) 
    {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}ashique_bs4_slider",
            ['id' => $id],
            ['%d']
        );
    }

    public function process_bulk_action() 
    {
        // If the delete bulk action is triggered
        if ((isset($_REQUEST['action']) && $_REQUEST['action'] == 'bulk-delete') || (isset($_REQUEST['action2']) && $_REQUEST['action2'] == 'bulk-delete')) {

            $delete_ids = esc_sql($_REQUEST['id']);

            // loop over the array of record IDs and delete them
            foreach ($delete_ids as $id) {
                $this->delete_slider($id);
            }
        }
    }

    public function column_cb($item) 
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />', $item['id']
        );
    }

    public function prepare_items() 
    {
        $columns                = $this->get_columns();
        $hidden                 = [];
        $sortable               = [];
        $this->_column_headers  = [$columns, $hidden, $sortable];

        /** Process bulk action */
        $this->process_bulk_action();

        // GET template-filter value as template_id
        $filter_template_id = isset($_REQUEST['template-filter']) ? $_REQUEST['template-filter'] : '';

        $per_page = 25;

        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        $args = [
            'offset'             => $offset,
            'number'             => $per_page,
            'filter_template_id' => $filter_template_id,
        ];

        $this->items = getSliderRow($args);
        $total_items = getTotalSliderRows($args);

        $this->set_pagination_args([
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page, //WE have to determine how many items to show on a page
        ]);
    }
}