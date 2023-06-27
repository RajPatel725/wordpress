<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! hello_get_header_display() ) {
	return;
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
] );
?>

<header class="main-header">
	<div class="container">
		<div class="header-inner">
			<div class="left-wrap">
				<div class="logo-wrap">
                <?php the_custom_logo(); ?>
				</div>
			</div>
			<div class="right-wrap">
				<div class="site-nav">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
							)
						);
					?>
				</div>
				<div class="icons-nav">
					<ul>
						<li>
							<a href="#">
								<svg focusable="false" class="svg-account" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.6 15.4l-3.3-1.5c1.1-.9 1.8-2.3 1.8-3.9 0-2.8-2.3-5.1-5.1-5.1S5.9 7.2 5.9 10c0 1.6.7 3 1.8 3.9l-3.3 1.5c-.3.2-.5.4-.8.6-.9-1.4-1.5-3.2-1.5-5 0-4.9 4-8.9 8.9-8.9s8.9 4 8.9 8.9c0 1.8-.6 3.6-1.5 5-.3-.2-.5-.4-.8-.6zM4.9 16.5L9 14.7c.6.2 1.3.4 2 .4s1.4-.2 2-.4l4.1 1.8c.2.1.4.3.5.4-1.6 1.9-4 3-6.6 3-2.6 0-5-1.1-6.6-3 .1-.1.3-.3.5-.4zM7.1 10c0-2.2 1.7-3.9 3.9-3.9s3.9 1.7 3.9 3.9-1.7 3.9-3.9 3.9-3.9-1.7-3.9-3.9zM11 .9C5.4.9.9 5.4.9 11S5.4 21.1 11 21.1 21.1 16.6 21.1 11 16.6.9 11 .9z"></path></svg>
							</a>
						</li>
						<li>
							<a href="#">
								<svg focusable="false" class="svg-shopping-bag" aria-hidden="true" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 11-8 0"></path></svg>
							</a>
						</li>
						<li>
							<a href="#" class="open-search-btn">
								<svg focusable="false" class="nav-icons v-image v-search" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.924 20.076l-3.788-3.788a8.1 8.1 0 10-.848.848l3.788 3.788a.6.6 0 00.848-.848zM17.9 11a6.9 6.9 0 11-13.8 0 6.9 6.9 0 0113.8 0z"></path></svg>
							</a>
						</li>
					</ul>
				</div>
				<div class="mobile-menu">
					<a href="#" class="mobile-menu-toggle"><i class="fa-solid fa-bars"></i></a>
				</div>
				<div class="site-search">
					<svg focusable="false" class="search-icon" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.924 20.076l-3.788-3.788a8.1 8.1 0 10-.848.848l3.788 3.788a.6.6 0 00.848-.848zM17.9 11a6.9 6.9 0 11-13.8 0 6.9 6.9 0 0113.8 0z"></path></svg>
					<?php echo get_search_form(); ?>
					<a href="#" class="close-search"><i class="fa-solid fa-xmark"></i></a>
				</div>
			</div>
		</div>
	</div>
</header>

<?php
if(get_field('hero_image')):
    $bg_image = get_field('hero_image')['url'];
else:
    $bg_image = get_site_url().'/wp-content/uploads/2023/03/Home-Banner-1.webp';
endif;
?>

<div class="page-banner" style="background-image: url(<?php echo $bg_image; ?>)">
    <div class="container">
        <div class="page-banner-content">
            <?php if(get_field('page_main_title')): ?>
                <h1><?php echo get_field('page_main_title'); ?></h1>
            <?php else: ?>
                <h1><?php the_title(); ?></h1>
            <?php endif; ?>
        </div>
    </div>
</div>