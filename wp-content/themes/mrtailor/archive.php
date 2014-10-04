<?php 
$blog_with_sidebar = "";
if ( (isset($mr_tailor_theme_options['sidebar_blog_listing'])) && ($mr_tailor_theme_options['sidebar_blog_listing'] == "1" ) ) $blog_with_sidebar = "yes";
if (isset($_GET["blog_with_sidebar"])) $blog_with_sidebar = $_GET["blog_with_sidebar"];    
?>

<?php get_header(); ?>

	<div id="primary" class="content-area archive">
		
		 <?php if ( have_posts() ) : ?>
            
			<div class="row">
				<div class="large-8 large-centered columns">
				
					<header class="page-header text-center archive">
						<h1 class="page-title">
							<?php
								if ( is_category() ) :
									single_cat_title();
		
								elseif ( is_tag() ) :
									single_tag_title();
		
								elseif ( is_author() ) :
									/* Queue the first post, that way we know
									 * what author we're dealing with (if that is the case).
									*/
									the_post();
									printf( __( 'Author: %s', 'mr_tailor' ), '<span class="vcard">' . get_the_author() . '</span>' );
									/* Since we called the_post() above, we need to
									 * rewind the loop back to the beginning that way
									 * we can run the loop properly, in full.
									 */
									rewind_posts();
		
								elseif ( is_day() ) :
									printf( __( 'Day: %s', 'mr_tailor' ), '<span>' . get_the_date() . '</span>' );
		
								elseif ( is_month() ) :
									printf( __( 'Month: %s', 'mr_tailor' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		
								elseif ( is_year() ) :
									printf( __( 'Year: %s', 'mr_tailor' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		
								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'mr_tailor' );
		
								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Images', 'mr_tailor');
		
								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Videos', 'mr_tailor' );
		
								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Quotes', 'mr_tailor' );
		
								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									_e( 'Links', 'mr_tailor' );
		
								else :
									_e( 'Archives', 'mr_tailor' );
		
								endif;
							?>
						</h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>
					</header><!-- .page-header -->
					
				</div><!-- .columns -->
			</div><!-- .row -->
			
		<?php endif; ?>
		
        <?php if ( $blog_with_sidebar == "yes" ) : ?>
            <div class="row"><div class="large-8 columns with-sidebar">
        <?php endif; ?>
        
                <div id="content" class="site-content" role="main">
                
                    <?php if ( have_posts() ) : ?>
            
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
            
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format() );
								
                            ?>
								 <hr class="content_hr" />
                        <?php endwhile; ?>
            
                        <?php mr_tailor_content_nav( 'nav-below' ); ?>
            
                    <?php else : ?>
            
                        <?php get_template_part( 'content', 'none' ); ?>
            
                    <?php endif; ?>
                    
                </div><!-- #content --> 
                         
            <?php if ( $blog_with_sidebar == "yes" ) : ?>
        		</div><!-- .columns -->
            <?php endif; ?>
            
            <?php if ( $blog_with_sidebar == "yes" ) : ?>
				<div class="large-4 columns">        					
					<?php get_sidebar(); ?>			           
                </div><!-- .columns -->
            <?php endif; ?>
            
        <?php if ( $blog_with_sidebar == "yes" ) : ?>
        	</div><!-- .row -->
        <?php endif; ?>
                            
    </div><!-- #primary -->

<?php get_footer(); ?>
