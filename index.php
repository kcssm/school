<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package school
 * @since school 1.0
 */
 $theme_options = get_option( 'school_options' );

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php
					$imgcount = 0;
					echo '<div class="slideshow" id="homegallery">';
						echo '<ul>';
					if ( isset( $theme_options[ 'school_home_gallery' ] ) && $theme_options[ 'school_home_gallery' ] != "" ) {						
						$slides = explode( ',', $theme_options[ 'school_home_gallery' ] );	
						
							foreach ( $slides as $image ) {			
								$title = get_post_field( 'post_title', $image );												
								$img = wp_get_attachment_url( $image, '760x300' );
								
								echo '<li>';							
									echo '<img src="'.$img.'" alt="'.$title.'" />';      
								echo '</li>';
							}	
						} 	
						echo '</ul>';	
					echo '</div>';
				?>
		
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>