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
            $old_height = jQuery('.main-column-right').height();
            $new_height = jQuery('.main-column-left').height();
            jQuery('.main-column-left').css('height',$old_height-30).css('overflow','hidden').css('position', 'relative');
            jQuery('.main-column-left').after('<a href="javascript:void(0);" style="position:absolute;bottom:-10px;left: 25px;width: 50%;" class="more-link-content closed"> Xem thêm >> </a>');
            jQuery('.more-link-content').click(function(){
                var myControl = jQuery(this);
                var container = jQuery('.main-column-left');
                if (myControl.hasClass('closed')) {
                    myControl.html('Thu gọn <<');
                    myControl.removeClass('closed');
                    myControl.addClass('opened');
                    container.attr('style','').animate({'height': $new_height+30}, {duration: '1000'}, 'linear');
                } else {
                    myControl.html('Xem thêm >>');
                    myControl.removeClass('opened');
                    myControl.addClass('closed');
                    container.css('overflow','hidden').css('position', 'relative');
                    container.animate({'height': $old_height-30}, {duration: '1000'}, 'linear');
                }
            });
        }
    }
});
</script>
</body>
</html>