<?php

include_once "lib/m2x.php";

$api_key = "<API KEY HERE>";
$feed_id = "<FEED>";
$stream  = "<STREAM NAME>";

$m2x = new M2X($api_key);

// View Feed
$response = $m2x->feeds()->view($feed_id);

// Create/Update Stream
$data = array(
  "value" => 1.23,
  "unit"  => array("label" => "Celsius")
);
$response = $m2x->feeds()->update_stream($feed_id, $stream, $data);

// List Streams
$response = $m2x->feeds()->streams($feed_id);

// Get Details From Existing Stream
$response = $m2x->feeds()->stream($feed_id, $stream);

// Read Values From Existing Stream
$response = $m2x->feeds()->stream_values($feed_id, $stream);

// Post Multiple Values To Stream
$response = $m2x->feeds()->add_stream_values($feed_id, $stream, array(
  array("value" => 456),
  array("value" => 789),
  array("value" => 123.145)
));

// Read Location Information
$response = $m2x->feeds()->location($feed_id);

// Update Location Information
$response = $m2x->feeds()->update_location($feed_id, array(
  "name"      => "Seattle",
  "latitude"  => 47.6097,
  "longitude" => 122.3331
));

// Response Object
$code   = $response->code();    // HTTP Status Code
$header = $response->headers(); // Response Header
$raw    = $response->raw();     // Raw Body
$json   = $response->json();    // Parsed Body
