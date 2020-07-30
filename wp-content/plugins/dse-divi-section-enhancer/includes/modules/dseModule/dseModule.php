<?php

class DSE_Module extends ET_Builder_Module
{
    protected  $module_credits = array(
        'module_uri' => 'https://miguras.com/divi_enhancer/ihover',
        'author'     => 'Miguras: Pro Version Home',
        'author_uri' => 'https://miguras.com',
    ) ;
    public function init()
    {
        $this->slug = 'dseModule';
        $this->name = esc_html__( "DSE", "divi_section_enhancer" );
        $this->vb_support = 'on';
        $this->main_css_element = '%%order_class%%';
        $dsetoggles = array();
        //Youtube Background
        if ( null !== get_option( 'dse-enable-youtube' ) ) {
            if ( get_option( 'dse-enable-youtube' ) != 'no' ) {
                $dsetoggles['youtube_background'] = esc_html__( 'Youtube Background', 'divi_sections_enhancer' );
            }
        }
        //FREE Particles Background
        if ( null !== get_option( 'dse-enable-particles' ) ) {
            if ( get_option( 'dse-enable-particles' ) != 'no' ) {
                $dsetoggles['particles'] = esc_html__( 'Particles', 'divi_sections_enhancer' );
            }
        }
        //tilt effect
        if ( null !== get_option( 'dse-enable-tilteffect' ) ) {
            if ( get_option( 'dse-enable-tilteffect' ) != 'no' ) {
                $dsetoggles['tilt_effect'] = esc_html__( 'Tilt Effect', 'divi_sections_enhancer' );
            }
        }
        //Sidebar
        if ( null !== get_option( 'dse-enable-sidebar' ) ) {
            if ( get_option( 'dse-enable-sidebar' ) != 'no' ) {
                $dsetoggles['offcanvas_sidebar'] = esc_html__( 'OFF Canvas Sidebar', 'divi_sections_enhancer' );
            }
        }
        //scrollbar
        if ( null !== get_option( 'dse-enable-scrollbar' ) ) {
            if ( get_option( 'dse-enable-scrollbar' ) != 'no' ) {
                $dsetoggles['scrollbar'] = esc_html__( 'Scrollbar', 'divi_sections_enhancer' );
            }
        }
        //PRO Particles Background
        if ( null !== get_option( 'dse-enable-proparticles' ) ) {
            if ( get_option( 'dse-enable-proparticles' ) != 'no' ) {
                $dsetoggles['proparticles'] = esc_html__( 'PRO Particles', 'divi_sections_enhancer' );
            }
        }
        //Geometry Angle
        if ( null !== get_option( 'dse-enable-geometry' ) ) {
            if ( get_option( 'dse-enable-geometry' ) != 'no' ) {
                $dsetoggles['geometry_angle'] = esc_html__( 'Geometry Angle', 'divi_sections_enhancer' );
            }
        }
        //Sparkles
        if ( null !== get_option( 'dse-enable-sparkles' ) ) {
            if ( get_option( 'dse-enable-sparkles' ) != 'no' ) {
                $dsetoggles['sparkles'] = esc_html__( 'Sparkles', 'divi_sections_enhancer' );
            }
        }
        //Tilted Sections
        if ( null !== get_option( 'dse-enable-tiltedsections' ) ) {
            if ( get_option( 'dse-enable-tiltedsections' ) != 'no' ) {
                $dsetoggles['tilted'] = esc_html__( 'Tilted Section', 'divi_sections_enhancer' );
            }
        }
        //Stars Warp
        if ( null !== get_option( 'dse-enable-starswarp' ) ) {
            if ( get_option( 'dse-enable-starswarp' ) != 'no' ) {
                $dsetoggles['starswarp'] = esc_html__( 'Stars Warp', 'divi_sections_enhancer' );
            }
        }
        //Waterpipe Background
        if ( null !== get_option( 'dse-enable-waterpipe' ) ) {
            if ( get_option( 'dse-enable-waterpipe' ) != 'no' ) {
                $dsetoggles['waterpipe'] = esc_html__( 'Waterpipe', 'divi_sections_enhancer' );
            }
        }
        //Scrollify
        if ( null !== get_option( 'dse-enable-scrollify' ) ) {
            if ( get_option( 'dse-enable-scrollify' ) != 'no' ) {
                $dsetoggles['scrollify'] = esc_html__( 'Scrollify', 'divi_sections_enhancer' );
            }
        }
        //STACKS
        if ( null !== get_option( 'dse-enable-stacks' ) ) {
            if ( get_option( 'dse-enable-stacks' ) != 'no' ) {
                $dsetoggles['stacks'] = esc_html__( 'Stacks', 'divi_sections_enhancer' );
            }
        }
        $this->settings_modal_toggles = array(
            'general'  => array(
            'toggles' => $dsetoggles,
        ),
            'advanced' => false,
            'design'   => false,
        );
    }
    
    public function get_fields()
    {
        
        if ( function_exists( 'dse_fs' ) ) {
            
            if ( dse_fs()->is_paying() ) {
                $onlypro = '';
            } else {
                $onlypro = ' (Only PRO)';
            }
        
        } else {
            $onlypro = ' (Only PRO)';
        }
        
        $newfields = [];
        // PRO PARTICLES SECTION
        $newfields['divi_se_proparticles_transform'] = array(
            'default'     => 'none',
            'label'       => esc_html__( 'Activate PRO Particles' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'                 => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_proparticles' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'proparticles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'proparticles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_proparticles_particlescolor'] = array(
            'label'        => esc_html__( 'Particles Color', 'divienhancer' ),
            'default'      => '#000000',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'proparticles',
        );
        $newfields['divi_se_proparticles_size'] = array(
            'label'          => esc_html__( 'Particles size', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => '',
            'validate_unit'  => false,
            'tab_slug'       => 'general',
            'toggle_slug'    => 'proparticles',
            'default'        => '3',
            'range_settings' => array(
            'min'  => '0.1',
            'max'  => '100',
            'step' => '0.1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_proparticles_number'] = array(
            'label'          => esc_html__( 'Particles Number', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => '',
            'validate_unit'  => false,
            'tab_slug'       => 'general',
            'toggle_slug'    => 'proparticles',
            'default'        => '80',
            'range_settings' => array(
            'min'  => '0',
            'max'  => '1000',
            'step' => '1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_proparticles_density'] = array(
            'label'          => esc_html__( 'Particles Density', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => '',
            'validate_unit'  => false,
            'tab_slug'       => 'general',
            'toggle_slug'    => 'proparticles',
            'default'        => '800',
            'range_settings' => array(
            'min'  => '100',
            'max'  => '10000',
            'step' => '100',
        ),
            'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_proparticles_linescolor'] = array(
            'label'        => esc_html__( 'Lines Color', 'divienhancer' ),
            'default'      => '#000000',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'proparticles',
        );
        $newfields['divi_se_proparticles_lineswidth'] = array(
            'label'          => esc_html__( 'Lines Width', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => '',
            'validate_unit'  => false,
            'tab_slug'       => 'general',
            'toggle_slug'    => 'proparticles',
            'default'        => '1',
            'range_settings' => array(
            'min'  => '0',
            'max'  => '20',
            'step' => '0.1',
        ),
            'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'proparticles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_proparticles_speed'] = array(
            'label'          => esc_html__( 'Speed', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => '',
            'validate_unit'  => false,
            'tab_slug'       => 'general',
            'toggle_slug'    => 'proparticles',
            'default'        => '6',
            'range_settings' => array(
            'min'  => '0',
            'max'  => '150',
            'step' => '0.1',
        ),
            'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'proparticles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        // STACKS SECTION
        $newfields['divi_se_stacks_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Stacks (This will affect all sections below this one)' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'           => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_stacks' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'stacks',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        // OFFCANVAS SECTION
        $newfields['divi_se_offcanvas_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate OFF Canvas Sidebar', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_offcanvas' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_offcanvas_width'] = array(
            'label'       => esc_html__( 'Sidebar Width', 'divi_sections_enhancer' ),
            'default'     => '350px',
            'type'        => 'text',
            'description' => esc_html__( '', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_offcanvas_openicon'] = array(
            'label'       => esc_html__( 'Select Icon to open sidebar', 'divienhancer' ),
            'type'        => 'select_icon',
            'class'       => array( 'et-pb-font-icon' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
            'description' => esc_html__( 'Choose an icon to display inside the button.', 'divienhancer' ),
        );
        $newfields['divi_se_offcanvas_buttontext'] = array(
            'label'       => esc_html__( 'Text for outside button (Optional)', 'divi_sections_enhancer' ),
            'default'     => '',
            'type'        => 'text',
            'description' => esc_html__( '', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
        );
        $newfields['divi_se_offcanvas_iconsize'] = array(
            'label'          => esc_html__( 'Icon Size', 'divienhancer' ),
            'default'        => '35',
            'range_settings' => array(
            'min'  => '5',
            'max'  => '50',
            'step' => '1',
        ),
            'type'           => 'range',
            'class'          => array( 'divienhancer-range' ),
            'tab_slug'       => 'general',
            'toggle_slug'    => 'offcanvas_sidebar',
        );
        $newfields['divi_se_offcanvas_closedicon'] = array(
            'label'       => esc_html__( 'Select Icon for close sidebar', 'divienhancer' ),
            'type'        => 'select_icon',
            'class'       => array( 'et-pb-font-icon' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
            'description' => esc_html__( 'Choose an icon to close the button.', 'divienhancer' ),
        );
        $newfields['divi_se_offcanvas_iconbackground'] = array(
            'label'        => esc_html__( 'Button Background Color', 'divienhancer' ),
            'default'      => '#111111',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'offcanvas_sidebar',
        );
        $newfields['divi_se_offcanvas_iconcolor'] = array(
            'label'        => esc_html__( 'Icon Color', 'divienhancer' ),
            'default'      => '#ffffff',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'offcanvas_sidebar',
        );
        $newfields['divi_se_offcanvas_top'] = array(
            'label'       => esc_html__( 'Outside icon distance from top', 'divi_sections_enhancer' ),
            'default'     => '100px',
            'type'        => 'text',
            'description' => esc_html__( '', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
        );
        $newfields['divi_se_offcanvas_left'] = array(
            'label'       => esc_html__( 'Outside icon distance from left', 'divi_sections_enhancer' ),
            'default'     => '50px',
            'type'        => 'text',
            'description' => esc_html__( '', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_offcanvas_height'] = array(
            'label'       => esc_html__( 'Sidebar Height', 'divi_sections_enhancer' ),
            'default'     => 'auto',
            'type'        => 'text',
            'description' => esc_html__( '', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'offcanvas_sidebar',
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'tilt_effect',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_tilt_applyto'] = array(
            'default'     => 'section',
            'label'       => esc_html__( 'Apply to', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'section' => esc_html__( 'Entire Section', 'divi_sections_enhancer' ),
            'modules' => esc_html__( 'Modules', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'tilt_effect',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_tilt_parallax'] = array(
            'default'     => 'yes',
            'label'       => esc_html__( 'Parallax Effect', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'no'  => esc_html__( 'No', 'divi_sections_enhancer' ),
            'yes' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'tilt_effect',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
            'show_if'     => array(
            'divi_se_tilt_applyto' => 'section',
        ),
        );
        $newfields['divi_se_tilt_perspective'] = array(
            'label'          => esc_html__( 'Perspective', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => ' ',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'tilt_effect',
            'default'        => '1000',
            'range_settings' => array(
            'min'  => '100',
            'max'  => '1000',
            'step' => '100',
        ),
            'description'    => esc_html__( 'Transform perspective, the lower the more extreme the tilt gets.', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_tilt_scale'] = array(
            'label'          => esc_html__( 'Scale', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => ' ',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'tilt_effect',
            'default'        => '1',
            'range_settings' => array(
            'min'  => '0.5',
            'max'  => '3',
            'step' => '0.1',
        ),
            'description'    => esc_html__( '2 = 200%, 1.5 = 150%, etc..', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_youtubebg_id'] = array(
            'label'       => esc_html__( 'Youtube Video ID', 'divi_sections_enhancer' ),
            'default'     => 'ab0TSkLe-E0',
            'type'        => 'text',
            'description' => esc_html__( 'Last Parameter on a youtube url', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
        );
        $newfields['divi_se_youtubebg_mute'] = array(
            'default'     => 'false',
            'label'       => esc_html__( 'Activate Sound', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'true'  => esc_html__( 'No', 'divi_sections_enhancer' ),
            'false' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_youtubebg_repeat'] = array(
            'default'     => 'true',
            'label'       => esc_html__( 'Repeat Video', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
            'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_youtubebg_ratio'] = array(
            'default'     => '',
            'label'       => esc_html__( 'video ratio', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            '16/9' => esc_html__( '16/9', 'divi_sections_enhancer' ),
            '4/3'  => esc_html__( '4/3', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_youtubebg_width'] = array(
            'default'     => 'window',
            'label'       => esc_html__( 'Video Width', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'window'  => esc_html__( 'Use adaptative width (recommended)', 'divi_sections_enhancer' ),
            'section' => esc_html__( 'Use default width', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_youtubebg_hidetop'] = array(
            'label'       => esc_html__( 'Hide top', 'divi_sections_enhancer' ),
            'default'     => '-200px',
            'type'        => 'text',
            'description' => esc_html__( 'Hide some video to avoid display youtube header', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
        );
        $newfields['divi_se_youtubebg_start'] = array(
            'label'       => esc_html__( 'Start time (seconds ex: 0)', 'divi_sections_enhancer' ),
            'default'     => '',
            'type'        => 'text',
            'description' => esc_html__( 'leave it empty for auto', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
        );
        $newfields['divi_se_youtubebg_stop'] = array(
            'label'       => esc_html__( 'End time (seconds ex: 20)', 'divi_sections_enhancer' ),
            'default'     => '',
            'type'        => 'text',
            'description' => esc_html__( 'Counting from video beginning, not from start time. leave it empty for auto', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'youtube_background',
        );
        //TILTED ROWS
        ////////////
        $newfields['divi_se_tiltedrows_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Tilted Section' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'               => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_tiltedRows' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'tilted',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_tiltedrows_height'] = array(
            'label'       => esc_html__( 'Rows Height', 'divi_sections_enhancer' ),
            'default'     => '',
            'type'        => 'text',
            'description' => esc_html__( 'Rows fixed height will improves transitions on scroll down. Leave it empty to use the default height of each row.', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'tilted',
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'particles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_particles_dots_color'] = array(
            'label'        => esc_html__( 'Dots Color', 'divi_sections_enhancer' ),
            'default'      => '#2bff75',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'particles',
        );
        $newfields['divi_se_particles_lines_color'] = array(
            'label'        => esc_html__( 'Lines Color', 'divi_sections_enhancer' ),
            'default'      => '#000000',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'particles',
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'particles',
            'description' => esc_html__( 'Can be one of center, left or right. center means that the dots will bounce off the edges of the canvas.', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'particles',
            'description' => esc_html__( 'Can be one of center, left or right. center means that the dots will bounce off the edges of the canvas.', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_particles_density'] = array(
            'label'          => esc_html__( 'Density', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'default_unit'   => ' ',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'particles',
            'default'        => '3500',
            'range_settings' => array(
            'min'  => '500',
            'max'  => '10000',
            'step' => '500',
        ),
            'description'    => esc_html__( 'Determines how many particles will be generated: one particle every n pixels.', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_particles_particleradius'] = array(
            'label'          => esc_html__( 'Particles Radius', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'particles',
            'default'        => '5',
            'range_settings' => array(
            'min'  => '1',
            'max'  => '10',
            'step' => '1',
        ),
            'description'    => esc_html__( 'Dot size', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_particles_linewidth'] = array(
            'label'          => esc_html__( 'Line Width', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'particles',
            'default'        => '1',
            'range_settings' => array(
            'min'  => '0.1',
            'max'  => '3',
            'step' => '0.1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_particles_parallax'] = array(
            'default'     => 'true',
            'label'       => esc_html__( 'Parallax', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'false' => esc_html__( 'false', 'divi_sections_enhancer' ),
            'true'  => esc_html__( 'true', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'particles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        // WATERPIPE BACKGROUND
        $newfields['divi_se_waterpipe_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Waterpipe Background' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'                => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_waterpipeBg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'waterpipe',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_waterpipe_gradientstart'] = array(
            'label'        => esc_html__( 'Gradient Start', 'divi_sections_enhancer' ),
            'default'      => '#0ed1ef',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'waterpipe',
            'description'  => esc_html__( 'Gradient start color in hex format.', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_waterpipe_gradientend'] = array(
            'label'        => esc_html__( 'Gradient End', 'divi_sections_enhancer' ),
            'default'      => '#7d11db',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'waterpipe',
            'description'  => esc_html__( 'Gradient end color in hex format.', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_waterpipe_smokeopacity'] = array(
            'label'          => esc_html__( 'Smoke Opacity', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'waterpipe',
            'default'        => '0.1',
            'range_settings' => array(
            'min'  => '0.1',
            'max'  => '1',
            'step' => '0.1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_waterpipe_linewidth'] = array(
            'label'          => esc_html__( 'Line Width', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'waterpipe',
            'default'        => '2',
            'range_settings' => array(
            'min'  => '1',
            'max'  => '10',
            'step' => '1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_waterpipe_speed'] = array(
            'label'          => esc_html__( 'Drawing speed', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'waterpipe',
            'default'        => '1',
            'range_settings' => array(
            'min'  => '0.5',
            'max'  => '30',
            'step' => '0.5',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        //GEOMETRY ANGLE BACKGROUND
        $newfields['divi_se_geometry_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Geometry Angle Background' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'                     => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_geometryangle_bg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'geometry_angle',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_geometry_meshbg'] = array(
            'label'        => esc_html__( 'Mesh Background Color', 'divi_sections_enhancer' ),
            'default'      => '#edf000',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'geometry_angle',
        );
        $newfields['divi_se_geometry_meshdiffuse'] = array(
            'label'        => esc_html__( 'Mesh Diffuse Color', 'divi_sections_enhancer' ),
            'default'      => '#9200f4',
            'type'         => 'color-alpha',
            'class'        => array( 'geometry_colorpicker' ),
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'geometry_angle',
        );
        $newfields['divi_se_geometry_meshambient'] = array(
            'label'        => esc_html__( 'Mesh Ambient Color', 'divi_sections_enhancer' ),
            'default'      => '#0c71c3',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'geometry_angle',
        );
        $newfields['divi_se_geometry_lightsdiffuse'] = array(
            'label'        => esc_html__( 'Lights Diffuse Color', 'divi_sections_enhancer' ),
            'default'      => '#ffbb00',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'geometry_angle',
        );
        $newfields['divi_se_geometry_lightsambient'] = array(
            'label'        => esc_html__( 'Lights Ambient Color', 'divi_sections_enhancer' ),
            'default'      => '#fc2356',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'geometry_angle',
        );
        //STARS WARP BACKGROUND
        $newfields['divi_se_starswarp_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Stars Warp Background' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'                 => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_starswarp_bg' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'starswarp',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_starswarp_bg'] = array(
            'label'        => esc_html__( 'Stars Warp Background Color', 'divi_sections_enhancer' ),
            'default'      => '#000000',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'starswarp',
        );
        $newfields['divi_se_starswarp_color'] = array(
            'label'        => esc_html__( 'Stars Color', 'divi_sections_enhancer' ),
            'default'      => '#ffffff',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'starswarp',
        );
        $newfields['divi_se_starswarp_inb'] = array(
            'label'          => esc_html__( 'Inactive Stars number', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'starswarp',
            'default'        => '2200',
            'range_settings' => array(
            'min'  => '200',
            'max'  => '5000',
            'step' => '200',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_starswarp_anb'] = array(
            'label'          => esc_html__( 'Active Stars number', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'starswarp',
            'default'        => '6400',
            'range_settings' => array(
            'min'  => '200',
            'max'  => '10000',
            'step' => '200',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_starswarp_speed_s'] = array(
            'label'          => esc_html__( 'Inactive Stars Speed', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'starswarp',
            'default'        => '20',
            'range_settings' => array(
            'min'  => '5',
            'max'  => '40',
            'step' => '1',
        ),
            'description'    => esc_html__( 'Initial Stars Speed', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_starswarp_speed'] = array(
            'label'          => esc_html__( 'Active Stars Speed', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'starswarp',
            'default'        => '100',
            'range_settings' => array(
            'min'  => '20',
            'max'  => '300',
            'step' => '10',
        ),
            'description'    => esc_html__( 'Stars speed when mouse pass over', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_starswarp_mouse'] = array(
            'default'     => 'true',
            'label'       => esc_html__( 'Activate mouse effects', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
            'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'starswarp',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_starswarp_touch'] = array(
            'default'     => 'true',
            'label'       => esc_html__( 'Activate touch effects', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
            'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'starswarp',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        //SPARKLES
        ////////////////////////
        $newfields['divi_se_sparkles_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Sparkles' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'             => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_sparkles' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'sparkles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'sparkles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_sparkles_count'] = array(
            'label'          => esc_html__( 'Sparkles Count', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'sparkles',
            'default'        => '700',
            'range_settings' => array(
            'min'  => '50',
            'max'  => '3000',
            'step' => '50',
        ),
        );
        $newfields['divi_se_sparkles_speed'] = array(
            'label'          => esc_html__( 'Sparkles Speed', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'sparkles',
            'default'        => '5',
            'range_settings' => array(
            'min'  => '1',
            'max'  => '100',
            'step' => '1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_sparkles_minsize'] = array(
            'label'          => esc_html__( 'Sparkles Minimum Size', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'sparkles',
            'default'        => '2',
            'range_settings' => array(
            'min'  => '1',
            'max'  => '20',
            'step' => '1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_sparkles_maxsize'] = array(
            'label'          => esc_html__( 'Sparkles Maximum Size', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'sparkles',
            'default'        => '15',
            'range_settings' => array(
            'min'  => '5',
            'max'  => '100',
            'step' => '1',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_sparkles_color'] = array(
            'default'     => 'rainbow',
            'label'       => esc_html__( 'Sparkles Color', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'rainbow' => esc_html__( 'Rainbow', 'divi_sections_enhancer' ),
            'custom'  => esc_html__( 'Custom', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'sparkles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_sparkles_color1'] = array(
            'label'        => esc_html__( 'Sparkles Color One', 'divi_sections_enhancer' ),
            'default'      => '#ffffff',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'sparkles',
            'show_if'      => array(
            'divi_se_sparkles_color' => 'custom',
        ),
        );
        $newfields['divi_se_sparkles_color2'] = array(
            'label'        => esc_html__( 'Sparkles Color Two', 'divi_sections_enhancer' ),
            'default'      => '#ffffff',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'sparkles',
            'show_if'      => array(
            'divi_se_sparkles_color' => 'custom',
        ),
        );
        $newfields['divi_se_sparkles_color3'] = array(
            'label'        => esc_html__( 'Sparkles Color Three', 'divi_sections_enhancer' ),
            'default'      => '#ffffff',
            'type'         => 'color-alpha',
            'custom_color' => true,
            'tab_slug'     => 'general',
            'toggle_slug'  => 'sparkles',
            'show_if'      => array(
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'sparkles',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        // SCROLLIFY
        ////////////////////////////////////
        $newfields['divi_se_scrollify_transform'] = array(
            'default'     => '',
            'label'       => esc_html__( 'Activate Scrollify (This will affect all sections on the page)' . $onlypro, 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'none'              => esc_html__( 'No', 'divi_sections_enhancer' ),
            'divi_se_scrollify' => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollify',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_scrollify_easing'] = array(
            'default'     => 'easeOutExpo',
            'label'       => esc_html__( 'Easing', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'linear'      => esc_html__( 'linear', 'divi_sections_enhancer' ),
            'easeOutExpo' => esc_html__( 'easeOutExpo', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollify',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_sparkles_scrollspeed'] = array(
            'label'          => esc_html__( 'Scroll Speed', 'divi_sections_enhancer' ),
            'type'           => 'range',
            'tab_slug'       => 'general',
            'toggle_slug'    => 'scrollify',
            'default'        => '1100',
            'range_settings' => array(
            'min'  => '100',
            'max'  => '10000',
            'step' => '100',
        ),
            'description'    => esc_html__( '', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_scrollbar_height'] = array(
            'label'       => esc_html__( 'Section Height', 'divi_sections_enhancer' ),
            'default'     => '400px',
            'type'        => 'text',
            'description' => esc_html__( 'Leave it empty to use default size', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
        );
        $newfields['divi_se_scrollbar_width'] = array(
            'label'       => esc_html__( 'Section Width', 'divi_sections_enhancer' ),
            'default'     => '',
            'type'        => 'text',
            'description' => esc_html__( 'Leave it empty to use default size', 'divienhancer' ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
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
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_scrollbar_autohide'] = array(
            'default'     => 'false',
            'label'       => esc_html__( 'Autohide Scrollbar', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'false' => esc_html__( 'No', 'divi_sections_enhancer' ),
            'true'  => esc_html__( 'Yes', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        $newfields['divi_se_scrollbar_position'] = array(
            'default'     => 'inside',
            'label'       => esc_html__( 'Scrollbar Position', 'divi_sections_enhancer' ),
            'type'        => 'select',
            'options'     => array(
            'inside'  => esc_html__( 'Inside Section', 'divi_sections_enhancer' ),
            'outside' => esc_html__( 'Outside Section', 'divi_sections_enhancer' ),
        ),
            'tab_slug'    => 'general',
            'toggle_slug' => 'scrollbar',
            'description' => esc_html__( '', 'divi_sections_enhancer' ),
        );
        return $newfields;
    }
    
    public function render( $attrs, $content = null, $render_slug )
    {
        $output = '<div class="dse_module"></div>';
        /*==================== SCROLLBAR ========================*/
        $scrollbar = $this->props['divi_se_scrollbar_transform'];
        $scrollbarheight = $this->props['divi_se_scrollbar_height'];
        $scrollbarwidth = $this->props['divi_se_scrollbar_width'];
        $scrollbaraxis = $this->props['divi_se_scrollbar_axis'];
        $scrollbarstyle = $this->props['divi_se_scrollbar_style'];
        $scrollbarautohide = $this->props['divi_se_scrollbar_autohide'];
        $scrollbarposition = $this->props['divi_se_scrollbar_position'];
        /*==================== TILT EFFECT ========================*/
        $tilteffect = $this->props['divi_se_tilt_transform'];
        $tilteffectapplyto = $this->props['divi_se_tilt_applyto'];
        $tilteffectparallax = $this->props['divi_se_tilt_parallax'];
        $tilteffectperspective = $this->props['divi_se_tilt_perspective'];
        $tilteffectscale = $this->props['divi_se_tilt_scale'];
        /*================== YOUTUBE BACKGROUND ==================*/
        $youtubebg = $this->props['divi_se_youtubebg_transform'];
        $youtubebgid = $this->props['divi_se_youtubebg_id'];
        $youtubebgmute = $this->props['divi_se_youtubebg_mute'];
        $youtubebgrepeat = $this->props['divi_se_youtubebg_repeat'];
        $youtubebgratio = $this->props['divi_se_youtubebg_ratio'];
        $youtubebgparallax = $this->props['divi_se_youtubebg_parallax'];
        $youtubebghidetop = $this->props['divi_se_youtubebg_hidetop'];
        $youtubebgstart = $this->props['divi_se_youtubebg_start'];
        $youtubebgstop = $this->props['divi_se_youtubebg_stop'];
        $youtubebgwidth = $this->props['divi_se_youtubebg_width'];
        $youtubebgheight = $this->props['divi_se_youtubebg_height'];
        /*================== OFF Canvas Sidebar ==================*/
        $offcanvas = $this->props['divi_se_offcanvas_transform'];
        $offcanvaswidth = $this->props['divi_se_offcanvas_width'];
        $offcanvasstyle = $this->props['divi_se_offcanvas_style'];
        $offcanvasopenicon = et_pb_process_font_icon( $this->props['divi_se_offcanvas_openicon'] );
        $offcanvasiconsize = $this->props['divi_se_offcanvas_iconsize'];
        $offcanvasclosedicon = et_pb_process_font_icon( $this->props['divi_se_offcanvas_closedicon'] );
        $offcanvasiconbackground = $this->props['divi_se_offcanvas_iconbackground'];
        $offcanvasiconcolor = $this->props['divi_se_offcanvas_iconcolor'];
        $offcanvastop = $this->props['divi_se_offcanvas_top'];
        $offcanvasleft = $this->props['divi_se_offcanvas_left'];
        $offcanvasbuttontext = $this->props['divi_se_offcanvas_buttontext'];
        $offcanvasheight = $this->props['divi_se_offcanvas_height'];
        $offcanvasinsideposition = $this->props['divi_se_offcanvas_insideposition'];
        /*================== Tilted Sections ==================*/
        $tiltedRows = $this->props['divi_se_tiltedrows_transform'];
        $tiltedRowsHeight = $this->props['divi_se_tiltedrows_height'];
        /*================== Particles BG ==================*/
        $particlesbg = $this->props['divi_se_particles_transform'];
        $particlesdotscolor = $this->props['divi_se_particles_dots_color'];
        $particleslinescolor = $this->props['divi_se_particles_lines_color'];
        $particlesdirectionx = $this->props['divi_se_particles_directionx'];
        $particlesdirectiony = $this->props['divi_se_particles_directiony'];
        $particlesdensity = $this->props['divi_se_particles_density'];
        $particlesradius = $this->props['divi_se_particles_particleradius'];
        $particleslinewidth = $this->props['divi_se_particles_linewidth'];
        $particlesparallax = $this->props['divi_se_particles_parallax'];
        /*================== Waterpipe ==================*/
        $waterpipebg = $this->props['divi_se_waterpipe_transform'];
        $waterpipegradientstart = $this->props['divi_se_waterpipe_gradientstart'];
        $waterpipegradientend = $this->props['divi_se_waterpipe_gradientend'];
        $waterpipesmokeopacity = $this->props['divi_se_waterpipe_smokeopacity'];
        $waterpipelinewidth = $this->props['divi_se_waterpipe_linewidth'];
        $waterpipespeed = $this->props['divi_se_waterpipe_speed'];
        /*================== Geometry Angle ==================*/
        $geometryangle = $this->props['divi_se_geometry_transform'];
        $geometryanglemeshbg = $this->props['divi_se_geometry_meshbg'];
        $geometryanglemeshdiffuse = $this->props['divi_se_geometry_meshdiffuse'];
        $geometryanglemeshambient = $this->props['divi_se_geometry_meshambient'];
        $geometryanglelightsdiffuse = $this->props['divi_se_geometry_lightsdiffuse'];
        $geometryanglelightsambient = $this->props['divi_se_geometry_lightsambient'];
        /*================== Stars Warp ==================*/
        $starswarp = $this->props['divi_se_starswarp_transform'];
        $starswarpbg = $this->props['divi_se_starswarp_bg'];
        $starswarpcolor = $this->props['divi_se_starswarp_color'];
        $starswarp_inb = $this->props['divi_se_starswarp_inb'];
        $starswarp_anb = $this->props['divi_se_starswarp_anb'];
        $starswarpspeed_s = $this->props['divi_se_starswarp_speed_s'];
        $starswarpspeed = $this->props['divi_se_starswarp_speed'];
        $starswarpmouse = $this->props['divi_se_starswarp_mouse'];
        $starswarptouch = $this->props['divi_se_starswarp_touch'];
        /*================== Sparkles ==================*/
        $sparkles = $this->props['divi_se_sparkles_transform'];
        $sparklesdirection = $this->props['divi_se_sparkles_direction'];
        $sparklescount = $this->props['divi_se_sparkles_count'];
        $sparklesspeed = $this->props['divi_se_sparkles_speed'];
        $sparklesminsize = $this->props['divi_se_sparkles_minsize'];
        $sparklesmaxsize = $this->props['divi_se_sparkles_maxsize'];
        $sparklescolor = $this->props['divi_se_sparkles_color'];
        $sparklescolor1 = $this->props['divi_se_sparkles_color1'];
        $sparklescolor2 = $this->props['divi_se_sparkles_color2'];
        $sparklescolor3 = $this->props['divi_se_sparkles_color3'];
        $sparklesdisplay = $this->props['divi_se_sparkles_display'];
        /*================== Scrollify ==================*/
        $scrollify = $this->props['divi_se_scrollify_transform'];
        $scrollifyeasing = $this->props['divi_se_scrollify_easing'];
        $scrollifyscrollspeed = $this->props['divi_se_sparkles_scrollspeed'];
        /*================== Stacks ==================*/
        $stacks = $this->props['divi_se_stacks_transform'];
        /*================== pro particles =====================*/
        $proparticles = $this->props['divi_se_proparticles_transform'];
        $proparticlesparticlescolor = $this->props['divi_se_proparticles_particlescolor'];
        $proparticlesshape = $this->props['divi_se_proparticles_shape'];
        $proparticlessize = $this->props['divi_se_proparticles_size'];
        $proparticlesnumber = $this->props['divi_se_proparticles_number'];
        $proparticlesdensity = $this->props['divi_se_proparticles_density'];
        $proparticleslinescolor = $this->props['divi_se_proparticles_linescolor'];
        $proparticleslineswidth = $this->props['divi_se_proparticles_lineswidth'];
        $proparticlesonhover = $this->props['divi_se_proparticles_onhover'];
        $proparticlesdirection = $this->props['divi_se_proparticles_direction'];
        $proparticlesspeed = $this->props['divi_se_proparticles_speed'];
        /*
        / Tilt Effect
        */
        
        if ( isset( $tilteffect ) && $tilteffect == 'divi_se_tilteffect' ) {
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
            $output = str_replace( 'class="dse_module', $data . ' class="dse_module ' . $tilteffect . ' ', $output );
        }
        
        /*
        / Youtube Background
        */
        
        if ( isset( $youtubebg ) && $youtubebg == 'divi_se_youtubebg' ) {
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
            $output = str_replace( 'class="dse_module', $data . ' class="dse_module ' . $youtubebg . ' ', $output );
        }
        
        /*
        / OFF Canvas
        */
        
        if ( isset( $offcanvas ) && $offcanvas == 'divi_se_offcanvas' ) {
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
            $output = str_replace( 'class="dse_module', $data . ' class="dse_module ' . $offcanvas . ' ', $output );
        }
        
        /*
        SCROLLBAR
        */
        
        if ( isset( $scrollbar ) && $scrollbar == 'divi_se_scrollbar' ) {
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
            $output = str_replace( 'class="dse_module', $data . ' class="dse_module ' . $scrollbar . ' ', $output );
        }
        
        /*
        particles Background
        */
        
        if ( isset( $particlesbg ) && $particlesbg == 'divi_se_particles_bg' ) {
            $data = sprintf(
                '
      data-particlesdotscolor="%1$s"
      data-particleslinescolor="%2$s"
      data-particlesdirectionx="%3$s"
      data-particlesdirectiony="%4$s"
      data-particlesdensity="%5$s"
      data-particlesradius="%6$s"
      data-particleslinewidth="%7$s"
      data-particlesparallax="%8$s"
      ',
                $particlesdotscolor,
                $particleslinescolor,
                $particlesdirectionx,
                $particlesdirectiony,
                $particlesdensity,
                $particlesradius,
                $particleslinewidth,
                $particlesparallax
            );
            $output = str_replace( 'class="dse_module', $data . ' class="dse_module ' . $particlesbg . ' ', $output );
        }
        
        return $output;
    }

}
new DSE_Module();