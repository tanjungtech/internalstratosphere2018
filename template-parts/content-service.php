<?php
/**
 * The template used for displaying service content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
$id = get_the_ID();
$post = get_post($id); 
$content = apply_filters('the_content', $post->post_content); 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
?>
  <div id="primary" class="content-area pagecontainer">
    <main id="main" class="site-main content-service-main" role="main" style="margin: 0 0 0;">
      <div class="banner">
        <div class="container-img">
          <img src="<?php echo $thumb[0];?>" alt="<?php the_title()?>"/>
          <div class="overlay">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          </div>
        </div>
      </div>
      <div class="container-content">
        <div class="content">
          <?php echo $content;?>
          <div class="related">
            <h3>Related Portofolio</h3>
          </div>
        </div>
        <aside class="sidebar">
          <?php get_sidebar();?>
        </aside>
      </div>
    </main><!-- .site-main -->
  </div> <!-- content area --> 
<?php get_footer();?>