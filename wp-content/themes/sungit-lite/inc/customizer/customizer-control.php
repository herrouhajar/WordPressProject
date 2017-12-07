<?php
if( ! class_exists('WP_Customize_Control') ){
  return NULL;
}

class Sungit_Lite_Support_Control extends WP_Customize_Control {

      /**
       * Render the content on the theme customizer page
       */
       public $type = "sungit-lite-support";

         public function enqueue() {
         wp_enqueue_style( 'sungit-lite-support-style', trailingslashit( get_template_directory_uri() ) . '/inc/customizer/css/customizer-control.css' );
        /* js */
      }

      public function render_content() {
         //Add Theme instruction, Support Forum, Demo Link, Rating Link

         ?><p>
              <a class="sungit-lite-support" target="_blank" href="<?php echo esc_url("http://yudleethemes.com/sungit-lite-documentation/");?>"><span class="dashicons dashicons-book-alt"></span><?php echo  esc_html__('Documentation', 'sungit-lite') ?></a>
            </p>
         <?php
      }
}