<?php 
    include "header.php";
    session_start();
?>


<div class="container">
        <div class="card w-50 mx-auto mt-5 text-center">
            <div class="card-header bg-danger text-light">
                <h6 class="display-4">
                    Hello, <?php echo $_SESSION['username']?>, What do you want to tweet?
                </h6>
            </div>
            <div class="card-body">
                <form action="../userAction.php" method="post">
                    <div class="form-group">
                        <label for="" class="">Text here</label>
                        <input type="text" name="tweet_text" placeholder="Text here" class="form-control">
                        <br>
                        <input type="submit" name="tweet" class="btn  btn-block btn-outline-primary" value="Tweet">
                    </div>
                </form>
            </div>
        </div>
</div>