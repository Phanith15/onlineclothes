<?php
    //Only Admin can user this page.
    session_start(); //To use $_SESSION, we need to use session_start();
    //check to see if user is logged in. if not, redirect to admin page
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
     //Check to see if user has submitted the addcategory form
    if(!isset($_POST['btnAddCategory'])){ // if user doesnt come to this page via addcategory.php page, then redirct to login form.
        header("Location:index.php?page=admin");
    }
    //set addcategory session
    $_SESSION['addcategory']['cat_name'] = $_POST['cat_name'];
?>
<h1>Confirm category name</h1>
<p>You entered: <?php echo $_POST['cat_name'] ;?></p>
<p><a href="index.php?page=entercategory">Correct, continue</a>|<a href="index.php?page=addcategory">Oops , go back</a></p>