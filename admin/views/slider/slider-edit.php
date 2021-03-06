<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php _e('Update Slider Image', 'ashique-bs4-slider'); ?>

        <a href="<?php echo admin_url('admin.php?page=bs4-slider'); ?>" class="page-title-action"><?php _e('Go Back', 'ashique-bs4-slider'); ?></a>
    </h1>

    <hr class="wp-header-end">

    <form action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post">

        <input type="hidden" name="field_id" value="<?php echo $slider_data->id; ?>">

        <input type="hidden" name="action" value="bs4_slider_edit_action">

        <?php wp_nonce_field('bs4_slider_edit_nonce'); ?>

        <div id="poststuff">

            <div id="post-body" class="metabox-holder">

                <div id="post-body-content">
                    <table class="form-table">
                        <tbody>
                            <tr class="row-title">
                                <th scope="row">
                                    <label for="slide_title"><?php _e('Slide Title', 'ashique-bs4-slider'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="slide_title" id="slide_title" class="regular-text" placeholder="<?php echo esc_attr('Enter a title for the image', 'ashique-bs4-slider'); ?>" value="<?php echo $slider_data->title; ?>" required />
                                </td>
                            </tr>

                            <tr class="row-slide-image">
                                <th scope="row">
                                    <label for="slide_image"><?php _e('Select An Image', 'ashique-bs4-slider'); ?></label>
                                </th>
                                <td>
                                    <?php if ($slider_data->image) : ?>
                                        <img id="image_preview" src="<?php echo wp_get_attachment_image_src($slider_data->image, 'full')[0]; ?>" alt="<?php echo $slider_data->title; ?>" style="width:auto; height:150px; display:block; margin-bottom:20px;">
                                    <?php endif; ?>

                                    <input type="button" name="select_image" id="select_image" data-input="slide_image" data-title="Select Slider Image" data-btn-text="Select Image" data-multiple="false" data-closest="td" class="button wpMediaBtn" value="Change Image">
                                    <input type="hidden" name="slide_image" id="slide_image" value="<?php echo $slider_data->image ?>" />
                                    <p class="description" id="home-description">
                                        <small>( Select image with 3 : 1 aspect rario. Preferably 1920x640 pixels )</small>
                                    </p>
                                </td>
                            </tr>

                            <tr class="row-url">
                                <th scope="row">
                                    <label for="slide_url"><?php _e('Slide Link', 'ashique-bs4-slider'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="slide_url" id="slide_url" class="regular-text" placeholder="<?php echo esc_attr('Enter an URL for the slide', 'ashique-bs4-slider'); ?>" value="<?php echo $slider_data->link; ?>" />
                                </td>
                            </tr>

                            <tr class="row-status">
                                <th scope="row">
                                    <label for="status"><?php _e('Status', 'ashique-bs4-slider'); ?></label>
                                </th>
                                <td>
                                    <select name="status" id="status">
                                        <option value="" disabled>--- Select a status ---</option>
                                        <option value="1" <?php echo ('1' === $slider_data->status) ? 'selected' : ''; ?>>
                                            <?php _e('Active', 'ashique-bs4-slider'); ?>
                                        </option>
                                        <option value="0" <?php echo ('0' === $slider_data->status) ? 'selected' : ''; ?>>
                                            <?php _e('Inactive', 'ashique-bs4-slider'); ?>
                                        </option>
                                    </select>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div><!-- #post-body-content -->

            </div><!-- #post-body -->

        </div><!-- #poststuff -->

        <hr>
        <?php submit_button(__('Update Slide', 'berger-paints'), 'primary', 'submit'); ?>

    </form>
</div>