<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sungit_Lite
 */

get_header(); ?>

<section class="sec-content blog-page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 left-sidebar widget-area">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-md-8">
                <main id="main" class="site-main clearfix">
    				<section class="error-404 not-found">
    					<header class="page-header">
    						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sungit-lite' ); ?></h1>
    					</header>
    					<div class="page-content">
    						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'sungit-lite' ); ?></p>
                            <?php
                            get_search_form(); ?>
    					</div>
    				</section>
                </main>
            </div>
        </div>
    </div><!-- #container -->
</section><!-- #section -->

<?php
get_footer();
