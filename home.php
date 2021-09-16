<?php
/*
Template Name: blogg
*/
?>

<?php get_header(); ?>

<main>
	<section>
		<div class="container">
			<div class="row">
				<div id="primary" class="col-xs-12 col-md-9">
					<h1>Blogg</h1>
					<?php
					$paged = get_query_var('paged');
					$wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 1, 'paged' => $paged));
					?>

					<?php if ($wpb_all_query->have_posts()) : ?>
						<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>

							<article>
								<?php the_post_thumbnail() ?>

								<h2 class="title">
									<a href="inlagg.html"><?php the_title(); ?></a>
								</h2>
								<ul class="meta">
									<li>
										<i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
									</li>
									<li>
										<i class="fa fa-user"></i> <a href="forfattare.html"><?php the_author(); ?></a>
									</li>
									<li>
										<i class="fa fa-tag"></i> <a href="kategori.html"><?php the_category(", "); ?></a>
									</li>
								</ul>
								<p><?php the_content(); ?></p>
							</article>
						<?php endwhile; ?>
					<?php else : ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>


					<div class="navigation pagination">
						<?php

						global $wp_query;

						$big = 999999999; // need an unlikely integer

						echo paginate_links(array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'current' => max(1, get_query_var('paged')),
							'total' => $wp_query->max_num_pages,
						));



						?>

					</div>
				</div>

				<aside id="secondary" class="col-xs-12 col-md-3">
					<div id="sidebar">
						<ul>
							<li>
								<?php get_search_form(); ?>
							</li>
						</ul>
						<ul role="navigation">
							<li class="pagenav">
								<h2>Sidor</h2>
								<ul>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'sidebar',
											'menu_class' => 'menu',
										)
									);
									?>
								</ul>
							</li>
							<li>
								<h2>Arkiv</h2>
								<ul>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'archive',
											'menu_class' => 'menu',
										)
									);
									?>
								</ul>
							</li>
							<li class="categories">
								<h2>Kategorier</h2>
								<ul>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'categories',
											'menu_class' => 'menu',
										)
									);
									?>
								</ul>
							</li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>







<?php get_footer(); ?>