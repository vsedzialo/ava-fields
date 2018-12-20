<?php
/*
Plugin Name: AVA Fields
Plugin URI: http://fields.ava-team.com
Description: Flexible library to create custom settings for Wordpress themes and plugins
Version: 1.0.0
Author: Viktor Sedzialo ( viktor.sedzialo@gmail.com )
*/

/**
 * Autoload register
 *
 * @return void
 */
spl_autoload_register( function ( $class ) {

    // project-specific namespace prefix
    $prefix = 'AVAFields\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/app/';

    // does the class use the namespace prefix?
    $len = strlen( $prefix );
    if ( strncmp( $prefix, $class, $len ) !== 0 ) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr( $class, $len );

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace( ['\\'], ['/'], $relative_class ) . '.php';

    // if the file exists, require it
    if ( file_exists( $file ) ) {
        require $file;
    }
} );

if ( ! function_exists( 'AVA_Fields' ) ) {
    /**
     * Get AVA_Fields instance
     *
     * @since 1.0.0
     * @return \AVAFields\AVA_Fields
     */
	function AVA_Fields() {
		return \AVAFields\AVA_Fields::instance();
	}
}
AVA_Fields()->init();