<?php
/**
* The template for displaying the footer
*
* @package kale
*/
?>

        <?php if(is_front_page() && !is_paged() ) { 
            get_template_part('parts/frontpage', 'large'); 
        } ?>

        <?php get_sidebar('footer'); ?>
        
        <!-- Footer -->
        <div class="footer" role="contentinfo">
            
            <?php if ( is_active_sidebar( 'footer-row-3-center' ) ) { ?>
            <div class="footer-row-3-center"><?php dynamic_sidebar( 'footer-row-3-center' ); ?>
            <?php } ?>
            
            <?php $kale_footer_copyright = kale_get_option('kale_footer_copyright'); ?>
            <?php if($kale_footer_copyright) { ?>
            <div class="footer-copyright">Copyright &copy; <?php echo date('Y'); ?></div>
            <?php } ?>
            
            <div class="footer-copyright">
                <ul class="credit">
                    <li><a href="https://www.lyrathemes.com/kale/"><?php esc_html_e('Kale', 'kale'); ?></a> <?php esc_html_e('by LyraThemes.com', 'kale'); ?></a> zmodyfikowany przez <a href="https://k-son.eu" target="_blank">K-SON</a>.</li>
                </ul>
            </div>

            <div class="footer-contact">
                Kontakt: <a href="https://k-son.eu" target="_blank">K-SON</a>
            </div>
            
        </div>
        <!-- /Footer -->
        
    </div><!-- /Container -->
</div><!-- /Main Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
