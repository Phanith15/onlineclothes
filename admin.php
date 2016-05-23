<?php
    
    session_start();
    //check to see if user is logged out
    if(isset($_GET['action'])){
        if($_GET['action']=="logout"){
            unset($_SESSION['admin']); // load back to login form after logged out. 
        } 
    }
    //if login form has been submitted, check if username and password match
    if(isset($_POST['btnlogin'])){
        $login_sql = "SELECT * FROM user WHERE username = '".$_POST['username']." ' AND password='".sha1($_POST['password'])."' "; //Password need to be decrypted using sha1.
        if ($login_query = mysqli_query($dbconn,$login_sql)){ // If correct username and password
            $login_result = mysqli_fetch_assoc($login_query);
            $_SESSION['admin'] = $login_result['username'];
        }
    }
    //Login if correct username and password.
    if(isset($_SESSION['admin'])){ //if we're logged in then display the page cpanel.php
       include("adminpanel.php"); 
    }else{ // if not logged in , then display the log in page.
        include("login.php");
    }

?>