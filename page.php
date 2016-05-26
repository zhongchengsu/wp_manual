<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package manual
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		          <header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
			<?php 
				$title = wp_title("", false); 
				if (strstr($title,"滚筒配网") == "滚筒配网") //滚筒配网
				{
					$count = of_get_option( 'manual_drum_count', 4 );
					/*
					for( $i=1; $i<=$count; $i++) {
						$title = esc_attr(of_get_option('manual_drum_title'.$i));
						$link = esc_url(of_get_option('manual_drum_link'.$i ));
					?>
					<a class="hot_but" href="<?php echo $link; ?>"><?php echo $title; ?></a>
					<?php
					}
					*/
					$query = new WP_Query();
					$query->query("category_name='滚筒'&showposts=$count");
					global $post;
					if ( $query->have_posts() ) 
					{
						while ( $query->have_posts() ) : 
							$query->the_post();
							?>
							<a class="hot_but" href="<?php echo (get_permalink($post->ID)); ?>"><?php echo (get_the_title($post->ID)); ?></a>
							<?php
						endwhile;
					}
				}
				else if (strstr($title,"干衣机配网") == "干衣机配网" )
				{
					//echo '干衣机';
					$count = of_get_option( 'manual_dry_count', 4 );
					/*for( $i=1; $i<=$count; $i++) {
						$title = esc_attr(of_get_option('manual_dry_title'.$i));
						$link = esc_url(of_get_option('manual_dry_link'.$i ));
					?>
					<a class="hot_but" href="<?php echo $link; ?>"><?php echo $title; ?></a>
					<?php
					}*/
					$query = new WP_Query();
					$query->query("category_name='干衣机'&showposts=$count");
					global $post;
					if ( $query->have_posts() ) 
					{
						while ( $query->have_posts() ) : 
							$query->the_post();
							?>
							<a class="hot_but" href="<?php echo (get_permalink($post->ID)); ?>"><?php echo (get_the_title($post->ID)); ?></a>
							<?php
						endwhile;
					}
				}
				else if (strstr($title,"波轮配网") == "波轮配网")
				{
					//echo '波轮';
					$count = of_get_option( 'manual_pulsator_count', 4 );
					/*for( $i=1; $i<=$count; $i++) {
						$title = esc_attr(of_get_option('manual_pulsator_title'.$i));
						$link = esc_url(of_get_option('manual_pulsator_link'.$i ));
					?>
					<a class="hot_but" href="<?php echo $link; ?>"><?php echo $title; ?></a>
					<?php
					}*/
					$query = new WP_Query();
					$query->query("category_name='波轮'&showposts=$count");
					global $post;
					if ( $query->have_posts() ) 
					{
						while ( $query->have_posts() ) : 
							$query->the_post();
							?>
							<a class="hot_but" href="<?php echo (get_permalink($post->ID)); ?>"><?php echo (get_the_title($post->ID)); ?></a>
							<?php
						endwhile;
					}
				}
			?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
