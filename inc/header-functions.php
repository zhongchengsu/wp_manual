<?php
if ( ! function_exists( 'manual_slider' ) ) :
/**
 * display featured post slider
 */
function manual_slider() { ?>
	<div class="slider-wrap">
		<div class="slider-cycle">
			<?php
			for( $i = 1; $i <= 4; $i++ ) {
				$manual_slider_title = of_get_option( 'manual_slider_title'.$i , '' );
				$manual_slider_text = of_get_option( 'manual_slider_text'.$i , '' );
				$manual_slider_image = of_get_option( 'manual_slider_image'.$i , '' );
				$manual_slider_link = of_get_option( 'manual_slider_link'.$i , '#' );

				if( !empty( $manual_slider_image ) ) {
					if ( $i == 1 ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
					?>
					<section id="featured-slider" class="<?php echo $classes; ?>">
						<figure class="slider-image-wrap">
							<a href="<?php echo $manual_slider_link; ?>">
								<img alt="<?php echo esc_attr( $manual_slider_title ); ?>" src="<?php echo esc_url( $manual_slider_image ); ?>">
							</a>
					    </figure>
					    <?php if( !empty( $manual_slider_title ) || !empty( $manual_slider_text ) ) { ?>
						    <article id="slider-text-box">
					    		<div class="inner-wrap">
						    		<div class="slider-text-wrap">
						    			<?php if( !empty( $manual_slider_title )  ) { ?>
							     			<span id="slider-title" class="clearfix"><a title="<?php echo esc_attr( $manual_slider_title ); ?>" href="<?php echo esc_url( $manual_slider_link ); ?>"><?php echo esc_html( $manual_slider_title ); ?></a></span>
							     		<?php } ?>
							     		<?php if( !empty( $manual_slider_text )  ) { ?>
							     			<span id="slider-content"><?php echo esc_html( $manual_slider_text ); ?></span>
							     		<?php } ?>

							     	</div>
							</div>
							</article>
						<?php } ?>
					</section><!-- .featured-slider -->
				<?php
				}
			}
			?>
		</div>
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers -->
		<!--a class="pre_btn" id="slider-pre-btn" href="javascript:;">上一张</a>
		<a class="next_btn" id="slider-next-btn" href="javascript:;">下一张</a-->
	</div><!-- .slider-cycle -->
<?php
}
endif;

?>