<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area pagecontainer">
	<main id="main" class="site-main" role="main">
		<?php
			 // Get post category info
            $category = get_the_category();
			$cat_display = '';
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                foreach($cat_parents as $parents) {
                    $cat_display .= '<h3 class="cattitlebread">'.$parents.'</h3>';
                }
             
            }
		?>
		<div id="breadcrumb-cat" class="standardfrontdiv">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="cattitlebread"><?php _e($cat_display);?></h3>
					</div>
					<div class="col-md-6 justify-content-end align-items-center" style="display: flex;">
						<div><?php custom_breadcrumbs(); ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the single post content template.
						get_template_part( 'template-parts/content', 'single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}

						// End of the loop.
					endwhile;
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
