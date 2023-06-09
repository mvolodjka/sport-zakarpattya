<div class="exclusive-sidebar">
    <div class="zag-zidebar">Ексклюзив</div>
    <?php 
    $args = array(
        'post_type' => 'post',
        "posts_per_page" => 5,
        'tax_query' => array(
			array(
				'cat' => 7
			)
        )
    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) { ?>
    <?php } ?>
</div>