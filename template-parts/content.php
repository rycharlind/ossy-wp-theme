<?php
/**
 *    The template for dispalying the content.
 *
 * @package    WordPress
 * @subpackage ossy
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-post-title"><?php the_title(); ?></a>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="blog-post-image">
			<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'ossy-blog-list' ); ?></a>
		</div><!--/.blog-post-image-->
	<?php endif; ?>
	<?php do_action( 'ossy_archive_meta_content' ); ?>
	<div class="blog-post-entry">
		<?php the_excerpt(); ?>
	</div><!--/.blog-post-entry-->
	<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'ossy' ); ?>" class="blog-post-button"><?php _e( 'Read more', 'ossy' ); ?></a>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->