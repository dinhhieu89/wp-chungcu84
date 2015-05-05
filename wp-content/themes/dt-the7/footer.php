<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the <div class="wf-container wf-clearfix"> and all content after
 *
 * @package vogue
 * @since 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$config = Presscore_Config::get_instance();

if ( presscore_is_content_visible() ): ?>

			</div><!-- .wf-container -->
		</div><!-- .wf-wrap -->
	</div><!-- #main -->

	<?php
	if ( $config->get( 'template.footer.background.slideout_mode' ) ) {
		echo '</div>';
	}

	do_action( 'presscore_after_main_container' );
	?>

<?php endif; // presscore_is_content_visible ?>

	<a href="#" class="scroll-top"></a>

</div><!-- #page -->
<?php wp_footer(); ?>
<script>
jQuery(document).ready(function(){
    //Custom content Homepage
    if (jQuery('body').hasClass('home')) {
        if (jQuery('.main-column-left').height() > (jQuery('.main-column-right').height() + 50)) {
            $old_height = jQuery('.main-column-left .expand-container').height();
            $new_height = jQuery('.main-column-right').height() - jQuery('.main-column-left .vc_custom_heading').first().height() - jQuery('.main-column-left .wpb_single_image').first().height();
            jQuery('.main-column-left .expand-container').css('height',$new_height-60).css('overflow','hidden');
            jQuery('.main-column-left .expand-container .wpb_wrapper').css('height',$new_height-60).css('overflow','hidden');
            jQuery('.main-column-left .expand-container').after('<a href="javascript:void(0);" style="width" class="more-link-content closed"> Xem thêm >> </a>');
            jQuery('.more-link-content').click(function(){
                var myControl = jQuery(this);
                var container = jQuery('.main-column-left .expand-container');
                var content = jQuery('.main-column-left .expand-container .wpb_wrapper');
                if (myControl.hasClass('closed')) {
					myControl.html('Thu gọn <<');
                    myControl.removeClass('closed');
                    myControl.addClass('opened');
                    myControl.css('padding-top','0px');
                    container.attr('style','').animate({'height': $old_height}, {duration: '1000'}, 'linear');
                    content.attr('style','').animate({'height': $old_height}, {duration: '1000'}, 'linear');
                } else {
					myControl.html('Xem thêm >>');
                    myControl.removeClass('opened');
                    myControl.addClass('closed');
                    myControl.css('padding-top','18px');
                    container.css('overflow','hidden');
                    content.css('overflow','hidden');
                    container.animate({'height': $new_height-60}, {duration: '1000'}, 'linear');
                    content.animate({'height': $new_height-60}, {duration: '1000'}, 'linear');
                }
            });
        }
    }
});
</script>
</body>
</html>