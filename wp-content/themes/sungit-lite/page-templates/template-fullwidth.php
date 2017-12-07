<?php
/**
 *  Template Name: Full Width Page
 * This is the template that displays the contents in full Width
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
    <section class="sec-content blog-page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'components/page/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div><!-- #container -->
    </section><!-- #section -->

<?php
get_footer();
