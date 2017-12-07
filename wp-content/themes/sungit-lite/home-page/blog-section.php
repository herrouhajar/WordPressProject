<?php
$sungit_lite_theme_options  = sungit_lite_theme_options();
$latest_post_title          = $sungit_lite_theme_options['latest_post_title'];
$blog_category              = esc_attr($sungit_lite_theme_options['blog_category']);
$latest_post_subtitle       = $sungit_lite_theme_options['latest_post_subtitle'];
$tour_category              = esc_attr($sungit_lite_theme_options['tour_category']);
$tour_category_id           = sungit_lite_get_id_by_slug($tour_category);
$blog_category_obj          = get_category_by_slug($blog_category);
$tax_query                  = '';

if (!empty($blog_category_obj)){
    $blog_category_id  = $blog_category_obj->term_id;
    $tax_query[] = array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $blog_category_id,
                    );
}

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'post_status' =>'publish',
    'order' => 'desc',
    'orderby' => 'menu_order date',
    'post__not_in' => array($tour_category_id),
    'tax_query' => $tax_query,
    );
$query = new WP_query($args);
if($query->have_posts()): ?>
    <!-- Start of upcoming concert section -->
    <div class="blog-section">
        <div class="section-title">
            <h2><?php echo esc_html($latest_post_title); ?></h2>
            <p><?php echo esc_html($latest_post_subtitle); ?></p>
        </div>
        <div class="blog-post-wrapper" <?php if(is_rtl()){?>data-slick='{"rtl":true}'<?php }?>>

        <?php while($query->have_posts()) : $query->the_post();
                    $blog_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );?>
                   <div class="blog-post-slide" <?php if ($blog_image) { ?>style="background-image: url(<?php echo esc_url($blog_image[0]); ?>)"<?php } ?>>
                        <div class="blog-desc-wrap <?php if (is_sticky()) {echo 'sticky';} ?>">
                                <div class="blog-date">
                                     <span class="day"><?php echo esc_html(get_the_date('d'));?></span>
                                    <span class="month"><?php echo esc_html(get_the_date('M'));?></span>
                                </div>
                            <h2><?php the_title( '<h2>', '</h2>' ); ?></h2>
                            <a class="know-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','sungit-lite') ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
        </div>
    </div>
    <!-- End of blog section -->
<?php endif;
