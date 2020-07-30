<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}

$module_files = glob( __DIR__ . '/modules/*/*.php' );

$excludedfiles = array('none');

if(null !== get_option('dse-enable-dsemodule')) {
	if(get_option('dse-enable-dsemodule') == 'no'){
		array_push($excludedfiles, 'dseModule');
		array_push($excludedfiles, 'dseModuleFull');
	}
}

// Load custom Divi Builder modules
foreach ( (array) $module_files as $module_file ) {
	if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {

		$included = 'true';
		foreach($excludedfiles as $excluded){
			if (strpos($module_file, $excluded) !== false) {
				$included = 'false';
			}
		}

		if($included == 'true'){
			require_once $module_file;
		}
		
	}
}
