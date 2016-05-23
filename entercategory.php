<?php
    //Only Admin can user this page.
    session_start(); //To use $_SESSION, we need to use session_start();
    //check to see if user is logged in. if not, redirect to admin page
    
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    //Check to see if user has submitted the addcategory form
    
    if(!isset($_SESSION['addcategory']['cat_name'])){ // if user doesnt come to this page via addcategory.php page, then redirct to login form.
        header("Location:index.php?page=admin");
    }
    //Enter the new category
    //User mysqli_real_escape_string to prevent user input something not a alphabet.
    
    //$newcategory_sql = "INSERT INTO tbcategory (name) VALUES ('".mysqli_real_escape_string($dbconn,$_POST['cat_name'])."')";
    $newcategory_sql = "INSERT INTO tbcategory (name) VALUES ('".mysqli_real_escape_string($dbconn,$_SESSION['addcategory']['cat_name'])."')";
    $newcategory_query = mysqli_query($dbconn,$newcategory_sql);
    unset($_SESSION['addcategory']['cat_name']);//The reason is that we want add new category box to be empty after we added
?>
<p>New category has been entered</p>
<p><a href="index.php?page=admin">Return to admin panel</a></p>