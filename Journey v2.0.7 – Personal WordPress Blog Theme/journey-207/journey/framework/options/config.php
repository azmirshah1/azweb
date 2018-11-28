<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "ilgelo_options";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = get_template_directory_uri().'/framework/options/sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Indie Panel', 'redux-framework-demo' ),
        'page_title'           => __( 'Indie Panel', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.


        'menu_icon' => get_template_directory_uri().'/framework/options/custom/images/logo_panel.png', // Specify a custom URL to an icon



        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
         'footer_credit'     => false,                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'http://www.indieground.it/',
        'title' => 'Visit our site',
        'icon'  => 'el el-icon-shopping-cart'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/indieground',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/theindieground',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.behance.net/indieground',
        'title' => 'Find us on behance',
        'icon'  => 'el el-behance'
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *    Redux::setSection( $opt_name, array(
)
     */







/* ===================================================================
   GENERAL SETTINGS
   ===================================================================*/

			Redux::setSection( $opt_name, array(
                    'title'  => __( 'Basic Settings', 'ilgelo' ),
                    'icon'   => 'el-icon-cog',
                    'fields' => array(


                   array(
                        'id' => 'ilgelo-icon-favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('FAVICON', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload the icon of your website.', 'ilgelo'),
                        'default' => array('url' => ''),
                        ),



/* Top Botton */


                         array(
                            'id'       => 'top-botton',
                            'type'     => 'switch',
                            'title'    => __( 'BACK TO TOP BUTTON?', 'ilgelo' ),
                            'subtitle' => __( 'Display the "Back to Top" button on the right site of the page.', 'ilgelo' ),
	                        "default" => 1,
                        ),



  array(
                        'id' => 'ilgelo-sticky-sider',
                        'type' => 'switch',
                        'title' => __('Activate sticky sider ?', 'ilgelo'),
                        'subtitle' => __('Enable/Disable sticky sider bar', 'ilgelo'),
                        "default" => 1,
                    ),



                        )
                    )
                );



/* ===================================================================
   HEADER
   ===================================================================*/

			Redux::setSection( $opt_name, array(
                    'title'  => __( 'Header Settings', 'ilgelo' ),
                    'icon'   => 'el-icon-home',
                    'fields' => array(




/*  Background image - video - parallax - color   */


				array(
                    'id' => 'ilgelo-header-style',
				    'type'     => 'button_set',
                        'title' => __('HEADER BACKGROUND IMAGE', 'ilgelo'),
                        'subtitle' => __('Select one of these 4 options for your blogs header background', 'ilgelo'),
					    'multi'    => false,
					    'options' => array(
					        '1' => 'Fixed Image Background',
					        '2' => 'Color Background',
					        '3' => 'Video Background',
					        '4' => 'Parallax Image Background',
					        '5' => 'Responsive Image Background'

					     ),
					    'default' => '1',
				),

/*  If Fixed Image Background = 1  */


				array(
                        'id' => 'ilgelo-fixed-image',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '1'),
                        'url' => true,
                        'title' => __('Image Upload', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload an image for your background.', 'ilgelo'),
                        'default' => array('url' => ''),

                      ),

				array(
                        'id'       => 'ilgelo-color-fixed-mask',
                        'type'     => 'color',
                        'required' => array('ilgelo-header-style', '=', '1'),
                        'title'    => __( 'Overlay Opacity Mask Color', 'ilgelo' ),
                        'subtitle' => __( 'Select a color for the opacity filter mask that will overlay the background image, otherwise choose "Transparent" to turn off this effect.', 'ilgelo' ),
                        'default'  => '#e2ae69',
                        'validate' => 'color',
                        'force_output' => 'false',
                        ),

				array(
                        'id' => 'ilgelo-fixed-opacity-mask',
                        'type' => 'text',
                        'required' => array('ilgelo-header-style', '=', '1'),
                        'title' => __('Overlay Opacity Mask Value', 'Ilgelo'),
                        'subtitle' => __('Enter a number between 0.0 and 1.0 to set the opacity mask intensity', 'Ilgelo'),
                        'default' => '0.1',
                    ),


/*  If Color Background = 2  */
				array(
                            'id'       => 'ilgelo-bg-logo',
                            'type'     => 'color',
                            'required' => array('ilgelo-header-style', '=', '2'),
                            'title'    => __( 'Background Color', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color', 'ilgelo' ),
                            'default'  => '#fff',
                            'validate' => 'color',
                            //'force_output' => 'false',
                        ),



/*  If Parallax Video Background = 3  */





				array(
                        'id' => 'ilgelo-video-bg-height',
                        'type'          => 'slider',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'title' => __('height video background', 'ilgelo'),
                        'subtitle' => __('Specify the height of the video background. Enter only number value.', 'ilgelo'),
                        'desc'          => __('width: Min: 0, max: 500, step: 1, default value: 400', 'ilgelo'),
                        'default'       => 400,
                        'min'           => 100,
                        'step'          => 1,
                        'max'           => 500,
                        'display_value' => 'text'
                    ),


				array(
                        'id' => 'ilgelo-video-mp4',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'url' => true,
                        'title' => __('Mp4 Video Upload ', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload a valid Mp4 format video. Maximum size 1 Mb.', 'ilgelo'),
                        'default' => array('url' => ''),
                        'mode' => false,

                      ),

				array(
                        'id' => 'ilgelo-video-webm',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'url' => true,
                        'title' => __('Webm Video Upload', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload a valid Webm format video. Maximum size 1 Mb.', 'ilgelo'),
                        'default' => array('url' => ''),
                        'mode' => false,
                      ),

				array(
                        'id' => 'ilgelo-video-ogv',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'url' => true,
                        'title' => __('OGV Video Upload', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload a valid Ogv format video. Maximum size 1 Mb.', 'ilgelo'),
                        'default' => array('url' => ''),
                        'mode' => false,
                      ),

				array(
                        'id' => 'ilgelo-video-image',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'url' => true,
                        'title' => __('Image Video Preview', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload an image to display as substitute of the video background  if it loads slower ', 'ilgelo'),
                        'default' => array('url' => ''),

                      ),

				array(
                        'id'       => 'ilgelo-color-video-mask',
                        'type'     => 'color',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'title'    => __( 'Overlay Opacity Mask Color', 'ilgelo' ),
                        'subtitle' => __( 'Select a color for the opacity filter mask that will overlay the background  video, otherwise choose "Transparent" to turn off this effect.', 'ilgelo' ),
                        'default'  => '#333',
                        'validate' => 'color',
                        ),

				array(
                        'id' => 'ilgelo-opacity-video-mask',
                        'type' => 'text',
                        'required' => array('ilgelo-header-style', '=', '3'),
                        'title' => __('Overlay Opacity Mask Value', 'Ilgelo'),
                        'subtitle' => __('Enter a number between 0.0 and 1.0 to set the opacity mask intensity', 'Ilgelo'),
                        'default' => '0.5',
                    ),






/*  If Parallax Image Background = 4   */

				array(
                        'id' => 'ilgelo-parallax-image',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '4'),
                        'url' => true,
                        'title' => __('Parallax Image Upload', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload an image for your background. Recommended size 1600x900 px.', 'ilgelo'),
                        'default' => array('url' => ''),
                      ),
				array(
                        'id'       => 'ilgelo-color-parallax-mask',
                        'type'     => 'color',
                        'required' => array('ilgelo-header-style', '=', '4'),
                        'title'    => __( 'Overlay Opacity Mask Color ', 'ilgelo' ),
                        'subtitle' => __( 'Select a color for the opacity filter mask that will overlay the background image, otherwise choose "Transparent" to turn off this effect.', 'ilgelo' ),
                        'default'  => '#333',
                        'validate' => 'color',
                        ),
				array(
                        'id' => 'ilgelo-opacity-mask',
                        'type' => 'text',
                        'required' => array('ilgelo-header-style', '=', '4'),
                        'title' => __('Overlay Opacity Mask Value', 'Ilgelo'),
                        'subtitle' => __('Enter a number between 0.0 and 1.0 to set the opacity mask intensity', 'Ilgelo'),
                        'default' => '0.5',
                    ),



/*  If Responsive Image Background = 5  */


	array(
                        'id' => 'ilgelo-responsive-image-bg',
                        'type' => 'media',
                        'required' => array('ilgelo-header-style', '=', '5'),
                        'url' => true,
                        'title' => __('Responsive Image Upload - without logo', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload an image for your background. Recommended size 1600x900 px.', 'ilgelo'),
                        'default' => array('url' => ''),
                      ),















/*  Logo    */

                    array(

                             'id' => 'ilgelo-logo-activate',
					    'type'     => 'button_set',
					    'title'    => __('HEADER LOGO', 'ilgelo'),
                        'subtitle' => __('Select one of these 3 options for your site logo that will be displayed  over the header background. You can choose to upload your own logo image, display a plain text title or leave it blank, ', 'ilgelo'),
					    'multi'    => false,
					    'options' => array(
					        '1' => 'Image Logo ',
					        '2' => 'Text Logo',
					        '3' => 'No Logo'
					     ),
					    'default' => '2',
				),




/*  If Image Logo    */


                    array(
                        'id' => 'ilgelo-logo-head-retina',
                        'type' => 'media',
                        'required' => array('ilgelo-logo-activate', '=', '1'),
                        'url' => true,
                        'title' => __('Retina Logo Image Upload', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload a Retina-friendly logo, in order to be correctly displayed on Retina Devices. Please note the logo must be twice of the normal size (Example: if you want to show a 60x60 px logo on the website, the size of the image must be 120x120 px).', 'ilgelo'),
                        'default' => array('url' => ''),
                         ),

                    array(
                        'id' => 'ilgelo-logo-head-size-width',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '1'),

                        'title' => __('Logo Width', 'ilgelo'),
                        'subtitle' => __('Specify the width of the logo. Enter only number value.', 'ilgelo'),
                        'desc'          => __('width: Min: 0, max: 1200, step: 1, default value: 250', 'ilgelo'),
                        'default'       => 250,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 1200,
                        'display_value' => 'text'
                    ),

                    array(
                        'id' => 'ilgelo-logo-head-size-height',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '1'),

                        'title' => __('Logo Height', 'ilgelo'),
                        'subtitle' => __('Specify the height of the logo. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 500, step: 1, default value: 70', 'ilgelo'),
                        'default'       => 70,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 500,
                        'display_value' => 'text'
                    ),

                   array(
                        'id' => 'ilgelo-logo-head-margin-top',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '1'),

                        'title' => __('Logo margin top', 'ilgelo'),
                        'subtitle' => __('Specify the margin on top the logo. This will also establish the height of the headers background image. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 100, step: 1, default value: 10', 'ilgelo'),
                        'default'       => 70,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 200,
                        'display_value' => 'text'
                    ),

                   array(
                        'id' => 'ilgelo-logo-head-margin-bottom',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '1'),

                        'title' => __('Logo margin Bottom', 'ilgelo'),
                        'subtitle' => __('Specify the margin below the logo. This will also establish the height of the headers background image. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 100, step: 1, default value: 10', 'ilgelo'),
                        'default'       => 70,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 200,
                        'display_value' => 'text'
                    ),




/*  If text Logo    */


                    array(
                        'id' => 'ilgelo-text-head-margin-top',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '2'),

                        'title' => __('Logo Margin Top', 'ilgelo'),
                        'subtitle' => __('Specify the margin on top the text logo. This will also establish the height of the headers background image. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 100, step: 1, default value: 10', 'ilgelo'),
                        'default'       => 85,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 200,
                        'display_value' => 'text'
                    ),

                   array(
                        'id' => 'ilgelo-text-head-margin-bottom',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '2'),

                        'title' => __('Logo Margin Bottom', 'ilgelo'),
                        'subtitle' => __('Specify the margin below the text logo. This will also establish the height of the headers background image. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 100, step: 1, default value: 10', 'ilgelo'),
                        'default'       => 59,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 200,
                        'display_value' => 'text'
                    ),




/*  No Logo   */



                   array(
                        'id' => 'ilgelo-no-logo-header',
                        'type' => 'slider',
                        'required' => array('ilgelo-logo-activate', '=', '3'),

                        'title' => __('Header Background Image Height', 'ilgelo'),
                        'subtitle' => __('Establish the height of the header background image. Enter only number value.', 'redux-framework-demo.', 'ilgelo'),
                        'default'       => 200,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 1000,
                        'display_value' => 'text'
                    ),




/*  Top Menu   */



				array(
                        'id' => 'ilgelo-activate-top-menu',
                        'type' => 'switch',
                        'title' => __('HEADER TOP MENU', 'ilgelo'),
                        'subtitle' => __('Enable a navigation bar on top of the page', 'ilgelo'),

                        "default" => 1,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                      ),



				array(
                        'id' => 'ilgelo-layout-top-menu',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => __('Header Top Menu Layout', 'ilgelo'),
                        'subtitle' => __('Select the navigation bar layout you want to use', 'ilgelo'),
                        'required' => array('ilgelo-activate-top-menu', '=', '1'),

                        'options' => array(
                        '1' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_1.jpg'),
                        '2' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_2.jpg'),
                        '3' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_5.jpg'),
                        '4' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_4.jpg'),
                        '5' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_3.jpg'),
                        '6' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/scrollmenu2.jpg'),

                        ),
                        'default' => '1'
                    ),




/*   Bottom Menu   */





				array(
                        'id' => 'ilgelo-activate-bottom-menu',
                        'type' => 'switch',
                        'title' => __('HEADER BOTTOM MENU', 'ilgelo'),
                        'subtitle' => __('Enable a navigation bar under the header background', 'ilgelo'),

                        "default" => 0,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                      ),



				array(
                        'id' => 'ilgelo-layout-bottom-menu',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => __('Header Bottom Menu Layout', 'ilgelo'),
                        'subtitle' => __('Select the navigation bar layout you want to use.', 'ilgelo'),
                        'required' => array('ilgelo-activate-bottom-menu', '=', '1'),
                        'options' => array(
                        '1' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_1.jpg'),
                        '2' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_2.jpg'),
                        '3' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_5.jpg'),
                        '4' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_4.jpg'),
                        '5' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/header_style_3.jpg'),
                        '6' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/scrollmenu2.jpg'),


                        ),
                        'default' => '1'
                    ),











            /*  Mini navigation  */


				array(
                        'id' => 'ilgelo-activate-menu-scroll-layout',
                        'type' => 'switch',
                        'title' => __('SCROLL MENU', 'ilgelo'),
                        'subtitle' => __('Select a navigation bar that will appear when you scroll the page', 'ilgelo'),

                        "default" => 1,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                      ),



				array(
                        'id' => 'ilgelo-layout-menu-scroll-layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => __('Scroll Menu Layout', 'ilgelo'),
                        'subtitle' => __('Select the navigation bar layout you want to use.', 'ilgelo'),
                        'required' => array('ilgelo-activate-menu-scroll-layout', '=', '1'),
                        'options' => array(
                        '1' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/scrollmenu1.jpg'),
                        '2' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/scrollmenu2.jpg'),

                        ),
                        'default' => '1'
                    ),



  /*  Logo Mini navigation  */
                    array(
                        'id' => 'ilgelo-logo-mininavigation',
                        'type' => 'switch',
                        'title' => __('Display Scroll Menu Logo', 'ilgelo'),
                        'subtitle' => __('Upload a logo image to be displayed on the scroll navigation bar.', 'ilgelo'),
                        'required' => array('ilgelo-layout-menu-scroll-layout', '=', '1'),
                        "default" => 0,
                      ),



              array(
                        'id' => 'ilgelo-logo-scrool-menu',
                        'type' => 'media',
                        'required' => array('ilgelo-logo-mininavigation', '=', '1'),

                        'url' => true,
                        'title' => __('Logo Menu scroll', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload your logo Menu scroll', 'ilgelo'),
                        'default' => array('url' => ''),
                      ),

                    array(
                        'id' => 'ilgelo-logo-scrool-menu-width',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-mininavigation', '=', '1'),

                        'title' => __('Logo Width', 'ilgelo'),
                        'subtitle' => __('Specify the width of the logo. Enter only number value.', 'ilgelo'),
                        'desc'          => __('width: Min: 0, max: 600, step: 1, default value: 250', 'ilgelo'),
                        'default'       => 127,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 600,
                        'display_value' => 'text'
                    ),

                    array(
                        'id' => 'ilgelo-logo-scrool-menu-height',
                        'type'          => 'slider',
                        'required' => array('ilgelo-logo-mininavigation', '=', '1'),

                        'title' => __('Logo Height', 'ilgelo'),
                        'subtitle' => __('Specify the height of the logo. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 300, step: 1, default value: 70', 'ilgelo'),
                        'default'       => 35,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 70,
                        'display_value' => 'text'
                    ),





















)

                    )
                );




/* ===================================================================
   STYLE & TYPOGRAPHY
   ===================================================================*/


			Redux::setSection( $opt_name, array(
                    'title'  => __( 'Style & Typography', 'ilgelo' ),
                    'icon'   => 'el-icon-font',
                    'fields' => array(


					array(
					    'id' => 'ilgelo-background',
					    'type' => 'background',
					    'title' => __( 'Body Background', 'ilgelo' ),
					    'subtitle' => __( 'Configure your theme background color. You can also use this option to upload a pattern or a full size image as your background.', 'ilgelo' ),
					    'background-position' => false,
					    'background-size' => true,
					    'background-attachment' => false,
					    'transparent' => false,

					    'default' => array(
					    'background-color' => '#f2e3c9',
					    'background-position' => '',
					    'background-size' =>  '',
					    'background-attachment' =>  '',
					    'background-repeat' =>  '',
					    'background-image' =>  '',
					    ),
					),

/* Base Typography  */
					array(
					   'id'       => 'ilgelo-body-typography',
					   'type'     => 'typography',
					   'title'    => __( 'Body Font', 'ilgelo' ),
					   'units'       =>'px',
					   'subtitle' => __( 'Specify the body font properties, that includes paragraph tag.', 'ilgelo' ),
					   'google'   => true,
					   'font-backup' => true,
					   'text-align'   => false,


					   'default'  => array(
					       'color'       => '#635647',
					       'font-size'   => '13px',
					       'google'      => true,
					       'font-family' => 'Raleway',
					       'font-weight' => '500',
					       'line-height' => '25px',


					   ),
					),


			array(
						   'id'       => 'ilgelo-general-font',
						   'type'     => 'typography',
						   'title'    => __( 'Body Font - Small Title', 'ilgelo' ),
						   'units'       =>'px',
						   'subtitle' => __( 'Specify the font properties that includes widget titles, blog post subtitle and commands.', 'ilgelo' ),
						   'google'   => true,
						   'font-backup' => true,
						   'text-align'   => false,
						   'color'       => false,
						   'line-height' => false,
						   'text-transform' => false,
						   'font-style' => false,
                                 'letter-spacing'   => false,
						   'font-size' => false,
						   'font-weight' => false,
						   'subsets' => false,

						   'default'  => array(
						       'google'      => true,
					            'font-family' => 'Montserrat',
						   ),
					),



					array(
					   'id'       => 'ilgelo-color-link-hover',
					   'type'     => 'link_color',
					   'title'    => __( 'BODY FONT - LINK & HOVER COLOR', 'ilgelo' ),
					   'subtitle' => __( 'Specify the clickable body font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#635647',
					       'hover'   => '#e2ae69',
					   )
					),







/* Typography H1, H2, H3, H4, H5, H6, */

                   array(
                            'id'       => 'ilgelo-typo-h1',
                            'type'     => 'typography',
                            'title'    => __( 'H1 Font', 'ilgelo' ),
                            'units'       =>'px',
                            'subtitle' => __( 'Specify the H1 font properties.', 'ilgelo' ),

                            'google'   => true,
                            'font-size'   => true,
                            'color'   => true,
                            'font-backup' => true,
                            'text-align'   => false,
                            'word-spacing'   => true,
                            'letter-spacing'   => true,

                            'default'  => array(
                                'color'       => '#635647',
                                'font-size'   => '40px',
                                'google'      => true,
                                'font-family' => 'Montserrat',
                                'font-style' => '700',
                                'line-height' => '45px',
                                'letter-spacing'   => '0px',
                                'word-spacing'   => '',
                            ),
                        ),

				array(
					   'id'       => 'ilgelo-link-hover-h1',
					   'type'     => 'link_color',
					   'title'    => __( 'H1 FONT - LINK & HOVER COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Specify the clickable H1 tag font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#87817f',
					       'hover'   => '#a86a20',
					   )
					),
				array(
					    'id'             => 'ilgelo-m-h1',
					    'type'           => 'spacing',
					    'mode'           => 'margin',
                             'units'       =>'px',
					    'units_extended' => 'false',
					    'title'          => __('H1 Font Margin', 'ilgelo'),
					    'left'   => false,
					    'right'    => false,

					    'default'            => array(
					        'margin-top'     => '0px',
					        'margin-bottom'  => '20px',
					        'units'          => 'px',
				    )

				),


                   array(
                            'id'       => 'ilgelo-typo-h2',
                            'type'     => 'typography',
                            'title'    => __( 'H2 Font', 'ilgelo' ),
                            'units'       =>'px',
                            'subtitle' => __( 'Specify the H2 font properties.', 'ilgelo' ),

                            'google'   => true,
                            'font-size'   => true,
                            'color'   => true,
                            'font-backup' => true,
                            'text-align'   => false,
                            'word-spacing'   => true,
                            'letter-spacing'   => true,


                            'default'  => array(
                                'color'       => '#434343',
                                'font-size'   => '35px',
                                'google'      => true,
                                'font-family' => 'Montserrat',
                                'font-style' => '700',
                                'line-height' => '44px',
                                'letter-spacing'   => '0px',
                                'word-spacing'   => '',

                            ),
                        ),

				array(
					   'id'       => 'ilgelo-link-hover-h2',
					   'type'     => 'link_color',
					   'title'    => __( 'H2 FONT - LINK & HOVER COLOR', 'ilgelo' ),
					   'subtitle' => __( 'Specify the clickable H2 tag font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#635647',
					       'hover'   => '#a86a20',
					   )
					),


				array(
					    'id'             => 'ilgelo-m-h2',
					    'type'           => 'spacing',
					    'mode'           => 'margin',
                             'units'       =>'px',
					    'units_extended' => 'false',
					    'title'          => __('H2 Font Margin', 'ilgelo'),
					    'left'   => false,
					    'right'    => false,

					    'default'            => array(
					        'margin-top'     => '0px',
					        'margin-bottom'  => '20px',
					        'units'          => 'px',
				    )

				),

				array(
                            'id'       => 'ilgelo-typo-h3',
                            'type'     => 'typography',
                            'title'    => __( 'H3 Font', 'ilgelo' ),
                            'units'       =>'px',
                            'subtitle' => __( 'Specify the H3 font properties.', 'ilgelo' ),

                            'google'   => true,
                            'font-size'   => true,
                            'color'   => true,
                            'font-backup' => true,
                            'text-align'   => false,
                            'word-spacing'   => true,
                            'letter-spacing'   => true,

                            'default'  => array(
                                'color'       => '#635647',
                                'font-size'   => '28px',
                                'google'      => true,
                                'font-family' => 'Montserrat',
                                'font-style' => '700',
                                'line-height' => '34px',
                                'letter-spacing'   => '0px',
                                'word-spacing'   => '',
                            ),
                        ),

				array(
					   'id'       => 'ilgelo-link-hover-h3',
					   'type'     => 'link_color',
					   'title'    => __( 'H3 FONT - LINK & HOVER COLOR', 'ilgelo' ),
					   'subtitle' => __( 'Specify the clickable H3 tag font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#87817f',
					       'hover'   => '#a86a20',
					   )
					),


                   array(
					    'id'             => 'ilgelo-m-h3',
					    'type'           => 'spacing',
					    'mode'           => 'margin',
                             'units'       =>'px',
					    'units_extended' => 'false',
					    'title'          => __('H3 Font Margin', 'ilgelo'),
					    'left'   => false,
					    'right'    => false,

					    'default'            => array(
					        'margin-top'     => '0px',
					        'margin-bottom'  => '20px',
					        'units'          => 'px',
				    )

				),

                   array(
                            'id'       => 'ilgelo-typo-h4',
                            'type'     => 'typography',
                            'title'    => __( 'H4 Font', 'ilgelo' ),
                            'units'       =>'px',
                            'subtitle' => __( 'Specify the H4 font properties.', 'ilgelo' ),

                            'google'   => true,
                            'font-size'   => true,
                            'color'   => true,
                            'font-backup' => true,
                            'text-align'   => false,
                            'word-spacing'   => true,
                            'letter-spacing'   => true,

                            'default'  => array(
                                'color'       => '#898989',
                                'font-size'   => '25px',
                                'google'      => true,
                                'font-family' => 'Montserrat',
                                'font-style' => '400',
                                'line-height' => '25px',
                                'letter-spacing'   => '0px',
                                'word-spacing'   => '',
                            ),
                        ),
				array(
					   'id'       => 'ilgelo-link-hover-h4',
					   'type'     => 'link_color',
					   'title'    => __( 'H4 FONT - LINK & HOVER COLOR', 'ilgelo' ),
					   'subtitle' => __( 'Specify the clickable H4 tag font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#87817f',
					       'hover'   => '#a86a20',
					   )
					),



                   array(
					    'id'             => 'ilgelo-m-h4',
					    'type'           => 'spacing',
					    'mode'           => 'margin',
                             'units'       =>'px',
					    'units_extended' => 'false',
					    'title'          => __('H4 Font Margin', 'ilgelo'),
					    'left'   => false,
					    'right'    => false,

					    'default'            => array(
					        'margin-top'     => '0px',
					        'margin-bottom'  => '20px',
					        'units'          => 'px',
				    )

				),

                   array(
                            'id'       => 'ilgelo-typo-h5',
                            'type'     => 'typography',
                            'title'    => __( 'H5 Font', 'ilgelo' ),
                            'units'       =>'px',
                            'subtitle' => __( 'Specify the H5 font properties.', 'ilgelo' ),

                            'google'   => true,
                            'font-size'   => true,
                            'color'   => true,
                            'font-backup' => true,
                            'text-align'   => false,
                            'word-spacing'   => true,
                            'letter-spacing'   => true,

                            'default'  => array(
                                'color'       => '#434343',
                                'font-size'   => '16px',
                                'google'      => true,
                                'font-family' => 'Montserrat',
                                'font-style' => '700',
                                'line-height' => '20px',
                                'letter-spacing'   => '0px',
                                'word-spacing'   => '',
                            ),
                        ),

				array(
					   'id'       => 'ilgelo-link-hover-h5',
					   'type'     => 'link_color',
					   'title'    => __( 'H5 FONT - LINK & HOVER COLOR', 'ilgelo' ),
					   'subtitle' => __( 'Specify the clickable H5 tag font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#87817f',
					       'hover'   => '#a86a20',
					   )
					),


                   array(
					    'id'             => 'ilgelo-m-h5',
					    'type'           => 'spacing',
					    'mode'           => 'margin',
                             'units'       =>'px',
					    'units_extended' => 'false',
					    'title'          => __('H4 Font Margin', 'ilgelo'),
					    'left'   => false,
					    'right'    => false,

					    'default'            => array(
					        'margin-top'     => '0px',
					        'margin-bottom'  => '20px',
					        'units'          => 'px',
				    )

				),

                   array(
                            'id'       => 'ilgelo-typo-h6',
                            'type'     => 'typography',
                            'title'    => __( 'H6 Font', 'ilgelo' ),
                            'units'       =>'px',
                            'subtitle' => __( 'Specify the H6 font properties.', 'ilgelo' ),

                            'google'   => true,
                            'font-size'   => true,
                            'color'   => true,
                            'font-backup' => true,
                            'text-align'   => false,
                            'word-spacing'   => true,
                            'letter-spacing'   => true,
                            'text-transform'   => true,

                            'default'  => array(
                                'color'       => '#635647',
                                'font-size'   => '10px',
                                'google'      => true,
                                'font-family' => 'Montserrat',
                                'font-style' => '400',
                                'line-height' => '13px',
                                'letter-spacing'   => '5px',
                                'word-spacing'   => '',
                            ),
                        ),

				array(
					   'id'       => 'ilgelo-link-hover-h6',
					   'type'     => 'link_color',
					   'title'    => __( 'H6 FONT - LINK & HOVER COLOR', 'ilgelo' ),
					   'subtitle' => __( 'Specify the clickable H6 tag font properties.', 'ilgelo' ),

					   'regular' => false,

					   'default'  => array(
					       'active' => '#87817f',
					       'hover'   => '#a86a20',
					   )
					),

                   array(
					    'id'             => 'ilgelo-m-h6',
					    'type'           => 'spacing',
					    'mode'           => 'margin',
                             'units'       =>'px',
					    'units_extended' => 'false',
					    'title'          => __('H6 Font Margin', 'ilgelo'),
					    'left'   => false,
					    'right'    => false,

					    'default'            => array(
					        'margin-top'     => '0px',
					        'margin-bottom'  => '20px',
					        'units'          => 'px',
				    )

				),


              )
          )
      );



/* ============== SUB ELEMENTS STYLING ============= */


			Redux::setSection( $opt_name, array(
                    'icon'       => 'el-icon-tint',
                    'title'      => __( 'Elements Styling ', 'ilgelo' ),
                    'subsection' => true,
                    'fields'     => array(



                   array(
                            'id'       => 'ilgelo-bg-post',
                            'type'     => 'color',
                            'title'    => __( 'BOX BACKGROUND COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Pick a background color for the sidebar and blog post text box.', 'ilgelo' ),
                            'default'  => '#fffaf3',
                            'validate' => 'color',
                        ),




                   array(
                            'id'       => 'ilgelo-color-evidence',
                            'type'     => 'color',
                            'title'    => __( 'EVIDENCE COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the main ornamental elements such as button borders and arrows.', 'ilgelo' ),
                            'default'  => '#e2ae69',
                            'validate' => 'color',
                        ),






                   array(
                            'id'       => 'ilgelo-line-color',
                            'type'     => 'color',
                            'title'    => __( 'DIVIDERS COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the line dividers.', 'ilgelo' ),
                            'default'  => '#f4e7d7',
                            'validate' => 'color',
                        ),






                   array(
                            'id'       => 'ilgelo-bg-button-post',
                            'type'     => 'color',
                            'title'    => __( 'BUTTON FILL BACKGROUND COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the background of the command buttons.', 'ilgelo' ),
                            'default'  => 'transparent',
                            'validate' => 'color',
                        ),



                   array(
                            'id'       => 'ilgelo-color-button-post',
                            'type'     => 'color',
                            'title'    => __( 'BUTTON TEXT COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the text of the command buttons.', 'ilgelo' ),
                            'default'  => '#635647',
                            'validate' => 'color',
                        ),

                         array(
                            'id'       => 'ilgelo-color-border-button-post',
                            'type'     => 'color',
                            'title'    => __( 'BUTTON BORDER COLOR', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the border of the command buttons.', 'ilgelo' ),
                            'default'  => '#e2ae69',
                            'validate' => 'color',
                        ),






		)
	)
);



/* ============== SUB HEADER STYLING ============= */


			Redux::setSection( $opt_name, array(
                    'icon'       => 'el-icon-tint',
                    'title'      => __( 'Menu Styling', 'ilgelo' ),
                    'subsection' => true,
                    'fields'     => array(


				array(
					'id'        => 'ilgelo-bg-header',
					'type'      => 'color_rgba',
					'title'    => __( 'Menu bar - background color', 'ilgelo' ),
					'subtitle' => __( 'Pick a color for the navigation bar background. Then hit Choose', 'ilgelo' ),
					'desc'      => 'The caption of this button may be changed to whatever you like!',
					'default'   => array(
						'color'     => '#fffaf3',
						'alpha'     => 0.99,
				),

				'options' => array(
					//'show_input'                => true,
					//'show_initial'              => true,
					'show_alpha'                => true,
					//'show_palette'              => true,
					//'show_palette_only'         => false,
					//'show_selection_palette'    => true,
					// 'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
					),
				),



				array(
				   'id'       => 'ilgelo-menu-color-link-hover',
				   'type'     => 'link_color',
				   'title'    => __( 'Menu bar - links & hover', 'ilgelo' ),
				   'active' => false,
				   'subtitle' => __( 'Pick a color for the links and their hover style', 'ilgelo' ),
				   'default'  => array(
				       'regular' => '#635647',
				       'hover'   => '#e2ae69',
				   )
				),

				array(
				   'id'       => 'ilgelo-top-menu-typography',
				   'type'     => 'typography',
				   'title'    => __( 'Menu bar - Font', 'ilgelo' ),
				   'units'       =>'px',
				   'subtitle' => __( 'Specify the menu font properties.', 'ilgelo' ),
				   'google'   => true,
				   'font-backup' => true,
				   'text-align'   => false,
				   'color'       => false,
				   'line-height' => false,
				   'font-style' => true,
				   'letter-spacing'   => true,

				   'default'  => array(
				       'font-size'   => '10px',
				       'google'      => true,
				       'font-family' => 'Montserrat',
				       'font-style' => '400',
				       'letter-spacing' => '2',
				   ),
				),


				array(
					'id'       => 'ilgelo-color-social-top',
					'type'     => 'link_color',
					'title'    => __( 'Menu bar - Icons color', 'ilgelo' ),
					'subtitle' => __( 'Pick a color for the social media and search icons', 'ilgelo' ),
					'active'    => false,

					'default'  => array(
					  'regular' => '#e2ae69',
					  'hover'   => '#635647',
					)
				),





/*  NAVIGAATION ON SCROLL */

                   array(
                            'id'       => 'ilgelo-bg-mini-header',
                            'type'     => 'color',
                            'title'    => __( 'Scroll Menu Bar - Background Color', 'ilgelo' ),
                            'subtitle' => __( 'Pick a background color for the menu bar that appears in scroll mode.', 'ilgelo' ),
                            'default'  => '#fffaf3',
                            'validate' => 'color',
                        ),

                   array(
                          'id'       => 'ilgelo-link-header-nav',
                            'type'     => 'link_color',
                            'title'    => __( 'Scroll Menu Bar - Links & Hover', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the links of the menu bar that appears in scroll mode.', 'ilgelo' ),
                            'active'    => false,

                            'default'  => array(
                                'regular' => '#635647',
                                'hover'   => '#e2ae69',
                            )
                        ),

   array(
                          'id'       => 'ilgelo-link-mobile',
                            'type'     => 'link_color',
                            'title'    => __( 'Menu Mobile - Links & Hover', 'ilgelo' ),
                            'subtitle' => __( 'Pick a color for the links of the menu Mobile.', 'ilgelo' ),
                            'active'    => false,

                            'default'  => array(
                                'regular' => '#fffaf3',
                                'hover'   => '#e2ae69',
                            )
                        ),


     array(
                            'id'       => 'ilgelo-bg-mobile',
                            'type'     => 'color',
                            'title'    => __( 'Menu Mobile - Background Color', 'ilgelo' ),
                            'subtitle' => __( 'Pick a background color for the background menu mobile ', 'ilgelo' ),
                            'default'  => '#30292b',
                            'validate' => 'color',
                            'transparent' => false,

                        ),









)

               )
          );




/* ============== SUB FOOTER STYLING ============= */




			Redux::setSection( $opt_name, array(
               'icon'       => 'el-icon-tint',
               'title'      => __( 'Footer Styling', 'ilgelo' ),
               'subsection' => true,
               'fields'     => array(




/* ====== Color social Tooltip ====== */

	array(
						'id'       => 'ilgelo-bg-color-socialtooltip',
						'type'     => 'color',
						'title'    => __( 'Social share bar color', 'ILGELO' ),
						'subtitle' => __( 'Choose the background color for the footer social share bar.', 'ilgelo' ),
						'transparent' => false,
						'default'  => '#e2ae69',
						'validate' => 'color',
					),

					array(
						'id'       => 'ilgelo-color-socialtooltip',
						'type'     => 'link_color',
						'title'    => __( 'Social share bar icons color', 'ilgelo' ),
						'subtitle' => __( 'Choose the icons color for the footer social share bar.', 'ilgelo' ),
						'regular'    => false,
						'default'  => array(
							'hover'   => '#635647',
							'active'  => '#ffffff',
						)
					),




/* ====== Footer Widget ====== */

					array(
						'id'       => 'ilgelo-color-footer',
						'type'     => 'color',
						'title'    => __( 'Footer Widgets - Background Color', 'ILGELO' ),
						'subtitle' => __( 'Pick a background color for the widget space on the footer.', 'ilgelo' ),
						'default'  => '#fffaf3',
						'validate' => 'color',
					),



					array(
						'id'       => 'ilgelo-color-widget-title-footer',
						'type'     => 'color',
						'title'    => __( 'Footer Widgets - title Color', 'ILGELO' ),
						'subtitle' => __( 'Pick a title color for the widget space on the footer.', 'ilgelo' ),
						'default'  => '#635647',
						'validate' => 'color',
					),


/* Footer Widget / regular-active-hover  */

					array(
						'id'       => 'ilgelo-color-text-widget-footer',
						'type'     => 'link_color',
						'title'    => __( 'Footer widget - Font & hover color', 'ilgelo' ),
						'default'  => array(
							'regular' => '#635647',
							'hover'   => '#e2ae69',
							'active'  => '#635647',
						)
					),



/* ====== Central Footer ====== */

					array(
						'id'       => 'ilgelo-color-central-footer',
						'type'     => 'color',
						'title'    => __( 'Central Footer Background Color', 'ilgelo' ),
						'subtitle' => __( 'Pick a background color for the central footer.', 'ilgelo' ),
						'default'  => '#fffaf3',
						'validate' => 'color',
					),

				/*
					array(
						'id'       => 'ilgelo-color-title-mailchimp',
						'type'     => 'color',
						'title'    => __( 'Central footer - mailchimp title color', 'ilgelo' ),
						'subtitle' => __( 'Pick a color for the title and subtitle of the mail chimp plugin.', 'ilgelo' ),
						'default'  => '#635647',
						'validate' => 'color',
					),
					array(
						'id'       => 'ilgelo-bg-botton-mailchimp',
						'type'     => 'color',
						'title'    => __( 'Central footer - mailchimp button color', 'ilgelo' ),
						'subtitle' => __( 'Pick a color for the button of the mail chimp plugin.', 'ilgelo' ),

						'default'  => '#e2ae69',
						'validate' => 'color',
					),

					array(
						'id'       => 'ilgelo-color-text-botton-mailchimp',
						'type'     => 'color',
						'title'    => __( 'Central footer - mailchimp button text color', 'ilgelo' ),
						'subtitle' => __( 'Pick a color for the button text of the mail chimp plugin.', 'ilgelo' ),
						'default'  => '#fffaf3',
						'validate' => 'color',
					),

*/

/* ====== Sub Footer ====== */

					array(
						'id'       => 'ilgelo-color-subfooter',
						'type'     => 'color',
						'title'    => __( 'Sub footer - background color', 'ilgelo' ),
						'subtitle' => __( 'Pick a background color for the sub footer.', 'ilgelo' ),
						'default'  => '#635647',
						'validate' => 'color',
					),

					array(
						'id'       => 'ilgelo-link-color-subfooter',
						'type'     => 'link_color',
						'title'    => __( 'Sub footer - font color', 'ilgelo' ),
						'subtitle' => __( 'Pick a color for the font links and hover sub footer.', 'ilgelo' ),
						'default'  => array(
							'regular' => '#fffaf3',
							'hover'   => '#e2ae69',
							'active'  => '#e2ae69',
						)
					),


                    )
                   )
               );



/* ===================================================================
   FEATURED POSTS OPTIONS (SLIDER)
   ===================================================================*/

			Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-website',
                        'title' => __('Featured Posts Options', 'ilgelo'),
                        'fields' => array(



                        array(
                        'id' => 'ilgelo-slide-post-layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => __('FEATURED POSTS LAYOUT', 'ilgelo'),
                        'subtitle' => __('Choose a layout for the Featured Articles to be displayed under the header section.', 'ilgelo'),
                        'options' => array(
                        '1' => array('alt' => '3 columns slide', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/featpost3.jpg'),

                        '2' => array('alt' => '4 columns slide', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/featpost4.jpg'),

                        '3' => array('alt' => '5 columns slide', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/featpost5.jpg'),
                        ),





                        'default' => '2'
                    ),



                     array(
                        'id' => 'ilgelo-slide-row-height',
                        'type'          => 'slider',
                        'title' => __('Rows height', 'ilgelo'),
                        'subtitle' => __('Specify the rows height. Enter only number value.', 'ilgelo'),
                        'desc'          => __('width: Min: 0, max: 500, step: 1, default value: 250', 'ilgelo'),
                        'default'       => 250,
                        'min'           => 200,
                        'step'          => 1,
                        'max'           => 500,
                        'display_value' => 'text'
                    ),





                        array(
                        'id' => 'ilgelo-container-slide-post',
                        'type' => 'select',
                        'title' => __('align menu top navigation', 'ilgelo'),
                        'desc' => __('Select align menu top navigation', 'ilgelo'),
                        'options'  => array(
			             'container' => 'In container',
			             '' => 'Full widht',
			         ),
			         'default'  => 'container',
			 ),




					array(
						'id'             => 'ilgelo-slide-spacing',
						'type'           => 'spacing',
						'mode'           => 'margin',
						'units'          => 'px',
						'units_extended' => 'false',
						'title'          => __('Padding/Margin Option', 'ilgelo'),
						'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'ilgelo'),
						'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'ilgelo'),
						'default'        => array(
											'margin-top'     => '40px',
											'margin-right'   => '5px',
											'margin-bottom'  => '0px',
											'margin-left'    => '5px',
											'units'          => 'px',
						)
					),







		)

	)
);





/* ===================================================================
   BLOG OPTIONS
   ===================================================================*/

			Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-tag',
                        'title' => __('Blog Options', 'ilgelo'),
                        'fields' => array(




                    array(
                        'id' => 'ilgelo-page-blog-layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => __('BLOG POST PAGE LAYOUT', 'ilgelo'),
                        'subtitle' => __('Select a layout for the blog s article page.', 'ilgelo'),
                        'options' => array(
                        '1' => array('alt' => 'Full', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/blog-full.jpg'),
                        '2' => array('alt' => 'sidebar right', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/blog-left-sidebar.jpg'),
                        '3' => array('alt' => 'sidebar left', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/blog-right-sidebar.jpg'),
                        ),
                        'default' => '2'
                    ),


                        array(
                        'id' => 'ilgelo-ico-share',
                        'type' => 'switch',
                        'title' => __('ICON SOCIAL SHARE', 'ilgelo'),
                        'subtitle' => __('Choose if you want to display the "icon social share" at the bottom of the article', 'ilgelo'),
                        "default" => 1,
                    ),



                    array(
                        'id' => 'ilgelo-info-author',
                        'type' => 'switch',
                        'title' => __('ABOUT THE AUTHOR', 'ilgelo'),
                        'subtitle' => __('Choose if you want to display the "About the Author"  box at the bottom of the article', 'ilgelo'),
                        "default" => 1,
                    ),




                       array(
                        'id' => 'ilgelo-related-post',
                        'type' => 'switch',
                        'title' => __('RELATED POST', 'ilgelo'),
                        'subtitle' => __('Choose if you want to display the Related Posts at the bottom of the article', 'ilgelo'),
                        "default" => 1,
                    ),


				array(
                        'id' => 'ilgelo-next-prev-post',
                        'type' => 'switch',
                        'title' => __('prev/next post', 'ilgelo'),
                        'subtitle' => __('Choose if you want to display the prev/next post at the bottom of the article', 'ilgelo'),
                        "default" => 1,
                    ),



                      array(
                        'id' => 'ilgelo-related-post-layout',
                        'type' => 'image_select',
                        'required' => array('ilgelo-related-post', '=', '1'),
                        'compiler' => true,
                        'title' => __('RELATED POST LAYOUT', 'ilgelo'),
                        'subtitle' => __('Select a layout for the Related Posts.', 'ilgelo'),
                        'options' => array(
                        '1' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/related-post-layout2.jpg'),
                        '2' => array('alt' => '', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/related-post-layout1.jpg'),
                        ),
                        'default' => '1'
                    ),



                    array(
                        'id' => 'ilgelo-category-layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => __('CATEGORY POST LAYOUT', 'ilgelo'),
                        'subtitle' => __('Select a layout for the Search results or display the Blog posts when you click on a specific Category.', 'ilgelo'),
                        'options' => array(

                        '1' => array('alt' => 'Full', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/category_full.jpg'),
                        '2' => array('alt' => 'sidebar left', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/category-left-sidebar.jpg'),
                        '3' => array('alt' => 'sidebar right', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/category-right-sidebar.jpg'),
                        '4' => array('alt' => 'list layout', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/category-list.jpg'),
                        '5' => array('alt' => 'grid layout', 'img' => get_template_directory_uri().'/framework/options/ig-options-image/category-grid.jpg'),
                        ),
                        'default' => '3'
                    ),
                  )
                )
            );





/* ===================================================================
   BLOG AUTHOR SETTINGS
   ===================================================================*/




   Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-torso',
                'title' => __('Blog Author Settings', 'ilgelo'),
                'fields' => array(





			array(
				'id' => 'ilgelo-special-authors',
				'type' => 'switch',
				'title' => __('SIDEBAR BLOG AUTHOR BOX', 'ilgelo'),
				'subtitle' => __('Choose if you want to display the Blog Author box on the pages Sidebar', 'ilgelo'),
				"default" => 0,
			),















      $fields = array(
       'id' => 'section-start-under-navigation',
       'type' => 'section',
       'title' => __('BLOG AUTHOR BOX', 'ilgelo'),
       'indent' => true
   ),


			array(
			    'id' => 'ilgelo-bg-s-author',
			    'type' => 'media',
			    'url' => true,
			    'title' => __('Author Avatar Image', 'ilgelo'),
			    'compiler' => 'true',
			    'subtitle' => __('Upload a photo of the Blog Author', 'ilgelo'),
			    'default' => array('url' => ''),

			  ),

			array(
			    'id' => 'ilgelo-img-s-author',
			    'type' => 'media',
			    'url' => true,
			    'title' => __('Author Avatar Background Image', 'ilgelo'),
			    'compiler' => 'true',
			    'subtitle' => __('Upload a background image that will go underneath the Author avatar', 'ilgelo'),
			    'default' => array('url' => ''),

			  ),


			array(
				'id' => 'ilgelo-name-s-author',
				'type' => 'text',
				'title' => __('Author Name', 'Ilgelo'),
				'subtitle' => __('Write the Author s name', 'Ilgelo'),
                    'default' => 'YOUR NAME',

			),

			array(
				'id'       => 'ilgelo-style-name-s-author',
				'type'     => 'typography',
				'title'    => __( 'Author Name Style', 'ilgelo' ),
				'units'       =>'px',
				'subtitle' => __( 'Choose font style and colors for the Author name.', 'ilgelo' ),

				'google'   => true,
				'font-size'   => true,
				'color'   => true,
				'font-backup' => true,
				'text-align'   => false,
				'word-spacing'   => true,
				'letter-spacing'   => true,

				'default'  => array(
					'color'       => '#635647',
					'font-size'   => '16px',
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-style' => '700',
					'line-height' => '25px',
					'letter-spacing'   => '0px',
					'word-spacing'   => '',
				),
			),


			array(
			    'id' => 'ilgelo-local-s-author',
			    'type' => 'text',
			    'title' => __('Author Location', 'Ilgelo'),
			    'subtitle' => __('Write the Author city or country', 'Ilgelo'),
                   'default' => 'YOUR LOCATION',
			),

			array(
				'id'       => 'ilgelo-style-local-s-author',
				'type'     => 'typography',
				'title'    => __( 'Author Location typography', 'ilgelo' ),
				'units'       =>'px',
				'subtitle' => __( 'Choose font style and colors for the Author location.', 'ilgelo' ),

				'google'   => true,
				'font-size'   => true,
				'color'   => true,
				'font-backup' => true,
				'text-align'   => false,
				'word-spacing'   => true,
				'letter-spacing'   => true,

				'default'  => array(
					'color'       => '#e2ae69',
					'font-size'   => '12px',
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-style' => '600',
					'line-height' => '13px',
					'letter-spacing'   => '3px',
					'word-spacing'   => '',
				),
			),

			array(
			         'id' => 'ilgelo-text-s-author',
			         'type' => 'textarea',
			         'title' => __('Author About Text', 'ilgelo'),
			         'desc' => __('Write a short text to display the Author bio or description.', 'ilgelo'),
			         'validate_callback' => 'validate_ilgelo_text_s_author'

			         ),


			array(
			        'id'       => 'ilgelo-color-text-author',
			        'type'     => 'color',
			        'title'    => __( 'color text author', 'ilgelo' ),
			        'subtitle' => __( 'Pick a color text for author .', 'ilgelo' ),
			        'default'  => '#635647',
			        'validate' => 'color',
			    ),

			array(
			        'id'       => 'ilgelo-color-bg-author',
			        'type'     => 'color',
			        'title'    => __( 'color background author', 'ilgelo' ),
			        'subtitle' => __( 'Pick a background color for box author .', 'ilgelo' ),
			        'default'  => '#fffaf3',
			        'validate' => 'color',
			    ),




array(
    'id'     => 'section-end-under-navigation',
    'type'   => 'section',
    'indent' => false,
),



				array(
                        'id' => 'ilgelo-social-about-author',
                        'type' => 'switch',
                        'title' => __('Social on about the author', 'ilgelo'),
                        'subtitle' => __('Do you want to display social on the about the author ?', 'ilgelo'),

                        'default' => 1,
                    ),




				array(
					'id'       => 'ilgelo-color-social-about-author',
					'type'     => 'link_color',
					'title'    => __( 'AUTHOR SOCIAL ICONS COLOR', 'ilgelo' ),
					'required' => array('ilgelo-social-about-author', '=', '1'),
					'subtitle' => __( 'Pick a color for author social.', 'ilgelo' ),
					'regular' => false,
					'default'  => array(
					'active' => '#e2ae69',
					'hover'   => '#635647',
					   )
					),









		)

	)
);















/* ===================================================================
   SOCIAL SHARE CONFIGURATIONS
   ===================================================================*/


			Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-share',
                        'title' => __('Social Configuration', 'Ilgelo'),
                        'fields' => array(



	array(
                    'id' => 'ilgelo-social-library',
				    'type'     => 'button_set',
                        'title' => __('Chose the icons library', 'ilgelo'),
					    'multi'    => false,
					    'options' => array(
					        '1' => 'MonoSocial Icon',
					        '2' => 'Font Awesome Icon',
					     ),
					    'default' => '2',
				),




                    array(
                        'id' => 'Ilgelo-social-facebook',
                        'type' => 'text',
                        'title' => __('Facebook url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-twitter',
                        'type' => 'text',
                        'title' => __('Twitter url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-google',
                        'type' => 'text',
                        'title' => __('Google+ url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-behance',
                        'type' => 'text',
                        'title' => __('Behance url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-dribbble',
                        'type' => 'text',
                        'title' => __('Dribbble url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-linkedin',
                        'type' => 'text',
                        'title' => __('LinkedIn url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-flickr',
                        'type' => 'text',
                        'title' => __('Flickr url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-vimeo',
                        'type' => 'text',
                        'title' => __('Vimeo url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-soundcloud',
                        'type' => 'text',
                        'title' => __('SoundCloud url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-deviantart',
                        'type' => 'text',
                        'title' => __('DeviantArt url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-instagram',
                        'type' => 'text',
                        'title' => __('Instagram url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-pinterest',
                        'type' => 'text',
                        'title' => __('Pinterest url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),

                      array(
                        'id' => 'Ilgelo-social-youtube',
                        'type' => 'text',
                        'title' => __('youtube url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),


                        array(
                        'id' => 'Ilgelo-social-rss',
                        'type' => 'text',
                        'title' => __('Rss url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),





                    array(
                        'id' => 'Ilgelo-social-tumblr',
                        'type' => 'text',
                        'title' => __('Tumblr url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-etsy',
                        'type' => 'text',
                        'title' => __('Etsy url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-bandcamp',
                        'type' => 'text',
                        'title' => __('Band camp url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-500px',
                        'type' => 'text',
                        'title' => __('500px url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-tripadvisor',
                        'type' => 'text',
                        'title' => __('TripAdvisor url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-snapchat',
                        'type' => 'text',
                        'title' => __('Snapchat url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-spotify',
                        'type' => 'text',
                        'title' => __('Spotify url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),
                    array(
                        'id' => 'Ilgelo-social-email',
                        'type' => 'text',
                        'title' => __('Email url', 'Ilgelo'),
                        'subtitle' => __('This must be a URL.', 'Ilgelo'),
                        'validate' => 'url',
                        'default' => '',
                        'text_hint' => array(
                            'title' => '',
                            'content' => 'Please enter a valid <strong>URL</strong> in this field.'
                        )
                    ),


						array(
		                        'id' => 'ilgelo-info-home-section',
		                        'type' => 'info',
		                        'title' => __('INFO TWITTER', 'ilgelo'),

		                        'desc' => __('You can generate all the keys you need from this external link <a href="https://apps.twitter.com/"target="_blank"> Twitter Apps </a>', 'ilgelo'),
						),


						array(
							'id' => 'ilgelo-twitter',
							'type' => 'text',
							'title' => __('TWITTER KEY', 'ilgelo'),
							'data' => 'post_type',
							'options' => array(1=>'Consumer Key',
										   2=>'Secret',
										   3=>'Access Token',
										   4=>'Token Secret',
										   5=>'Username',
										   6=>'Count'
										   ),

							'default' => array(
								1=>'',
								2=>'',
								3=>'',
								4=>'',
								5=>'',
								6=>'6'
							),
						),









                  )
                )
            );




/* ===================================================================
   FOOTER
   ===================================================================*/




			Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-minus',
                'title' => __('Footer', 'ilgelo'),
                'fields' => array(


                    array(
                        'id' => 'ilgelo-footer-socialtooltip',
                        'type' => 'switch',
                        'title' => __('SOCIAL SHARE ON FOOTER TOP', 'ilgelo'),
                        'subtitle' => __('Do you want to display social share on the footer ?', 'ilgelo'),

                        'default' => 1,
                    ),

    array(
					'id' => 'ilgelo-link-socialtooltip',
					'type' => 'text',
                         'required' => array('ilgelo-footer-socialtooltip', '=', '1'),
					'title' => __('Social tooltip', 'ilgelo'),
					'desc' => __('inser your social link', 'ilgelo'),
					'data' => 'post_type',
					'options' => array(
								   1=>'Twitter URL',
								   2=>'Facebook URL',
								   3=>'Google + URL',
								   4=>'Mail ex:info@exemple.com',
								   5=>'instagram URL',
								   6=>'Pinterest URL',
								   7=>'Tumblr URL',
								   8=>'Rss URL',
								   9=>'Bloglovin URL',
					),
					'default' => array(
						1=>'',
						2=>'',
						3=>'',
						4=>'',
						5=>'',
						6=>'',
						7=>'',
						8=>'',
						9=>'',


					),
				),


                    array(
                        'id' => 'ilgelo-footer-widget',
                        'type' => 'switch',
                        'title' => __('WIDGETS FOOTER', 'ilgelo'),
                        'subtitle' => __('Do you want to add widgets in the footer?', 'ilgelo'),

                        'default' => 0,
                    ),

                    array(
                        'id' => 'ilgelo-central-footer',
                        'type' => 'switch',
                        'title' => __('ACTIVATION CENTRAL FOOTER', 'ilgelo'),

                        'subtitle' => __('Do you want to activate the central footer?', 'ilgelo'),
                        "default" => 0,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                      ),

                    array(
                        'id' => 'ilgelo-logofooter-retina',
                        'type' => 'media',
                        'required' => array('ilgelo-central-footer', '=', '1'),
                        'url' => true,
                        'title' => __('Retina Logo Upload', 'ilgelo'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload a Retina-friendly logo if you want it to be correctly displayed on Retina Devices. Please note the logo must be twice of the normal size (example: if you want to show a 60x60 px logo on the website, the size of the image must be 120x120 px)', 'ilgelo'),
                        'default' => array('url' => ''),
                       ),

                    array(
                        'id' => 'ilgelo-logo-footer-size-width',
                        'type'          => 'slider',
                        'required' => array('ilgelo-central-footer', '=', '1'),

                        'title' => __('Logo Width', 'ilgelo'),
                        'subtitle' => __('Specify the logo width. Enter only number value.', 'ilgelo'),
                        'desc'          => __('width: Min: 0, max: 600, step: 1, default value: 250', 'ilgelo'),
                        'default'       => 250,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 600,
                        'display_value' => 'text'
                    ),

                   array(
                        'id' => 'ilgelo-logo-footer-size-height',
                        'type'          => 'slider',
                        'required' => array('ilgelo-central-footer', '=', '1'),

                        'title' => __('Logo Height', 'ilgelo'),
                        'subtitle' => __('Specify the logo height. Enter only number value.', 'ilgelo'),
                        'desc'          => __('height: Min: 0, max: 300, step: 1, default value: 70', 'ilgelo'),
                        'default'       => 70,
                        'min'           => 0,
                        'step'          => 1,
                        'max'           => 300,
                        'display_value' => 'text'
                    ),


					array(
						'id' => 'ilgelo-subfooter',
						'type' => 'switch',
						'title' => __('Activation sub footer', 'ilgelo'),
						'subtitle' => __('Do you want to display the sub footer ?', 'ilgelo'),
						'default' => 1,
					),

						array(
						'id' => 'ilgelo-text-subfooter',
						'type' => 'textarea',
						'title' => __('FOOTER TEXT', 'ilgelo'),
						'required' => array('ilgelo-subfooter', '=', '1'),
						'subtitle' => __('Enter the text that you want to be displayed into the footer bottom. HTML is allowed.', 'ilgelo'),
						'validate' => 'html',
						'default' => ' - Copyright <a href="http://www.indieground.it/">INDIEGROUND</a> - DESIGNED BY INDIEGROUD THEMES & RESOURCES',

						/*
						'allowed_html' => array(
						    'a' => array(
						    'href' => array(),
						    'title' => array()
						),
						    'br' => array(),
						    'em' => array(),
						    'strong' => array()
						)
						*/

					),



)
               )
            );




/* ===================================================================
   CUSTOM CSS
   ===================================================================*/

			Redux::setSection( $opt_name, array(
                        'icon' => 'el-icon-wrench',
                        'title' => __('Custom CSS', 'ilgelo'),
                        'fields' => array(



                        array(
                        'id'        => 'ilgelo-custom-css',
                        'type'      => 'ace_editor',
                        'title' => __('Custom CSS', 'ilgelo'),
                        'subtitle' => __('If you have any custom CSS you would like added to the site, please enter it here.', 'indieground'),
                        'mode'      => 'css',
                        'theme'     => 'monokai',
                        'default'   => "#example{\nmargin: 0 auto;\n}"
                        ),



					array(
					'id'        => 'ilgelo-custom-html',
					'type' => 'textarea',
					'title' => __('Insert code inside head tag <head>', 'ilgelo'),
					'subtitle' => __('If you need to insert custom code inside "head" tag you can do it from here.', 'ilgelo'),
					),





)
                 )
            );







// End Indieground



/* =================================  END  ==================================*/



    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    if ( ! function_exists( 'validate_ilgelo_text_s_author' ) ) {
    	function validate_ilgelo_text_s_author($field, $value, $existing_value ) {
    		$return['value'] = $value;

			if(function_exists('icl_object_id')) {
				do_action( 'wpml_register_single_string', 'User values', 'Author About Text', $value );
			}

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = false;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }



// Custom style



function addPanelCSS() {
    wp_register_style(
        'redux-custom-css',
        get_template_directory_uri()."/framework/options/custom/custom-redux.css",
        array( 'redux-admin-css' ), // Be sure to include redux-admin-css so it's appended after the core css is applied
        time(),
        'all'
    );
    wp_enqueue_style('redux-custom-css');
}
// This example assumes your opt_name is set to redux_demo, replace with your opt_name value
add_action( 'redux/page/ilgelo_options/enqueue', 'addPanelCSS' );
