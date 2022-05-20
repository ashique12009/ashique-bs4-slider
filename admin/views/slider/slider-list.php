<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php _e('Slider Images', 'ashique-bs4-slider'); ?>

        <a href="<?php echo admin_url('admin.php?page=bs4-slider&action=add_new'); ?>" class="page-title-action">
            <?php _e('Add New', 'ashique-bs4-slider'); ?>
        </a>
    </h1>

    <hr class="wp-header-end">

    <!-- <form method="post">

        <?php //if (isset($_SESSION['berger_error'])) : ?>
            <div id="message" class="notice notice-error">
                <p><strong><?php //echo $_SESSION['berger_error']; ?></strong></p>
            </div>
            <?php //unset($_SESSION['berger_error']); ?>
        <?php //endif; ?>

        <?php //if (isset($_SESSION['berger_success'])) : ?>
            <div id="message" class="notice notice-success">
                <p><strong><?php //echo $_SESSION['berger_success']; ?></strong></p>
            </div>
            <?php //unset($_SESSION['berger_success']); ?>
        <?php //endif; ?>

        <input type="hidden" name="page" value="berger_paints_slides_list_table">
        <?php //$slider_list_table->views(); ?>
        <?php //$slider_list_table->search_box('search', 'search_id'); ?>
        <?php //$slider_list_table->display(); ?>
    </form> -->
    
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