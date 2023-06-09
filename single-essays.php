<?php get_header(); ?>

<article id="post-<?php the_ID();?>" class="post post-<?php the_ID();?>">
    <h1 class="title-post title-eassay"><?php the_title(); ?></h1>
    <div class="data-essays row align-items-center">
        <div class="col-md-3">
            <figure class="m-0">
                <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'thumbnail' );?>"
                    alt="<?php echo get_post_meta($post->ID, 'first-name', 1).' '.get_post_meta($post->ID, 'last-name', 1);?>"
                    title="<?php echo get_post_meta($post->ID, 'first-name', 1).' '.get_post_meta($post->ID, 'last-name', 1);?>">
            </figure>
        </div>
        <div class="offset-md-1 col-md-6">
        <? $arr =  array(
                   array('label' => 'Ім’я', 'cmd' => get_post_meta($post->ID, 'first-name', 1)),
                   array('label' => 'Прізвище', 'cmd' => get_post_meta($post->ID, 'last-name', 1)),
                   array('label' => 'Псевдонім', 'cmd' => get_post_meta($post->ID, 'pseudonym', 1)),
                   array('label' => 'Дата народження', 'cmd' => get_post_meta($post->ID, 'date_of_birth', 1)),
                   array('label' => 'Дата смерті', 'cmd' => get_post_meta($post->ID, 'date_of_death', 1)),
                   array('label' => 'Місце народження', 'cmd' =>  get_post_meta($post->ID, 'place_of_birth', 1)),
                   array('label' => 'Звання', 'cmd' =>  get_post_meta($post->ID, 'rank', 1)),
                );
               essaysData($arr); ?>

        </div>

    </div>
    <div class="content content-<?php the_ID();?>"><?php the_content();?></div>


</article>
<?php get_footer(); ?>