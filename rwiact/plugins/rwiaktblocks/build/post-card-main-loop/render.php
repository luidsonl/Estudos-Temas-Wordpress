<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<p <?php echo get_block_wrapper_attributes(); ?>>
<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php require RWIAKTBLOCKS_PLUGIN_DIR . '/src/components/dynamic/post-card/post-card.php'; ?>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nenhum post encontrado.', 'rwiaktblocks' ); ?></p>
	<?php endif; ?>
</p>
