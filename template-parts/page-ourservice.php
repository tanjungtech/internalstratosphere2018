<?php
/**
 * The template for displaying service page format
 *
 * Template Name: Our Service Page
 *
 * @package WordPress
 * @subpackage Instrat
 * @since Instrat 1.0
 */

get_header(); ?>
  <div id="primary" class="content-area pagecontainer">
    <main id="main" class="site-main" role="main" style="margin: 3rem 0 0;">
      <?php 
            $parent_services = get_page_by_title( 'Service' );
            $serv_args = array( 'post_type' => 'page', 'child_of' => $parent_services->ID, 'posts_per_page' => 8, 'orderby' => 'menu_order', 'order' => 'ASC');
            // the query
            $serv_lists = get_pages($serv_args);
            foreach($serv_lists as $page){
              $content = $page->post_content;
              if ( ! $content ) // Check for empty page
                continue;

              $content = apply_filters( 'the_content', $content );
              $image =  wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
          ?>
          <img alt="<?php echo $page->post_title;?>" src="<?php echo $image[0]; ?>"/>
          <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
          <div class="entry"><?php echo $content; ?></div>
        <?php }?>
    </main><!-- .site-main -->
  </div> <!-- content area --> 
<?php get_footer();?>