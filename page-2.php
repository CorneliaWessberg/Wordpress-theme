<?php 
/*
Template Name: Page two
*/

?>
<?php get_header();?>

<main>
			<section>
				<div class="container">
					<div class="row">
						<div id="primary" class="col-xs-12 col-md-9 col-md-push-3">
							<h1><?php the_title(); ?></h1>
                            <p><?php the_content(); ?></p>
							
						</div>
						<aside id="secondary" class="col-xs-12 col-md-3 col-md-pull-9">
						
						<?php wp_nav_menu( 
							array( 
								'theme_location' => 'new-menu',
								'container' => 'ul',
								'menu_class' => 'side-menu' ) ); 
						?>
						
						</aside>
					</div>
				</div>
			</section>
	</main>

<?php get_footer(); ?>