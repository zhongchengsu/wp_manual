<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package manual
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">  
<div class="top_top">
    <a href="index.php" class="go_back"></a>
</div>
    <!--nav id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'manual' ); ?></button>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
        
        <div class="clear"></div>c
    </nav--><!-- #site-navigation -->
    
<?php
if( of_get_option( 'manual_activate_slider', '0' ) == '1' ) {
	//if ( is_front_page() ) 
    {
?>
		<div class="site-slider"><div class="inner">
<?php
		manual_slider();
?>
		<div class="clear"></div></div></div>
<?php
	}
}
?>

	<div id="content" class="site-content">