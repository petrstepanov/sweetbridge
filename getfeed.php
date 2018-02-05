<?php

session_start();

require "php/helper.php";

require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

if (!acessTokenExists()) {
  $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo "<p>Please follow this url <a href=".$url.">".$url."</a> to authorize the Twitter application</p>";
} else {
  // echo "Access token exists"."<br/>";
  // $access_token = $_SESSION['access_token'];
  $access_token = getAccessToken();
  // echo $access_token['oauth_token']."<br/>";
  // echo $access_token['oauth_token_secret']."<br/>";
  // echo CONSUMER_KEY."<br/>";
  // echo CONSUMER_SECRET."<br/>";
  $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
  $user = $connection->get("account/verify_credentials");
  if (sizeof($user->errors[0]) > 0){
    // echo "Bad Authentication data. Please Try Again.";
    deleteAuthorizationToken();
  }
  else {
    // echo "Welcome, ".$user->screen_name;
    $tweets = $connection->get('statuses/mentions_timeline', ['count' => NUMBER_OF_TWEETS]);
    // print_r($tweets);
  }
}

?>
