<?php

class DSE_DseDiviSectionEnhancer extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'dse-dse-divi-section-enhancer';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'dse-divi-section-enhancer';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * DSE_DseDiviSectionEnhancer constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'dse-divi-section-enhancer', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
	}
}

new DSE_DseDiviSectionEnhancer;
