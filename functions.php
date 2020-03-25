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

/*
function bedegozjadl_files() {
  wp_enqueue_style('custom_google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'bedegozjadl_files');
*/


#get_the_archive_title
/* Code from the parent theme
 Customization: "Search results" changed to "Szukana fraza" */
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


/* Code from the parent theme
 Customization: Add submit button and classes to form element */
function kale_get_nav_search_item(){
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