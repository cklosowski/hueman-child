<?php get_header(); ?>

<section class="content">

	<?php get_template_part('inc/page-title'); ?>

	<div class="pad group">

		<?php while ( have_posts() ): the_post(); ?>
			<article <?php post_class(); ?>>
				<div class="post-inner group">

					<h1 class="post-title"><?php the_title(); ?></h1>
					<p class="post-byline"><?php _e('by','hueman'); ?> <?php the_author_posts_link(); ?> &middot; <?php the_time(get_option('date_format')); ?></p>

					<?php get_template_part('inc/post-formats'); ?>

					<div class="clear"></div>

					<div class="entry <?php if ( ot_get_option('sharrre') != 'off' ) { echo 'share'; }; ?>">
						<div class="entry-inner">
							<?php the_content(); ?>
							<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','hueman'),'after'=>'</div>')); ?>
						</div>
						<?php if ( ot_get_option('sharrre') != 'off' ) { get_template_part('inc/sharrre'); } ?>
						<div class="clear"></div>
					</div><!--/.entry-->

				</div><!--/.post-inner-->
			</article><!--/.post-->
		<?php endwhile; ?>

		<div class="clear"></div>

		<?php the_tags('<p class="post-tags"><span>'.__('Tags:','hueman').'</span> ','','</p>'); ?>

		<?php do_action( 'hueman_after_author_bio' ); ?>

		<?php if ( ( ot_get_option( 'author-bio' ) != 'off' ) && get_the_author_meta( 'description' ) ): ?>
			<div class="author-bio">
				<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
				<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
				<p class="bio-desc"><?php the_author_meta('description'); ?></p>
				<div class="clear"></div>
			</div>
		<?php endif; ?>

		<?php if ( is_single() ): ?>
			<h4 class="heading"><i class="fa fa-history"></i>Other posts from around this time</h4>
			<ul class="post-nav group">
				<?php if ( ! empty( get_next_post_link() ) ) : ?>
					<li class="next">
						<?php next_post_link('%link', '<i class="fa fa-chevron-right"></i><strong>Next Post</strong> <span>%title</span>'); ?>
					</li>
				<?php else: ?>
					<li class="next twitter-follow">
						<a class="twitter-follow-button" onClick="(window.open('https://twitter.com/intent/follow?region=follow_link&screen_name=cklosowski&tw_p=followbutton','','width=800,height=600,scrollbars=no'))" href="#">
							<i class="fa fa-twitter"></i><strong>You're all caught up!</strong> <span>Follow me @cklosowski to get the latest</span>
						</a>
					</li>
				<?php endif; ?>
				<li class="previous"><?php previous_post_link('%link', '<i class="fa fa-chevron-left"></i><strong>Previous Post</strong> <span>%title</span>'); ?></li>
			</ul>
		<?php endif; ?>

		<?php get_template_part('inc/related-posts'); ?>

		<?php comments_template('/comments.php',true); ?>

	</div><!--/.pad-->

</section><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
