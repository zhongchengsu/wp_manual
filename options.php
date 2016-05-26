<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'manual_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'manual'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'manual' ),
		'two' => __( 'Two', 'manual' ),
		'three' => __( 'Three', 'manual' ),
		'four' => __( 'Four', 'manual' ),
		'five' => __( 'Five', 'manual' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'manual' ),
		'two' => __( 'Pancake', 'manual' ),
		'three' => __( 'Omelette', 'manual' ),
		'four' => __( 'Crepe', 'manual' ),
		'five' => __( 'Waffle', 'manual' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( '页眉页脚', 'manual' ),
		'type' => 'heading'
	);

	// Header Logo upload option
	/*$options[] = array(
		'name'  => __( 'Header Logo', 'manual' ),
		'desc' => __( 'Upload logo for your header.', 'manual' ),
		'id' => 'manual_header_logo_image',
		'type' => 'upload'
	);

	// Header logo and text display type option
	$header_display_array = array(
		'logo_only' => __( 'Header Logo Only', 'manual' ),
		'text_only' => __( 'Header Text Only', 'manual' ),
		'both' => __( 'Show Both', 'manual' ),
		'none' => __( 'Disable', 'manual' )
	);
	$options[] = array(
		'name' => __( 'Show', 'manual' ),
		'desc' => __( 'Choose the option that you want.', 'manual' ),
		'id' => 'manual_show_header_logo_text',
		'std' => 'text_only',
		'type' => 'radio',
		'options' => $header_display_array 
	);
	$options[] = array(
		'name' => __( 'Header Icon and Size', 'manual' ),
		'desc' => __( 'Example:"<strong>fa-3x fa-h-square</strong>". All icons list http://fortawesome.github.io/Font-Awesome/icons/#search', 'manual' ),
		'id' => 'manual_header_text_icon',
		'std' 	=> 'fa-3x fa-h-square',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Adress', 'manual' ),
		'id' => 'manual_header_adress',
		'std' 	=> '77 Massachusetts Ave, Cambridge, MA, USA',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Mail', 'manual' ),
		'desc' => __( 'Link or mail', 'manual' ),
		'id' => 'manual_header_mail',
		'std' 	=> 'info@example.com',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Phone', 'manual' ),
		'id' => 'manual_header_phone',
		'std' 	=> '+1 617-253-1000',
		'type' 	=> 'text'
	);*/

	$options[] = array(
		'name' => __( 'footter info', 'manual' ),
		'id' => 'manual_project_foot_info',
		'std' 	=> 'footer info',
		'type' 	=> 'text'
	);

	/*************************************************************************/
	/*
	$options[] = array(
		'name' => __( 'Design', 'manual' ),
		'type' => 'heading'
	);
	// Site primary color option
	$options[] = array(
		'name' 		=> __( 'Primary color option', 'manual' ),
		'desc' 		=> __( 'This will reflect in links, buttons and many others. Choose a color to match your site.', 'manual' ),
		'id' 			=> 'manual_primary_color',
		'std' 		=> '#ff8800',
		'type' 		=> 'color' 
	);
	*/
	/*************************************************************************/
/*
	$options[] = array(
		'name' => __( 'Additional', 'manual' ),
		'type' => 'heading'
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'manual' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'manual' ),
		'id' 			=> 'manual_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Fav icon upload option
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'manual' ),
		'desc' 	=> __( 'Upload favicon for your site.', 'manual' ),
		'id' 		=> 'manual_favicon',
		'type' 	=> 'upload'
	);
	
	*/
	/*************************************************************************/

	$options[] = array(
		'name' => __( '广告滑动栏', 'manual' ),
		'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'manual' ),
		'desc' 		=> __( 'Check to activate slider.', 'manual' ),
		'id' 			=> 'manual_activate_slider',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);

	// Slide options
	$def_image = 1;
	for( $i=1; $i<=4; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'manual' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'manual' ),
			'id' 		=> 'manual_slider_image'.$i,
			'std' 	=> $imagepath."slider$def_image.jpg",
			'type' 	=> 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter title for your slider.', 'manual' ),
			'id' 		=> 'manual_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter your slider description.', 'manual' ),
			'id' 		=> 'manual_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect slider when clicked', 'manual' ),
			'id' 		=> 'manual_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$def_image ++;
		if ($def_image>4) $def_image = 1;
	}

	/*************************************************************************/

	$options[] = array(
		'name' => __( '菜单数量', 'manual' ),
		'type' => 'heading'
	);

	$scarr = array();
	for( $i=1; $i<=256; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
		'name' => __('最大滚筒菜单数量','manual'),
		'desc' => __('How many drum manual. (Set and click SAVE)', 'manual'),
		'id' => 'manual_drum_count',
		'std' => '1',
 		'type' => 'select',
		'options' => $scarr
	);
	$options[] = array(
		'name' => __('最大波轮菜单数量','manual'),
		'desc' => __('How many pulsator manual. (Set and click SAVE)', 'manual'),
		'id' => 'manual_pulsator_count',
		'std' => '1',
 		'type' => 'select',
		'options' => $scarr
	);
	$options[] = array(
		'name' => __('最大干衣机菜单数量','manual'),
		'desc' => __('How many dry manual. (Set and click SAVE)', 'manual'),
		'id' => 'manual_dry_count',
		'std' => '1',
 		'type' => 'select',
		'options' => $scarr
	);

	/*************************************************************************/
/*
	$options[] = array(
		'name' => __( '滚筒', 'manual' ),
		'type' => 'heading'
	);

	$scarr = array();
	for( $i=1; $i<=256; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of drum manual','manual'),
        'desc' => __('How many drum manual. (Set and click SAVE)', 'manual'),
        'id' => 'manual_drum_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// drum options
	$drum_count = of_get_option( 'manual_drum_count', 4 );
	for( $i=1; $i<=$drum_count; $i++) {
		$options[] = array(
			'name'  => __( '滚筒配网手册', 'manual' ). ' #'.$i,
			'desc' 	=> __( 'Drum  name', 'manual' ),
			'id' 	=> 'manual_drum_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect Drum manual when clicked', 'manual' ),
			'id' 	=> 'manual_drum_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}
*/
	/*************************************************************************/
/*
	$options[] = array(
		'name' => __( '波轮', 'manual' ),
		'type' => 'heading'
	);

	$scarr = array();
	for( $i=1; $i<=256; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of pulsator manual','manual'),
        'desc' => __('How many pulsator manual. (Set and click SAVE)', 'manual'),
        'id' => 'manual_pulsator_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// pulsator options
	$pulsator_count = of_get_option( 'manual_pulsator_count', 4 );
	for( $i=1; $i<=$pulsator_count; $i++) {
		$options[] = array(
			'name'  => __( '波轮配网手册', 'manual' ). ' #'.$i,
			'desc' 	=> __( 'pulsator  name', 'manual' ),
			'id' 	=> 'manual_pulsator_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect pulsator manual when clicked', 'manual' ),
			'id' 	=> 'manual_pulsator_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}
*/
	/*************************************************************************/
/*
	$options[] = array(
		'name' => __( '干衣机', 'manual' ),
		'type' => 'heading'
	);

	$scarr = array();
	for( $i=1; $i<=256; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of dry manual','manual'),
        'desc' => __('How many dry manual. (Set and click SAVE)', 'manual'),
        'id' => 'manual_dry_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// dry options
	$dry_count = of_get_option( 'manual_dry_count', 4 );
	for( $i=1; $i<=$dry_count; $i++) {
		$options[] = array(
			'name'  => __( '干衣机配网手册', 'manual' ). ' #'.$i,
			'desc' 	=> __( 'dry  name', 'manual' ),
			'id' 	=> 'manual_dry_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect dry manual when clicked', 'manual' ),
			'id' 	=> 'manual_dry_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}
	*/
	/*************************************************************************/

	$options[] = array(
		'name' => __( '品类', 'manual' ),
		'type' => 'heading'
	);

	// activate option
	$options[] = array(
		'name' 		=> __( 'Activate projects', 'manual' ),
		'desc' 		=> __( 'Check to activate projects.', 'manual' ),
		'id' 			=> 'manual_activate_projects',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);
	$options[] = array(
		'name' => __('Main Project','manual'),
		'desc' 	=> __( 'Title', 'manual' ),
		'id' 		=> 'manual_main_project_title',
		'std' 	=> "manual Portfolio Projects",
		'type' 	=> 'text'
	);
	$options[] = array(
		'desc' 	=> __( 'Description', 'manual' ),
		'id' 		=> 'manual_main_project_desc',
		'std' 	=> 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.',
		'type' 	=> 'textarea'
	);	
	
	//
	$scarr = array();
	for( $i=1; $i<=16; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of projects','manual'),
        'desc' => __('How many projects is the homepage. (Set and click SAVE)', 'manual'),
        'id' => 'manual_projects_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// Services options
	$rand_titles = array("Heart Disease","Eye manual","Pregnancy","Diabetes","Medical Treatments","Cardio Monitoring","Emergency Help","Medical Guidance");
	//
	$services_count = of_get_option( 'manual_services_count', 4 );
	for( $i=1; $i<=$services_count; $i++) {
		$options[] = array(
			'name'  => __( 'Service', 'manual' ). ' #'.$i,
			'desc' => __( 'Image', 'manual' ). ' #'.$i.' (270x160px)',
			'id' => 'manual_project_image'.$i,
			'std' 	=> $imagepath.'240x140.png',
			'type' => 'upload'
		);
		shuffle($rand_titles);
		$options[] = array(
			'desc' 	=> __( 'Title', 'manual' ),
			'id' 		=> 'manual_project_title'.$i,
			'std' 	=> $rand_titles[0],
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Description', 'manual' ),
			'id' 		=> 'manual_project_desc'.$i,
			'std' 	=> 'Lorem ipsum dolor sit amet, consectetur adipricies sem Cras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis ',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect project when clicked', 'manual' ),
			'id' 		=> 'manual_project_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}

/////	
	
	return $options;
}

?>
