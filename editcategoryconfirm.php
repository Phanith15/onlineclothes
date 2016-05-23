<?php
    //Only Admin can use this page.
    
    session_start(); //To use $_SESSION, we need to use session_start();
    
    //check to see if user is logged in. if not, redirect to admin page
    
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    $_SESSION['editcategory']['name'] = $_POST['editname'];
?>
<h1>Editcategory</h1>
<p>Updated category name: <?php echo $_SESSION['editcategory']['name'];?></p>
<p><a href="index.php?page=editcategoryupdate">Confirm </a>|<a href="index.php?page=editcategoryselect">Oops, go back </a> |<a href="index.php?page=admin"> Back to admin panel</a></p>

