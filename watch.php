<?php 
    include "header.php";
    include "../userAction.php";

    $tweet_list = $user->getTweets();

    // print_r($tweet_list);
?>

<div class="container mt-5">
    <?php
        if(!empty($tweet_list)){
        foreach($tweet_list as $tweet){
    ?>
        <div class='row'>
            <div class='col-6'>
                <?php echo $tweet['tweet_text']; ?>
            </div>
            <div class='col-3 mb-5'>
                <?php echo "By: @".$tweet['username']; ?>
            </div>
            <div class="col-3">
                <button type="submit" name="correction" class="btn btn-success mr-2"><a href="editTweet.php?tweet_id=<?php echo $tweet['tweet_id'];?>" class="text-white">Edit</a></button>
                <button type="submit" name="delite" class="btn btn-success"><a href="deleteTweet.php?tweet_id=<?php echo $tweet['tweet_id'];?>" class="text-white">delete</a></button>
            </div>
        </div>
    <?php  
        }
    }else{
    ?>
        <div class="row">
            <div class="col-12">
                <h3>Nothing to display</h3>
            </div>
        </div>
    <?php
    }
    ?>
</div>




