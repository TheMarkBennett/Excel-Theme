<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<?php the_content(); ?>
			</div>
                <?php get_sidebar(); ?>
		</div>
	</div>
</article>