<?php
/*
Template Name: Blog
*/
get_header(); ?>

<section id="primary" class="clearfix site-content">

    <?php
        global $paged, $theme_options;

        $args = array(
					'post_type'	=> 'post',
					'paged' => $paged,
					'cat' => $theme_options[ 'blog' ]
				);
				$wp_query = new WP_Query( $args );

        ?>
        <div id="content" role="main">
			<div id="content-inner">

			<?php if ( have_posts() ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php $do_not_duplicate = $post->ID; ?>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'auditorium' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					</header>
					<?php the_excerpt(); ?>
					<footer class="entry-meta">
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'auditorium' ) );
								if ( $categories_list ) :
							?>
							<span class="cat-links">
								<?php __( 'Posted on ', 'auditorium' ); ?>
								<?php printf( __( ' in %1$s', 'auditorium' ), $categories_list ); ?>
							</span>
							<?php endif; // End if categories ?>

							<?php
								/* translators: used between list items, there is a space after the comma */
								$tags_list = get_the_tag_list( '', __( ', ', 'auditorium' ) );
								if ( $tags_list ) :
							?>
							<span class="sep"> &ndash; </span>
							<span class="tag-links">
								<?php printf( __( 'Tagged %1$s', 'auditorium' ), $tags_list ); ?>
							</span>
							<?php endif; // End if $tags_list ?>
						<?php endif; // End if 'post' == get_post_type() ?>

						<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
						<span class="sep"> &ndash; </span>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'auditorium' ), __( '1 Comment', 'auditorium' ), __( '% Comments', 'auditorium' ) ); ?></span>
						<?php endif; ?>

						<?php edit_post_link( __( 'Edit', 'auditorium' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
					</footer><!-- #entry-meta -->
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