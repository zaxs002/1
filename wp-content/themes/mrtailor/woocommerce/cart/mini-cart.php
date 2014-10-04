<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>



<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="cart_list product_list_widget <?php echo $args['list_class']; ?>">

		<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

					?>
					<tr>                        
                        
                        <td class="product-thumbnail"><a href="<?php echo get_permalink( $product_id ); ?>"><?php echo $thumbnail; ?></a></td>
                        
                        <td class="product-name">                        
                            <a href="<?php echo get_permalink( $product_id ); ?>"><?php echo $product_name; ?></a>                        
                            <?php echo WC()->cart->get_item_data( $cart_item ); ?>   
                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                        </td>
                        
                        <td class="product-remove"><?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><i class="icon-close_regular"></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'mr_tailor' ) ), $cart_item_key ); ?></td>

                    </tr>
					<?php
				}
			}
		?>

	</table><!-- end product list -->

<?php else : ?>
	
	<style>
		#minicart-offcanvas h2 { display: none; }
	</style>

	<div class="cart-empty-offcanvas-banner offcanvas-empty-banner">
		<span id="empty-cart-offcanvas-box"></span>
	</div>
	
	<p class="cart-empty-text offcanvas-empty-text"><?php _e( 'Your cart is currently empty.', 'mr_tailor' ); ?></p>

<?php endif; ?>


<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

	<p class="total"><strong class="subtotal_name"><?php _e( 'Subtotal', 'mr_tailor' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="button view_cart wc-forward"><?php _e( 'View Cart', 'mr_tailor' ); ?></a>
		<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="button checkout wc-forward"><?php _e( 'Checkout', 'mr_tailor' ); ?></a>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>