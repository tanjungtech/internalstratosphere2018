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
          <?php $parent_services = get_page_by_title( 'Service' );
            $serv_args = array( 'post_type' => 'page', 'post_parent' => $parent_services->ID, 'posts_per_page' => 3, 'orderby' => 'menu_order', 'order' => 'ASC', 'post__not_in' => array($id));
            // the query
            $serv_query = new WP_Query( $serv_args ); 
          ?>
          <?php if ( $serv_query->have_posts() ) : ?>
            <div class="related">
              <h3>Related Service</h3>
            <?php while ( $serv_query->have_posts() ) : $serv_query->the_post(); ?>
              <div class="related-card">
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );?>
                <figure class="image-masking">
                  <img src="<?php echo $thumb[0];?>" alt="<?php the_title(); ?>"/>
                </figure>
                <div class="related-card-container">
                  <div class="inner">
                    <h5 class="related-title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" title="<?php _e(get_the_title(get_the_id()));?>"><?php the_title(); ?></a></h5>
                    <p><?php the_excerpt();?></p>
                    <a class="btn-learn-more" href="<?php echo esc_url(get_permalink(get_the_id()));?>" title="<?php _e(get_the_title(get_the_id()));?>">LEARN MORE ></a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </div>
          <?php else : ?>
          <?php endif; ?>
        </div>
        <aside class="sidebar">
          <?php get_sidebar();?>
        </aside>
      </div>
    </main><!-- .site-main -->
  </div> <!-- content area --> 
<?php get_footer();?>