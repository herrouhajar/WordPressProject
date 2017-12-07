<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

?>
 <div class="blog-post-content <?php if (is_sticky()) {echo 'sticky';} ?>">
 	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="post-thumb">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>
    <div class="blog-content-body">
        <?php sungit_lite_blog_category(); ?>
        <?php the_title( '<h2>', '</h2>' );?>
        <div class="metabar">
            <span class="posted-on"><?php esc_html_e('Posted On','sungit-lite'); ?><a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')));  ?>"><?php echo get_the_date(); ?></time></a></span>
            <span class="byline"><span class="author vcard"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a></span></span>
            <span class="post-comments"><?php echo esc_html(get_comments_number()); ?></span>
        </div>
        <div class="post-desc">
            <?php
    			if(is_home() || is_archive()):
    				echo wp_kses_post(sungit_lite_get_excerpt($post->ID,200));
    			else:
    				the_content( sprintf(
    					/* translators: %s: Name of current post. */
    					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sungit-lite' ), array( 'span' => array( 'class' => array() ) ) ),
    					the_title( '<span class="screen-reader-text">"', '"</span>', false )
    				) );
    			endif;

    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sungit-lite' ),
    				'after'  => '</div>',
    			) );
    		?>
        </div>
        <?php if ( get_the_tag_list() != '' ) { ?>
            <span class="sungit-lite-tags"><?php wp_kses_post(the_tags( 'Tags:' , '' )); ?></span>
        <?php }
        if(is_archive() || is_home()): ?>
            <a href="<?php the_permalink(); ?>" class="btn sl-btn"><?php esc_html_e( 'Read More', 'sungit-lite' ); ?></a>
        <?php endif; ?>
    </div>
</div>