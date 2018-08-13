<?php
/**
 * The template for displaying about page format
 *
 * Template Name: Services Parent Page
 *
 * @package WordPress
 * @subpackage Instrat
 * @since Instrat 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area pagecontainer">
		<main id="main" class="site-main" role="main" style="margin: 3rem 0 0;">
			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();?>
				<div class="container">
					<h1 class="aboutpagetitle"><?php _e(get_the_title(get_the_id()));?></h1>
					<div class="headingborder">
						<span class="specialbordercolor"></span>
					</div>
					<div style="text-align: center; margin: 2rem auto 0; width: 60%; line-height: 1.5;">
						<?php the_content();?>
					</div>
				</div>
			<?php endwhile;?>
			<div class="contentservices">
				<div class="fourparttemplate">
					<?php 
						$parent_services = get_page_by_title( 'Services' );
						$serv_args = array( 'post_type' => 'page', 'post_parent' => $parent_services->ID, 'posts_per_page' => 8, 'orderby' => 'menu_order', 'order' => 'ASC');
						// the query
						$serv_query = new WP_Query( $serv_args ); ?>

					<?php if ( $serv_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php while ( $serv_query->have_posts() ) : $serv_query->the_post(); ?>
							<div class="subfourpart align-items-center">
								<div class="imgwrapper">
									<div class="imagemasking"></div>
									<?php echo kdmfi_the_featured_image( 'featured-image-2', 'full');?>
								</div>
								<div class="sfwrapper">
									<div class="iconsf">
										<i class="material-icons"><?php echo get_post_meta( get_the_id(), 'materialicon', true ) ;?></i>
									</div>
									<h3 class="servicestitle"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" title="<?php _e(get_the_title(get_the_id()));?>"><?php the_title(); ?></a></h3>
									<p><?php _e(get_post_meta( get_the_id(), 'service description', true )) ;?></p>
								</div>
							</div>
						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
					<?php endif; ?>
				</div>
			</div>
		</main><!-- .site-main -->

	</div><!-- .content-area -->
<?php get_footer();?>