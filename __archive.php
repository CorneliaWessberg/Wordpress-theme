<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
 
<section id="primary" class="site-content">
<div id="content" role="main">
 
<?php 
// Check if there are any posts to display
$paged = get_query_var('paged');
$my_category = get_query_var('cat');


$wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1, 'paged' => $paged, 'cat' => $my_category));
if ( $wpb_all_query->have_posts() ) : ?>
 
<header class="archive-header">
<h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1>
 
 
<?php
// Display optional category description
 if ( category_description() ) : ?>
<div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
</header>
 
<?php
 
// The Loop
while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
 
<div class="entry">
<?php the_content(); ?>
</div>
 
<?php endwhile; 
 
else: ?>
<p>Sorry, no posts matched your criteria.</p>
 
 
<?php endif; ?>
</div>
</section>
 
 

<?php get_footer(); ?>