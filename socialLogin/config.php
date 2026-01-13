<?php
require_once 'google-api/vendor/autoload.php';
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// session_start();
$clientID = '424279592981-hts1a7l2vm2nholmikl2lv2n4ah4h595.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = $actual_link.'/login.php';

// Initialize the $client object
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');


$authUrl = $client->createAuthUrl();