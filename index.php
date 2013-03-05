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
								$img = wp_get_attachment_image( $image, '700x300' );
								
								echo '<li>';							
									echo $img;      
								echo '</li>';
							}	
						} 	
						echo '</ul>';	
					echo '</div>';
				?>
				
				<?php if ( ! dynamic_sidebar( 'homepage-1' ) ) {
				
				echo "<h2>ABOUT JSB SCHOOL</h2><p>
Open daily from 9.00am to 10.00 pm April to August. 10.00am to 6.00pm September to March. From September to November. Open daily from 9.00am to 10.00 pm April to August. 10.00am to 6.00pm September to March. From September to November. Open daily from 9.00am to 10.00 pm April to August. 10.00am to 6.00pm September to March. From September to November. Open

Open daily from 9.00am to 10.00 pm April to August. 10.00am to 6.00pm September to March. From September to November. Open daily from 9.00am to 10.00 pm April to August. 10.00am to 6.00pm September to March. From September to November. Open daily from 9.00am to 10.00 pm April to August. 10.00am to 6.00pm September to March. From September to November. Open</p>";
				
				}
				?>
				
				<div class="app">
					<?php
					//$gpp = get_option('gpp_options');
					//$slider_cat_ID = $gpp['gpp_slider_posts_cat'];
					$slider_cat_ID = "";
					//$slider_cat = get_cat_name($slider_cat_ID);
					?>
						 <div class="lnav"><span id="next2">Next</span></div>
                         <div class="rnav"><span id="prev2">Prev</span></div>

						<?php $slider_posts_query = new WP_Query("cat=$slider_cat_ID");
							$total_post = $slider_posts_query->found_posts;
						?>	
						<div id="slider-posts">
							<?php 
							$i = 0;
							if ($slider_posts_query->have_posts()): while ($slider_posts_query->have_posts()) : $slider_posts_query->the_post(); ?>
								
									<?php if( $i%4 == 0 ) { ?>
									<div class="sliderblock">
									<?php  } $i++; ?>
									<div class="slide">
										<div class="slide-thumbnail">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
										</div>
										<div class="slide-details">
											<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
											<div class="description">
												<h2 class="left"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>" class="button"><?php _e('more..','gpp_i18n'); ?></a></h2>
											</div>
										</div>
									</div>
									<?php if( $i%4 == 0 || $i == $total_post ) { ?>	
									</div>
									<?php  } ?>									
								
							<?php endwhile; endif; wp_reset_query(); ?>
						</div>
					</div>
				
				
				
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>