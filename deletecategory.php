<?php
    //Only Admin can use this page.
    
    session_start(); //To use $_SESSION, we need to use session_start();
    
    //check to see if user is logged in. if not, redirect to admin page
    
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    $delcat_sql = "DELETE FROM tbcategory WHERE categoryID=".$_GET['category_ID'];
    $delcat_query = mysqli_query($dbconn,$delcat_sql);
    
    $delstock_sql = "DELETE FROM stock WHERE categoryID=".$_GET['category_ID'];
    $delstock_query = mysql_query($dbconn,$delstock_sql);
   
?>
<h1>Category deleted</h1>
<p>Category has successfully been deleted</p>
<p><a href="index.php?page=admin">Return to admin panel</a></p>
