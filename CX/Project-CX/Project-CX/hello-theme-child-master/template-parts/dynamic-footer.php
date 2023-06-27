<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( hello_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>

<footer class="main-footer">
	<div class="footer-top">
		<div class="container">
			<div class="footer-top--inner">
				<div class="footer-top-left col">
					<?php if(get_field('footer_logo', 'option')): ?>
						<div class="footer-logo">
							<a href="<?php echo get_site_url(); ?>">
								<img src="<?php echo get_field('footer_logo', 'option')['url']; ?>" alt="<?php echo get_field('footer_logo', 'option')['title']; ?>">
							</a>
						</div>
					<?php endif; ?>
					<div class="footer-social">
						<?php if( have_rows('social_links', 'option') ): ?>
							<ul>
								<?php while( have_rows('social_links', 'option') ): the_row(); ?>
									<li><a href="<?php echo get_sub_field('link', 'option'); ?>"><?php echo get_sub_field('icon_tag', 'option'); ?></a></li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				<div class="footer-top-right col">
					<div class="footer-links">
						<h3 class="footer-title"><?php echo 'About'; ?></h3>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-about',
									'fallback_cb'    => false,
								)
							);
						?>
					</div>
					<div class="footer-links big">
						<h3 class="footer-title"><?php echo 'Catalog'; ?></h3>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-catalog',
									'fallback_cb'    => false,
								)
							);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom--inner">
				<?php if(get_field('copyright_text', 'option')): ?>
					<p class="copyright-text"><?php echo get_field('copyright_text', 'option'); ?></p>
				<?php endif; ?>
				<div class="privacy-links">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-policy',
								'fallback_cb'    => false,
							)
						);
					?>
				</div>
			</div>
		</div>
	</div>
</footer>
