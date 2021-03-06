<?php
/**
 * The loop / blog feed
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
$kale_blog_feed_post_format = kale_get_option('kale_blog_feed_post_format');
$kale_sidebar_size = kale_get_option('kale_sidebar_size');
?>

<!-- Main Column -->
<div class="main-column <?php if($kale_sidebar_size == 0) { ?> col-md-12 <?php } else { ?> col-md-9 <?php } ?>" role="main">
    <!-- Blog Feed -->
    <div class="blog-feed">
        <h2><?php echo get_the_archive_title(); ?></h2>
        
        <div class="blog-feed-posts">
        
        <?php
        $kale_i = 1; $kale_ad = 0; $kale_flag = true; $kale_div_open = 0;
        if ( have_posts() ) { 
            while ( have_posts() ) : the_post(); 
            
                 if($kale_blog_feed_post_format) {
                    if($kale_i%3 == 1) { $kale_div_open = 1; ?><div class="row"><?php } ?>
                    <div class="col-sm-4"><?php $kale_entry = 'small'; include(locate_template('parts/entry.php')); $kale_i++; ?></div>
                    <?php if($kale_i%3 == 1) { ?></div><?php $kale_div_open = 0;} ?><?php 
                }
                 $kale_flag = true;
            endwhile;
        } else { ?><div class="blog-feed-empty"><p><?php esc_html_e('Nie znaleziono pasujących wpisów.', 'kale'); ?></p></div><?php } ?>
        </div>
        <?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
        <div class="pagination-blog-feed">
            <?php if( get_next_posts_link() ) { ?><div class="previous_posts"><?php next_posts_link( esc_html__('Starsze wpisy', 'kale') ); ?></div><?php } ?>
            <?php if( get_previous_posts_link() ) { ?><div class="next_posts"><?php previous_posts_link( esc_html__('Nowsze wpisy', 'kale') ); ?></div><?php } ?>
        </div>
        <?php } ?>
    </div>
    <!-- /Blog Feed -->
</div>
<!-- /Main Column -->