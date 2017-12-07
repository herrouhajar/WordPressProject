<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

get_header();
?>

	<section class="sec-content blog-page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 left-sidebar widget-area">
                		<?php get_sidebar(); ?>
                </div>
                <div class="col-md-8">
					<main id="main" class="site-main clearfix">
					<?php
						if (is_author()) {
							$objs = get_queried_object();
							if (! empty($objs)) {
								$author_id = $objs->ID;
							}
							sungit_lite_author($author_id);
						}
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

						endif; ?>
					</main>
	            </div>
	        </div>
	    </div>
	</section>
<?php
get_footer();
