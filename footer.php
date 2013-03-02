<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package albedo
 * @since albedo 1.0
 */
?>
    <!-- BeginFooter -->
	</div><!-- #main -->
	</div><!-- #page .hfeed .site -->
    </div> <!-- end wrapper -->

	<div id="footer-wrap">
    <div class="footer-mid">

	<footer id="colophon" class="site-footer container" role="contentinfo">
        <?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
            <div id="footer-widgets" <?php albedo_footer_widget_class(); ?>>
                <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                    <aside id="widget-1" class="widget-1">
                        <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                    </aside>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                    <aside id="widget-2" class="widget-2">
                        <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                    </aside>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                    <aside id="widget-3" class="widget-3">
                        <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                    </aside>
                <?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                    <aside id="widget-4" class="widget4">
                        <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                    </aside>
                <?php endif; ?>
            </div><!-- end #footer-widgets -->
        <?php endif; // end check if any footer widgets are active ?>

		<div class="site-info">
			<?php do_action( 'albedo_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'albedo' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', 'albedo' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'albedo' ), '<a href="http://graphpaperpress.com/themes/albedo/" title="Albedo WordPress Theme">School</a>', '<a href="http://wpslick.com/" rel="designer">WPslick</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
    
    </div> <!-- end footert-mid -->
	</div><!-- #footer-wrap -->
    
    
    <!-- EndFooter -->

<?php wp_footer(); ?>

</body>
</html>