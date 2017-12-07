 <!-- start of prefooter section -->
<?php if ( is_active_sidebar( 'prefooter-1' ) || is_active_sidebar( 'prefooter-2' ) || is_active_sidebar( 'prefooter-3' )  ): ?>
    <div class="prefooter section">
        <div class="container">
            <div class="row">
                <?php if ( is_active_sidebar( 'prefooter-1' ) ) { ?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('prefooter-1' );?>
                        <ul class="social-nav">
                            <?php do_action( 'sungit_lite_social_function'); ?>
                        </ul>
                    </div>
                <?php }
                 if ( is_active_sidebar( 'prefooter-2' ) ) {?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('prefooter-2' );?>
                    </div>
                <?php }
                if ( is_active_sidebar( 'prefooter-3' ) ) { ?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('prefooter-3' );?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- End of prefooter section -->
 <div class="footer">
    <div class="container">
        <div class="row">
            <h3><?php echo esc_html__('Theme by', 'sungit-lite'); ?></h3>
            <p class="copyright"><a href="<?php echo esc_url("https://yudleethemes.com");?>"><?php echo ' '.esc_html__('Yudlee Themes', 'sungit-lite'); ?></a></p>
        </div>
    </div>
</div>
