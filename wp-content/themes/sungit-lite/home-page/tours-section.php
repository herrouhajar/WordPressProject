<?php
$sungit_lite_theme_options = sungit_lite_theme_options();
$tour_category = $sungit_lite_theme_options['tour_category'];
if(!empty($tour_category)):
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'post_status' =>'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
        'category_name' => esc_attr($tour_category),
        );
    $query = new WP_query($args);
    if($query->have_posts()): ?>
        <div class="col-md-8">
            <div class="sl-event">
                <ul>
                <?php while($query->have_posts()) : $query->the_post();
                    $tours_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                    <li>
                        <div class="row">
                            <?php if(!empty($tours_image)): ?>
                                <div class="col-sm-3 col-md-3">
                                    <div class="event-thumb">
                                        <img src="<?php echo esc_url($tours_image[0]); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-6 col-md-6">
                                <div class="event-title">
                                    <?php the_title( '<h3>', '</h3>' ); ?>
                                    <?php echo wp_kses_post(sungit_lite_get_excerpt($post->ID,100)); ?>
                                </div>
                            </div>

                             <div class="col-sm-3 col-md-3">
                                <a href="<?php the_permalink(); ?>" class="btn sl-btn"><?php esc_html_e( 'Read More', 'sungit-lite' );?></a>
                            </div>
                        </div>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
    <?php endif;
endif; ?>