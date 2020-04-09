<?php
    session_start(); // TO let the computer know that we have a session. //session_start — 新しいセッションを開始、あるいは既存のセッションを再開する

    session_unset();//remove all session variables //session_unset — 全てのセッション変数を開放する

    session_destroy();//Destroy the session  //session_destroy — セッションに登録されたデータを全て破棄する

    header("location: login.php"); //go to location.php 
    
?>