<div class="exclusive-sidebar">
    <div class="zag-sidebar">Ексклюзив</div>
    <?php
    $args = array(
        'post_type' => 'post',
        "posts_per_page" => 5,
        'cat' => 7
    );
    $my_query = new WP_Query($args);
    $i = 0;
    if ($my_query->have_posts()) {
        while ($my_query->have_posts()) {
            $my_query->the_post();
    ?>
            <?php $i++; ?>
            <a href="<?php the_permalink(); ?>" class="exclusive__link-to-the-post exclusive__link-to-the-post-<?php echo $i; ?>">
                <div class="exclusive__link__img"><?php the_post_thumbnail('70x100'); ?></div>
                <div class="exclusive__link__title"><?php the_title(); ?></div>
            </a>
    <?php
            wp_reset_postdata();
        }
    }
    ?>
</div>