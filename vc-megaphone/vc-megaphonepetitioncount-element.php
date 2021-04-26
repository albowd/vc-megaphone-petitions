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


if ( ! class_exists( 'vcMegaphoneCountBox' ) ) {

	class vcMegaphoneCountBox {


		/**
		* Main constructor
		*
		*/
		public function __construct() {

			// Registers the shortcode in WordPress
			add_shortcode( 'megaphonecount-box-shortcode', array( 'vcMegaphoneCountBox', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'megaphonecount-box-shortcode', array( 'vcMegaphoneCountBox', 'map' ) );
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
				'name'        => esc_html__( 'Megaphone - Signatures', 'text-domain' ),
				'description' => esc_html__( 'Add the current signature count', 'text-domain' ),
				'base'        => 'vc_megaphonecountbox',
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
                    
                    	array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'size-class',
                        'heading' => __( '(optional) Text size', 'text-domain' ),
                        'param_name' => 'textsize',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'description' => __( 'Eg. 36px', 'text-domain' ),

                        'group' => 'Petition Count',
                    ),

   	array(
                        'type' => 'colorpicker',
                        'holder' => 'h3',
                        'class' => 'number-class',
                        'heading' => __( '(optional)  Colour of the count number', 'text-domain' ),
                        'param_name' => 'textcolor',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'description' => __( 'leave blank for black text. UWU red:  #C5203A / white: #FFFFFF / charcoal: #333333', 'text-domain' ),

                        'group' => 'Petition Count',
                    ),
                    
                      	array(
                        'type' => 'colorpicker',
                        'holder' => 'h3',
                        'class' => 'sig-class',
                        'heading' => __( '(optional) Colour of the word "signatures" underneath', 'text-domain' ),
                        'param_name' => 'sigcolor',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'description' => __( 'leave blank for black text. UWU red:  #C5203A / white: #FFFFFF / charcoal: #333333', 'text-domain' ),

                        'group' => 'Petition Count',
                    ),
                    
     	array(
                        'type' => 'dropdown',
                        'holder' => 'h3',
                        'class' => 'align-class',
                        'heading' => __( '(optional) Text alignment (default is left)', 'text-domain' ),
                        'param_name' => 'textalign',
                         'value' => array(
    __( 'Left',  "my-text-domain"  ) => 'left',
    __( 'Centre',  "my-text-domain"  ) => 'center',
    __( 'Right',  "my-text-domain"  ) => 'right',
  ),
                        'admin_label' => false,
                        'weight' => 0,
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
						'textsize'   => '',						
						'textcolor'   => '',
						'textalign'   => '',
						'sigcolor'   => '',
					),
					$atts
				)
			);

  		$img_url = wp_get_attachment_image_src( $bgimg, "large");

        // Fill $html var with data
        $html = '
           <h1 style="font-size: ' . $textsize . '; color: ' . $textcolor . '; line-height: 90%; font-weight: bold; text-align:  ' . $textalign . ';"><script id="controlshift-petition-signature-count" type="text/javascript" src="https://www.megaphone.org.au/assets/petition_signature_count_snippet.js"></script>  <script type="text/javascript" src="' . $title . '.json?callback=getPetitionSignatureCount"></script></h1><h3 style="text-align:  ' . $textalign . '; color: ' . $sigcolor . ';"><strong>signatures</strong></h3>



';

        return $html;

		}

	}

}
new vcMegaphoneCountBox;