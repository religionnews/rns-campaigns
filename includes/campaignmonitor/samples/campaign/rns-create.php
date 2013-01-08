<?php

function rns_create_campaign() {

  require_once '../../csrest_campaigns.php';

  $wrap = new CS_REST_Campaigns(NULL, '652a035e72f8f18a4aecf4a8bbd61220');

  $result = $wrap->create('45380b61a110f1f49a02986e59c40a15', array(
      'Subject' => 'Campaign Subject',
      'Name' => 'Campaign Name',
      'FromName' => 'Campaign From Name',
      'FromEmail' => 'info@religionnews.com',
      'ReplyTo' => 'info@religionnews.com',
      'HtmlUrl' => 'hartfordfavs.com//campaigns/html/49267',
      'TextUrl' => 'http://example.com',
      'ListIDs' => array('b57fb4ce4ce83ec1ed2a65b67f1f8867'),
      // 'SegmentIDs' => array('First Segment', 'Second Segment')
  ));

  echo "Result of POST /api/v3/campaigns/{clientID}\n<br />";
  if($result->was_successful()) {
      echo "Created with ID\n<br />".$result->response;
  } else {
      echo 'Failed with code '.$result->http_status_code."\n<br /><pre>";
      var_dump($result->response);
      echo '</pre>';
  }

}
