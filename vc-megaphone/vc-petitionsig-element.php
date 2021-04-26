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


if ( ! class_exists( 'vcInfoBox' ) ) {

	class vcInfoBox {


		/**
		* Main constructor
		*
		*/
		public function __construct() {

			// Registers the shortcode in WordPress
			add_shortcode( 'info-box-shortcode', array( 'vcInfoBox', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'info-box-shortcode', array( 'vcInfoBox', 'map' ) );
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
				'name'        => esc_html__( 'UWU Petition Count', 'text-domain' ),
				'description' => esc_html__( 'Add new signature count', 'text-domain' ),
				'base'        => 'vc_infobox',
				'category' => __('Petitions Elements', 'text-domain'),
				'icon' => plugin_dir_path( __FILE__ ) . 'assets/img/note.png',
				'params'      => array(
				
					array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Field ID (eg. 187)', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'description' => __( 'Enter the ID number of any required field in your petition form to count the number of entries (signatures). NB: this must be the *field* ID, not the ID of the form itself). Please enter numbers only', 'text-domain' ),

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

  		$img_url = wp_get_attachment_image_src( $bgimg, "large");

        // Fill $html var with data
        $html = '
            <p style="text-align: center;">[countup start="0" decimals="0" duration="2"][frm-stats id=' . $title . ' type=count][/countup]</p>

<h3 class="desc" style="text-align: center;"><strong>signatures</strong></h3>


            <div class="uwu-petitionsig-text">'. $content .'</div>';

        return $html;

		}

	}

}
new vcInfoBox;