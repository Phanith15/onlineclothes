<?php
     //Only Admin can use this page.
    
    session_start(); //To use $_SESSION, we need to use session_start();
    
    //check to see if user is logged in. if not, redirect to admin page
    
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    
    $editcat_sql ="UPDATE tbcategory SET name = '".$_SESSION['editcategory']['name']."' WHERE categoryID=".$_SESSION['editcategory']['categoryID'];
    $editcat_query = mysqli_query($dbconn,$editcat_sql);
    
    unset($_SESSION['editcategory']);
  
?>
<h1>Edit category</h1>
<p>Category successfully updated</p>
<p><a href="index.php?page=admin">Back to admin panel</a></p>
