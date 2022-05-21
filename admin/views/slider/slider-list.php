<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php _e('Slider Images', 'ashique-bs4-slider'); ?>

        <a href="<?php echo admin_url('admin.php?page=bs4-slider&action=add_new'); ?>" class="page-title-action">
            <?php _e('Add New', 'ashique-bs4-slider'); ?>
        </a>
    </h1>

    <hr class="wp-header-end">

    <form method="get" class="slider-list-table custom-list-style">
        <input type="hidden" name="page" value="bs4-slider">
        <?php
            require_once ASHIQUE_BS4_SLIDER_PATH . '/admin/Slider_List_Table.php';
                    
            $slider_list_table = new Slider_List_Table();
            $slider_list_table->prepare_items();
            $slider_list_table->views();
            $slider_list_table->display();
        ?>
    </form>
</div>