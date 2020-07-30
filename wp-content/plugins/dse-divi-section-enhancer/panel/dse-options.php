<?php

Kirki::add_config( 'dse-configuration', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
) );

Kirki::add_panel( 'dse-panel', array(
		'priority'    => 10,
		'title'       => esc_html__( 'DIVI Section Enhancer', 'divi_sections_enhancer' ),
		'description' => esc_html__( 'DIVI Section Enhancer Settings', 'divi_sections_enhancer' ),
) );

Kirki::add_section( 'dse-scripts-section', array(
		'title'          => esc_html__( 'Enable/Disable Functions', 'divi_sections_enhancer' ),
		'description'    => esc_html__( '', 'divi_sections_enhancer' ),
		'panel'          => 'dse-panel',
		'priority'       => 160,
) );



Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-scrollbar',
	'label'       => esc_html__( 'Scrollbar Section', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-youtube',
	'label'       => esc_html__( 'Youtube Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );

Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-vimeo',
	'label'       => esc_html__( 'Vimeo Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-tilteffect',
	'label'       => esc_html__( 'Tilt Effect', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-sidebar',
	'label'       => esc_html__( 'OFF Canvas Sidebar', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-particles',
	'label'       => esc_html__( 'Particles Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-proparticles',
	'label'       => esc_html__( 'Pro Particles Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-stacks',
	'label'       => esc_html__( 'Stacks', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-tiltedsections',
	'label'       => esc_html__( 'Tilted Sections', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-waterpipe',
	'label'       => esc_html__( 'Waterpipe Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-geometry',
	'label'       => esc_html__( 'Geometry Angle Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-starswarp',
	'label'       => esc_html__( 'Stars Warp Background', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-sparkles',
	'label'       => esc_html__( 'Sparkles', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-scrollify',
	'label'       => esc_html__( 'Scrollify Section', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );


Kirki::add_field( 'dse-configuration', [
	'type'        => 'select',
	'settings'    => 'dse-enable-dsemodule',
	'label'       => esc_html__( 'DSE Module', 'divi_sections_enhancer' ),
	'section'     => 'dse-scripts-section',
	'default'     => 'yes',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' => esc_html__( 'Disable', 'divi_sections_enhancer' ),
		'yes' => esc_html__( 'Enable', 'divi_sections_enhancer' ),
	],
] );




Kirki::add_panel( 'dse-shop-panel', array(
		'priority'    => 10,
		'title'       => esc_html__( 'Other Page', 'divi_sections_enhancer' ),
		'description' => esc_html__( '', 'divi_sections_enhancer' ),
		'panel'          => 'dse-panel',
) );




function dse_required_files(){

	$requires = array('dse-shop-breadcrumb'

	);

	foreach($requires as $require){
		if (file_exists(plugin_dir_path( __FILE__ ) . $require.'.php')){
			require_once(plugin_dir_path( __FILE__ ) .  $require.'.php');
		}
	}
}

dse_required_files();

?>
