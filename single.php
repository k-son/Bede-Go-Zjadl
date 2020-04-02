<?php
/**
 * The template for displaying posts
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php
$kale_posts_meta_show = kale_get_option('kale_posts_meta_show');
$kale_posts_date_show = kale_get_option('kale_posts_date_show');
$kale_posts_category_show = kale_get_option('kale_posts_category_show');
$kale_posts_author_show = kale_get_option('kale_posts_author_show');
$kale_posts_tags_show = kale_get_option('kale_posts_tags_show');
$kale_posts_sidebar = kale_get_option('kale_posts_sidebar');
$kale_posts_featured_image_show = kale_get_option('kale_posts_featured_image_show');
$kale_sidebar_size = kale_get_option('kale_sidebar_size');
$kale_posts_posts_nav_show = kale_get_option('kale_posts_posts_nav_show');

?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- Two Columns -->
<div class="row two-columns">

    <!-- Main Column -->
    <?php if($kale_posts_sidebar == 1) { ?>
    <div class="main-column <?php if($kale_sidebar_size == 0) { ?> col-md-12 <?php } else { ?> col-md-9 <?php } ?>" role="main">
    <?php } else { ?>
    <div class="main-column col-md-12" role="main">
    <?php } ?>
    
        <!-- Post Content -->
        <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post'); ?>>
            
            <div class="entry-header">
				<?php if($kale_posts_meta_show == 1 && $kale_posts_date_show == 1) { ?>
                <div class="entry-meta">
                    <div class="entry-date date updated"><?php the_date(); ?></div>
                </div>
				<?php } ?>
				<div class="clearfix"></div>
            </div>
            
            <div class="entry-custom-meta entry-custom-meta--single-page">
                <?php if (get_field('person_count') != '') { ?>
                    <span class="person-count person-count--single-page" data-toggle="tooltip" data-placement="auto right" title="Tyle osób będzie go zjadł">
                    <svg  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="icon-user icon-user--single-page svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>  
                    <?php echo get_field('person_count'); ?></span>
                <?php }
                if (get_field('preparation_time') != '') { ?>
                    <span class="cooking-time" data-toggle="tooltip" data-placement="auto right" title="Czas potrzebny na przygotowanie potrawy">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" class="icon-clock svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg>
                    <?php echo get_field('preparation_time'); ?> min.</span>
                <?php }
                if (get_field('difficulty_level') != '') { ?>
                    <span class="difficulty-level" data-toggle="tooltip" data-placement="auto right" title="Stopień trudności przepisu">
                    <svg class="icon-difficulty" width="15px" height="16px" viewBox="0 0 15 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Two-Tone" transform="translate(-343.000000, -1840.000000)">
                                <g id="Device" transform="translate(100.000000, 1650.000000)">
                                    <g id="Two-Tone-/-Device-/-signal_cellular_alt" transform="translate(238.000000, 186.000000)">
                                        <g>
                                            <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                            <path class="icon-difficulty__path" d="M17,4 L20,4 L20,20 L17,20 L17,4 Z M5,14 L8,14 L8,20 L5,20 L5,14 Z M11,9 L14,9 L14,20 L11,20 L11,9 Z"></path>
                                        </g></g></g></g></g>
                    </svg>
                    <span class="difficulty-level__text"><?php echo get_field('difficulty_level'); ?></span>
                    </span>
                <?php } ?>
            </div>
            
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php esc_html_e('Post ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?>
                <span class="entry-title__prizes">
                <?php
                    $postterms = wp_get_post_terms( $post->ID, 'ulubione_danie', array('fields' => 'names'));
                    if (in_array("Jacek", $postterms)) { ?>
                        <a href="<?php home_url();?>/ulubione_danie/jacek/"><img src="<?php echo home_url(); ?>/wp-content/uploads/2020/04/prize_jacek.png" alt="Niebieska ikona nagrody" title="Jacek uwielbia"></a>
                    <?php } 
                    if (in_array("Aga", $postterms)) { ?>
                        <a href="<?php home_url();?>/ulubione_danie/aga/"><img src="<?php echo home_url(); ?>/wp-content/uploads/2020/04/prize_aga.png" alt="Czerwona ikona nagrody" title="Aga uwielbia"></a>
                    <?php } 
                ?>
                </span>
            </h1>
            <?php } ?>


            <div class="moje">
              <div class="col-md-8">
                <?php 
                if($kale_posts_featured_image_show == 1) { 
                    if(has_post_thumbnail()) { ?>
                    <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div><?php } 
                } ?>
                
                <div class="single-content"><?php the_content(); wp_link_pages(); ?></div>
              </div>
              <div class="col-md-4">
                <div class="ingredients-list">
                  <?php echo get_field('lista_skladnikow'); ?>
                </div>
              </div>
            </div>
            
            <?php if(  ( $kale_posts_meta_show == 1 && ($kale_posts_category_show == 1 || $kale_posts_tags_show == 1 || $kale_posts_author_show == 1) )  ) { ?>
            <div class="entry-footer">
                <div class="entry-meta">
                    <?php if($kale_posts_author_show == 1) { ?><div class="entry-author"><span><?php esc_html_e('Autor: ', 'kale'); ?></span><span class="vcard author author_name"><span class="fn"><?php the_author_posts_link(); ?></span></span></div><?php } ?>
					<?php if($kale_posts_category_show == 1 && has_category()) { ?><div class="entry-category"><span><?php esc_html_e('Kategoria: ', 'kale'); ?></span><?php the_category(', '); ?></div><?php } ?>
                    <?php if($kale_posts_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><span><?php esc_html_e('Tagi: ', 'kale'); ?></span><?php the_tags('',', '); ?></div><?php } ?>
                </div>
            </div>
            <?php } ?>
            
        
        </div>
        <!-- /Post Content -->
        
        <?php if($kale_posts_posts_nav_show == 1) { ?>
        
        <div class="pagination-post">
            <div class="previous_post"><?php previous_post_link('%link','%title',true); ?></div>
            <div class="next_post"><?php next_post_link('%link','%title',true); ?></div>
        </div>
        <?php } ?>
        
        <!-- Post Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Post Comments -->
        
    </div>
    <!-- /Main Column -->
    

    
</div>
<!-- /Two Columns -->
        
<?php endwhile; ?>
<hr />

<?php get_footer(); ?>