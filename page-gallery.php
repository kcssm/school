<?php
/*
Template Name: Gallery
*/
get_header(); ?>

<section id="primary" class="clearfix site-content">

    <?php
        global $paged, $theme_options;

        $args = array(
				'post_type'	=> 'post',
				'paged' => $paged,
				'tax_query' => array(
								array(
								  'taxonomy' => 'post_format',
								  'field' => 'slug',
								  'terms' => array('post-format-gallery')
								)
							  )
			);		
		
			$wp_query = new WP_Query( $args );

        ?>
        <div id="content" role="main">
			<div id="content-inner">

			<?php if ( have_posts() ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php $do_not_duplicate = $post->ID; ?>
					<div id="album">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'auditorium' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					
					
						<?php if( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								  the_post_thumbnail();
								} 
						?>
					</div>
					
                <?php endwhile; ?>
				<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'auditorium' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'auditorium' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</div><!-- .content -->
		<?php //auditorium_content_nav( 'nav-below' ); ?>
    </div><!-- .inner -->
</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>