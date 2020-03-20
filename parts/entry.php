<?php
/**
 * Main template for displaying a post within a feed
 *
 * @package kale
 */
?>
<?php

$kale_blog_feed_meta_show = kale_get_option('kale_blog_feed_meta_show');
$kale_blog_feed_date_show = kale_get_option('kale_blog_feed_date_show');
$kale_blog_feed_category_show = kale_get_option('kale_blog_feed_category_show');
$kale_blog_feed_author_show = kale_get_option('kale_blog_feed_author_show');
$kale_blog_feed_comments_show = kale_get_option('kale_blog_feed_comments_show');

$kale_example_content = kale_get_option('kale_example_content');

if($kale_entry == 'small')    { $kale_post_class = 'entry-small'; $kale_image_size = 'kale-thumbnail'; }
if($kale_entry == 'full')    { $kale_post_class = 'entry-full'; $kale_image_size = 'full'; }

#variables passed from calling pages
if(!isset($kale_frontpage_large_post)) $kale_frontpage_large_post = 'no';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('entry ' . $kale_post_class); ?>>
    
    <div class="entry-content">
        
        <div class="entry-thumb">
            <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $kale_image_size, array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></a>
            <?php } else if($kale_example_content == 1) { ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(kale_get_sample($kale_image_size)) ?>" alt="<?php the_title_attribute() ?>" class="img-responsive" /></a>
            <?php } ?>
        </div>

        <div class="entry-custom-meta">
          <span class="person-count">
            <svg  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="icon-user svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>  
            <?php echo get_field('person_count'); ?></span>
          <span class="cooking-time">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" class="icon-clock svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg>
            <?php echo get_field('preparation_time'); ?> min.</span>
          <span class="difficulty-level">
            <svg class="icon-difficulty" width="15px" height="16px" viewBox="0 0 15 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Two-Tone" transform="translate(-343.000000, -1840.000000)">
                        <g id="Device" transform="translate(100.000000, 1650.000000)">
                            <g id="Two-Tone-/-Device-/-signal_cellular_alt" transform="translate(238.000000, 186.000000)">
                                <g>
                                    <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M17,4 L20,4 L20,20 L17,20 L17,4 Z M5,14 L8,14 L8,20 L5,20 L5,14 Z M11,9 L14,9 L14,20 L11,20 L11,9 Z" id="🔹-Primary-Color" fill="#1D1D1D"></path>
                                </g></g></g></g></g>
            </svg>
            <?php echo get_field('difficulty_level'); ?></span>
        </div>
        
        <?php if(get_the_title() != '') { ?>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <?php } else { ?>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Post ID: ', 'kale'); the_ID(); ?></a></h3>
        <?php } ?>
        
        <?php if($kale_entry == 'full' ) { ?>
        <div class="entry-summary"><?php the_content( sprintf( 
        __( 'Continue reading%s', 'kale' ), 
        '<span class="screen-reader-text">  ' . get_the_title() . '</span>' 
    ) ); ?><?php wp_link_pages(); ?></div>
        <?php } else { ?>
        <div class="entry-summary">
          <?php the_excerpt(); ?>
          <?php wp_link_pages(); ?>
        </div>
        <?php } ?>
        
        <?php if($kale_blog_feed_meta_show == 1) { ?>
        <div class="entry-meta">
            <?php 
            $kale_temp = array();
            if($kale_blog_feed_category_show == 1)  $kale_temp[] = '<div class="entry-category">' . get_the_category_list(', '). '</div>';
            if($kale_blog_feed_author_show == 1)    $kale_temp[] = '<div class="entry-author">' . __('by ', 'kale') 
														. '<span class="vcard author"><span class="fn">' 
														. get_the_author() 
														. '</span></span>' 
														. '</div>';
            if($kale_blog_feed_date_show == 1 && $kale_entry == 'vertical')     
                                                    $kale_temp[] = '<br /><div class="entry-date date updated">' . get_the_date() . '</div>';
            if ( ! post_password_required() && comments_open() && $kale_blog_feed_comments_show == 1)  
                                                    $kale_temp[] = '<div class="entry-comments"><a href="'.esc_url(get_comments_link()).'">'. sprintf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'kale' ), number_format_i18n( get_comments_number() ) ) .'</a></div>';
            $kale_str = '';
            if($kale_temp) $kale_str = implode('<span class="sep"> - </span>', $kale_temp);
            echo $kale_str;
            ?>
        </div>
        <?php } ?>
        
    </div>
</div>