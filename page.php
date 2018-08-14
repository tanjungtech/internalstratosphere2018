<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area pagecontainer">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
        if($post->post_parent == get_page_by_title( 'Service' )->ID){
  				get_template_part( 'template-parts/content', 'service' );
        }else{
          get_template_part( 'template-parts/content', 'page' );
        }

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				// End of the loop.
			endwhile;
			?>
		</div>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
