<?php 
get_header();
?>

<head>
<?php wp_head();?>
</head>

<main>
			<section>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="hero">
                            <img src="<?php bloginfo('template_directory');?>/img/img/city.jpg" alt="city"/>
								<div class="text">
								<h1><?php the_title(); ?></h1>
                                <p><?php the_content(); ?></p>
                                
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>


<?php
get_footer();
?>
