<?php
    //Only Admin can use this page.
    session_start(); //To use $_SESSION, we need to use session_start();
    //check to see if user is logged in. if not, redirect to admin page
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    // Set session to blank if user just entered this page from the admin panel
    if(!isset($_SESSION['addcategory']['cat_name'])){
        $_SESSION['addcategory']['cat_name']="";
    }
    //Testing branching
?>
<h1>Add new category</h1>
<form method="post" action="index.php?page=confirmcategory">
    <!--Intialise the add new category input box, when user decide to choose Oops , go back, it shows whatever user entered in the add new category box.-->
    <p><input type="text" name="cat_name" value= "<?php  echo $_SESSION['addcategory']['cat_name']?>" size ="40" maxlength="50"/> </p>
    <p><input type="submit" value="Add category" name="btnAddCategory" /></p>
    <p><a href="index.php?page=admin">Back</a></p>
</form>