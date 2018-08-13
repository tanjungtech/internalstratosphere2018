<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area pagecontainer">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div id="breadcrumb-cat" class="standardfrontdiv">
				<div class="container">
					<header class="page-header">
						<div class="row">
							<div class="col-md-6">
								<?php
									the_archive_title( '<h3 class="cattitlebread">', '</h3>' );
									the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</div>
							<div class="col-md-6 justify-content-end align-items-center" style="display: flex;">
								<div><?php custom_breadcrumbs(); ?></div>
							</div>
						</div>
					</header>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-8">

						<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();?>
							<div class="catcardpost">
								<div><a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail(get_the_id(), 'large');?></a></div>
								<div class="contentcardpost">
									<div class="colblogdate"><?php echo get_the_date('F d, Y');?></div>
									<h2 class="entry-title"><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h2>
									<div>
										<?php echo get_the_excerpt();?>
									</div>
								</div>
							</div>
						<?php endwhile;

						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'twentysixteen' ),
							'next_text'          => __( 'Next page', 'twentysixteen' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
						) );

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

					</div>
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
