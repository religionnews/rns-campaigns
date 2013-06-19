<?php

add_action( 'publish_rns_campaign', 'rns_send_campaign', 30, 2 );
/**
 * Immediately send a new Campaign when the post is published.
 *
 * Uses the post title for the email subject line and Campaign name.
 * Uses options defined above for the FromName and FromEmail.
 */
function rns_send_campaign( $post_ID, $post ) {

  $options = get_option( 'rns_campaigns_options' );

  /* Bail if this is not a Campaign */
  if ( $post->post_type != 'rns_campaign' ) return;

  /* Bail if this Campaign has already been sent */
  if ( get_post_meta( $post_ID, '_rns_campaign_sent', true ) ) return;

  /* Save the recipients post meta just to be sure */
  rns_campaigns_save_meta( $post_ID, $post );

  /* Create the final list of receipients by adding any defaults */
  rns_campaigns_merge_recipients( $post_ID );

  /* Bail if no distribution list is selected */
  if ( ! get_post_meta( $post_ID, '_rns_campaign_recipients', false ) ) return;

  /* Final safety checks */
  if ( 'publish' != $post->post_status ) rns_campaigns_generic_error();
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) rns_campaigns_generic_error();
  if ( defined('DOING_AJAX') && DOING_AJAX ) rns_campaigns_generic_error();
  if ( defined('DOING_CRON') && DOING_CRON ) rns_campaigns_generic_error();

  /* All safety checks passed; send this to CM */
  require_once plugin_dir_path( __FILE__ ) . 'campaignmonitor/csrest_campaigns.php';
  $draft_wrap = new CS_REST_Campaigns(NULL, $options['api_key']);
  $draft_result = $draft_wrap->create( $options['client_id'], array(
      'Subject' => $post->post_title,
      'Name' => $post->post_title,
      'FromName' => $options['from_name'],
      'FromEmail' => $options['from_email'],
      'ReplyTo' =>  $options['from_email'],
      'HtmlUrl' => get_permalink( $post_ID ),
      'ListIDs' => get_post_meta( $post_ID, '_rns_campaign_recipients', false ),
  ));

  if ( ! $draft_result->was_successful() ) {
    rns_campaigns_return_post_to_draft( $post_ID );
    wp_die( 'Error: ' . $draft_result->response->Message, 'Error', 'back_link=true' );
  }

  $send_wrap = new CS_REST_Campaigns( $draft_result->response, $options['api_key'] );
  $send_result = $send_wrap->send(array(
      'ConfirmationEmail' => $options['from_email'],
      'SendDate' => 'immediately'
  ));

  if ( $send_result->was_successful() ) {
    add_post_meta( $post_ID, '_rns_campaign_sent', 1 );
  } else {
    rns_campaigns_return_post_to_draft( $post_ID );
    wp_die( 'Error: ' . $draft_result->response->Message, 'Error', 'back_link=true' );
  }

}


function rns_campaigns_update_available_lists() {
  require_once plugin_dir_path( __FILE__ ) . 'campaignmonitor/csrest_clients.php';
  $options = get_option( 'rns_campaigns_options' );

  $wrap = new CS_REST_Clients( $options['client_id'], $options['api_key'] );
  $result = $wrap->get_lists();
  if($result->was_successful()) {
    delete_option( 'rns_campaigns_lists' );
    foreach( $result->response as $list ) {
      $lists[$list->Name] = $list->ListID;
    }
    add_option( 'rns_campaigns_lists', $lists );
    echo '
      <div class="updated">
         <p>Lists updated.</p>
      </div>
    ';
  } else {
    echo '
      <div class="error">
         <p>List update failed.</p>
      </div>
    ';
  }
}

/**
 * Adds any always-send-to lists to the postmeta if they aren't there
 *
 * @param int $post_ID The Campaign post ID
 */
function rns_campaigns_merge_recipients( $post_ID ) {
  $selected = get_post_meta( $post_ID, '_rns_campaign_recipients', false );
  if ( rns_campaigns_has_default_lists() ) {
    $options = get_option( 'rns_campaigns_options' );
    $always_send_to = $options['always_send_to'];
    foreach( $always_send_to as $list ) {
      if ( ! in_array( $list, $selected ) ) {
        add_post_meta( $post_ID, '_rns_campaign_recipients', $list );
      }
    }
  }
}

/**
 * Checks whether any lists are selected as always-send-to
 *
 * @return bool True if there are lists selected
 */
function rns_campaigns_has_default_lists() {
  $options = get_option( 'rns_campaigns_options' );
  $always_send_to = $options['always_send_to'];
  if ( ! empty( $always_send_to ) )
    return true;
}

/**
 * Takes a post ID and returns that post to the 'Draft' status
 *
 * @param  int $post_ID The post to return to 'Draft'
 */
function rns_campaigns_return_post_to_draft( $post_ID ) {
  $elements = array();
  $elements['ID'] = $post_ID;
  $elements['post_status'] = 'draft';
  wp_update_post( $elements );
}

/**
 * Die with a warning that no receipient lists were selected
 */
function rns_campaigns_no_lists_error() {
  wp_die( 'Error: You must select at least one receipient', 'Error' );
}

/**
 * Die with a generic error
 */
function rns_campaigns_generic_error() {
  wp_die( 'Sorry, there was an error. Please go back, save your changes, and try sending again.' );
}
