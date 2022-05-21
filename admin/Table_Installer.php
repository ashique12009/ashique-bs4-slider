<?php

/**
 * Table Installer Class
 *
 */
class Table_Installer {

    /**
     * Binding all events
     *
     * @since 1.0
     *
     * @return void
     */
    public function __construct() {
        $this->activate();
    }

    /**
     * Placeholder for activation function
     * Nothing being called here yet.
     *
     * @since 1.0
     *
     * @return void
     */
    public function activate() {
        update_option('ashique_bs4_slider_version', ASHIQUE_BS4_SLIDER_VERSION);
        $this->create_slider_table();
    }

    /**
     * Create necessary table for ERP & HRM
     *
     * @since 1.0
     *
     * @return  void
     */
    public function create_slider_table() {
        global $wpdb;

        $collate = '';

        if ($wpdb->has_cap('collation')) {
            if (!empty($wpdb->charset)) {
                $collate .= "DEFAULT CHARACTER SET $wpdb->charset";
            }

            if (!empty($wpdb->collate)) {
                $collate .= " COLLATE $wpdb->collate";
            }
        }

        $table_schema = [
            "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ashique_bs4_slider` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `title` VARCHAR(128) NOT NULL,
                `image` VARCHAR(255) NOT NULL,
                `link` VARCHAR(255) NOT NULL,
                `status` BOOLEAN NOT NULL DEFAULT '1',
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`)
            ) $collate;,"
        ];

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        foreach ($table_schema as $table) {
            dbDelta($table);
        }
    }
}