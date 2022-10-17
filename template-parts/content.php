<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moina Wp
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if ( has_post_thumbnail () ): ?>
	    <?php moina_post_thumbnail(); ?>
    <?php endif; ?>
   
    <div class="content-excerpt">
    	<div class="post-date">
		    <?php moina_posted_on(); ?>
		</div>
		<div class="post-title">
		    <?php
				the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			?>
		</div>

		<?php the_excerpt(); ?>
		<div class="post-more">
        	<?php
            echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read More','moina-wp').'</span></a>'; 
            ?>
        </div>
	</div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php moina_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						moina_posted_by();
						moina_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'moina-wp' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moina-wp' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php moina_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>