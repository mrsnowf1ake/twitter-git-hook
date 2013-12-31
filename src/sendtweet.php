<?php
session_start();
require_once 'external/twitteroauth/twitteroauth.php';
require_once 'keys.php';
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_POST['token'], $_POST['token_secret']);
$message_arr = str_split($_POST['message'], 140 - strlen(' #githook'));
foreach ($message_arr as $message) {
    echo $connection->post('statuses/update', array('status' => $message.' #githook'));
}

?>