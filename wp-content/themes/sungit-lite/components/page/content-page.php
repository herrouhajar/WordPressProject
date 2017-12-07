<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-content-wrap'); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="image-post">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'yudleethemes-featured-image' ); ?>
			</a>
		</div>
	<?php endif; ?>
	
	<div class="post-content">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
		<div class="post-desc">
			<p><?php the_content(); ?></p>
		</div>
		<?php 
			wp_link_pages( array(
    			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sungit-lite' ),
    			'after'  => '</div>',
    		) );
		 ?>
	</div>
<div>