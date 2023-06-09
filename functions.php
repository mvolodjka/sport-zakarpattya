<?php

add_theme_support('post-thumbnails');

function enqueue_styles()
{
	wp_register_style('bootstrap-grid-style', get_template_directory_uri() . '/css/bootstrap-grid.min.css', false, '5.0.2');
	wp_enqueue_style('bootstrap-grid-style');

	wp_register_style('main-style', get_template_directory_uri() . '/css/main.css', array('bootstrap-grid-style'), '1.0.0');
	wp_enqueue_style('main-style');
}

add_action('wp_enqueue_scripts', 'enqueue_styles');


wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', false, '3.6.0');
wp_enqueue_script('jquery');

// wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', false, '3.6.0');
// wp_enqueue_script('jquery');

// wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array('jquery'), '5.1.3', true);
// wp_enqueue_script('bootstrap-js');



// add_shortcode('download-file', 'downloadFile');
// function downloadFile($arg)
// {
//     if (is_page()) {
//         if ($arg['href']) {
//             if (!$arg['title']) {
//                 $arg['title'] = 'Download File';
//             }
//             return '<a href="' . $arg['href'] . '" title=\"' . $arg['title'] . '\">' . $arg['title'] . '</a>';
//         }
//     }
// }

add_image_size('70x100', 70, 100, true);


// отключение генерируемых размеров изображений
function shapeSpace_disable_image_sizes($sizes)
{

	// unset($sizes['thumbnail']);    // отключение миниатюр
	unset($sizes['medium']);       // отключение среднего размера
	// unset($sizes['large']);        // отключение большого размера
	unset($sizes['medium_large']); // отключение среднего большого размера
	unset($sizes['1536x1536']);    // отключение 2x среднего большого размера 
	unset($sizes['2048x2048']);    // отключение 2x большого размера	
	return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');

// отключение масштабируемого размера изображений
add_filter('big_image_size_threshold', '__return_false');

// отключение других размеров изображений
function shapeSpace_disable_other_image_sizes()
{

	// remove_image_size('post-thumbnail'); // отключение изображений, добавляемых через set_post_thumbnail_size() 
	remove_image_size('another-size');   // отключение других добавляемых размеров изображений

}
add_action('init', 'shapeSpace_disable_other_image_sizes');



//Добавляєм нові таксономії
add_action('init', 'true_register_taxonomy_sport');
function true_register_taxonomy_sport()
{
	$args = array(
		'labels' => array(
			'name' => 'Види спорту',
			'singular_name' => 'Вид спорту',
			'menu_name' => 'Види спорту'
		),
		'public' => true,
		'hierarchical' => true
	);
	$argsPost = array(
		'post', 'essays', 'products'
	);
	register_taxonomy('sport', $argsPost, $args);
}

add_action('init', 'true_register_taxonomy_year');
function true_register_taxonomy_year()
{
	$args = array(
		'labels' => array(
			'name' => 'Роки',
			'singular_name' => 'Рік',
			'menu_name' => 'Роки'
		),
		'public' => true,
		'hierarchical' => true
	);
	$argsPost = array(
		'post', 'essays', 'products'
	);
	register_taxonomy('year', $argsPost, $args);
}




add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu()
{
	register_nav_menu('main_nav', 'Main Menu');
}


if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'          => "kolonka",
		'id'            => "sidebar-right",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	));
}


//essays //нариси

add_action('init', 'register_post_types');
function register_post_types()
{
	register_post_type('essays', [
		'label'  => null,
		'labels' => [
			'name'               => 'Нариси', // основное название для типа записи
			'singular_name'      => 'Нарис', // название для одной записи этого типа
			'add_new'            => 'Добавити нарис', // для добавления новой записи
			'add_new_item'       => 'Додавання нариса', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування нариса', // для редактирования типа записи
			'new_item'           => 'Новое ____', // текст новой записи
			'view_item'          => 'Дивитись нарис', // для просмотра записи этого типа.
			'search_items'       => 'Шукати нариси', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в смітнику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Нариси', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'author', 'thumbnail', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
}


// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields()
{
	add_meta_box('extra_fields', 'Додаткові поля', 'extra_fields_box_func', 'essays', 'normal', 'high');
}

?>
<?php
// код блока
function extra_fields_box_func($post)
{
?>
<p><label><input type="text" name="extra[first-name]" value="<?php echo get_post_meta($post->ID, 'first-name', 1); ?>"
            style="width:50%" />Ім’я</label></p>
<p><label><input type="text" name="extra[last-name]" value="<?php echo get_post_meta($post->ID, 'last-name', 1); ?>"
            style="width:50%" />Прізвище</label></p>
<p><label><input type="text" name="extra[pseudonym]" value="<?php echo get_post_meta($post->ID, 'pseudonym', 1); ?>"
            style="width:50%" />Псевдонім</label></p>
<p><label><input type="date" name="extra[date_of_birth]"
            value="<?php echo get_post_meta($post->ID, 'date_of_birth', 1); ?>" style="width:50%" />Дата
        народження</label></p>
<p><label><input type="date" name="extra[date_of_death]"
            value="<?php echo get_post_meta($post->ID, 'date_of_death', 1); ?>" style="width:50%" />Дата смерті</label>
</p>
<p><label><input type="text" name="extra[place_of_birth]"
            value="<?php echo get_post_meta($post->ID, 'place_of_birth', 1); ?>" style="width:50%" />Місце
        народження</label></p>
<p><label><input type="text" name="extra[rank]" value="<?php echo get_post_meta($post->ID, 'rank', 1); ?>"
            style="width:50%" />Звання</label></p>

<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}


// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);

## Сохраняем данные, при сохранении поста
function my_extra_fields_update($post_id)
{
	// базовая проверка
	if (
		empty($_POST['extra'])
		|| !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
		|| wp_is_post_autosave($post_id)
		|| wp_is_post_revision($post_id)
	)
		return false;

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('sanitize_text_field', $_POST['extra']); // чистим все данные от пробелов по краям
	foreach ($_POST['extra'] as $key => $value) {
		if (empty($value)) {
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}

	return $post_id;
}

//essays //нариси
//--------------------

//products //продукція
add_action('init', 'register_post_products');
function register_post_products()
{
	register_post_type('products', [
		'label'  => null,
		'labels' => [
			'name'               => 'Продукції', // основное название для типа записи
			'singular_name'      => 'Продукція', // название для одной записи этого типа
			'add_new'            => 'Добавити продукцію', // для добавления новой записи
			'add_new_item'       => 'Додавання продукції', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування продукції', // для редактирования типа записи
			'new_item'           => 'Новое ____', // текст новой записи
			'view_item'          => 'Дивитись продукцію', // для просмотра записи этого типа.
			'search_items'       => 'Шукати продукцію', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в смітнику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Продукція', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'author', 'thumbnail', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
}

//products //продукція 

function essaysData($arr)
{ ?>
<div class="date-of-birth row align-items-center">
    <?php $i = 0;
		foreach ($arr as $key => $data) { ?>
    <?php if (!empty($data['cmd'])) { ?>
    <div class="row <?php if (($i % 2) == 0) {
									echo 'even-row';
								} else {
									echo 'odd-row';
								}
								$i++; ?>">
        <div class="essays-label col-6"><?php echo $data['label']; ?>: </div>
        <div class="essays-data col-6"><?php if (!strtotime($data['cmd'])) {
														echo $data['cmd'];
													} else {
														echo date('d.m.Y', $data['cmd']) . 'р.';
													} ?>
        </div>
    </div>
    <?php }
			?>
    <?php } ?>
</div>
<?php }



//slick
function enqueue_slick_scripts()
{
	wp_register_style('slick', get_template_directory_uri() . '/assets/libs/slick/slick.css', array('bootstrap-grid-style'), '1.8.1');
	wp_enqueue_style('slick');

	wp_register_script('slick-scripts', get_template_directory_uri() . '/assets/libs/slick/slick.min.js', array('jquery'), '3.6.0', true);
	wp_enqueue_script('slick-scripts');
}
add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');

// фотогалерея-слайдер
function gallery_slider($output, $attr)
{
	$ids = explode(',', $attr['ids']);
	$images = get_posts(array(
		'include'        => $ids,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'post__in',
	));
	if ($images) {
		$output = gallery_slider_template($images);
		return $output;
	}
}
add_filter('post_gallery', 'gallery_slider', 10, 2);

function gallery_slider_template($images)
{

	$slick_init = 'jQuery( document ).ready( function ($) {
		$( ".single-item" ).slick( {
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true
		} );
	} );
	';
	wp_add_inline_script('slick-scripts', $slick_init);

	// ob_start();
	// include 'gallery-slider.php';
	// $output = ob_get_clean();
	$output = '<div class="single-item">';
	foreach ($images as $key => $image) {
		$src = wp_get_attachment_url($image->ID); // ссылка на изображение
		$alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true); // атрибут alt
		$title = $image->post_title; // заголовок изображения
		$caption = $image->post_excerpt; // подпись к изображению
		$description = $image->post_content; // описание изображения

		$output .= '<div class="slider slider-' . $key . '"><div class="img-slick"><img src="' . $src . '"alt="' . $alt . '" /></div><div class="caption-slick">' . $caption . '</div></div>';
	}
	$output .= '</div>';
	return $output;
}



function custom_single_template($single_template)
{
	if (in_category('ekskliuzyv')) {
		$single_template = get_template_directory() . '/templates/exclusive-post.php';
	}
	return $single_template;
}
add_filter('single_template', 'custom_single_template');


?>