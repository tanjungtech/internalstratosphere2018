<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri();?>/images/logo.png" width="100px">
						<div style="margin-top: 2rem;">
							<p><?php _e('Indonesia Strategic Institute (INSTRAT) adalah lembaga kajian pada isu-isu strategis, politik dan sosial humaniora. INSTRAT berisikan aktivis, peneliti, dan praktisi lintas bidang yang berkumpul untuk memikirkan dan bertindak bagi Indonesia yang lebih baik.');?></p>
							<p><?php _e('&copy;2018 Indonesia Strategic Institute. All rights reserved.');?></p>
						</div>
					</div>
					<div class="col-md-4">
						<h4 class="footerheaderdefault"><?php _e('Kontak Kami');?></h4>
						<div>
							<?php _e('
								<p>Alamat: Jl. Muararajeun No.10, Kel.Cihaurgeulis Kec. Cibeunying Kaler Kota Bandung 40122</p>
								<p>Telp : 022-87303565<br />Email : info@instrat.or.id </p>
							');?>
						</div>
					</div>
					<div class="col-md-4">
						<div>
							<h4 class="footerheaderdefault"><?php _e('Follow Instrat');?></h4>
							<?php if ( has_nav_menu( 'social' ) ) : ?>
								<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_class'     => 'social-links-menu',
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
											'link_after'     => '</span>',
										) );
									?>
								</nav><!-- .social-navigation -->
							<?php endif; ?>
						</div>
						<div class="footerdivider"></div>
						<div>
							<h4 class="footerheaderdefault"><?php _e('Get Free Consultation');?></h4>
							<div>
								<?php _e('<p>Available 24/7<br />CP : 0812-20631028</p>');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
