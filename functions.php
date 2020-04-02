<?php

function theme_enqueue_styles() {

  wp_enqueue_script('main-js', get_theme_file_uri('./js/scripts.js'), NULL, microtime(), true);

  $parent_style = 'parent-style';

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array( $parent_style )
  );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); 



/* Overriding pluggable function */
/* Customization: 'Search results' changed to 'Szukana fraza' */
function kale_archive_title( $title ) {
  if( is_home() && get_option('page_for_posts') ) {
      $title = get_page( get_option('page_for_posts') )->post_title;
  }
  else if( is_home() ) {
      $title = kale_get_option('kale_blog_feed_label');
      $title = esc_html($title);
  }
  else if ( is_search() ) {
      $title = esc_html__('Szukana fraza: ', 'kale') . get_search_query();
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'kale_archive_title' );




/* Overriding pluggable function */
/* Customization: Add submit button and classes to form element */
function kale_get_nav_search_item() {
  return '<li class="search">
      <a href="javascript:;" id="toggle-main_search" data-toggle="dropdown"><i class="fa fa-search"></i></a>
      <div class="dropdown-menu main_search">
          <form class="search-form" name="main_search" method="get" action="'.esc_url(home_url( '/' )).'">
              <input autocomplete="off" type="text" name="s" class="search-form__text-input" placeholder="'. esc_attr(__('Wpisz szukane hasło','kale')).'" />
              <input class="search-form__submit-btn" type="submit" value="Szukaj">
          </form>
      </div>
  </li>';
}


/* New Taxonomy - favourite dish */

function custom_taxonomy_ulubione_dania() {
	// Add Class taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Ulubione_danie', 'taxonomy general name' ),
		'singular_name'     => _x( 'Ulubione danie', 'taxonomy singular name' ),
		'search_items'      => __( 'Szukaj Ulubionych dań' ),
		'all_items'         => __( 'Wszystkie Ulubione dania' ),
		'parent_item'       => __( 'Ulubione danie - kat. nadrzędna' ),
		'parent_item_colon' => __( 'Ulubione danie - kat. nadrzędna:' ),
		'edit_item'         => __( 'Edytuj Ulubione danie' ),
		'update_item'       => __( 'Zaktualizuj Ulubione danie' ),
		'add_new_item'      => __( 'Dodaj nowe Ulubione danie' ),
		'new_item_name'     => __( 'Nowa nazwa Ulubione danie' ),
		'menu_name'         => __( 'Ulubione danie' ),
	);

    register_taxonomy( 'ulubione_danie', array('post'), array(
        'show_in_rest'      => true,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'ulubione_danie' ),
	));
}

add_action( 'init', 'custom_taxonomy_ulubione_dania', 0 );