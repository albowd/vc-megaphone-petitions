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


if ( ! class_exists( 'vcMegaphoneSignBox' ) ) {

	class vcMegaphoneSignBox {


		/**
		* Main constructor
		*
		*/
		public function __construct() {

			// Registers the shortcode in WordPress
			add_shortcode( 'megaphonesign-box-shortcode', array( 'vcMegaphoneSignBox', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'megaphonesign-box-shortcode', array( 'vcMegaphoneSignBox', 'map' ) );
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
				'name'        => esc_html__( 'Megaphone - Signature form', 'text-domain' ),
				'description' => esc_html__( 'Add megaphone signature form', 'text-domain' ),
				'base'        => 'vc_megaphonesignbox',
				'category' => __('Petitions Elements', 'text-domain'),
				'icon' => plugin_dir_path( __FILE__ ) . 'assets/img/note.png',
				'params'      => array(
				
					array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Petition URL', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'description' => __( 'Enter the full URL of your megaphone petition without a  trailing slash, eg. https://www.megaphone.org.au/petitions/stand-with-hospo-protect-our-incomes-secure-our-jobs', 'text-domain' ),

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
            <script src="https://www.megaphone.org.au/assets/embed_sign_form.js" id="controlsfhift-embed-sign-form-script" data-petition-url="' . $title . '/embed"></script>



';

        return $html;

		}

	}

}
new vcMegaphoneSignBox;