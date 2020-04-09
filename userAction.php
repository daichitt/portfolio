<?php
    require_once "class/user.php";
    $user = new User();//OBJECT
    
    session_start();

    if(isset($_POST['register'])){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $adress = $_POST['adress'];
        $countactnumber = $_POST['countactnumber'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $first_name, $last_name, $adress,$countactnumber,$email, $username,$password;

        $user->createUser($first_name,$last_name,$adress,$countactnumber,$email,$username,$password);
    }elseif(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // echo $username,$password;
        
        $login = $user->login($username,$password);

        if($login){
            $_SESSION['user_id'] = $login['user_id'];
            $_SESSION['username'] = $login['username'];
            
            header("location: view/mainpage.php");
        }else{
            echo "Incorrect Username or Password";
        }
    }elseif(isset($_POST['tweet'])){
        $tweet_text = $_POST['tweet_text']; //from input
        $user_id = $_SESSION['user_id'];


        $user->tweet($tweet_text, $user_id);
    }


?>