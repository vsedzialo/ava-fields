<?php
/**
 * AVA Fields plugin for WordPress
 *
 * @package   ava-fields
 * @link      https://github.com/vsedzialo/ava-fields
 * @author    Viktor Sedzialo <viktor.sedzialo@gmail.com>
 * @copyright 2018 Viktor Sedzialo
 * @license   GPL v2 or later
 *
 * Plugin Name:  AVA Fields
 * Description:  Powerful fields manager
 * Version:      1.0.0
 * Plugin URI:   https://github.com/vsedzialo/ava-fields
 * Author URI:   https://github.com/vsedzialo
 * Author:       Viktor Sedzialo <viktor.sedzialo@gmail.com>
 * Text Domain:  ava-fields
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

/**
 * Autoload register
 *
 * @return void
 */
spl_autoload_register( function ( $class ) {

    $prefix = 'AVAFields\\';
    $base_dir = __DIR__ . '/app/';

    // does the class use the namespace prefix?
    $len = strlen( $prefix );
    if ( strncmp( $prefix, $class, $len ) !== 0 ) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr( $class, $len );
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