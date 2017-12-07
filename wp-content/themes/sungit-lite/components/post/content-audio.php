<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

?>
<div id="post-<?php the_ID(); ?>" class="blog-post-content <?php if (is_sticky()) {echo 'sticky';} ?>">

    <?php if ( '' != get_the_post_thumbnail() && is_single() ) : ?>
        <div class="post-thumb">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
    <?php endif;

        $content = trim(get_the_content());
        $ori_url = explode( "\n", esc_html( $content ) );
        $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
        if( $new_content){
            echo do_shortcode( $matches[0][0] );
        }
        elseif (preg_match ( '#^<(script|iframe|embed|object)#i', $content )) {
            $regex = '/https?\:\/\/[^\" ]+/i';
            preg_match_all($regex, $ori_url[0], $matches);
            $urls = ($matches[0]);
             echo '<iframe src="'.esc_url($urls[0]).'" width="100%" height="240" frameborder="no" scrolling="no"></iframe>';
        } elseif (0 === strpos( $content, 'https://' )) {
            echo wp_oembed_get( esc_url( $ori_url[0] ) );
        }
     ?>
     <?php get_template_part( 'components/post/content-part/audio', 'gallery' ); ?>

</div>