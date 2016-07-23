<?php

// Woocommerce Change Title Section
function change_product_title() {
  global $product;?>
  <div class="info">
  <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
  <?php if ( $price_html = $product->get_price_html() ) : ?>
  	<div class="price"><?php echo $price_html; ?></div>
  <?php endif; ?>
  </div>
<?php }
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
    add_action( 'woocommerce_shop_loop_item_title', 'change_product_title' );
 ?>
 <?php
 // Remove Breadcrumbs
  remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
  // Remove Result Count
  remove_action('woocommerce_before_shop_loop','woocommerce_result_count', 20);

?>
<?php
// Woocommerce Change Thumbnail Section
function change_product_thumbnail() {
  global $product,$post;?>
  <div class="thumb">
    <?php echo woocommerce_get_product_thumbnail('wc_product'); ?>
    <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
    	sprintf( '<a class="add_to_cart" rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s" data-termehover="">%s</a>',
    		esc_url( $product->add_to_cart_url() ),
    		esc_attr( isset( $quantity ) ? $quantity : 1 ),
    		esc_attr( $product->id ),
    		esc_attr( $product->get_sku() ),
    		esc_attr( isset( $class ) ? $class : 'button' ),
    		esc_html( $product->add_to_cart_text() )
    	),
    $product ); ?>
    <a href="<?php the_permalink(); ?>" class="permalink" data-termehover="">Description</a>
  </div>
<?php }
// woocommerce_before_shop_loop_item_title
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'change_product_thumbnail' );
// woocommerce_after_shop_loop_item_title
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5);
// woocommerce_after_shop_loop_item_title
    // remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' );



  ?>
