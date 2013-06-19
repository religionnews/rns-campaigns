<?php
/*
Plugin Name: RNS Campaigns
Plugin URI:
Description: Send emails through Campaign Monitor in WordPress.
Version:
Author: David Herrera
Author URI:
License: GPLv2 or later
License URI:
*/

// Settings page
if ( is_admin() )
  require_once( dirname(__FILE__) . '/includes/settings.php' );

// Core functions
require_once( dirname(__FILE__) . '/includes/functions.php' );

// Campaigns Custom Post Type
require_once( dirname(__FILE__) . '/includes/types.php' );

// Post metaboxes
require_once( dirname(__FILE__) . '/includes/metaboxes.php' );
