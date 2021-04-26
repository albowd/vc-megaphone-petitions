<?php

/*
Plugin Name: Megaphone WPBakery Content Blocks
Plugin URI: https://unitedworkers.org.au/
Description: An extension for Visual Composer that displays Megaphone.com.au petition embed options
Author: Al Bowd
Version: 1.0.0
Author URI: https://unitedworkers.org.au/
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
     die ('Silly human what are you doing here');
}


// Before VC Init

add_action( 'vc_before_init', 'uwu_vc_before_init_actions' );

function uwu_vc_before_init_actions() {

// Require new custom Element

include( plugin_dir_path( __FILE__ ) . 'vc-petitionsig-element.php');

include( plugin_dir_path( __FILE__ ) . 'vc-petitionform-element.php');

include( plugin_dir_path( __FILE__ ) . 'vc-megaphonepetitionsig-element.php');

include( plugin_dir_path( __FILE__ ) . 'vc-megaphonepetitioncount-element.php');


}




// Link petitionsig stylesheet

function uwu_community_petitionsig_scripts() {
    wp_enqueue_style( 'uwu_community_petitionsig_stylesheet',  plugin_dir_url( __FILE__ ) . 'styling/petitionsig-styling.css' );
}
add_action( 'wp_enqueue_scripts', 'uwu_community_petitionsig_scripts' );