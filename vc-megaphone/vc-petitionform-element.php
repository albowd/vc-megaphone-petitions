<?php

/**
* Adds new shortcode "info-box-shortcode" and registers it to
* the WPBakery Visual Composer plugin
*
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}


if ( ! class_exists( 'vcSignBox' ) ) {

	class vcSignBox {


		/**
		* Main constructor
		*
		*/
		public function __construct() {

			// Registers the shortcode in WordPress
			add_shortcode( 'sign-box-shortcode', array( 'vcSignBox', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'sign-box-shortcode', array( 'vcSignBox', 'map' ) );
			}

		}


		/**
		* Map shortcode to VC
    *
    * This is an array of all your settings which become the shortcode attributes ($atts)
		* for the output.
		*
		*/
		public static function map() {
			return array(
				'name'        => esc_html__( 'UWU Petition Signature Form', 'text-domain' ),
				'description' => esc_html__( 'Add new signature form', 'text-domain' ),
				'base'        => 'vc_signbox',
				'category' => __('Petitions Elements', 'text-domain'),
				'icon' => plugin_dir_path( __FILE__ ) . 'assets/img/note.png',
				'params'      => array(
				
					array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Form ID (eg. 12)', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'description' => __( 'Enter the ID number of the signature form you have created for your petition. NB: this must be the *form* ID, not the ID of a field. Please enter numbers only', 'text-domain' ),
                        'group' => 'Petition Count',
                    ),

                

				),
			);
		}


		/**
		* Shortcode output
		*
		*/
		public static function output( $atts, $content = null ) {

			extract(
				shortcode_atts(
					array(
						'title'   => '',
					),
					$atts
				)
			);


        // Fill $html var with data
        $html = '
            [formidable id=' . $title . ']
            ';

        return $html;

		}

	}

}
new vcSignBox;