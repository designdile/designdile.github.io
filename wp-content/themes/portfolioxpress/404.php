<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PortfolioXpress
 */

get_header();

// Add a main container in case if sidebar is present
$class = '';
$page_layout = portfolioxpress_get_page_layout();
?>
    <main id="site-content" role="main" class = "section">
        <div id="primary" class="content-area">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12">
                        <section class="error-404 not-found">
                            <div class="page-header section">
                                <h1 class="page-title font-size-big"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'portfolioxpress'); ?></h1>
                            </div><!-- .page-header -->
            
                            <div class="page-content">
                                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'portfolioxpress'); ?></p>
            
                                <?php
                                get_search_form();
                                ?>
            
                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->
                    </div>
                </div>
            </div>
        </div><!-- #main -->
    </main>
<?php
get_footer();
