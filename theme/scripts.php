<?php // last updated 28/04/2015

class bb_enqueue {
	public static function admin_scripts() {
		wp_enqueue_style( 'admin', get_stylesheet_directory_uri().'/css/admin.css','', date('c'));
	}

	public static function frontend_scripts() {
		// styles
		wp_enqueue_style('normalize', get_stylesheet_directory_uri().'/css/normalize.css');
		wp_enqueue_style('foundation', get_stylesheet_directory_uri().'/css/foundation24.min.css');
		wp_enqueue_style('print', get_stylesheet_directory_uri().'/css/print.css', array(), '', 'print');

		$theme_fonts = get_option( 'theme_fonts' );
		if( $theme_fonts[ns_.'gf1'] ) wp_enqueue_style( ns_.'gf1', $theme_fonts[ns_.'gf1'] );
		if( $theme_fonts[ns_.'gf2'] ) wp_enqueue_style( ns_.'gf2', $theme_fonts[ns_.'gf2'] );
		if( $theme_fonts[ns_.'gf3'] ) wp_enqueue_style( ns_.'gf3', $theme_fonts[ns_.'gf3'] );

		// header scripts
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array('jquery'), '1.0.0' );

		// footer sripts
		wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/vendor/fastclick.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'zurb', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'equaliser', get_template_directory_uri() . '/js/vendor/bb/equaliser.js', array('jquery'), '1.0.0', true );

		if( !is_admin() ) {
			wp_deregister_style( 'thickbox' );
			wp_deregister_style( 'tiptipCSS' );
			wp_deregister_style( 'chosenCSS' );
			wp_deregister_style( 'jqueryuiCSS' );
			wp_deregister_style( 'wpclef-main' );
		}
	}
}

add_action( 'admin_enqueue_scripts', array('bb_enqueue', 'admin_scripts' ) );
add_action( 'wp_enqueue_scripts', array('bb_enqueue', 'frontend_scripts' ) );
