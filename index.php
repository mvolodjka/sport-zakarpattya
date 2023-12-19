<?php get_header(); ?>
<main class="container news-home">
    <div class="row news-home">
        <div class="col-md-4">
            <?php
            $args = array(
                'post_type' => 'post', // Встановлюємо тип запису як "звичайний пост"
                'category_name' => 'novyna', // Встановлюємо категорію як "novyna"
                'posts_per_page' => 3
            );
            $posts_query = new WP_Query($args);
            if ($posts_query->have_posts()) {
                while ($posts_query->have_posts()) {
                    $posts_query->the_post();
            ?>
                    <a href="<?php the_permalink(); ?>" class="news__link-to-the-post exclusive__link-to-the-post-<?php echo $i; ?>">
                        <div class="news__link__img"><?php the_post_thumbnail('70x100'); ?></div>
                        <div class="news__link__title"><?php the_title(); ?></div>
                    </a>
            <?php
                    // Тут ви можете вивести вміст кожного запису
                }
                wp_reset_postdata();
            } else {
                // Якщо немає записів, то тут ви можете вивести повідомлення про відсутність записів
            }
            ?>
        </div>
        <div class="col-md-8"></div>
    </div>
</main>
<div class="container d-flex">
    <main id="site-content">
        <section class="section">
            <?php
            $args = array(
                'post_type' => 'essays',
                "posts_per_page" => 6
            );
            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) { ?>
                <div class="row essays-all-home">
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <div class="col-md-4 p-2">
                            <div class="row align-items-center essays-home m-0">
                                <div class="col-5 essays-foto p-0">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" alt="<?php echo get_post_meta($post->ID, 'first-name', 1) . ' ' . get_post_meta($post->ID, 'last-name', 1); ?>" title="<?php echo get_post_meta($post->ID, 'first-name', 1) . ' ' . get_post_meta($post->ID, 'last-name', 1); ?>">
                                    </a>
                                </div>
                                <div class="col-7 essays-name">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php echo get_post_meta($post->ID, 'first-name', 1) . '<br>' . get_post_meta($post->ID, 'last-name', 1) . '<br>' . get_post_meta($post->ID, 'date_of_birth', 1); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php } ?>
        </section>
    </main>
    <?php get_template_part('sidebar'); ?>
</div><!-- #site-content -->
<?php get_footer(); ?>