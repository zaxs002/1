<?php

global $wpdb, $yith_wcwl, $woocommerce;

if( isset( $_GET['user_id'] ) && !empty( $_GET['user_id'] ) ) {
    $user_id = $_GET['user_id'];
} elseif( is_user_logged_in() ) {
    $user_id = get_current_user_id();
}

$current_page = 1;
$limit_sql = '';

if( $pagination == 'yes' ) {
    $count = array();

    if( is_user_logged_in() || ( isset( $user_id ) && !empty( $user_id ) ) ) {
        $count = $wpdb->get_results( $wpdb->prepare( 'SELECT COUNT(*) as `cnt` FROM `' . YITH_WCWL_TABLE . '` WHERE `user_id` = %d', $user_id  ), ARRAY_A );
        $count = $count[0]['cnt'];
    } elseif( yith_usecookies() ) {
        $count[0]['cnt'] = count( yith_getcookie( 'yith_wcwl_products' ) );
    } else {
        $count[0]['cnt'] = count( $_SESSION['yith_wcwl_products'] );
    }

    $total_pages = $count/$per_page;
    if( $total_pages > 1 ) {
        $current_page = max( 1, get_query_var( 'page' ) );

        $page_links = paginate_links( array(
            'base' => get_pagenum_link( 1 ) . '%_%',
            'format' => '&page=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'show_all' => true
        ) );
    }

    $limit_sql = "LIMIT " . ( $current_page - 1 ) * 1 . ',' . $per_page;
}

if( is_user_logged_in() || ( isset( $user_id ) && !empty( $user_id ) ) )
{ $wishlist = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `" . YITH_WCWL_TABLE . "` WHERE `user_id` = %s" . $limit_sql, $user_id ), ARRAY_A ); }
elseif( yith_usecookies() )
{ $wishlist = yith_getcookie( 'yith_wcwl_products' ); }
else
{ $wishlist = isset( $_SESSION['yith_wcwl_products'] ) ? $_SESSION['yith_wcwl_products'] : array(); }

// Start wishlist page printing
wc_print_notices();
?>
<div id="yith-wcwl-messages"></div>

<form id="yith-wcwl-form" action="<?php echo esc_url( $yith_wcwl->get_wishlist_url() ) ?>" method="post">
    
    <?php
    $wishlist_title = get_option( 'yith_wcwl_wishlist_title' );
    if( !empty( $wishlist_title ) )
    { echo apply_filters( 'yith_wcwl_wishlist_title', '<h2>' . $wishlist_title . '</h2>' ); }
	?>
    
	<!--<ul class="cart_list product_list_widget ">-->
    
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="cart_list product_list_widget <?php echo $args['list_class']; ?>">
	    
		<?php
        if( count( $wishlist ) > 0 ) :
            foreach( $wishlist as $values ) :
                if( !is_user_logged_in() && !isset( $_GET['user_id'] ) ) {
                    if( isset( $values['add-to-wishlist'] ) && is_numeric( $values['add-to-wishlist'] ) ) {
                        $values['prod_id'] = $values['add-to-wishlist'];
                        $values['ID'] = $values['add-to-wishlist'];
                    } else {
                        $values['prod_id'] = $values['product_id'];
                        $values['ID'] = $values['product_id'];
                    }
                }

                $product_obj = get_product( $values['prod_id'] );

                if( $product_obj !== false && $product_obj->exists() ) : ?>
                    <tr id="yith-wcwl-row-<?php echo $values['ID'] ?>">                     
                        
                        <td>
                        
                            <table>
                            
                                <tr>
                                
                                    <td class="product-thumbnail">
                                        <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $values['prod_id'] ) ) ) ?>">
                                            <?php echo $product_obj->get_image() ?>
                                        </a>
                                    </td>
                                    
                                    <td class="product-description">
                                        
                                        <a class="product-title" href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $values['prod_id'] ) ) ) ?>">
                                            <?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product_obj->get_title(), $product_obj ) ?>
                                        </a>
                                        
                                        <?php if( get_option( 'yith_wcwl_price_show' ) == 'yes' ) : ?>
                                            <?php
                                            if( $product_obj->price != '0' ) {
                                                if( get_option( 'woocommerce_tax_display_cart' ) == 'excl' )
                                                    { echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price_excluding_tax() ), $values, '' ); }
                                                else
                                                    { echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price() ), $values, '' ); }
                                            } else {
                                                echo apply_filters( 'yith_free_text', __( 'Free!', 'mr_tailor' ) );
                                            }
                                            ?>
                                        <?php endif ?>
                                        <?php if( get_option( 'yith_wcwl_stock_show' ) == 'yes' ) : ?>
                                            <?php
                                            $availability = $product_obj->get_availability();
                                            $stock_status = $availability['class'];
                
                                            if( $stock_status == 'out-of-stock' ) {
                                                $stock_status = "Out";
                                                echo '<span class="wishlist-out-of-stock">' . __( 'Out of Stock', 'mr_tailor' ) . '</span>';
                                            } else {
                                                $stock_status = "In";
                                                echo '<span class="wishlist-in-stock">' . __( 'In Stock', 'mr_tailor' ) . '</span>';
                                            }
                                            ?>
                                        <?php endif ?>
                                        <span class="show-for-medium-up">
                                            <?php if( get_option( 'yith_wcwl_add_to_cart_show' ) == 'yes' ) : ?>
                                                <?php if($stock_status!='Out'): ?>
                                                    <?php echo YITH_WCWL_UI::add_to_cart_button( $values['prod_id'], $availability['class'] ) ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </span>
                                    </td>
                                    
                                    <td class="product-remove">
                                        <a href="javascript:void(0)" onclick="remove_item_from_wishlist( '<?php echo esc_url( $yith_wcwl->get_remove_url( $values['ID'] ) )?>', 'yith-wcwl-row-<?php echo $values['ID'] ?>');" class="remove" title="<?php _e( 'Remove this product', 'mr_tailor' ) ?>"><i class="icon-close_regular"></i></a>
                                    </td>
                                
                                </tr>
                                
                                <tr class="show-for-small-only wishlist_offcanvas_mobile">
                                    <td colspan="3">
                                        <?php if( get_option( 'yith_wcwl_add_to_cart_show' ) == 'yes' ) : ?>
                                            <?php if($stock_status!='Out'): ?>
                                                <?php echo YITH_WCWL_UI::add_to_cart_button( $values['prod_id'], $availability['class'] ) ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            
                            </table>
                        
                        </td>
						
                    </tr>
					
                <?php
                endif;
            endforeach;
        else: ?>
		
			<style>
				#wishlist-offcanvas h2 { display: none; }
			</style>

			<div class="cart-empty-offcanvas-banner offcanvas-empty-banner">
				<span id="empty-wishlist-offcanvas-box"></span>
			</div>
			
			<p class="wishlist-empty-text offcanvas-empty-text"><?php _e( 'No products were added to the wishlist.', 'mr_tailor' ); ?></p>
				
        <?php
        endif;
		?>
	
    </table>

</form>