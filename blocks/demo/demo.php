<?php
// Image preview when the block is in the list of blocks
if ( $block['data']['preview_image_help'] ) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" alt="">
<?php else:
    // Your block html goes here
    ?>
    <div class="video">
        <div class="video-thumbnail">
			<?= wp_get_attachment_image(get_field('video_poster'), 'full') ?>
            <button class="video-play">
                <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/play.svg" alt="play">
            </button>
        </div>
        <iframe data-src="<?php the_field( 'video_url' ) ?>" allowfullscreen></iframe>
    </div>
<?php endif; ?>