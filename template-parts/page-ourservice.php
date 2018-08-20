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

get_header(); 
$id = get_the_ID();
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
?>
  <div id="primary" class="content-area pagecontainer">
    <main id="main" class="site-main" role="main" style="margin: 3rem 0 0;">
      <div class="banner">
        <div class="container-img">
          <img src="<?php echo $thumb[0];?>" alt="<?php the_title()?>"/>
          <div class="overlay">
            <div class="content">
              <h1 class="title">OUR SERVICE</h1>
              <p>INSTRAT sebagai sebuah lembaga kajian pada isu-isu strategis <br/>sosial, politik, dan humaniora memberikan beberapa jasa layanan kepada mitra<br/>INSTRAT sangat terbuka untuk skema layanan yang ikhlas dan sesuai dengan permintaan mitra</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container-service-portofolio">
      <?php 
            $parent_services = get_page_by_title( 'Service' );
            $serv_args = array( 'post_type' => 'page', 'child_of' => $parent_services->ID, 'posts_per_page' => 8, 'orderby' => 'menu_order', 'order' => 'ASC');
            // the query
            $serv_lists = get_pages($serv_args);
            foreach($serv_lists as $page){  
              $content = $page->post_content;
              if ( ! $content ) // Check for empty page
                continue;

              $content = apply_filters( 'the_excerpt', $content );
              $image =  wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
          ?>
          <div class="cell">
            <img class="container-pict" alt="<?php echo $page->post_title;?>" src="<?php echo $image[0]; ?>"/>
            <div class="doc-icon"><i class="material-icons">sync</i></div>
            <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
            <div class="entry"><?php echo $content; ?></div>
            <div class="learn-more"><a href="<?php echo esc_url(get_permalink($page->ID));?>" title="<?php _e(get_the_title($page->ID));?>">LEARN MORE></a></div>
          </div>
        <?php }?>
      </div>
    </main><!-- .site-main -->
  </div> <!-- content area --> 
<?php get_footer();?>