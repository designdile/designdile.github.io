<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioXpress
 */
$enabled_post_meta = portfolioxpress_get_option('archive_post_meta_1');
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class("section"); ?>>
        <div class="article-block-wrapper">
            
            <?php get_template_part('template-parts/archive/entry-header-archive');?>
            
        </div><!-- .article-block-wrapper -->
    </article><!-- #post-<?php the_ID(); ?> -->
