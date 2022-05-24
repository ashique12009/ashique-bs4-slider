<?php if (count($slides) > 0) : ?>
    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($slides as $k => $slide) : ?>
                <li data-target="#carousel" data-slide-to="<?php echo $k; ?>" class="<?php echo (0 === $k) ? 'active' : ''; ?>"></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($slides as $k => $slide) : ?>
                <div class="carousel-item <?php echo (0 === $k) ? 'active' : ''; ?>">
                    <?php if ($slide['link']) : ?>
                        <a href="<?php echo $slide['link']; ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo wp_get_attachment_image_src($slide['image'], 'full')[0]; ?>" class="d-block w-100" alt="<?php echo $slide['title']; ?>">
                        </a>
                    <?php else : ?>
                        <img src="<?php echo wp_get_attachment_image_src($slide['image'], 'full')[0]; ?>" class="d-block w-100" alt="<?php echo $slide['title']; ?>">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="<?php echo $attr['prev_icon']; ?>" aria-hidden="true"></span>
            <span class="sr-only"><?php echo $attr['prev_text']; ?></span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="<?php echo $attr['next_icon']; ?>" aria-hidden="true"></span>
            <span class="sr-only"><?php echo $attr['next_text']; ?></span>
        </a>
    </div>
    <!-- End of Carousel -->
<?php endif; ?>