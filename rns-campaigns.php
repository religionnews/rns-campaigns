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

// Dashboard functions such as the settings page
if ( is_admin() )
  require_once( dirname(__FILE__) . '/includes/admin.php' );

// Campaigns Custom Post Type
require_once( dirname(__FILE__) . '/includes/types.php' );

// Actions hooked into publishing and scheduling
require_once( dirname(__FILE__) . '/includes/actions.php' );


