<?php

add_action( 'admin_menu', 'rns_campaigns_create_menu' );
/**
 * Add a submenu item to the Settings menu.
 */
function rns_campaigns_create_menu() {
  add_options_page( 'RNS Campaigns Settings', 'RNS Campaigns', 'manage_options', 'rns_campaigns', 'rns_campaigns_settings_section_page' );
}

/**
 * Draw the settings page.
 */
function rns_campaigns_settings_section_page() {
  ?>
  <div class="wrap">
    <?php screen_icon(); ?>
    <h2>RNS Campaigns</h2>
    <form action="options.php" method="post" accept-charset="utf-8">
      <?php
      rns_campaigns_update_available_lists();
      settings_fields( 'rns_campaigns_options' );
      do_settings_sections( 'rns_campaigns' );
      ?>
      <p><input type="submit" name="Submit" id="" value="Save changes" /></p>
    </form>
  </div><!--/.wrap-->
  <?php
}

add_action( 'admin_init', 'rns_campaigns_admin_init' );
/**
 * Register and define the settings.
 */
function rns_campaigns_admin_init() {
  register_setting( 'rns_campaigns_options', 'rns_campaigns_options', 'rns_campaigns_validate_options' );

  add_settings_section( 'rns_campaigns_settings_section', 'Settings', 'rns_campaigns_settings_section_text', 'rns_campaigns' );
    add_settings_field( 'rns_campaigns_api_key', 'Your API Key', 'rns_campaigns_api_key_input', 'rns_campaigns', 'rns_campaigns_settings_section' );
    add_settings_field( 'rns_campaigns_client_id', 'Campaign\'s Client ID', 'rns_campaigns_client_id_input', 'rns_campaigns', 'rns_campaigns_settings_section' );
    add_settings_field( 'rns_campaigns_from_name', 'Campaign\'s \'From\' Name', 'rns_campaigns_from_name_input', 'rns_campaigns', 'rns_campaigns_settings_section' );
    add_settings_field( 'rns_campaigns_from_email', 'Campaign\'s \'From\' Email Address', 'rns_campaigns_from_email_input', 'rns_campaigns', 'rns_campaigns_settings_section' );
    add_settings_field( 'rns_campaigns_default_lists', 'Always Send To', 'rns_campaigns_lists_available_cboxes', 'rns_campaigns', 'rns_campaigns_settings_section' );
    add_settings_field( 'rns_campaigns_hide_metabox', 'Hide Lists Metabox', 'rns_campaigns_hide_metabox_input', 'rns_campaigns', 'rns_campaigns_settings_section' );
}

/**
 * Explanation about this section.
 */
function rns_campaigns_settings_section_text() {
  // echo '<p>Enter your settings here.</p>';
}

/**
 * Display, fill, and validate the form fields.
 */
function rns_campaigns_api_key_input() {
  /* Get option 'api_key' value from the database */
  $options = get_option( 'rns_campaigns_options' );
  $api_key = $options['api_key'];
  /* Echo the field */
  echo "<input type='text' name='rns_campaigns_options[api_key]' id='api_key' value='$api_key' size='50' />";
}

function rns_campaigns_client_id_input() {
  /* Get option 'client_id' value from the database */
  $options = get_option( 'rns_campaigns_options' );
  $client_id = $options['client_id'];
  /* Echo the field */
  echo "<input type='text' name='rns_campaigns_options[client_id]' id='client_id' value='$client_id' size='50' />";
}

function rns_campaigns_list_id_input() {
  /* Get option 'list_id' value from the database */
  $options = get_option( 'rns_campaigns_options' );
  $list_id = $options['list_id'];
  /* Echo the field */
  echo "<input type='text' name='rns_campaigns_options[list_id]' id='list_id' value='$list_id' size='50' />";
}

function rns_campaigns_from_name_input() {
  /* Get option 'list_id' value from the database */
  $options = get_option( 'rns_campaigns_options' );
  $from_name = $options['from_name'];
  /* Echo the field */
  echo "<input type='text' name='rns_campaigns_options[from_name]' id='from_name' value='$from_name' size='50' />";
}

function rns_campaigns_from_email_input() {
  /* Get option 'list_id' value from the database */
  $options = get_option( 'rns_campaigns_options' );
  $from_email = $options['from_email'];
  /* Echo the field */
  echo "<input type='text' name='rns_campaigns_options[from_email]' id='from_email' value='$from_email' size='50' />";
}

function rns_campaigns_lists_available_cboxes() {
  $available_lists = get_option( 'rns_campaigns_lists' );
  $options = get_option( 'rns_campaigns_options' );
  $always_send_to = $options['always_send_to'];

  echo '<fieldset>';
  echo '<legend class="screen-reader-text">Alway send to</legend>';

  foreach ( $available_lists as $name => $ID ) {
    $checked = $is_enabled = in_array( $ID, $always_send_to );
    echo '<label for="rns_campaigns_options[always_send_to][' . $name . ']">';
    echo '<input name="rns_campaigns_options[always_send_to][' . $name . ']" type="checkbox" id="rns_campaigns_options[always_send_to][' . $name . ']" value="' . $ID . '"' . checked( $checked, true, false ) . '> ';
    echo $name;
    echo '</label><br>';
  }

  echo '</fieldset>';
  echo '<p><strong>Warning: "Always" means always!</strong></p>';
}

function rns_campaigns_hide_metabox_input() {
  $options = get_option( 'rns_campaigns_options' );
  $checked = $hide_metabox = $options['hide_metabox'];
  echo "<input type='checkbox' name='rns_campaigns_options[hide_metabox]' id='hide_metabox' value='1' " . checked( $checked, true, false ) . " />";
}

function rns_campaigns_validate_options( $input ) {
  /* Create an empty array and collect in this array only the values you expect */
  $valid = array();

  if ( empty( $input['api_key'] ) || ctype_alnum( $input['api_key'] ) ) {
    $valid['api_key'] = $input['api_key'];
  } else {
    add_settings_error(
      'rns_campaigns_api_key',
      'rns_campaigns_error',
      'Error: API Key may contain only letters and numbers',
      'error'
    );
  }

  if ( empty( $input['client_id'] ) || ctype_alnum( $input['client_id'] ) ) {
    $valid['client_id'] = $input['client_id'];
  } else {
    add_settings_error(
      'rns_campaigns_client_id',
      'rns_campaigns_error',
      'Error: Client ID may contain only letters and numbers',
      'error'
    );
  }

  $valid['from_name'] = sanitize_text_field( $input['from_name'] );
  if ( $valid['from_name'] != $input['from_name'] ) {
    add_settings_error(
      'rns_campaigns_from_name',
      'rns_campaigns_error',
      'Warning: Invalid characters stripped from From Name',
      'updated'
    );
  }

  $valid['from_email'] = is_email( $input['from_email'] );
  if ( $valid['from_email'] != $input['from_email'] ) {
    add_settings_error(
      'rns_campaigns_from_email',
      'rns_campaigns_error',
      'Error: Invalid email address',
      'error'
    );
  }

  /* $input['hide_metabox'] should be '1' or '0' */
  $valid['hide_metabox'] = $input['hide_metabox'] == '1' ? '1' : '0';

  foreach ( $input['always_send_to'] as $name => $id ) {
    if ( ctype_alnum( $id ) ) {
      $valid['always_send_to'][] = $id;
    } else {
      add_settings_error(
        'rns_campaigns_lists_enabled',
        'rns_campaigns_error',
        'Error saving default lists',
        'error'
      );
    }
  }

  return $valid;
}
