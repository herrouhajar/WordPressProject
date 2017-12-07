<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'sungit-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'components/post/content', 'search' );

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
