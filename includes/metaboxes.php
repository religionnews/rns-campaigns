<?php
/**
 * This code for displaying and saving the recipients box
 * owes a massive debt to Justin Tadlock's Members plugin.
 */

add_action( 'add_meta_boxes', 'rns_campaigns_metabox_create' );
add_action( 'save_post', 'rns_campaigns_save_meta', 10, 2 );


/**
 * Register metaboxes
 */
function rns_campaigns_metabox_create() {
  // Bail if the metabox shouldn't be shown
  $options = get_option( 'rns_campaigns_options' );
  $hide_metabox = $options['hide_metabox'];
  if ( $hide_metabox )
    return;

  add_meta_box( 'rns-campaigns-lists', 'Select recipients', 'rns_campaigns_recipients_metabox', 'rns_campaign', 'side', 'high' );
}

/**
 * Create the metabox for choosing Campaign recipients
 */
function rns_campaigns_recipients_metabox( $post ) {

  $available_lists = get_option( 'rns_campaigns_lists' );
  $options = get_option( 'rns_campaigns_options' );
  $always_send_to = $options['always_send_to'];

  /* Get the recipients saved for the post */
  $recipients = get_post_meta( $post->ID, '_rns_campaign_recipients', false );
  ?>

  <input type="hidden" name="rns_campaigns_meta_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />

  <?php
  /* Loop through each of the available lists */
  foreach ( $available_lists as $name => $ID ) {
    $checked = false;

    /* If the list has been selected, or if it's one of the defaults, make sure it's checked */
    if ( is_array( $recipients ) && in_array( $ID, $recipients ) || in_array( $ID, $always_send_to ) )
      $checked = ' checked="checked" ';

    /* Construct the HTML for the checkboxes */
    ?>
      <label for="rns_campaign_recipients[<?php echo $name; ?>]">
        <input type="checkbox" name="rns_campaign_recipients[<?php echo $name; ?>]" id="rns_campaign_recipients[<?php echo $name; ?>]" <?php echo $checked; ?> value="<?php echo $ID; ?>" />
        <?php echo esc_html( $name ); ?><br>
      </label>
    <?php
  }

  if ( current_user_can( 'manage_plugins' ) ) {
  ?>
  <p><em><?php _e( "Update the list of recipients by visiting the <a href='" . admin_url() . "options-general.php?page=rns_campaigns'>plugin options page</a>", 'rns_campaigns' ); ?></em></p>
  <?php
  }
}

/**
 * Save metabox data
 */
function rns_campaigns_save_meta( $post_id, $post ) {
  $available_lists = get_option( 'rns_campaigns_lists' );

  /* Verify the nonce */
  if ( ! isset( $_POST['rns_campaigns_meta_nonce'] ) || ! wp_verify_nonce( $_POST['rns_campaigns_meta_nonce'], plugin_basename( __FILE__ ) ) )
    return false;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if ( defined('DOING_AJAX') && DOING_AJAX ) return;
	if ( defined('DOING_CRON') && DOING_CRON ) return;

  /* Get the post type object */
  $post_type = get_post_type_object( $post->post_type );

  /* Confirm that the current user has permission to edit the post */
  if ( ! current_user_can( $post_type->cap->edit_post, $post_ID ) )
    return $post_id;

  /* Don't save if the post is only a revision */
  if ( 'revision' == $post->post_type )
    return;

  $meta_values = get_post_meta( $post_id, '_rns_campaign_recipients', false );

  if ( isset( $_POST['rns_campaign_recipients'] ) && is_array( $_POST['rns_campaign_recipients'] ) ) {

    foreach ( $_POST['rns_campaign_recipients'] as $recipient ) {
      if ( ! in_array( $recipient, $meta_values ) )
        add_post_meta( $post_id, '_rns_campaign_recipients', $recipient, false );
    }

    foreach ( $available_lists as $name => $ID ) {
      if ( ! in_array( $ID, $_POST['rns_campaign_recipients'] ) && in_array( $ID, $meta_values ) )
        delete_post_meta( $post_id, '_rns_campaign_recipients', $ID );
    }
  } else {
    delete_post_meta( $post_id, '_rns_campaign_recipients' );
  }

}

