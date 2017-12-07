<?php
if (!function_exists('sungit_lite_get_categories_select')) :
    function sungit_lite_get_categories_select() {
        $sungit_lite_cat = get_categories();
        $results = array();

        if (!empty($sungit_lite_cat)) :
          $results[''] = __('Select Category','sungit-lite');
        foreach ($sungit_lite_cat as $result) {
          $results[$result->slug] = $result->name;
        }
        endif;
        return $results;
    }
endif;

if ( ! function_exists( 'sungit_lite_theme_options' ) ) :
    function sungit_lite_theme_options() {
        $defaults = array(
            //Blog Options
            'latest_post_title'          => __('Latest Posts','sungit-lite'),
            'latest_post_subtitle' => __('Checkout Our Articles','sungit-lite'),
            //Slider Options
            'slider_page_id_1'        => '',
            'slider_page_id_2'        => '',
            'slider_page_id_3'        => '',
            //Social Options
            'facebook'             => '',
            'twitter'              => '',
            'gplus'                => '',
            'youtube'              => '',
            'instagram'            => '',
            'pinterest'            => '',
            'tumblr'               => '',
            'linkedin'             => '',
            //Tour Options
            'tour_title'           => __('Featured Audio & Tours','sungit-lite'),
            'tour_subtitle'        => '',
            'tour_category'        => '',
            //blog options
            'blog_category'        => '',
            );

          $options = get_option('sungit_lite_option', $defaults);

          //Parse defaults again - see comments
          $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;

if ( ! function_exists( 'sungit_lite_the_featured_video' ) ) {
    function sungit_lite_the_featured_video($content) {
        $ori_url = explode( "\n", $content );
        $url = $ori_url[0];
        $w = get_option( 'embed_size_w' );
        if ( !is_single() )
            $url = str_replace( '448', $w, $url );

        if ( 0 === strpos( $url, 'https://' ) || 0 == strpos($url, 'http://' ) ) {
            echo wp_oembed_get( $url );
            $content = trim( str_replace( $url, '', $content ) );
        }
        elseif ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
            $h = get_option( 'embed_size_h' );
            echo $url;
            if ( !empty( $h ) ) {

                if ( $w === $h ) $h = ceil( $w * 0.75 );
                $url = preg_replace(
                    array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ),
                    array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ),
                    $url
                    );
                echo $url;
            }

            $content = trim( str_replace( $url, '', $content ) );

        }
    }
}
if(!function_exists('sungit_lite_excerpt_end')):
    function sungit_lite_excerpt_end($more) {
		if( is_admin() ){
			return $more;
		}
        return esc_html__('&hellip;','sungit-lite');
    }
    add_filter('excerpt_more', 'sungit_lite_excerpt_end');
endif;

if(!function_exists('sungit_lite_get_id_by_slug')):
    function sungit_lite_get_id_by_slug($page_slug) {
        $page = get_page_by_path($page_slug);
        if ($page) {
            return $page->ID;
        } else {
            return null;
        }
    }
endif;

if(!function_exists('sungit_lite_social_icons')):
    function sungit_lite_social_icons(){
        $sungit_lite_theme_options = sungit_lite_theme_options();
        $facebook = $sungit_lite_theme_options['facebook'];
        $gplus = $sungit_lite_theme_options['gplus'];
        $linkedin = $sungit_lite_theme_options['linkedin'];
        $twitter = $sungit_lite_theme_options['twitter'];
        $instagram = $sungit_lite_theme_options['instagram'];
        $tumblr = $sungit_lite_theme_options['tumblr'];
        $pinterest = $sungit_lite_theme_options['pinterest'];
        ob_start();
                if(!empty($facebook)): ?>
                     <li><a href="<?php echo esc_url($facebook); ?>" title=<?php echo esc_attr__("Follow us on Facebook", "sungit-lite");?> class="fb-link"><span class="fa fa-facebook"></span></a></li>
                <?php endif;
                if(!empty($gplus)): ?>
                    <li><a href="<?php echo esc_url($gplus); ?>" title=<?php echo esc_attr__("Follow us on Google Plus", "sungit-lite");?> class="gp-link"><span class="fa fa-google-plus"></span></a></li>
                <?php endif;
                if(!empty($linkedin)):?>
                    <li><a href="<?php echo esc_url($linkedin); ?>" title=<?php echo esc_attr__("Follow us on Linkedin", "sungit-lite");?> class="ln-link"><span class="fa fa-linkedin"></span></a></li>
                <?php endif;
                if(!empty($twitter)):?>
                    <li><a href="<?php echo esc_url($twitter); ?>" title=<?php echo esc_attr__("Follow us on Twitter", "sungit-lite");?> class="tw-link"><span class="fa fa-twitter"></span></a></li>
                <?php endif;
                if(!empty($instagram)):?>
                    <li><a href="<?php echo esc_url($instagram); ?>" title=<?php echo esc_attr__("Follow us on Instagram", "sungit-lite");?> class="in-link"><span class="fa fa-instagram"></span></a></li>
                <?php endif;
                if(!empty($tumblr)):?>
                    <li><a href="<?php echo esc_url($tumblr); ?>" title=<?php echo esc_attr__("Follow us on Tumblr", "sungit-lite");?> class="ln-link"><span class="fa fa-tumblr"></span></a></li>
                <?php endif;
                if(!empty($pinterest)):?>
                    <li><a href="<?php echo esc_url($pinterest); ?>" title=<?php echo esc_attr__("Follow us on Pinterest", "sungit-lite");?> class="in-link"><span class="fa fa-pinterest"></span></a></li>
                <?php endif;
        echo ob_get_clean();

    }
    add_action( 'sungit_lite_social_function', 'sungit_lite_social_icons' );
endif;

/* Breadcrumbs  */
if(!function_exists('sungit_lite_breadcrumbs')):
    function sungit_lite_breadcrumbs() {
            $delimiter = '';
            $before = '<li>'; // tag before the current crumb
            $after = '</li>'; // tag after the current crumb
            echo '<ul class="breadcrumb">';
            global $post;
            $homeLink = home_url();
            echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html__('Home', 'sungit-lite') . '</a></li>' . wp_kses_post($delimiter) . ' ';
            if ( is_category() ) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category( $thisCat );
                $parentCat = get_category( $thisCat->parent );
                if ($thisCat->parent != 0)
                    echo(get_category_parents($parentCat, TRUE, ' ' . wp_kses_post($delimiter) . ' '));
                echo wp_kses_post($before) . single_cat_title('', false) . wp_kses_post($after);
            } elseif (is_day()) {
                echo '<li><a href="' . esc_attr( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_attr( get_the_time( 'Y' ) ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                echo '<li><a href="' . esc_attr( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) )) . '">' . esc_attr( get_the_time('F') ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                echo wp_kses_post($before) . esc_attr( get_the_time( 'd' ) ) . wp_kses_post($after);
            } elseif ( is_month() ) {
                echo '<li><a href="' . esc_attr( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_attr( get_the_time( 'Y' ) ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                echo wp_kses_post($before) . esc_attr( get_the_time('F') ) . wp_kses_post($after);
            } elseif ( is_year() ) {
                echo wp_kses_post($before) . esc_attr( get_the_time( 'Y' ) ) . wp_kses_post($after);
            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo '<li><a href="' . esc_url( $homeLink ) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                    echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    //echo get_category_parents($cat, TRUE, ' ' . wp_kses_post($delimiter) . ' ');
                    echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
                }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                if(!empty($post_type)){
                    echo wp_kses_post($before) . $post_type->labels->singular_name . wp_kses_post($after);
                }
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . wp_kses_post($delimiter) . ' ');
                echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_attr( $parent->post_title ) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
            } elseif ( is_page() && !$post->post_parent ) {
                echo wp_kses_post($before) . esc_attr( get_the_title() ) . wp_kses_post($after);
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ( $parent_id ) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . esc_url( get_permalink($page->ID) ) . '">' . get_the_title($page->ID) . '</a></li>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb)
                    echo $crumb . ' ' . wp_kses_post($delimiter) . ' ';
                echo wp_kses_post($before) . get_the_title() . wp_kses_post($after);
            } elseif ( is_search() ) {
                echo wp_kses_post($before) . esc_html__( "Search results for","sungit-lite" )  . get_search_query() . '"' . wp_kses_post($after);

            } elseif ( is_tag() ) {
                echo wp_kses_post($before) .  single_tag_title( '', false ) . wp_kses_post($after);
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata( $author );
                echo wp_kses_post($before) . esc_html__( "Articles posted by","sungit-lite" ) . ' ' . esc_html($userdata->display_name) . wp_kses_post($after);
            } elseif (is_404()) {
                echo wp_kses_post($before) . esc_html__( "Error 404","sungit-lite" ) . wp_kses_post($after);
            }

            echo '</ul>';
    }
endif;

if ( ! function_exists( 'sungit_lite_get_excerpt' ) ) :
    function sungit_lite_get_excerpt( $post_id, $count ) {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;
        $excerpt = strip_tags($excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $strip = explode( ' ' ,$excerpt );
        foreach($strip as $key => $single){
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode( ' ', $strip );
        $excerpt = substr($excerpt, 0, $count);
        if(strlen($excerpt) >= $count){
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '&hellip;';
        }
        return $excerpt;
    }
endif;

function sungit_lite_archive_query($blog_category_obj) {

    $tax_query  = '';
    $blog_category_id  = $blog_category_obj->term_id;
    $tax_query[] = array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $blog_category_id,
                    );
    $args = array(
        'post_type' => 'post',
        'post_status' =>'publish',
        'tax_query' => $tax_query,

        );
    $archive_query = new WP_query($args);
        if($archive_query->have_posts()):

            while($archive_query->have_posts()):

                $archive_query->the_post();

                    get_template_part( 'components/post/content', get_post_format() );

            endwhile;

            the_posts_navigation();

        endif;
    wp_reset_postdata();
}

function sungit_lite_blog_category() {
    $sungit_lite_theme_options  = sungit_lite_theme_options();
    $blog_category              = esc_attr($sungit_lite_theme_options['blog_category']);
    $blog_category_obj          = get_category_by_slug($blog_category);
        if (!empty($blog_category_obj) && is_home()) {
    ?>
        <span class="cat-links">
            <a href="<?php echo esc_url(get_category_link($blog_category_obj->term_id));?>"><?php echo esc_html($blog_category_obj->cat_name); ?></a>
        </span>
    <?php } else { ?>
        <span class="cat-links">
            <?php  the_category( ' , ' ); ?>
        </span>
    <?php   }
}

if ( ! function_exists( 'sungit_lite_author' ) ) {
    function sungit_lite_author($author_id) {
        $author_description = get_the_author_meta('description', $author_id);
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_firstname = get_the_author_meta( 'first_name' );
        $author_lastname = get_the_author_meta( 'last_name' );
        $author_image = get_avatar($author_id);
        ?>
            <div class="bgwhite post-pad">
                <div class="author-bio">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="author-image">
                                <?php echo wp_kses_post($author_image); ?>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="author-desc">
                                <span class="author-name"><?php if ( $author_firstname && $author_lastname ) { ?><?php echo esc_html($author_firstname). ' ' . esc_html( $author_lastname); ?><?php } else { echo esc_html($author_name);}?></span>
                                <?php if ($author_description) { ?>
                                    <p><?php echo esc_html($author_description); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}