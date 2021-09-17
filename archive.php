<?php
get_header();
?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-9">
                    <h1>Blogg</h1>
                    <?php
                    $paged = get_query_var('paged');
                    $my_category = get_query_var('cat');
                    $wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 1, 'paged' => $paged, 'cat' => $my_category));
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
                                <p><?php the_excerpt(); ?></p>
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
            </div>
        </div>
    </section>
</main>




<?php
get_footer();
?>