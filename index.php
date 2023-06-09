<?php get_header(); ?>


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
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>"
                        alt="<?php echo get_post_meta($post->ID, 'first-name', 1) . ' ' . get_post_meta($post->ID, 'last-name', 1); ?>"
                        title="<?php echo get_post_meta($post->ID, 'first-name', 1) . ' ' . get_post_meta($post->ID, 'last-name', 1); ?>">
                </a>
            </div>
            <div class="col-7 essays-name">
                <a href="<?php echo get_permalink(); ?>">
                    <?php echo get_post_meta($post->ID, 'first-name', 1) . '<br>' . get_post_meta($post->ID, 'last-name', 1).'<br>'.get_post_meta($post->ID, 'date_of_birth', 1); ?>
                </a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php } ?>
<?php get_footer(); ?>