<?php

// Exist if uninstall is not called from WordPress
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
  exit();

// Delete option from the options table
delete_option( 'rns_campaigns_options' );
