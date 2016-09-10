<?php
// Woocommerce Change Title Section
function change_product_title() {
    global $product;
    ?>
    <div class="info">
        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
        <?php if ( $price_html = $product->get_price_html() ) : ?>
            <div class="price"><?php echo $price_html; ?></div>
        <?php endif; ?>
    </div>
    <?php
}
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'change_product_title' );
// Remove Breadcrumbs
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
// Remove Result Count
remove_action('woocommerce_before_shop_loop','woocommerce_result_count', 20);
// Remove Sidebar
remove_action('woocommerce_sidebar','woocommerce_get_sidebar', 10);
// Remove Price Content-Product
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
// Remove AddToCart Content-Product
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart', 10);
function terme_wc_show_is_on_sale() {
    global $product, $terme_options;
    $off = $product->regular_price - $product->sale_price;
    if ( $terme_options['is_on_sale'] == '1' && $product->is_on_sale() ) :
    ?>
    <div class="is_on_sale">
        <h2><?php echo $terme_options['is_on_sale_title']; ?></h2>
        <div class="off_section">
            <span>
          <span class="off">off</span>
            <span class="currency"><?php echo get_woocommerce_currency_symbol(); ?></span>
            <span class="price"><?php echo $off ?></span>
            </span>
        </div>
    </div>
    <?php endif;
}
add_action( 'terme_wc_is_on_sale', 'terme_wc_show_is_on_sale' );
function change_product_thumbnail() {
  ?>
    <div class="thumb">
        <?php
        global $product,$post, $terme_options;
        $option = $terme_options['woocommerce_column'];
        if ($option == 'column_3') {
          echo woocommerce_get_product_thumbnail('shop_catalog_home_3');
        } else {
          echo woocommerce_get_product_thumbnail('shop_catalog_home_4');
        }
        ?>
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
<?php
}
// woocommerce_before_shop_loop_item_title
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
add_action( 'woocommerce_before_shop_loop_item_title', 'change_product_thumbnail' );
// woocommerce_after_shop_loop_item_title
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5);
