<?php

require "variables.php";

function acessTokenExists(){
  // Open file
  $file = fopen(ACCESS_FILENAME, "r");
  if (!$file) return false;

  // Check token ans token secret
  $token = fgets($file);
  $token_secret = fgets($file);
  fclose($file);

  // Return true if both tokens exist
  if ($token && $token_secret !== false) return true;
  return false;
}

function getAccessToken(){
  $file = fopen(ACCESS_FILENAME, "r");
  $token = trim(fgets($file));
  $token_secret = trim(fgets($file));
  fclose($file);
  $access_token = array('oauth_token' => $token, 'oauth_token_secret' => $token_secret);
  return $access_token;
}

function saveAccessToken($token, $token_secret){
  $file = fopen(ACCESS_FILENAME, 'w');
  $data = $token.PHP_EOL.$token_secret;
  fwrite($file, $data);
  fclose($file);
}

function deleteAuthorizationToken(){
  unlink(ACCESS_FILENAME);
}

?>
