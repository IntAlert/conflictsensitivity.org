<?php
/**
 * @package Create
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
        <a href="<?php the_permalink(); ?>" rel="bookmark">
             <?php the_post_thumbnail( 'create-home' ); ?>
        </a>
    </div><!-- .entry-thumbnail -->
    <?php endif; ?>
    
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php create_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	    if ( is_home() || is_archive() ) {		
			echo '<div class="entry-summary">';	        	
	        	the_excerpt();			
			echo '</div><!-- .entry-summary -->';
		} 
		else {
    		echo '<div class="entry-content">'; 
			
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'create' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'create' ),
				'after'  => '</div>',
			) );

			echo '</div><!-- .entry-content -->';
		}
	?>

	<footer class="entry-footer">
		<?php create_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->