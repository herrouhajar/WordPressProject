<?php
$sungit_lite_theme_options = sungit_lite_theme_options();
$slider_page_id_1 = absint($sungit_lite_theme_options['slider_page_id_1']);
$slider_page_id_2 = absint($sungit_lite_theme_options['slider_page_id_2']);
$slider_page_id_3 = absint($sungit_lite_theme_options['slider_page_id_3']);

if(!empty($slider_page_id_1) || !empty($slider_page_id_2) || !empty($slider_page_id_3)):
    $args = array(
        'post_type' => 'page',
        'post_status' =>'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
        'post__in' => array($slider_page_id_1, $slider_page_id_2, $slider_page_id_3),
        );
    $query = new WP_query($args);
    if($query->have_posts()): ?>
        <div class="home-banner">
            <div class="slider-item-wrapper" <?php if(is_rtl()){?>data-slick='{"rtl":true}'<?php }?>>
              <?php while($query->have_posts()) : $query->the_post();
                          $slider_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );?>
                          <div class="slider-item" style="background-image: url(<?php echo esc_url($slider_image[0]); ?>)">
                              <div class="slider-text-wrapper">
                                  <div class="block">
                                    <div class="centre">
                                      <ul class="bars active">
                                        <li class="bar1"></li>
                                        <li class="bar2"></li>
                                        <li class="bar3"></li>
                                        <li class="bar4"></li>
                                        <li class="bar5"></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <?php the_title( '<h2>', '</h2>' ); ?>
                                  <a href="<?php the_permalink() ?>" class="sl-btn"><?php esc_html_e('Read More','sungit-lite')?></a>
                              </div>
                          </div>
              <?php endwhile;
              wp_reset_postdata(); ?>
            </div>
        </div>
    <?php endif;
endif;