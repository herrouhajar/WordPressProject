<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
					<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'components/page/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
                    </main>
	            </div>
	        </div>
	    </div>
	</section>
<?php
get_footer();
