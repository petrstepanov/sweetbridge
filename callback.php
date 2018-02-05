<?php
header( "refresh:5;url=./" );

session_start();

require "php/helper.php";

require 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

// print_r($_REQUEST);

if (isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token']) && $_REQUEST['oauth_token'] == $_SESSION['oauth_token']) {
	$request_token = [];
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

  saveAccessToken($access_token['oauth_token'], $access_token['oauth_token_secret']);
  echo "<p>Authorization token saved</p>";
  echo "<p>Redirecting you to the app...</p>";

} else {
  echo "<p>Something went wrong. Please try again.</p>";
}

?>
