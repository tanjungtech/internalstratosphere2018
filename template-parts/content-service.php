<?php
/**
 * The template used for displaying service content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
  <div id="primary" class="content-area pagecontainer">
    <main id="main" class="site-main" role="main" style="margin: 3rem 0 0;">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </main><!-- .site-main -->
  </div> <!-- content area --> 
<?php get_footer();?>