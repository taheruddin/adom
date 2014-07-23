<?php
/**
 * adom functions and definitions
 *
 * @package adom
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'adom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adom_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on adom, use a find and replace
	 * to change 'adom' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'adom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'adom' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'adom_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // adom_setup
add_action( 'after_setup_theme', 'adom_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function adom_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'adom' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'adom' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'adom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adom_scripts() {
	wp_enqueue_style( 'adom-style', get_stylesheet_uri() );
	
	wp_enqueue_style('font-awesome','http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
    
	wp_enqueue_style('roboto-font','http://fonts.googleapis.com/css?family=Roboto:400,700,300');

	wp_enqueue_script( 'adom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'adom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adom_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




define('THEMEROOT', dirname( __FILE__ ));
/* ************************************************************************* */
/* Embade Redux Framework */
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/reduxcore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/reduxcore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme-config.php' );
}
/* End of - Embade Redux Framework */
/* ************************************************************************* */
/* Stop adding <br /> tag */
remove_filter("the_content", "wpautop");
remove_filter("the_excerpt", "wpautop");
/* End of - Stop adding <br /> tag */
/* ************************************************************************* */
/* Add image support & sizes */
add_theme_support( 'post-thumbnails' );
add_image_size('home-grid', 180, 120, true);
/* End of - Image sizes */
/* ************************************************************************* */
/* ShortCode */
function printStripe( $atts, $content="" ){
	extract($atts);
	ob_start();
	isset($top)? $borderTop = 'border-top:1px solid '.$top.';' : $borderBottom = '';
	isset($bottom)? $borderBottom = 'border-bottom:1px solid '.$bottom.';' : $borderBottom = '';
	?>
	<div class="stripe" style="background:<?php echo $background; ?>; <?php echo $borderTop.$borderBottom; ?>;">
		<div>
	<?php
	echo do_shortcode($content);
	?>
		</div>
	</div>
	<?php 
	return ob_get_clean();
	//return "content = $content";
}
add_shortcode( 'stripe', 'printStripe' );

function printIAmAn( $atts, $content="" ){
	extract($atts);
	ob_start();
	?>
	<div class="iaman">
		<header>
			<div>
				<hr />
				<h2><?php echo $text; ?></h2>
			</div>
		</header>
		<?php echo do_shortcode($content); ?>
	</div>
	<?php 
	return ob_get_clean();
	//return "content = $content";
}
add_shortcode( 'iaman', 'printIAmAn' );

function printIAmAnIndividual( $atts, $content="" ){
	extract($atts);
	ob_start();
	?>
	<div class="type individual">
		<header>
			<h2><?php echo $heading; ?></h2>
			<p><?php echo $description; ?></p>
		</header>
		<div><?php echo $content; ?></div>
		<img class="icon" src="<?php echo $icon; ?>" />
	</div>
	<?php 
	return ob_get_clean();
}
add_shortcode( 'iaman-individual', 'printIAmAnIndividual' );

function printIAmAnEmployer( $atts, $content="" ){
	extract($atts);
	ob_start();
	?>
	<div class="type employer">
		<header>
			<h2><?php echo $heading; ?></h2>
			<p><?php echo $description; ?></p>
		</header>
		<div><?php echo $content; ?></div>
		<img class="icon" src="<?php echo $icon; ?>" />
	</div>
	<?php 
	return ob_get_clean();
}
add_shortcode( 'iaman-employer', 'printIAmAnEmployer' );

function printVerticalInfoBlock( $atts, $content="" ){
	extract($atts);
	ob_start();
	?>
	<a class="vertical-info" href="<?php echo $link; ?>">
		<img class="icon" src="<?php echo $image; ?>" />
		<header>
			<h2><?php echo $heading; ?></h2>
			<!--<p><?php echo $description; ?></p>-->
		</header>
		<div><?php echo $content; ?></div>
	</a>
	<?php 
	return ob_get_clean();
}
add_shortcode( 'vertical-info', 'printVerticalInfoBlock' );

function printFeaturedPostGrid($atts){
	extract($atts);
	ob_start();
	
	$tagFeatured = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4, 'tag' => $tag) );
	while ( $tagFeatured->have_posts() ) : $tagFeatured->the_post();
		get_template_part( 'content', 'grid' );
	endwhile;
	wp_reset_postdata();
	?>
	
	<?php 
	return ob_get_clean();
}
add_shortcode( 'featured-post-grid', 'printFeaturedPostGrid' );
/* End of - ShortCode */







