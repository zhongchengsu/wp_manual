<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package manual
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		   <?php
		    // values
		         $foot_info = of_get_option('manual_project_foot_info');		//
		         echo $foot_info;
		    ?>			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    
    <div id="back_top"><i class="fa fa-angle-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
