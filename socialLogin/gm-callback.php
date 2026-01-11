<?php 

require_once '../vendor/autoload.php';
require_once 'config.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// $additionalParams = array(
//     'prompt' => 'select_account', // Force user to select account
//     // You can add more parameters as needed
// );

// $authUrl = $client->createAuthUrl() . '&' . http_build_query($additionalParams);
$authUrl = $client->createAuthUrl();


// $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     $client->setAccessToken($token['access_token']);

//     $google_oauth = new Google_Service_Oauth2($client);
//     $google_account_info = $google_oauth->userinfo->get();
//     $email =  $google_account_info->email;
//     $name =  $google_account_info->name;
?>