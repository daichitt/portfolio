<?php
    include "../userAction.php";

    $tweet_id = $_GET['tweet_id']; //if wanna delite use GET and if you want to get value from url header
    
    $user->deleteTweet($tweet_id);

?>