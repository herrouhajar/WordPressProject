<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

get_header();
$sungit_lite_theme_options  = sungit_lite_theme_options();
$blog_category              = esc_attr($sungit_lite_theme_options['blog_category']);
$blog_category_obj          = get_category_by_slug($blog_category); ?>

<section class="sec-content blog-page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 left-sidebar widget-area">
                		<?php get_sidebar(); ?>
                </div>
                <div class="col-md-8">
                    <main id="main" class="site-main clearfix">
					<?php

					if (!empty($blog_category_obj) && is_home()) {

    					sungit_lite_archive_query($blog_category_obj);

    				}

    				else {
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'components/post/content', get_post_format() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'components/post/content', 'none' );

						endif;
					} ?>
                    </main>
	            </div>
	        </div>
	    </div>
	</section>
<?php
get_footer();