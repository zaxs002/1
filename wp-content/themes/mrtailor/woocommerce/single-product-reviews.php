<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

if ( ! comments_open() )
	return;
?>

<div class="row">
	<div class="large-9 large-centered columns">

		<div id="reviews">
			<div id="comments">
				
				<h2><?php
					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_rating_count() ) )
						printf( _n('%s review for %s', '%s reviews for %s', $count, 'mr_tailor'), $count, get_the_title() );
					else
						_e( 'Reviews', 'mr_tailor' );
				?></h2>
		
				<?php if ( have_comments() ) : ?>
		
					<ol class="commentlist">
						<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
					</ol>
		
					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
						echo '<nav class="woocommerce-pagination">';
						paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
							'prev_text' 	=> '&larr;',
							'next_text' 	=> '&rarr;',
							'type'			=> 'list',
						) ) );
						echo '</nav>';
					endif; ?>
		
				<?php else : ?>
		
					<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'mr_tailor' ); ?></p>
		
				<?php endif; ?>
			</div>
		
			<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>
		
				<div id="review_form_wrapper">
					<div id="review_form">
						<?php
							$commenter = wp_get_current_commenter();
		
							$comment_form = array(
								'title_reply'          => have_comments() ? __( 'Add a review', 'mr_tailor' ) : __( 'Be the first to review', 'mr_tailor' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
								'title_reply_to'       => __( 'Leave a Reply to %s', 'mr_tailor' ),
								'comment_notes_before' => '',
								'comment_notes_after'  => '',
								'fields'               => array(
									'author' => '<p class="comment-form-author  form-row-first">' . '<label for="author">' . __( 'Name', 'mr_tailor' ) . ' <span class="required">*</span></label> ' .
												'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
									'email'  => '<p class="comment-form-email form-row-last"><label for="email">' . __( 'Email', 'mr_tailor' ) . ' <span class="required">*</span></label> ' .
												'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p><div class="clear"></div>',
								),
								'label_submit'  => __( 'Submit', 'mr_tailor' ),
								'logged_in_as'  => '',
								'comment_field' => ''
							);
		
							if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
								$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'mr_tailor' ) .'</label><select name="rating" id="rating">
									<option value="">' . __( 'Rate&hellip;', 'mr_tailor' ) . '</option>
									<option value="5">' . __( 'Perfect', 'mr_tailor' ) . '</option>
									<option value="4">' . __( 'Good', 'mr_tailor' ) . '</option>
									<option value="3">' . __( 'Average', 'mr_tailor' ) . '</option>
									<option value="2">' . __( 'Not that bad', 'mr_tailor' ) . '</option>
									<option value="1">' . __( 'Very Poor', 'mr_tailor' ) . '</option>
								</select></p>';
							}
		
							$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'mr_tailor' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false ) . '</p>';
		
							comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
						?>
					</div>
				</div>
		
			<?php else : ?>
		
				<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'mr_tailor' ); ?></p>
		
			<?php endif; ?>
		
			<div class="clear"></div>
		</div>
		
	</div><!-- .large-9-->
</div><!-- .row-->