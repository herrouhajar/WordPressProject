		<div class="site-branding">
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					sungit_lite_the_custom_logo();
            } else {
			 ?>
				<p class="site-title"><a class="navbar-brand"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif;?>
			<?php } ?>
		</div><!-- .site-branding -->