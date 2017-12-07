 <div class="collapse navbar-collapse" id="navbar-collapse">
        <?php wp_nav_menu( array(
                  'theme_location' 		=> 'primary',
                  'menu_class' 			=> 'nav navbar-nav navbar-right',
                  'container'  			=> 'ul',
                  'fallback_cb'       	=> 'wp_page_menu',
                  'walker'            	=> new Sungit_Lite_Nav_Walker()
                  )); ?>
</div>