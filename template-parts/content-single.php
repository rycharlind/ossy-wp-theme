<?php
/**
 *    The template for displaying the single content.
 *
 * @package    WordPress
 * @subpackage ossy
 */

$jumbotron_single_image  = get_theme_mod( 'ossy_jumbotron_enable_featured_image', true );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<h2 class="blog-post-title"><?php the_title(); ?></h2>
	<?php if ( has_post_thumbnail() && $jumbotron_single_image != true ) { ?>
		<div class="blog-post-image">
			<?php the_post_thumbnail( 'ossy-blog-list' ); ?>
		</div><!--/.blog-post-image-->
	<?php } ?>

	<?php do_action( 'ossy_single_entry_meta' ); ?>
	<div class="blog-post-entry markup-format">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="link-pages">' . __( 'Pages:', 'ossy' ),
			'after'  => '</div><!--/.link-pages-->',
		) );
		?>
	</div><!--/.blog-post-entry.markup-format-->
	<?php do_action( 'ossy_single_after_content' ); ?>
	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
</article><!--/#post-<?php the_ID(); ?>.blog-post-->