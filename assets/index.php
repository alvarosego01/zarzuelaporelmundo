<?php 


function estilosAdicionales(){

    wp_enqueue_style('indexStilos', get_template_directory_uri() . '/../betheme-child/assets/css/zarzuelaEstilos.css', array(), rand(), 'all'); // Enqueue it!
 
}add_action('wp_enqueue_scripts', 'estilosAdicionales'); // Add Theme Stylesheet

// // Adicionales javascript
function scriptsAdicionales(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('scriptsAdicionales', get_template_directory_uri() . '/../betheme-child/assets/js/final/funciones.js', array('jquery'), rand(), 'all'); // Enqueue it!
	 
	$admin= admin_url( 'admin-ajax.php' );

  wp_localize_script(
    'scriptsAdicionales',
    's',
    array(
        'ajaxurl' => $admin
     ));

}add_action('wp_enqueue_scripts', 'scriptsAdicionales'); // Add Theme Stylesheet

 
// function adminAdicionales(){
// wp_enqueue_script('jquery'); // Enqueue it!

//   wp_enqueue_script( 'jquery-ui-datepicker' );

//     // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
//     wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
//     wp_enqueue_style( 'jquery-ui' );  

//   wp_register_script('admin-script', get_template_directory_uri() . '/../betheme-child/assets/adminJs/final/adminfunciones.js', array('jquery'),rand(),'all'); // Custom scripts
//   wp_enqueue_script('admin-script'); // Enqueue it!

//   wp_register_style('admin-style', get_template_directory_uri() .  '/../betheme-child/assets/css/admin-styles.css', array(), rand(), 'all');
//   wp_enqueue_style('admin-style'); // Enqueue it!

// 	 $admin= admin_url( 'admin-ajax.php' );

//   wp_localize_script(
//     'admin-script',
//     'admin',
//     array(
//         'ajaxurl' => $admin
//      ));

// }add_action( 'admin_enqueue_scripts','adminAdicionales' );

// MODIFICACIONES Y ADICIONES



// estilos para la parte administrativa.

// function admin_styles(){
// wp_enqueue_script('jquery'); // Enqueue it!

//   wp_register_script('admin-script', get_template_directory_uri() . '/../betheme-child/assets/js/scripts-admin.js', array('jquery')); // Custom scripts
//   wp_enqueue_script('admin-script'); // Enqueue it!

//   wp_register_style('admin-style', get_template_directory_uri() . '/../betheme-child/assets/css/admin-styles.css', array(), rand(), 'all');
//   wp_enqueue_style('admin-style'); // Enqueue it!

// }add_action( 'admin_enqueue_scripts','admin_styles' );
// // paginacion endogena


//paginacion endogena
function paginate($reload, $page, $tpages, $adjacents) {

	$prevlabel = '<i class="fa fa-chevron-left" aria-hidden="true"> < </i>';
	$nextlabel = '<i class="fa fa-chevron-right" aria-hidden="true"> > </i>';
	$out = '<ul  class="pagination no-margin pagination-large">';

	// previous label

	if($page==1) {
		$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
	} else if($page==2) {
		$out.= "<li><span><a href='javascript:void(0);' onclick=load(1,'" .$reload."')>$prevlabel</a></span></li>";
	}else {
		$out.= "<li><span><a href='javascript:void(0);' onclick=load(".($page-1).",'" .$reload."')>$prevlabel</a></span></li>";

	}

	// first label
	if($page>($adjacents+1)) {
		$out.= "<li><a href='javascript:void(0);' onclick=load(1,'" .$reload."')>1</a></li>";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a>...</a></li>";
	}

	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='active'><a>$i</a></li>";
		}else if($i==1) {
			$out.= "<li><a href='javascript:void(0);' onclick=load(1,'" .$reload."')>$i</a></li>";
		}else {
			$out.= "<li><a href='javascript:void(0);' onclick=load(".$i.",'" .$reload."')>$i</a></li>";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= "<li><a href='javascript:void(0);' onclick=load($tpages,'" .$reload."')>$tpages</a></li>";
	}

	// next

	if($page<$tpages) {
		$out.= "<li><span><a href='javascript:void(0);' onclick=load(".($page+1).",'" .$reload."')>$nextlabel</a></span></li>";
	}else {
		$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
	}

	$out.= "</ul>";
	return $out;
}


/*Custom Post type start*/
function propuestasPostType() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	// 'comments', // post comments
	// 'revisions', // post revisions
	'post-formats', // post formats
	'page-attributes'
	);
	$labels = array(
	'name' => _x('Propuesta', 'plural'),
	'singular_name' => _x('Propuestas', 'singular'),
	'menu_name' => _x('Propuestas', 'admin menu'),
	'name_admin_bar' => _x('Propuestas', 'admin bar'),
	'add_new' => _x('Añadir propuesta', 'add new'),
	'add_new_item' => __('Añadir nueva propuesta'),
	'new_item' => __('Nueva propuesta'),
	'edit_item' => __('Editar propuesta'),
	'view_item' => __('Ver propuesta'),
	'all_items' => __('Todas las propuestas'),
	'search_items' => __('Buscar'),
	'not_found' => __('No hay resultados.'),
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'propuestas'),
	'has_archive' => true,
	'hierarchical' => true,
	);
	register_post_type('propuestasPostType', $args);
	}
add_action('init', 'propuestasPostType');



function propuestas( $atts = array() ) {
	extract( shortcode_atts( array(
  ), $atts ) );

  if($atts['parametro'] == 'titulo'){
	return esc_html( get_the_title() );
  }
  
  }add_shortcode( 'getpropuestas', 'propuestas' );
  
	

 


?>