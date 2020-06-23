<?php
/**
 * Single Product tabs
 *
 * @version     3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $porto_settings;

$review_index = 0;

$rand = porto_generate_rand();

wp_enqueue_script( 'easy-responsive-tabs' );

if ( ! empty( $product_tabs ) || ! empty( $custom_tabs_title ) || $global_tab_title ) : ?>

	<div class="woocommerce-tabs woocommerce-tabs-<?php echo esc_attr( $rand ); ?> resp-htabs" id="product-tab">
		<ul class="resp-tabs-list">
			<?php
			$i = 0;
			foreach ( $product_tabs as $key => $product_tab ) :
				?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
				</li>
				<?php
				if ( 'reviews' == $key ) {
					$review_index = $i;
				}
				$i++;
			endforeach;
			?>

		</ul>
		<div class="resp-tabs-container">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>

				<div class="tab-content" id="tab-<?php echo esc_attr( $key ); ?>">
					<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab );
					}
					?>
				</div>

			<?php endforeach; ?>
		</div>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

	<script>
		jQuery(document).ready(function($) {
			var $tabs = $('.woocommerce-tabs-<?php echo esc_js( $rand ); ?>');

			$tabs.easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true,   // 100% fit in a container
				activate: function(event) { // Callback function if tab is switched

				}
			});

			var $review_content = $tabs.find('#tab-reviews'),
				$review_title1 = $tabs.find('h2[aria-controls=tab_item-<?php echo esc_js( $review_index ); ?>]'),
				$review_title2 = $tabs.find('li[aria-controls=tab_item-<?php echo esc_js( $review_index ); ?>]');

			function goReviewTab(target) {
				var recalc_pos = false;
				if ($review_content.length && $review_content.css('display') == 'none') {
					recalc_pos = true;
					if ($review_title1.length && $review_title1.css('display') != 'none')
						$review_title1.click();
					else if ($review_title2.length && $review_title2.closest('ul').css('display') != 'none')
						$review_title2.click();
				}

				var delay = recalc_pos ? 400 : 0;
				setTimeout(function() {
					$('html, body').stop().animate({
						scrollTop: target.offset().top - theme.StickyHeader.sticky_height - theme.adminBarHeight() - 14
					}, 600, 'easeOutQuad');
				}, delay);
			}

			function goAccordionTab(target) {
				setTimeout(function() {
					var label = target.attr('aria-controls');
					var $tab_content = $tabs.find('.resp-tab-content[aria-labelledby="' + label + '"]');
					if ($tab_content.length && $tab_content.css('display') != 'none') {
						var offset = target.offset().top - theme.StickyHeader.sticky_height - theme.adminBarHeight() - 14;
						if (offset < $(window).scrollTop())
						$('html, body').stop().animate({
							scrollTop: offset
						}, 600, 'easeOutQuad');
					}
				}, 500);
			}

			<?php if ( ! porto_is_ajax() ) : ?>
			// go to reviews, write a review
			$('.woocommerce-review-link, .woocommerce-write-review-link').click(function(e) {
				var target = $(this.hash);
				if (target.length) {
					e.preventDefault();

					goReviewTab(target);

					return false;
				}
			});
			// Open review form if accessed via anchor
			if ( window.location.hash == '#review_form' || window.location.hash == '#reviews' || window.location.hash.indexOf('#comment-') != -1 ) {
				var target = $(window.location.hash);
				if (target.length) {
					goReviewTab(target);
				}
			}
			<?php endif; ?>

			$tabs.find('h2.resp-accordion').click(function(e) {
				goAccordionTab($(this));
			});
		});
	</script>

<?php endif; ?>
