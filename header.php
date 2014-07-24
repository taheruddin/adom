<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package adom
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php global $stardev; ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'adom' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home">
				<img src="<?php echo $stardev['logo']['url']; ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
			<div class="hotline">
				<?php echo $stardev['hotline']; ?>
			</div>
			<?php /*?><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2><?php */?>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'adom' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', /*'walker' => new Walker_Mega_Menu()*/ ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div id="content-inner" class="site-content-inner <?php if(is_page_template('wide-layout.php')) echo 'wide'; ?>">
