<?php

/*
* Plugin Name: DIVI Section Enhancer
* Plugin URI: https://miguras.com/divi_section_enhancer
* Description: Improves DIVI Sections capabilities
* Version: 2.7.1
* Author: Miguras
* Author URI: http://miguras.com
* License: GPLv2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain: divi_sections_enhancer
* Domain Path: /languages
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
function dse_pagebuildercode_source( $source, $return )
{
    if ( $return === 'value' ) {
        return $source;
    }
}

$source = dse_pagebuildercode_source( 'freemius', 'value' );

if ( $source === 'freemius' ) {
    
    if ( function_exists( 'dse_fs' ) ) {
        dse_fs()->set_basename( false, __FILE__ );
        return;
    }
    
    
    if ( !function_exists( 'dse_fs' ) ) {
        // Create a helper function for easy SDK access.
        function dse_fs()
        {
            global  $dse_fs ;
            
            if ( !isset( $dse_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $dse_fs = fs_dynamic_init( array(
                    'id'              => '3153',
                    'slug'            => 'dse-divi-section-enhancer',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_0fa7094de83be11d4ba7a5ae38f40',
                    'is_premium'      => false,
                    'premium_suffix'  => 'PRO',
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'has_affiliation' => 'all',
                    'menu'            => array(
                    'first-path' => 'plugins.php',
                ),
                    'is_live'         => true,
                ) );
            }
            
            return $dse_fs;
        }
        
        // Init Freemius.
        dse_fs();
        // Signal that SDK was initiated.
        do_action( 'dse_fs_loaded' );
        
        if ( !function_exists( 'dse_initialize_extension' ) ) {
            function dse_initialize_extension()
            {
                require_once plugin_dir_path( __FILE__ ) . 'includes/DseDiviSectionEnhancer.php';
            }
            
            add_action( 'divi_extensions_init', 'dse_initialize_extension' );
        }
        
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/dse-functions.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'dse-functions/dse-functions.php';
        }
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module.php';
        }
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module-full.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module-full.php';
        }
    }
    
    // add kirki panel since 1.9
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'panel/kirki/kirki.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'panel/kirki/kirki.php';
    }
    
    if ( class_exists( 'Kirki' ) ) {
        add_filter( 'kirki_telemetry', '__return_false' );
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'panel/dse-options.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'panel/dse-options.php';
        }
    }

} elseif ( $source === 'gumroad' ) {
    
    if ( !function_exists( 'dse_initialize_extension' ) ) {
        function dse_initialize_extension()
        {
            require_once plugin_dir_path( __FILE__ ) . 'includes/DseDiviSectionEnhancer.php';
        }
        
        add_action( 'divi_extensions_init', 'dse_initialize_extension' );
    }
    
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'gumroad/pbc-class/pbc-main-class.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'gumroad/pbc-class/pbc-main-class.php';
    }
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'gumroad/pbc-check/pbc-check-class.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'gumroad/pbc-check/pbc-check-class.php';
    }
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/plugin-update-checker/plugin-update-checker.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'dse-functions/plugin-update-checker/plugin-update-checker.php';
    }
    $checker = new DSE_Check_Class( 'vHiZc', 'NsFvw', 'Divi Section Enhancer Pro' );
    $checker->init();
    $pass = new DSE_Main_Class( 'vHiZc', 'NsFvw' );
    $pass->init();
    $divisectionenhancerpro = $pass->updater();
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker( $divisectionenhancerpro, __FILE__, 'dse-divi-section-enhancer-premium' );
    if ( !function_exists( 'dse_fs' ) ) {
        function dse_fs()
        {
            $output = new DSE_Main_Class( 'vHiZc', 'NsFvw' );
            return $output;
        }
    
    }
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/dse-functions.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'dse-functions/dse-functions.php';
    }
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module.php';
    }
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module-full.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'dse-functions/dse-module-full.php';
    }
    // add kirki panel since 1.9
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'panel/kirki/kirki.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'panel/kirki/kirki.php';
    }
    
    if ( class_exists( 'Kirki' ) ) {
        add_filter( 'kirki_telemetry', '__return_false' );
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'panel/dse-options.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'panel/dse-options.php';
        }
    }
    
    function dse_license_link( $links )
    {
        $links = array_merge( array( '<a href="' . esc_url( admin_url( '/admin.php?page=divienhancer_updater' ) ) . '">' . __( 'License', 'divienhancer' ) . '</a>' ), $links );
        return $links;
    }
    
    add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'dse_license_link' );
}
