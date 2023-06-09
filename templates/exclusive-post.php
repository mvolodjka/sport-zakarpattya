<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" class="post post-<?php the_ID(); ?>">
    <h1 class="title-post title-eassay"><?php the_title(); ?></h1>
    <figure class=" exclusive-post-img">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>"
            alt="<?php echo get_post_meta($post->ID, 'first-name', 1) . ' ' . get_post_meta($post->ID, 'last-name', 1); ?>"
            title="<?php echo get_post_meta($post->ID, 'first-name', 1) . ' ' . get_post_meta($post->ID, 'last-name', 1); ?>">
    </figure>
    <div class="content content-<?php the_ID(); ?>"><?php the_content(); ?></div>


</article>
<?php get_footer(); ?>