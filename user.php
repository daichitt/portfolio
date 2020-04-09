<?php
    require_once "database.php";

    class User extends Database{
        public function createUser($first_name, $last_name, $adress,$countactnumber,$email, $username,$password){
            $sql = "INSERT INTO users(first_name,last_name,adress,countactnumber,email,username,password) VALUES ('$first_name','$last_name','$adress','$countactnumber','$email','$username','$password')";

            $result=$this->conn->query($sql);
            if($result == false){
                die("CANNOT ADD USER:".$this->conn->error);
            }else{
                header("Location: view/login.php");
            }
        }

        public function login($username, $password){
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

            $result = $this->conn->query($sql);
            if($result->num_rows==1){
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }

        public function tweet($tweet_text, $user_id){
            $sql = "INSERT INTO tweets(tweet_text, user_id) VALUES('$tweet_text','$user_id')";

            $result= $this->conn->query($sql);

            if($result==false){
                die("CANNOT ADD TWEET: ".$this->conn->error);
            }else{
                header("Location:view/watch.php");  //catch from view/watch.php
            }
        }

        public function getTweets(){
            $sql = "SELECT * FROM tweets INNER JOIN users ON users.user_id = tweets.user_id";

            $result = $this->conn->query($sql);

            $rows = array();

            if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                   $rows[] = $row;
               }
               return $rows;
            }else{
                return false;
            }
        }

        public function deleteTweet($tweet_id){
            $sql = "DELETE FROM tweets WHERE tweet_id = '$tweet_id'";
            // echo $sql;
            $result = $this->conn->query($sql);

            if($result == false){
                die("Cannot Delete: ".$this->conn->error);
            }else{
                header("location: tweet.php");
            }
        }

    }
?>