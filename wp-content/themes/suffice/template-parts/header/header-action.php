<?php
/**
 * Shows header action
 * Search Icon and Cart Icon
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?>

<div class="header-action-container">
	<?php
	$show_search_icon  = suffice_get_option( 'suffice_show_search', '1' );
	$show_cart_icon	= suffice_get_option( 'suffice_show_cart', '1' );
	?>

	<?php if ( ( '1' === $show_search_icon ) || ( '1' === $show_cart_icon ) ) : ?>
		<ul class="navigation-header-action">
			<?php if ( '1' === $show_search_icon ) : ?>
				<li class="header-action-item-search search-form-style-dropdown">
					<span class="screen-reader-text"><?php esc_html_e( 'Show Search Form', 'suffice' ); ?></span>
					<i class="fa fa-search"></i>
					<div class="header-action-search-form">
						<?php get_search_form( ); ?>
					</div>
				</li>
			<?php endif; ?>

			<?php
			if ( ( '1' === $show_cart_icon ) && suffice_is_woocommerce_active() ) {
				get_template_part( 'template-parts/header/cart', 'icon' );
			}

			if ( ( '1' === suffice_get_option( 'suffice_show_wishlist', '1' ) ) && suffice_is_yith_wishlist_active() ) {
				get_template_part( 'template-parts/header/wishlist', 'icon' );
			}
			?>
		</ul>
	<?php endif; ?>
	<?php get_template_part( 'template-parts/navigation/navigation', 'togglers' ); ?>
</div> <!-- .header-action-container -->
