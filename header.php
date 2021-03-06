<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package school
 * @since school 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php global $theme_options; ?>
<?php if ( isset( $theme_options['favicon'] ) && '' != $theme_options['favicon'] ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url( $theme_options['favicon'] ); ?>" />
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<!-- #masthead .site-header -->
	<section id="wholenav" >
    <div id="datetime">
			<?php 
				$blogtime = current_time('mysql'); 
				list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = split( '([^0-9])', $blogtime );
				echo "<span>Today :</span>".$today_year . "/" . $today_month . "/" . $today_day;
			?>
		</div>
		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'school' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'school' ); ?>"><?php _e( 'Skip to content', 'school' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		<?php get_sidebar(); ?>
	</section>

	<div id="main" class="site-main">
<header id="masthead" class="site-header" role="banner">
		
		<hgroup>			
			<h1 class="site-title">				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if( isset( $theme_options['logo'] ) && '' != $theme_options[ 'logo' ] ) : ?>
						<img class="sitetitle" src="<?php echo esc_url( $theme_options[ 'logo' ] ); ?>" alt="<?php bloginfo( 'name' ); ?>" id="logo-image-home" />
					<?php else : ?>
							<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</a>
			
			</h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
		<div id="search">
			<?php get_search_form(); ?>
		</div>
		
	</header>