<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();
$parent_services = get_page_by_title( 'Services' );
?>

	<div id="instrat-banner" class="fullwidth-banner">
		<div class="container">
			<div class="bannerheader">
				<div class="banner-text-wrapper">
					<h1><?php _e('Improving Governance through Data and Strategy');?></h1>
					<div class="defaultdesc">
						<p><?php _e('Aktivis, peneliti, dan praktisi lintas bidang berkumpul untuk berpikir dan bertindak demi Indonesia yang lebih baik. Keberhasilan dan keberlanjutan pemerintahan merupakan keberhasilan Instrat.');?></p>
					</div>
					<div class="defaultaction">
						<a href="<?php echo esc_url(get_page_link($parent_services->ID));?>" title="How do we improve Indonesia" class="ib-action-btn"><?php _e('How do we improve Indonesia');?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="instrat-reason" class="lightbg standardfrontdiv fadeIn">
		<div class="container">
			<h2 class="frontheaderdefault"><?php _e('Kami Mengantarkan Keberhasilan');?></h2>
			<div class="snippetcentered">
				<p><?php _e('Pemerintahan yang profesional dapat diwujudkan dengan kebijakan berbasis data. Kami menjamin ketersampaian data secara akurat, relevan, dan sesuai kebutuhan.');?></p>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="partsnippet">
						<div class="iconsnippet"><i class="material-icons">group_add</i></div>
						<h3 class="snippetcolheader"><?php _e('Mitra kerja terpercaya');?></h3>
						<p><?php _e('Menjalin kerjasama dengan 34 provinsi dan lebih dari 200 kota kabupaten se-Indonesia');?></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="partsnippet">
						<div class="iconsnippet"><i class="material-icons">sync</i></div>
						<h3 class="snippetcolheader"><?php _e('Berfokus pada keberlanjutan');?></h3>
						<p><?php _e('Membangun pola kerjasama yang saling membangun untuk mencapai keberhasilan jangka panjang');?></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="partsnippet">
						<div class="iconsnippet"><i class="material-icons">assessment</i></div>
						<h3 class="snippetcolheader"><?php _e('Kritis, positif, dan progresif');?></h3>
						<p><?php _e('Produsen ide, gagasan, dan rekomendasi kebijakan untuk pembangunan Indonesia');?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="instrat-services" class="standardfrontdiv fadeIn">
		<div class="openingservices">
			<div class="container">
				<h2 class="frontheaderdefault"><?php _e('Services');?></h2>
				<div class="snippetcentered">
					<p><?php _e('Sebuah lembaga kajian pada isu-isu strategis, sosial, politik, dan humaniora dengan beberapa jasa layanan kepada mitra.');?></p>
				</div>
			</div>
		</div>
		<div class="contentservices">
			<div class="fourparttemplate">
				<?php 
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
											<a href="<?php echo get_permalink();?>" title="<?php _e(get_the_title(get_the_id()));?>"><?php echo get_the_post_thumbnail( get_the_id(), array(100, 100));?></a>
											<h4><a href="<?php echo get_permalink();?>" title="<?php _e(get_the_title(get_the_id()));?>"><?php _e(get_the_title(get_the_id()));?></a></h4>
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
			</div>
		</div>
	</div>
	<div id="instrat-partner" class="testifrontdiv fadeIn">
		<div class="container">
			<h2 class="testiheaderdefault"><?php _e('Dipercaya oleh');?></h2>
			<div class="testilist justify-content-center">
				<div class="govdiv">
					<img src="<?php echo get_template_directory_uri();?>/images/jawabarat.png">
				</div>
					<div class="govdiv">
					<img src="<?php echo get_template_directory_uri();?>/images/wonosobo.png">
				</div>
				<div class="govdiv">
					<img src="<?php echo get_template_directory_uri();?>/images/pangkalpinang.png">
				</div>
				<div class="govdiv">
					<img src="<?php echo get_template_directory_uri();?>/images/kabbandung.png">
				</div>
				<div class="govdiv">
					<img src="<?php echo get_template_directory_uri();?>/images/kotabandung.png">
				</div>
			</div>
		</div>
	</div>
	<div id="instrat-blog" class="standardfrontdiv">
		<div class="container">
			<h2 class="frontheaderdefault"><?php _e('Latest News');?></h2>
			<div class="blogfrontsummary">
				<div class="row">
					<?php 
						$blog_args = array( 'category_name' => 'news', 'posts_per_page' => 3);
						// the query
						$blog_query = new WP_Query( $blog_args ); ?>

					<?php if ( $blog_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php
							while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
							<div class="col-md-4">
								<div class="colblogfront">
									<div class="colblogthumb">
										<a href="<?php echo get_permalink();?>" title="<?php _e(get_the_title(get_the_id()));?>">
											<?php if (has_post_thumbnail()):?>
												<?php echo get_the_post_thumbnail(get_the_id(), 'homepage-thumb');?>
											<?php else:?>
												<img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="nothumbfront">
											<?php endif;?>
										</a>
									</div>
									<div class="colblogcontent">
										<div class="colblogdate"><?php echo get_the_date('F d, Y');?></div>
										<h3><a href="<?php echo esc_url(get_permalink());?>" class="coltitle" title="<?php _e(get_the_title(get_the_id()));?>"><?php _e(get_the_title(get_the_id()));?></a></h3>
										<p><?php _e(get_the_excerpt(get_the_id()));?></p>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
					<?php endif; ?>
				</div>
				<?php
					$idBlog = get_category_by_slug('news'); 
				?>
				<a href="<?php echo esc_url(get_category_link($idBlog->term_id)) ;?>" class="colblogmore"><?php _e('Berita Terbaru Instrat');?></a>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
