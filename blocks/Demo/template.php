<?php
/**
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= plugin_dir_url(__FILE__) ?>/screenshot.png" alt="">
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
