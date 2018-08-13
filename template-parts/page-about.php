<?php
/**
 * The template for displaying about page format
 *
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Instrat
 * @since Instrat 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area pagecontainer">
		<main id="main" class="site-main" role="main">
			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();?>

				<div class="aboutheaderpart" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full'));?>'); background-attachment: fixed;">
					<div class="aboutthumbpart">
						<div class="container">
							<h1 class="aboutpagetitle"><?php _e(get_the_title(get_the_id()));?></h1>
							<div class="headingborder">
								<span class="specialbordercolor"></span>
							</div>
							<div style="text-align: center; margin: 2rem auto 0; width: 60%; line-height: 1.5;">
								<p><?php _e(get_post_meta( get_the_id(), 'About Us Description', true )) ;?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="aboutpagecontent">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-6">
								<?php _e(kdmfi_the_featured_image( 'featured-image-2', 'full'));?>
							</div>
							<div class="col-md-6">
								<?php the_content();?>
							</div>
						</div>
					</div>					
				</div>
				<div class="aboutpagenilai standardfrontdiv fadeIn">
					<div class="container">
						<h2 class="frontheaderdefault"><div class="abouticonheader"><i class="material-icons">map</i></div><?php _e('Posisi Instrat');?></h2>
						<div style="width: 75%; margin: 0 auto;">
							<p><?php _e(get_post_meta( get_the_id(), 'Posisi Instrat', true )) ;?></p>
						</div>
					</div>
				</div>
			<?php endwhile;?>
			<div id="about-enquiry" class="standardfrontdiv">
				<div class="aboutenquirycontent">
					<div class="container">
						<div class="snippetcentered">
							<h2><?php _e('Kerjasama dengan Instrat');?></h2>
							<p><?php _e('Menggunakan layanan Instrat adalah awal dari keberhasilan membangun pemerintahan yang profesional. Gunakan layanan kami untuk mengembangkan Indonesia menjadi lebih baik.');?></p>
							<a href="" class="about-enquiry-nav"><?php _e('Layanan Instrat');?></a>
						</div>
					</div>
				</div>
			</div>
			<div id="instrat-profile" class="standardfrontdiv fadeIn">
				<div class="container">
					<h2 class="frontheaderdefault"><?php _e('Behind The Scene');?></h2>
					<div class="snippetcentered">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php 
									$parent_personnels = get_page_by_title( 'Personnels' );
									$personnels_args = array( 'post_type' => 'page', 'post_parent' => $parent_personnels->ID, 'posts_per_page' => 8, 'orderby' => 'menu_order', 'order' => 'ASC');
									// the query
									$personnel_query = new WP_Query( $personnels_args ); ?>

								<?php if ( $personnel_query->have_posts() ) : ?>

									<!-- pagination here -->

									<!-- the loop -->
									<?php
										$set_count = 0;
										while ( $personnel_query->have_posts() ) : $personnel_query->the_post(); ?>
										<div class="carousel-item <?php if($set_count == 0) {echo 'active';} ?>">
											<div>
												<div class="ss-top-personnel">
													<p><?php _e(get_post_meta( get_the_id(), 'personneldesc', true )) ;?></p>
												</div>
												<div class="ss-bottom-personnel">
													<?php echo get_the_post_thumbnail( get_the_id(), array(100, 100));?>
													<h4><?php _e(get_the_title(get_the_id()));?></h4>
												</div>
											</div>
										</div>
										<?php $set_count++;?>
									<?php endwhile; ?>
									<!-- end of the loop -->

									<!-- pagination here -->

									<?php wp_reset_postdata(); ?>

								<?php else : ?>
								<?php endif; ?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<i class="material-icons">chevron_left</i>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<i class="material-icons">chevron_right</i>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<a href="<?php echo esc_url(get_page_link($parent_personnels->ID)) ;?>" title="<?php _e('Meet Instrat&apos;s Full Squad');?>" class="colblogmore"><?php _e('Meet Instrat&apos;s Full Squad');?></a>
					</div>
				</div>
			</div>
		</main><!-- .site-main -->

	</div><!-- .content-area -->
<?php get_footer();?>