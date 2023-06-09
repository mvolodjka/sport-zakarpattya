<?php get_header(); ?>

<article id="post-<?php the_ID();?>" class="post post-<?php the_ID();?>">
    <h1 class="title-post title-eassay"><?php the_title(); ?></h1>
    <!-- <div class="data-essays row align-items-center">
        <div class="col-md-3">
            <figure class="m-0">
                <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'thumbnail' );?>"
                    alt="<?php echo get_post_meta($post->ID, 'first-name', 1).' '.get_post_meta($post->ID, 'last-name', 1);?>"
                    title="<?php echo get_post_meta($post->ID, 'first-name', 1).' '.get_post_meta($post->ID, 'last-name', 1);?>">
            </figure>
        </div>


    </div> -->
    <div class="content content-<?php the_ID();?>"><?php the_content();?></div>


</article>
<script>
    const foto = document.querySelectorAll('.size-large');
    console.log(foto);
    if (foto){
    foto.forEach(element =>{
        // element.addEventListener('click', () => (
        //     console.log('kurva')

        // ));

        element.onclick = ()=>{
            element.classList.add('pop-up-img')
        }

    })
}
</script>
<?php get_footer(); ?>