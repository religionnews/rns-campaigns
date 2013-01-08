<?php

add_action( 'publish_rns_campaign', 'rns_send_campaign' );
/**
 * Immediately send a new Campaign when the post is published.
 *
 * Uses the post title for the email subject line and Campaign name.
 * Uses options defined above for the FromName and FromEmail.
 */
function rns_send_campaign( $post_ID ) {

  global $post;

  // Bail if this is not a Campaign
  if ( $post->post_type != 'rns_campaign' ) return;

  $options = get_option( 'rns_campaigns_options' );

  require_once plugin_dir_path( __FILE__ ) . 'campaignmonitor/csrest_campaigns.php';

  $draft_wrap = new CS_REST_Campaigns(NULL, $options['api_key']);

  $draft_result = $draft_wrap->create( $options['client_id'], array(
      'Subject' => $post->post_title,
      'Name' => $post->post_title,
      'FromName' => $options['from_name'],
      'FromEmail' => $options['from_email'],
      'ReplyTo' =>  $options['from_email'],
      'HtmlUrl' => get_permalink( $post->ID ),
      'ListIDs' => array( $options['list_id'] ),
  ));

  /**
   * Debugging for creating the draft campaign.
   */
  if($draft_result->was_successful()) {
      // echo "Created with ID\n<br />".$draft_result->response;
  } else {
      echo 'Failed with code '.$draft_result->http_status_code."\n<br /><pre>";
      var_dump($draft_result->response);
      echo '</pre>';
  }

  $send_wrap = new CS_REST_Campaigns( $draft_result->response, $options['api_key'] );

  $send_result = $send_wrap->send(array(
      'ConfirmationEmail' => $options['from_email'],
      'SendDate' => 'immediately'
  ));

  // Uncomment to debug
  if($send_result->was_successful()) {
    // echo "Scheduled with code\n<br />".$send_result->http_status_code;
  } else {
    echo 'Failed with code '.$send_result->http_status_code."\n<br /><pre>";
    var_dump($send_result->response);
    echo '</pre>';
  }
}

add_action( 'future_to_publish', 'rns_schedule_campaign', 10, 1 );
/**
 * Schedule a new Campaign when a post is scheduled.
 */
function rns_schedule_campaign( $post ) {

  // Bail if this is not a Campaign
  if ( 'rns_campaign' != $post->post_type ) {
    return;
  }

  $options = get_option( 'rns_campaigns_options' );

  require_once plugin_dir_path( __FILE__ ) . 'campaignmonitor/csrest_campaigns.php';

  $draft_wrap = new CS_REST_Campaigns(NULL, $options['api_key']);

  $draft_result = $draft_wrap->create( $options['client_id'], array(
      'Subject' => $post->post_title,
      'Name' => $post->post_title,
      'FromName' => $options['from_name'],
      'FromEmail' => $options['from_email'],
      'ReplyTo' =>  $options['from_email'],
      'HtmlUrl' => get_permalink( $post->ID ),
      'ListIDs' => array( $options['list_id'] ),
  ));

  /**
   * Debugging for creating the draft campaign.
   */
  if($draft_result->was_successful()) {
      // echo "Created with ID\n<br />".$draft_result->response;
  } else {
      // echo 'Failed with code '.$draft_result->http_status_code."\n<br /><pre>";
      // var_dump($draft_result->response);
      // echo '</pre>';
  }

  /**
   * Schedule the campaign.
   */
  $send_wrap = new CS_REST_Campaigns($draft_result->response, $options['api_key']);

  $send_result = $send_wrap->send(array(
      'ConfirmationEmail' => $options['from_email'],
      'SendDate' => 'immediately', 
  ));

  /**
   * Debugging for scheduling the campaign.
   */
  // echo "Result of POST /api/v3/campaigns/{id}/send\n<br />";
  if($send_result->was_successful()) {
      // echo "Scheduled with code\n<br />".$send_result->http_status_code;
  } else {
    // echo 'Failed with code '.$send_result->http_status_code."\n<br /><pre>";
    // var_dump($send_result->response);
    // echo '</pre>';
  }

}

add_action('admin_head-post.php', 'rns_campaigns_hide_publishing_actions');
add_action('admin_head-post-new.php', 'rns_campaigns_hide_publishing_actions');
/**
 * Hide publishing actions on the Edit Campaign screen based on the post status.
 *
 * To ensure that a post is saved before the user sends it to Campaign Monitor,
 * hide the Publish button unless the post is saved with the Pending status.
 * Then, disallow any publishing actions or additional editing on Pending posts
 * except for Publish and Move to Trash.
 *
 * @source http://wordpress.stackexchange.com/questions/36118/
 */
function rns_campaigns_hide_publishing_actions(){
  global $post;
  if( $post->post_type == 'rns_campaign' ) {
    if ( $post->post_status != 'pending') {
      echo '
        <style type="text/css">
          #major-publishing-actions {
            display:none;
          }
        </style>
      ';
    }
    if ( $post->post_status == 'pending' ) {
      echo '
        <!--
          possibly hide these:
          #wp-content-editor-tools,
          .mceToolbar,
        -->
        <style type="text/css">
          #minor-publishing-actions,
          .misc-pub-section,
          .p2p-create-connections,
          .p2p-col-delete {
            display: none;
          }
          .curtime {
            display: block;
          }
          .edit-timestamp {
            display: none;
          }
        </style>
        <script type="text/javascript" charset="utf-8">
          window.onload = function() {
            document.getElementById("title").disabled = true;
          }
        </script>
      ';
      add_action( 'admin_notices', 'rns_campaigns_pending_campaign_admin_notice' );
    }
  }
}


