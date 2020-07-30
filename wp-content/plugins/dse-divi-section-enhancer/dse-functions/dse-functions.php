<?php

function divi_sections_enhancer_scripts_and_styles()
{
    //free styles
    if ( null !== get_option( 'dse-enable-scrollbar' ) || null !== get_option( 'dse-enable-sidebar' ) ) {
        if ( get_option( 'dse-enable-scrollbar' ) != 'no' || get_option( 'dse-enable-sidebar' ) != 'no' ) {
            wp_enqueue_style(
                'divi-sections-enhancer-jquery-mCustomScrollbar',
                plugin_dir_url( __FILE__ ) . 'styles/jquery.mCustomScrollbar.min.css',
                '',
                rand( 0, 100 )
            );
        }
    }
    wp_enqueue_style(
        'divi-sections-enhancer-jquery-freecss',
        plugin_dir_url( __FILE__ ) . 'styles/dsefreestyles.css',
        '',
        rand( 0, 100 )
    );
    //free scripts
    wp_enqueue_script(
        'divi-sections-enhancer-jquery-mCustomScrollbar-concat',
        plugin_dir_url( __FILE__ ) . 'scripts/jquery.mCustomScrollbar.concat.min.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'divi-sections-enhancer-freefrontend',
        plugin_dir_url( __FILE__ ) . 'scripts/defree_scripts.js',
        '',
        rand( 0, 100 )
    );
    wp_enqueue_script(
        'divi-sections-enhancer-dse_vb',
        plugin_dir_url( __FILE__ ) . 'scripts/dse_vb.js',
        '',
        rand( 0, 100 )
    );
}

add_action( 'wp_enqueue_scripts', 'divi_sections_enhancer_scripts_and_styles', 99 );
function dse_data_script()
{
    wp_localize_script( 'divi-sections-enhancer-freefrontend', 'dseData', array(
        'url'       => plugin_dir_url( __DIR__ ),
        'pluginUrl' => plugin_dir_url( __FILE__ ),
    ) );
}

add_action( 'wp_enqueue_scripts', 'dse_data_script', 999999999 );
add_action( 'admin_enqueue_scripts', 'dse_data_script', 999999999 );
function divi_sections_enhancer_check_for_if( $value )
{
    $output = array(
        'divi_se_set' => array( $value ),
    );
    return $output;
}

// new options
////////////////////////////////////////////////
function divi_sections_enhancer_new_options( $fields_unprocessed )
{
    //Check if pro add on is installed and has active license
    
    if ( function_exists( 'dse_fs' ) ) {
        
        if ( dse_fs()->is_paying() ) {
            $onlypro = '';
        } else {
            $onlypro = ' (Only PRO)';
        }
    
    } else {
        $onlypro = ' (Only PRO)';
    }
    
    $newoptions = array();
    $newoptions['none'] = esc_html__( 'None', 'divi_sections_enhancer' );
    //scrollbar
    if ( null !== get_option( 'dse-enable-scrollbar' ) ) {
        if ( get_option( 'dse-enable-scrollbar' ) != 'no' ) {
            $newoptions['scrollbar'] = esc_html__( 'Scrollbar Section', 'divi_sections_enhancer' );
        }
    }
    //tilt effect
    if ( null !== get_option( 'dse-enable-tilteffect' ) ) {
        if ( get_option( 'dse-enable-tilteffect' ) != 'no' ) {
            $newoptions['tilt'] = esc_html__( 'Tilt Effect', 'divi_sections_enhancer' );
        }
    }
    //Youtube Background
    if ( null !== get_option( 'dse-enable-youtube' ) ) {
        if ( get_option( 'dse-enable-youtube' ) != 'no' ) {
            $newoptions['youtubebg'] = esc_html__( 'Youtube Background (deprecated)', 'divi_sections_enhancer' );
        }
    }
    //Vime Background
    if ( null !== get_option( 'dse-enable-vimeo' ) ) {
        if ( get_option( 'dse-enable-vimeo' ) != 'no' ) {
            $newoptions['vimeobg'] = esc_html__( 'Vimeo/Youtube Background', 'divi_sections_enhancer' );
        }
    }
    //Sidebar
    if ( null !== get_option( 'dse-enable-sidebar' ) ) {
        if ( get_option( 'dse-enable-sidebar' ) != 'no' ) {
            $newoptions['offcanvas'] = esc_html__( 'Sidebar (Off Canvas)', 'divi_sections_enhancer' );
        }
    }
    //FREE Particles Background
    if ( null !== get_option( 'dse-enable-particles' ) ) {
        if ( get_option( 'dse-enable-particles' ) != 'no' ) {
            $newoptions['particlesBackground'] = esc_html__( 'Particles Background', 'divi_sections_enhancer' );
        }
    }
    //PRO Particles Background
    if ( null !== get_option( 'dse-enable-proparticles' ) ) {
        if ( get_option( 'dse-enable-proparticles' ) != 'no' ) {
            $newoptions[$onlypro . 'proparticles'] = esc_html__( 'PRO Particles Background' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //STACKS
    if ( null !== get_option( 'dse-enable-stacks' ) ) {
        if ( get_option( 'dse-enable-stacks' ) != 'no' ) {
            $newoptions[$onlypro . 'stacks'] = esc_html__( 'Stacks' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //Tilted Sections
    if ( null !== get_option( 'dse-enable-tiltedsections' ) ) {
        if ( get_option( 'dse-enable-tiltedsections' ) != 'no' ) {
            $newoptions[$onlypro . 'tiltedRows'] = esc_html__( 'Tilted Sections' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //Waterpipe Background
    if ( null !== get_option( 'dse-enable-waterpipe' ) ) {
        if ( get_option( 'dse-enable-waterpipe' ) != 'no' ) {
            $newoptions[$onlypro . 'waterpipeBackground'] = esc_html__( 'Waterpipe Background' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //Geometry Angle
    if ( null !== get_option( 'dse-enable-geometry' ) ) {
        if ( get_option( 'dse-enable-geometry' ) != 'no' ) {
            $newoptions[$onlypro . 'geometryangle'] = esc_html__( 'Geometry Angle Background' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //Stars Warp
    if ( null !== get_option( 'dse-enable-starswarp' ) ) {
        if ( get_option( 'dse-enable-starswarp' ) != 'no' ) {
            $newoptions[$onlypro . 'starswarp'] = esc_html__( 'Stars Warp Background' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //Sparkles
    if ( null !== get_option( 'dse-enable-sparkles' ) ) {
        if ( get_option( 'dse-enable-sparkles' ) != 'no' ) {
            $newoptions[$onlypro . 'sparkles'] = esc_html__( 'Sparkles' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    //Scrollify
    if ( null !== get_option( 'dse-enable-scrollify' ) ) {
        if ( get_option( 'dse-enable-scrollify' ) != 'no' ) {
            $newoptions[$onlypro . 'scrollify'] = esc_html__( 'Scrollify Section' . $onlypro, 'divi_sections_enhancer' );
        }
    }
    $newfields = [];
    $newfields['divi_se_set'] = array(
        'default'     => '',
        'label'       => esc_html__( 'DIVI Section Enhancer Options', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'class'       => array( 'dse_selector' ),
        'options'     => $newoptions,
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( 'Choose an option to set values', 'divi_sections_enhancer' ),
    );
    // PRO PARTICLES SECTION
    $newfields['divi_se_proparticles_transform'] = array(
        'default'     => 'none',
        'label'       => esc_html__( 'Activate PRO Particles', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'                 => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_proparticles' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_shape'] = array(
        'default'     => 'circle',
        'label'       => esc_html__( 'Particles Shape', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'circle'   => esc_html__( 'Circle', 'divi_sections_enhancer' ),
        'edge'     => esc_html__( 'Edge', 'divi_sections_enhancer' ),
        'triangle' => esc_html__( 'Triangle', 'divi_sections_enhancer' ),
        'polygon'  => esc_html__( 'Polygon', 'divi_sections_enhancer' ),
        'star'     => esc_html__( 'Star', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_particlescolor'] = array(
        'label'        => esc_html__( 'Particles Color', 'divi_sections_enhancer' ),
        'default'      => '#000000',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_size'] = array(
        'label'          => esc_html__( 'Particles size', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => '',
        'validate_unit'  => false,
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '3',
        'range_settings' => array(
        'min'  => '0.1',
        'max'  => '100',
        'step' => '0.1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_number'] = array(
        'label'          => esc_html__( 'Particles Number', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => '',
        'validate_unit'  => false,
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '80',
        'range_settings' => array(
        'min'  => '0',
        'max'  => '1000',
        'step' => '1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_density'] = array(
        'label'          => esc_html__( 'Particles Density', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => '',
        'validate_unit'  => false,
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '800',
        'range_settings' => array(
        'min'  => '100',
        'max'  => '10000',
        'step' => '100',
    ),
        'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_linescolor'] = array(
        'label'        => esc_html__( 'Lines Color', 'divi_sections_enhancer' ),
        'default'      => '#000000',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_lineswidth'] = array(
        'label'          => esc_html__( 'Lines Width', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => '',
        'validate_unit'  => false,
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1',
        'range_settings' => array(
        'min'  => '0',
        'max'  => '20',
        'step' => '0.1',
    ),
        'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_direction'] = array(
        'default'     => 'none',
        'label'       => esc_html__( 'Particles Direction', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'         => esc_html__( 'Random', 'divi_sections_enhancer' ),
        'top'          => esc_html__( 'Top', 'divi_sections_enhancer' ),
        'top-right'    => esc_html__( 'Top Right', 'divi_sections_enhancer' ),
        'right'        => esc_html__( 'Right', 'divi_sections_enhancer' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'divi_sections_enhancer' ),
        'bottom'       => esc_html__( 'Bottom', 'divi_sections_enhancer' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'divi_sections_enhancer' ),
        'left'         => esc_html__( 'left', 'divi_sections_enhancer' ),
        'top-left'     => esc_html__( 'Top Left', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_speed'] = array(
        'label'          => esc_html__( 'Speed', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => '',
        'validate_unit'  => false,
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '6',
        'range_settings' => array(
        'min'  => '0',
        'max'  => '150',
        'step' => '0.1',
    ),
        'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    $newfields['divi_se_proparticles_onhover'] = array(
        'default'     => 'repulse',
        'label'       => esc_html__( 'Effect on mouse over', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'    => esc_html__( 'None', 'divi_sections_enhancer' ),
        'repulse' => esc_html__( 'Repulse', 'divi_sections_enhancer' ),
        'grab'    => esc_html__( 'Grab', 'divi_sections_enhancer' ),
        'bubble'  => esc_html__( 'Bubble', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'proparticles' ),
    );
    // STACKS SECTION
    $newfields['divi_se_stacks_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Stacks (This will affect all sections below this one)', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'           => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_stacks' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'stacks' ),
    );
    // OFFCANVAS SECTION
    $newfields['divi_se_offcanvas_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Off Canvas Sidebar', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_offcanvas' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_width'] = array(
        'label'       => esc_html__( 'Sidebar Width', 'divi_sections_enhancer' ),
        'default'     => '350px',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_style'] = array(
        'default'     => 'rounded-dots',
        'label'       => esc_html__( 'Scrollbar Style', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'rounded-dots'      => esc_html__( 'Rounded Dots', 'divi_sections_enhancer' ),
        'rounded-dots-dark' => esc_html__( 'Rounded Dots Dark', 'divi_sections_enhancer' ),
        'light'             => esc_html__( 'Regular Light', 'divi_sections_enhancer' ),
        'dark'              => esc_html__( 'Regular Dark', 'divi_sections_enhancer' ),
        'light-thin'        => esc_html__( 'Light Thin', 'divi_sections_enhancer' ),
        'dark-thin'         => esc_html__( 'Dark Thin', 'divi_sections_enhancer' ),
        'inset'             => esc_html__( 'Light Inset', 'divi_sections_enhancer' ),
        'inset-dark'        => esc_html__( 'Dark Inset', 'divi_sections_enhancer' ),
        'rounded'           => esc_html__( 'Light Rounded', 'divi_sections_enhancer' ),
        'rounded-dark'      => esc_html__( 'Dark Rounded', 'divi_sections_enhancer' ),
        '3d-thick'          => esc_html__( '3D Light Thick', 'divi_sections_enhancer' ),
        '3d-thick-dark'     => esc_html__( '3D Dark Thick', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_openicon'] = array(
        'label'       => esc_html__( 'Select Icon to open sidebar', 'divi_sections_enhancer' ),
        'type'        => 'select_icon',
        'class'       => array( 'et-pb-font-icon' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( 'Choose an icon to display inside the button.', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_buttontext'] = array(
        'label'       => esc_html__( 'Text for outside button (Optional)', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_iconsize'] = array(
        'label'          => esc_html__( 'Icon Size', 'divi_sections_enhancer' ),
        'default'        => '35',
        'range_settings' => array(
        'min'  => '5',
        'max'  => '50',
        'step' => '1',
    ),
        'type'           => 'range',
        'class'          => array( 'dse-range' ),
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'show_if'        => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_closedicon'] = array(
        'label'       => esc_html__( 'Select Icon for close sidebar', 'divi_sections_enhancer' ),
        'type'        => 'select_icon',
        'class'       => array( 'et-pb-font-icon' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( 'Choose an icon to close the button.', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_iconbackground'] = array(
        'label'        => esc_html__( 'Button Background Color', 'divi_sections_enhancer' ),
        'default'      => '#111111',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_iconcolor'] = array(
        'label'        => esc_html__( 'Icon Color', 'divi_sections_enhancer' ),
        'default'      => '#ffffff',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_top'] = array(
        'label'       => esc_html__( 'Outside icon distance from top', 'divi_sections_enhancer' ),
        'default'     => '100px',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_left'] = array(
        'label'       => esc_html__( 'Outside icon distance from left', 'divi_sections_enhancer' ),
        'default'     => '50px',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_insideposition'] = array(
        'default'     => 'top',
        'label'       => esc_html__( 'Button Inside Position', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'top'    => esc_html__( 'Top', 'divi_sections_enhancer' ),
        'middle' => esc_html__( 'Middle', 'divi_sections_enhancer' ),
        'bottom' => esc_html__( 'Bottom', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    $newfields['divi_se_offcanvas_height'] = array(
        'label'       => esc_html__( 'Sidebar Height', 'divi_sections_enhancer' ),
        'default'     => 'auto',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'offcanvas' ),
    );
    //TILT EFFECT
    ////////////
    $newfields['divi_se_tilt_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Tilt Effect', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'               => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_tilteffect' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'tilt' ),
    );
    $newfields['divi_se_tilt_applyto'] = array(
        'default'     => 'section',
        'label'       => esc_html__( 'Apply to', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'section' => esc_html__( 'Entire Section', 'divi_sections_enhancer' ),
        'modules' => esc_html__( 'Modules', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'tilt' ),
    );
    $newfields['divi_se_tilt_parallax'] = array(
        'default'     => 'yes',
        'label'       => esc_html__( 'Parallax Effect', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'no'  => esc_html__( 'No', 'divi_sections_enhancer' ),
        'yes' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => array(
        'divi_se_set'          => 'tilt',
        'divi_se_tilt_applyto' => 'section',
    ),
    );
    $newfields['divi_se_tilt_perspective'] = array(
        'label'          => esc_html__( 'Perspective', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => ' ',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1000',
        'range_settings' => array(
        'min'  => '100',
        'max'  => '1000',
        'step' => '100',
    ),
        'description'    => esc_html__( 'Transform perspective, the lower the more extreme the tilt gets.', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'tilt' ),
    );
    $newfields['divi_se_tilt_scale'] = array(
        'label'          => esc_html__( 'Scale', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => ' ',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1',
        'range_settings' => array(
        'min'  => '0.5',
        'max'  => '3',
        'step' => '0.1',
    ),
        'description'    => esc_html__( '2 = 200%, 1.5 = 150%, etc..', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'tilt' ),
    );
    // VIMEO BACKGROUND
    $newfields['divi_se_vimeobg_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Vimeo/Youtube Background on this section', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'            => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_vimeobg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_source'] = array(
        'default'     => 'vimeo',
        'label'       => esc_html__( 'Source', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'vimeo'   => esc_html__( 'Vimeo', 'divi_sections_enhancer' ),
        'youtube' => esc_html__( 'Youtube', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_id'] = array(
        'label'       => esc_html__( 'Vimeo/Youtube Video ID (Vimeo also can use URL)', 'divi_sections_enhancer' ),
        'default'     => '36026604',
        'type'        => 'text',
        'description' => esc_html__( 'ID is the last Parameter on a video url', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_mute'] = array(
        'default'     => 'true',
        'label'       => esc_html__( 'Activate Sound', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'true'  => esc_html__( 'No', 'divi_sections_enhancer' ),
        'false' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_repeat'] = array(
        'default'     => 'true',
        'label'       => esc_html__( 'Repeat Video', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
        'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_width'] = array(
        'mobile_options' => true,
        'default'        => 'height',
        'default_tablet' => 'height',
        'default_phone'  => 'height',
        'label'          => esc_html__( 'Video Width & Height', 'divi_sections_enhancer' ),
        'type'           => 'select',
        'options'        => array(
        'height'        => esc_html__( 'Adjust to Section Height oversizing the video', 'divi_sections_enhancer' ),
        'regularheight' => esc_html__( 'Adjust to Section Height using the regular video ratio (Only YT)', 'divi_sections_enhancer' ),
        'width'         => esc_html__( 'Use default Size', 'divi_sections_enhancer' ),
        'screen'        => esc_html__( 'Adjust Video height as Screen Height', 'divi_sections_enhancer' ),
        'parallax'      => esc_html__( 'Adjust Video height as Screen Height with parallax', 'divi_sections_enhancer' ),
    ),
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_preloader'] = array(
        'default'     => 'halfcircle',
        'label'       => esc_html__( 'Preloader', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'       => esc_html__( 'None', 'divi_sections_enhancer' ),
        'black'      => esc_html__( 'Black Background', 'divi_sections_enhancer' ),
        'halfcircle' => esc_html__( 'Black Background + Half Circle Spinner', 'divi_sections_enhancer' ),
        'blackhole'  => esc_html__( 'Black Background + Black Hole Spinner', 'divi_sections_enhancer' ),
        'misterious' => esc_html__( 'Black Background + Misterious Spinner', 'divi_sections_enhancer' ),
        'black'      => esc_html__( 'Black Background', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_controls'] = array(
        'default'     => 'no',
        'label'       => esc_html__( 'Display Controls', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'no'  => esc_html__( 'No', 'divi_sections_enhancer' ),
        'yes' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
        'show_if_not' => array(
        'divi_se_vimeobg_source' => 'vimeo',
    ),
    );
    $newfields['divi_se_vimeobg_usebackgroundoverlay'] = array(
        'default'     => 'no',
        'label'       => esc_html__( 'Use default background styles as overlay', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'no'  => esc_html__( 'No', 'divi_sections_enhancer' ),
        'yes' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
        'show_if_not' => array(
        'divi_se_vimeobg_source' => 'vimeo',
    ),
    );
    $newfields['divi_se_vimeobg_start'] = array(
        'label'       => esc_html__( 'Youtube Video Start Time (Optional, in seconds)', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
        'show_if_not' => array(
        'divi_se_vimeobg_source' => 'vimeo',
    ),
    );
    $newfields['divi_se_vimeobg_end'] = array(
        'label'       => esc_html__( 'Youtube Video End Time (Optional, in seconds)', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
        'show_if_not' => array(
        'divi_se_vimeobg_source' => 'vimeo',
    ),
    );
    $newfields['divi_se_vimeobg_delay'] = array(
        'label'          => esc_html__( 'Prealoder Remove Delay Time (miliseconds)', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => '',
        'validate_unit'  => false,
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1200',
        'range_settings' => array(
        'min'  => '0',
        'max'  => '5000',
        'step' => '100',
    ),
        'description'    => esc_html__( 'Time after video starts to remove the preloader', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    $newfields['divi_se_vimeobg_fallback_source'] = array(
        'default'     => 'all',
        'label'       => esc_html__( 'Deactivate', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'all'  => esc_html__( 'All Mobile Devices', 'divi_sections_enhancer' ),
        'some' => esc_html__( 'Mobile Devices that not support the autoplay option', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'vimeobg' ),
    );
    //YOUTUBE BACKGROUND
    ////////////
    $newfields['divi_se_youtubebg_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Youtube Background on this section', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_youtubebg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    /*
    $newfields['divi_se_youtube_preview'] = array(
      'label'             => esc_html__( 'Temporary Preview (more info?)', 'divi_sections_enhancer' ),
      'type'            => 'select',
      'options'         => array(
        'divi_se_youtube_pnone' => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_youtube_preview'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
      ),
      'tab_slug'				=> 'custom_css',
      'toggle_slug'			=> 'custom_css',
      'description'     => esc_html__( 'This option will show a preview of your adjustments, but it won\'t be active once you reload the vb, unless you activate it again. you can check final results on front end.', 'divi_sections_enhancer' ),
      'show_if'         => divi_sections_enhancer_check_for_if('youtubebg'),
    );
    */
    $newfields['divi_se_youtubebg_id'] = array(
        'label'       => esc_html__( 'Youtube Video ID', 'divi_sections_enhancer' ),
        'default'     => 'ab0TSkLe-E0',
        'type'        => 'text',
        'description' => esc_html__( 'Last Parameter on a youtube url', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_mute'] = array(
        'default'     => 'false',
        'label'       => esc_html__( 'Activate Sound', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'true'  => esc_html__( 'No', 'divi_sections_enhancer' ),
        'false' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_repeat'] = array(
        'default'     => 'true',
        'label'       => esc_html__( 'Repeat Video', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
        'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_ratio'] = array(
        'default'     => '',
        'label'       => esc_html__( 'video ratio', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        '16/9' => esc_html__( '16/9', 'divi_sections_enhancer' ),
        '4/3'  => esc_html__( '4/3', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_width'] = array(
        'default'     => 'window',
        'label'       => esc_html__( 'Video Width', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'window'  => esc_html__( 'Use adaptative width (recommended)', 'divi_sections_enhancer' ),
        'section' => esc_html__( 'Use default width', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_height'] = array(
        'default'     => '1.4',
        'label'       => esc_html__( 'Video Height', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        '1'    => esc_html__( 'Original', 'divi_sections_enhancer' ),
        '1.4'  => esc_html__( 'Increased', 'divi_sections_enhancer' ),
        '2.15' => esc_html__( 'Fit to Section Height', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_parallax'] = array(
        'default'     => 'yes',
        'label'       => esc_html__( 'Activate Parallax Effect', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'no'     => esc_html__( 'No', 'divi_sections_enhancer' ),
        'yes'    => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        'mobile' => esc_html__( 'Only Mobile', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_hidetop'] = array(
        'label'       => esc_html__( 'Hide top', 'divi_sections_enhancer' ),
        'default'     => '-200px',
        'type'        => 'text',
        'description' => esc_html__( 'Hide some video to avoid display youtube header', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_start'] = array(
        'label'       => esc_html__( 'Start time (seconds ex: 0)', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( 'leave it empty for auto', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    $newfields['divi_se_youtubebg_stop'] = array(
        'label'       => esc_html__( 'End time (seconds ex: 20)', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( 'Counting from video beginning, not from start time. leave it empty for auto', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'youtubebg' ),
    );
    //TILTED ROWS
    ////////////
    $newfields['divi_se_tiltedrows_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Tilted Section', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'               => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_tiltedRows' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'tiltedRows' ),
    );
    $newfields['divi_se_tiltedrows_height'] = array(
        'label'       => esc_html__( 'Rows Height', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( 'Rows fixed height will improves transitions on scroll down. Leave it empty to use the default height of each row.', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'tiltedRows' ),
    );
    $newfields['divi_se_restricted_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Restricted Content', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_recontent' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'restrictedContent' ),
    );
    $newfields['divi_se_masonry_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Masonry Layout', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'            => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_masonry' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'masonry' ),
    );
    //PARTICLES BACKGROUND
    $newfields['divi_se_particles_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Particles Background', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'                 => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_particles_bg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_dots_color'] = array(
        'label'        => esc_html__( 'Dots Color', 'divi_sections_enhancer' ),
        'default'      => '#2bff75',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_lines_color'] = array(
        'label'        => esc_html__( 'Lines Color', 'divi_sections_enhancer' ),
        'default'      => '#000000',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_directionx'] = array(
        'default'     => 'center',
        'label'       => esc_html__( 'Horizontal Direction', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'left'   => esc_html__( 'left', 'divi_sections_enhancer' ),
        'center' => esc_html__( 'center', 'divi_sections_enhancer' ),
        'right'  => esc_html__( 'right', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( 'Can be one of center, left or right. center means that the dots will bounce off the edges of the canvas.', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_directiony'] = array(
        'default'     => 'center',
        'label'       => esc_html__( 'Vertical Direction', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'up'     => esc_html__( 'up', 'divi_sections_enhancer' ),
        'center' => esc_html__( 'center', 'divi_sections_enhancer' ),
        'down'   => esc_html__( 'down', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( 'Can be one of center, left or right. center means that the dots will bounce off the edges of the canvas.', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_density'] = array(
        'label'          => esc_html__( 'Density', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'default_unit'   => ' ',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '3500',
        'range_settings' => array(
        'min'  => '500',
        'max'  => '10000',
        'step' => '500',
    ),
        'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_particleradius'] = array(
        'label'          => esc_html__( 'Particles Radius', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '5',
        'range_settings' => array(
        'min'  => '1',
        'max'  => '10',
        'step' => '1',
    ),
        'description'    => esc_html__( 'Dot size', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_linewidth'] = array(
        'label'          => esc_html__( 'Line Width', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1',
        'range_settings' => array(
        'min'  => '0.1',
        'max'  => '3',
        'step' => '0.1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    $newfields['divi_se_particles_parallax'] = array(
        'default'     => 'true',
        'label'       => esc_html__( 'Parallax', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'false' => esc_html__( 'false', 'divi_sections_enhancer' ),
        'true'  => esc_html__( 'true', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'particlesBackground' ),
    );
    // WATERPIPE BACKGROUND
    $newfields['divi_se_waterpipe_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Waterpipe Background', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'                => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_waterpipeBg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'waterpipeBackground' ),
    );
    $newfields['divi_se_waterpipe_gradientstart'] = array(
        'label'        => esc_html__( 'Gradient Start', 'divi_sections_enhancer' ),
        'default'      => '#0ed1ef',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'description'  => esc_html__( 'Gradient start color in hex format.', 'divi_sections_enhancer' ),
        'show_if'      => divi_sections_enhancer_check_for_if( 'waterpipeBackground' ),
    );
    $newfields['divi_se_waterpipe_gradientend'] = array(
        'label'        => esc_html__( 'Gradient End', 'divi_sections_enhancer' ),
        'default'      => '#7d11db',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'description'  => esc_html__( 'Gradient end color in hex format.', 'divi_sections_enhancer' ),
        'show_if'      => divi_sections_enhancer_check_for_if( 'waterpipeBackground' ),
    );
    $newfields['divi_se_waterpipe_smokeopacity'] = array(
        'label'          => esc_html__( 'Smoke Opacity', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '0.1',
        'range_settings' => array(
        'min'  => '0.1',
        'max'  => '1',
        'step' => '0.1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'waterpipeBackground' ),
    );
    $newfields['divi_se_waterpipe_linewidth'] = array(
        'label'          => esc_html__( 'Line Width', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '2',
        'range_settings' => array(
        'min'  => '1',
        'max'  => '10',
        'step' => '1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'waterpipeBackground' ),
    );
    $newfields['divi_se_waterpipe_speed'] = array(
        'label'          => esc_html__( 'Drawing speed', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1',
        'range_settings' => array(
        'min'  => '0.5',
        'max'  => '30',
        'step' => '0.5',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'waterpipeBackground' ),
    );
    //GEOMETRY ANGLE BACKGROUND
    $newfields['divi_se_geometry_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Geometry Angle Background', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'                     => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_geometryangle_bg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    $newfields['divi_se_geometry_preview'] = array(
        'label'       => esc_html__( 'Temporary Preview (more info?)', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'divi_se_geometryangle_pnone'   => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_geometryangle_preview' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( 'This option will show a preview of your adjustments, but it won\'t be active once you reload the vb, unless you activate it again. you can check final results on front end.', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    $newfields['divi_se_geometry_meshbg'] = array(
        'label'        => esc_html__( 'Mesh Background Color', 'divi_sections_enhancer' ),
        'default'      => '#edf000',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    $newfields['divi_se_geometry_meshdiffuse'] = array(
        'label'        => esc_html__( 'Mesh Diffuse Color', 'divi_sections_enhancer' ),
        'default'      => '#9200f4',
        'type'         => 'color-alpha',
        'class'        => array( 'geometry_colorpicker' ),
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    $newfields['divi_se_geometry_meshambient'] = array(
        'label'        => esc_html__( 'Mesh Ambient Color', 'divi_sections_enhancer' ),
        'default'      => '#0c71c3',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    $newfields['divi_se_geometry_lightsdiffuse'] = array(
        'label'        => esc_html__( 'Lights Diffuse Color', 'divi_sections_enhancer' ),
        'default'      => '#ffbb00',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    $newfields['divi_se_geometry_lightsambient'] = array(
        'label'        => esc_html__( 'Lights Ambient Color', 'divi_sections_enhancer' ),
        'default'      => '#fc2356',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'geometryangle' ),
    );
    //STARS WARP BACKGROUND
    $newfields['divi_se_starswarp_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Stars Warp Background', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'                 => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_starswarp_bg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_bg'] = array(
        'label'        => esc_html__( 'Stars Warp Background Color', 'divi_sections_enhancer' ),
        'default'      => '#000000',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_color'] = array(
        'label'        => esc_html__( 'Stars Color', 'divi_sections_enhancer' ),
        'default'      => '#ffffff',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_inb'] = array(
        'label'          => esc_html__( 'Inactive Stars number', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '2200',
        'range_settings' => array(
        'min'  => '200',
        'max'  => '5000',
        'step' => '200',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_anb'] = array(
        'label'          => esc_html__( 'Active Stars number', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '6400',
        'range_settings' => array(
        'min'  => '200',
        'max'  => '10000',
        'step' => '200',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_speed_s'] = array(
        'label'          => esc_html__( 'Inactive Stars Speed', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '20',
        'range_settings' => array(
        'min'  => '5',
        'max'  => '40',
        'step' => '1',
    ),
        'description'    => esc_html__( 'Initial Stars Speed', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_speed'] = array(
        'label'          => esc_html__( 'Active Stars Speed', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '100',
        'range_settings' => array(
        'min'  => '20',
        'max'  => '300',
        'step' => '10',
    ),
        'description'    => esc_html__( 'Stars speed when mouse pass over', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_mouse'] = array(
        'default'     => 'true',
        'label'       => esc_html__( 'Activate mouse effects', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
        'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    $newfields['divi_se_starswarp_touch'] = array(
        'default'     => 'true',
        'label'       => esc_html__( 'Activate touch effects', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
        'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'starswarp' ),
    );
    //SPARKLES
    ////////////////////////
    $newfields['divi_se_sparkles_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Sparkles', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'             => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_sparkles' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_direction'] = array(
        'default'     => 'down',
        'label'       => esc_html__( 'Sparkles Direction', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'down' => esc_html__( 'Down', 'divi_sections_enhancer' ),
        'up'   => esc_html__( 'Up', 'divi_sections_enhancer' ),
        'both' => esc_html__( 'Both', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_count'] = array(
        'label'          => esc_html__( 'Sparkles Count', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '700',
        'range_settings' => array(
        'min'  => '50',
        'max'  => '3000',
        'step' => '50',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_speed'] = array(
        'label'          => esc_html__( 'Sparkles Speed', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '5',
        'range_settings' => array(
        'min'  => '1',
        'max'  => '100',
        'step' => '1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_minsize'] = array(
        'label'          => esc_html__( 'Sparkles Minimum Size', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '2',
        'range_settings' => array(
        'min'  => '1',
        'max'  => '20',
        'step' => '1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_maxsize'] = array(
        'label'          => esc_html__( 'Sparkles Maximum Size', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '15',
        'range_settings' => array(
        'min'  => '5',
        'max'  => '100',
        'step' => '1',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_color'] = array(
        'default'     => 'rainbow',
        'label'       => esc_html__( 'Sparkles Color', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'rainbow' => esc_html__( 'Rainbow', 'divi_sections_enhancer' ),
        'custom'  => esc_html__( 'Custom', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    $newfields['divi_se_sparkles_color1'] = array(
        'label'        => esc_html__( 'Sparkles Color One', 'divi_sections_enhancer' ),
        'default'      => '#ffffff',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => array(
        'divi_se_set'            => 'sparkles',
        'divi_se_sparkles_color' => 'custom',
    ),
    );
    $newfields['divi_se_sparkles_color2'] = array(
        'label'        => esc_html__( 'Sparkles Color Two', 'divi_sections_enhancer' ),
        'default'      => '#ffffff',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => array(
        'divi_se_set'            => 'sparkles',
        'divi_se_sparkles_color' => 'custom',
    ),
    );
    $newfields['divi_se_sparkles_color3'] = array(
        'label'        => esc_html__( 'Sparkles Color Three', 'divi_sections_enhancer' ),
        'default'      => '#ffffff',
        'type'         => 'color-alpha',
        'custom_color' => true,
        'tab_slug'     => 'custom_css',
        'toggle_slug'  => 'custom_css',
        'show_if'      => array(
        'divi_se_set'            => 'sparkles',
        'divi_se_sparkles_color' => 'custom',
    ),
    );
    $newfields['divi_se_sparkles_display'] = array(
        'default'     => 'yes',
        'label'       => esc_html__( 'Displays Sparkles on Page Load', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'no'  => esc_html__( 'No', 'divi_sections_enhancer' ),
        'yes' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'sparkles' ),
    );
    // SCROLLIFY
    ////////////////////////////////////
    $newfields['divi_se_scrollify_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Scrollify (This will affect all sections on the page)', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_scrollify' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollify' ),
    );
    $newfields['divi_se_scrollify_easing'] = array(
        'default'     => 'easeOutExpo',
        'label'       => esc_html__( 'Easing', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'linear'      => esc_html__( 'linear', 'divi_sections_enhancer' ),
        'easeOutExpo' => esc_html__( 'easeOutExpo', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollify' ),
    );
    $newfields['divi_se_sparkles_scrollspeed'] = array(
        'label'          => esc_html__( 'Scroll Speed', 'divi_sections_enhancer' ),
        'type'           => 'range',
        'tab_slug'       => 'custom_css',
        'toggle_slug'    => 'custom_css',
        'default'        => '1100',
        'range_settings' => array(
        'min'  => '100',
        'max'  => '10000',
        'step' => '100',
    ),
        'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'        => divi_sections_enhancer_check_for_if( 'scrollify' ),
    );
    // SCROLLBAR
    ////////////////////////
    $newfields['divi_se_scrollbar_transform'] = array(
        'default'     => '',
        'label'       => esc_html__( 'Activate Scrollbar', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
        'divi_se_scrollbar' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    $newfields['divi_se_scrollbar_height'] = array(
        'label'       => esc_html__( 'Section Height', 'divi_sections_enhancer' ),
        'default'     => '400px',
        'type'        => 'text',
        'description' => esc_html__( 'Leave it empty to use default size', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    $newfields['divi_se_scrollbar_width'] = array(
        'label'       => esc_html__( 'Section Width', 'divi_sections_enhancer' ),
        'default'     => '',
        'type'        => 'text',
        'description' => esc_html__( 'Leave it empty to use default size', 'divi_sections_enhancer' ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    $newfields['divi_se_scrollbar_axis'] = array(
        'default'     => 'y',
        'label'       => esc_html__( 'Axis', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'y'  => esc_html__( 'Vertical Scrollbar', 'divi_sections_enhancer' ),
        'x'  => esc_html__( 'Horizontal Scrollbar', 'divi_sections_enhancer' ),
        'yx' => esc_html__( 'Both Scrollbar', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    $newfields['divi_se_scrollbar_style'] = array(
        'default'     => 'rounded-dots',
        'label'       => esc_html__( 'Scrollbar Style', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'rounded-dots'      => esc_html__( 'Rounded Dots', 'divi_sections_enhancer' ),
        'rounded-dots-dark' => esc_html__( 'Rounded Dots Dark', 'divi_sections_enhancer' ),
        'light'             => esc_html__( 'Regular Light', 'divi_sections_enhancer' ),
        'dark'              => esc_html__( 'Regular Dark', 'divi_sections_enhancer' ),
        'light-thin'        => esc_html__( 'Light Thin', 'divi_sections_enhancer' ),
        'dark-thin'         => esc_html__( 'Dark Thin', 'divi_sections_enhancer' ),
        'inset'             => esc_html__( 'Light Inset', 'divi_sections_enhancer' ),
        'inset-dark'        => esc_html__( 'Dark Inset', 'divi_sections_enhancer' ),
        'rounded'           => esc_html__( 'Light Rounded', 'divi_sections_enhancer' ),
        'rounded-dark'      => esc_html__( 'Dark Rounded', 'divi_sections_enhancer' ),
        '3d-thick'          => esc_html__( '3D Light Thick', 'divi_sections_enhancer' ),
        '3d-thick-dark'     => esc_html__( '3D Dark Thick', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    $newfields['divi_se_scrollbar_autohide'] = array(
        'default'     => 'false',
        'label'       => esc_html__( 'Autohide Scrollbar', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
        'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    $newfields['divi_se_scrollbar_position'] = array(
        'default'     => 'inside',
        'label'       => esc_html__( 'Scrollbar Position', 'divi_sections_enhancer' ),
        'type'        => 'select',
        'options'     => array(
        'inside'  => esc_html__( 'Inside Section', 'divi_sections_enhancer' ),
        'outside' => esc_html__( 'Outside Section', 'divi_sections_enhancer' ),
    ),
        'tab_slug'    => 'custom_css',
        'toggle_slug' => 'custom_css',
        'description' => esc_html__( '', 'divi_sections_enhancer' ),
        'show_if'     => divi_sections_enhancer_check_for_if( 'scrollbar' ),
    );
    return array_merge( $fields_unprocessed, $newfields );
}

// Add options to all modules in array function
////////////////////////////////////////////////
function divi_sections_enhancer_add_to_all()
{
    $filter = 'et_pb_all_fields_unprocessed_et_pb_section';
    add_filter( $filter, 'divi_sections_enhancer_new_options' );
}

divi_sections_enhancer_add_to_all();
function divi_sections_enhancer_modified_output_free( $output, $render_slug, $module )
{
    
    if ( 'et_pb_section' === $render_slug ) {
        $optionsetted = $module->props['divi_se_set'];
        $scrollbar = $module->props['divi_se_scrollbar_transform'];
        $scrollbarheight = $module->props['divi_se_scrollbar_height'];
        $scrollbarwidth = $module->props['divi_se_scrollbar_width'];
        $scrollbaraxis = $module->props['divi_se_scrollbar_axis'];
        $scrollbarstyle = $module->props['divi_se_scrollbar_style'];
        $scrollbarautohide = $module->props['divi_se_scrollbar_autohide'];
        $scrollbarposition = $module->props['divi_se_scrollbar_position'];
        $youtubebg = $module->props['divi_se_youtubebg_transform'];
        $youtubebgid = $module->props['divi_se_youtubebg_id'];
        $youtubebgmute = $module->props['divi_se_youtubebg_mute'];
        $youtubebgrepeat = $module->props['divi_se_youtubebg_repeat'];
        $youtubebgratio = $module->props['divi_se_youtubebg_ratio'];
        $youtubebgparallax = $module->props['divi_se_youtubebg_parallax'];
        $youtubebghidetop = $module->props['divi_se_youtubebg_hidetop'];
        $youtubebgstart = $module->props['divi_se_youtubebg_start'];
        $youtubebgstop = $module->props['divi_se_youtubebg_stop'];
        $youtubebgwidth = $module->props['divi_se_youtubebg_width'];
        $youtubebgheight = $module->props['divi_se_youtubebg_height'];
        $vimeobg = $module->props['divi_se_vimeobg_transform'];
        $vimeoytbgsource = $module->props['divi_se_vimeobg_source'];
        $vimeobgid = $module->props['divi_se_vimeobg_id'];
        $vimeobgmute = $module->props['divi_se_vimeobg_mute'];
        $vimeobgrepeat = $module->props['divi_se_vimeobg_repeat'];
        $vimeobgpreloader = $module->props['divi_se_vimeobg_preloader'];
        $vimeoytbgoverlay = $module->props['divi_se_vimeobg_usebackgroundoverlay'];
        $vimeoytcontrols = $module->props['divi_se_vimeobg_controls'];
        $vimeoytbgstart = $module->props['divi_se_vimeobg_start'];
        $vimeoytbgend = $module->props['divi_se_vimeobg_end'];
        $vimeoytbgdelay = $module->props['divi_se_vimeobg_delay'];
        if ( isset( $module->props['divi_se_vimeobg_fallback_source'] ) ) {
            $vimeoytbgfallsource = $module->props['divi_se_vimeobg_fallback_source'];
        }
        $vimeobgwidth = $module->props['divi_se_vimeobg_width'];
        $vimeobgresponsive = et_pb_responsive_options()->get_property_values( $module->props, 'divi_se_vimeobg_width' );
        $vimeobg_desktop = ( isset( $vimeobgresponsive['desktop'] ) ? $vimeobgresponsive['desktop'] : '' );
        $vimeobg_tablet = ( isset( $vimeobgresponsive['tablet'] ) ? $vimeobgresponsive['tablet'] : '' );
        $vimeobg_phone = ( isset( $vimeobgresponsive['phone'] ) ? $vimeobgresponsive['phone'] : '' );
        $tilteffect = $module->props['divi_se_tilt_transform'];
        $tilteffectapplyto = $module->props['divi_se_tilt_applyto'];
        $tilteffectparallax = $module->props['divi_se_tilt_parallax'];
        $tilteffectperspective = $module->props['divi_se_tilt_perspective'];
        $tilteffectscale = $module->props['divi_se_tilt_scale'];
        $offcanvas = $module->props['divi_se_offcanvas_transform'];
        $offcanvaswidth = $module->props['divi_se_offcanvas_width'];
        $offcanvasstyle = $module->props['divi_se_offcanvas_style'];
        $offcanvasopenicon = et_pb_process_font_icon( $module->props['divi_se_offcanvas_openicon'] );
        $offcanvasiconsize = $module->props['divi_se_offcanvas_iconsize'];
        $offcanvasclosedicon = et_pb_process_font_icon( $module->props['divi_se_offcanvas_closedicon'] );
        $offcanvasiconbackground = $module->props['divi_se_offcanvas_iconbackground'];
        $offcanvasiconcolor = $module->props['divi_se_offcanvas_iconcolor'];
        $offcanvastop = $module->props['divi_se_offcanvas_top'];
        $offcanvasleft = $module->props['divi_se_offcanvas_left'];
        $offcanvasbuttontext = $module->props['divi_se_offcanvas_buttontext'];
        $offcanvasheight = $module->props['divi_se_offcanvas_height'];
        $offcanvasinsideposition = $module->props['divi_se_offcanvas_insideposition'];
    }
    
    /*
    SCROLLBAR
    */
    
    if ( isset( $scrollbar ) && $scrollbar !== 'none' && $optionsetted === 'scrollbar' ) {
        //VB mods
        if ( is_array( $output ) ) {
            return $output;
        }
        $data = sprintf(
            '
        data-scrollbarheight="%1$s"
        data-scrollbarwidth="%2$s"
        data-scrollbaraxis="%3$s"
        data-scrollbarstyle="%4$s"
        data-scrollbarautohide="%5$s"
        data-scrollbarposition="%6$s"
        ',
            $scrollbarheight,
            $scrollbarwidth,
            $scrollbaraxis,
            $scrollbarstyle,
            $scrollbarautohide,
            $scrollbarposition
        );
        $output = str_replace( 'class="et_pb_with_border et_pb_section ', $data . ' class="et_pb_with_border et_pb_section ' . $scrollbar . ' ', $output );
        $output = str_replace( 'class="et_pb_section ', $data . ' class="et_pb_section ' . $scrollbar . ' ', $output );
    }
    
    /*
    / Vimeo Background
    */
    
    if ( isset( $vimeobg ) && $vimeobg !== 'none' && $optionsetted === 'vimeobg' ) {
        //VB mods
        
        if ( is_array( $output ) ) {
            $output['attrs']['divi_se_youtube_preview'] = 'no';
            return $output;
        }
        
        
        if ( $vimeoytbgsource == "vimeo" ) {
            $data = sprintf(
                '
          data-vimeobg=\'{"id": "%1$s", "muted": "%2$s", "loop": "%3$s", "width": "%4$s", "widthT": "%5$s", "widthP": "%6$s", "preloader": "%7$s", "delay": "%8$s", "fallsource": "%9$s"}\'',
                $vimeobgid,
                $vimeobgmute,
                $vimeobgrepeat,
                $vimeobg_desktop,
                $vimeobg_tablet,
                $vimeobg_phone,
                $vimeobgpreloader,
                $vimeoytbgdelay,
                $vimeoytbgfallsource
            );
            $output = str_replace( 'class="et_pb_with_border et_pb_section ', $data . ' class="et_pb_with_border et_pb_section ' . $vimeobg . ' ', $output );
            $output = str_replace( 'class="et_pb_section ', $data . ' class="et_pb_section ' . $vimeobg . ' ', $output );
        } else {
            
            if ( $vimeoytbgsource == "youtube" ) {
                $data = sprintf(
                    '
          data-youtubebg=\'{"videoId": "%1$s", "muted": "%2$s", "loop": "%3$s", "width": "%4$s", "widthT": "%5$s", "widthP": "%6$s", "preloader": "%7$s", "start": "%8$s", "end": "%9$s", "delay": "%10$s", "bgoverlay": "%11$s", "controls": "%12$s", "fallsource": "%13$s"}\'',
                    $vimeobgid,
                    $vimeobgmute,
                    $vimeobgrepeat,
                    $vimeobg_desktop,
                    $vimeobg_tablet,
                    $vimeobg_phone,
                    $vimeobgpreloader,
                    $vimeoytbgstart,
                    $vimeoytbgend,
                    $vimeoytbgdelay,
                    $vimeoytbgoverlay,
                    $vimeoytcontrols,
                    $vimeoytbgfallsource
                );
                $output = str_replace( 'class="et_pb_with_border et_pb_section ', $data . ' class="et_pb_with_border et_pb_section divi_se_youtubebgnew ', $output );
                $output = str_replace( 'class="et_pb_section ', $data . ' class="et_pb_section divi_se_youtubebgnew ', $output );
            }
        
        }
    
    }
    
    /*
    / Youtube Background
    */
    
    if ( isset( $youtubebg ) && $youtubebg !== 'none' && $optionsetted === 'youtubebg' ) {
        //VB mods
        
        if ( is_array( $output ) ) {
            $output['attrs']['divi_se_youtube_preview'] = 'no';
            return $output;
        }
        
        $data = sprintf(
            '
        data-youtubebgid="%1$s"
        data-youtubebgmute="%2$s"
        data-youtubebgrepeat="%3$s"
        data-youtubebgratio="%4$s"
        data-youtubebgparallax="%5$s"
        data-youtubebghidetop="%6$s"
        data-youtubebgstart="%7$s"
        data-youtubebgstop="%8$s"
        data-youtubebgwidth="%9$s"
        data-youtubebgheight="%10$s"
        ',
            $youtubebgid,
            $youtubebgmute,
            $youtubebgrepeat,
            $youtubebgratio,
            $youtubebgparallax,
            $youtubebghidetop,
            $youtubebgstart,
            $youtubebgstop,
            $youtubebgwidth,
            $youtubebgheight
        );
        $output = str_replace( 'class="et_pb_with_border et_pb_section ', $data . ' class="et_pb_with_border et_pb_section ' . $youtubebg . ' ', $output );
        $output = str_replace( 'class="et_pb_section ', $data . ' class="et_pb_section ' . $youtubebg . ' ', $output );
    }
    
    /*
    / Tilt Effect
    */
    
    if ( isset( $tilteffect ) && $tilteffect !== 'none' && $optionsetted === 'tilt' ) {
        //VB mods
        if ( is_array( $output ) ) {
            return $output;
        }
        $data = sprintf(
            '
        data-tilteffectapplyto="%1$s"
        data-tilteffectparallax="%2$s"
        data-tilteffectperspective="%3$s"
        data-tilteffectscale="%4$s"
        ',
            $tilteffectapplyto,
            $tilteffectparallax,
            $tilteffectperspective,
            $tilteffectscale
        );
        $output = str_replace( 'class="et_pb_with_border et_pb_section ', $data . ' class="et_pb_with_border et_pb_section ' . $tilteffect . ' ', $output );
        $output = str_replace( 'class="et_pb_section ', $data . ' class="et_pb_section ' . $tilteffect . ' ', $output );
    }
    
    /*
    / OFF Canvas
    */
    
    if ( isset( $offcanvas ) && $offcanvas !== 'none' && $optionsetted === 'offcanvas' ) {
        $data = sprintf(
            '
        data-offcanvaswidth="%1$s"
        data-offcanvasstyle="%2$s"
        data-offcanvasopenicon="%3$s"
        data-offcanvasiconsize="%4$s"
        data-offcanvasclosedicon="%5$s"
        data-offcanvasiconbackground="%6$s"
        data-offcanvasiconcolor="%7$s"
        data-offcanvastop="%8$s"
        data-offcanvasleft="%9$s"
        data-offcanvasbuttontext="%10$s"
        data-offcanvasheight="%11$s"
        data-offcanvasinsideposition="%12$s"
        ',
            $offcanvaswidth,
            $offcanvasstyle,
            $offcanvasopenicon,
            $offcanvasiconsize,
            $offcanvasclosedicon,
            $offcanvasiconbackground,
            $offcanvasiconcolor,
            $offcanvastop,
            $offcanvasleft,
            $offcanvasbuttontext,
            $offcanvasheight,
            $offcanvasinsideposition
        );
        $output = str_replace( 'class="et_pb_with_border et_pb_section ', $data . ' class="et_pb_with_border et_pb_section ' . $offcanvas . ' ', $output );
        $output = str_replace( 'class="et_pb_section ', $data . ' class="et_pb_section ' . $offcanvas . ' ', $output );
    }
    
    return $output;
}

add_filter(
    'et_module_shortcode_output',
    'divi_sections_enhancer_modified_output_free',
    10,
    3
);