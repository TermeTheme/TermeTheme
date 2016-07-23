<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
$terms = wp_get_post_terms( $post->ID, 'product_tag', '' );




?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>
	<?php
		echo '<span class="tagged_as"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp; Tags: ';
	 foreach ($terms as $term) {
		echo '<a href="' . get_tag_link($term->term_id). '" data-termehover="">' . $term->name .'</a>';
	}
	echo '</span>';
 ?>
	<!-- <?php //echo $product->get_tags( ' ', '<span class="tagged_as"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) .  $tagsss . '</span>' ); ?> -->
	<?php do_action( 'woocommerce_product_meta_end' );

	?>

</div>
