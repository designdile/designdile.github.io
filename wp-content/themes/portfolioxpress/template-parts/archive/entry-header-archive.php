<?php 
// Don't show the title if the post-format is `aside` or `status`.
$post_format = get_post_format();
$enabled_post_meta = portfolioxpress_get_option('archive_post_meta_1');
?>

    <div class="entry-image">
        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <figure class="featured-media featured-media-full">
                
                    <?php the_post_thumbnail('full'); ?>
                

                <?php
                $caption = get_the_post_thumbnail_caption();
                if ( $caption ) {
                    ?>
                    <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>
                    <?php
                }
                ?>
            </figure><!-- .featured-media -->
        <?php endif; ?>
    </div><!-- .entry-image -->

    <header class="entry-header">

        <div class="portfolioxpress-article-title mb-16">
            <?php the_title( '<h2 class="entry-title font-size-large line-clamp line-clamp-2 m-0"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
        </div>

        <div class="entry-categories mb-16">
            <span class="screen-reader-text"><?php _e( 'Categories', 'portfolioxpress' ); ?></span>
            <div class="portfolioxpress-entry-categories">
                <?php the_category( ' ' ); ?>
            </div>
        </div><!-- .entry-categories -->
        
        <?php if ( 'post' === get_post_type() ) :?>
            <div class="entry-meta mb-16">
                <?php portfolioxpress_post_meta_info($enabled_post_meta); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>

        <div class="entry-summary">
            <?php get_template_part( 'template-parts/archive/archive', $post_format ); ?>
        </div><!-- .entry-content -->

    </header><!-- .entry-header -->