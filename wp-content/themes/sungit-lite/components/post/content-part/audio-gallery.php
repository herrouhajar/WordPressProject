<div class="blog-content-body">
    <?php sungit_lite_blog_category();
    the_title( '<h2>', '</h2>' );?>
    <div class="metabar">
        <span class="posted-on"><?php esc_html_e('Posted On','sungit-lite'); ?><a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')));  ?>"><?php echo get_the_date(); ?></time></a></span>
        <span class="byline"><span class="author vcard"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a></span></span>
        <span class="post-comments"><?php echo esc_html(get_comments_number()); ?></span>

    </div>
    <div class="post-desc">
        <?php if(is_archive() || is_home()){
                  echo wp_kses_post(sungit_lite_get_excerpt($post->ID,200));
              }
               else if (is_single()){
                  the_content();
               } else {
                   echo wp_kses_post(strip_shortcodes(wpautop(get_the_content())));
               }


               wp_link_pages( array(
                   'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sungit-lite' ),
                   'after'  => '</div>',
               ) );
           ?>
    </div>
    <?php if ( get_the_tag_list() != '' ) { ?>
        <span class="sungit-lite-tags"><?php wp_kses_post(the_tags( 'Tags:', ''  )); ?></span>
    <?php }
    if(is_archive() || is_home() ): ?>
        <a class="btn sl-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'sungit-lite' ); ?></a>
    <?php endif; ?>
</div>