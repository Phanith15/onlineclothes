<?php
    //Only Admin can use this page.
    session_start(); //To use $_SESSION, we need to use session_start();
    //check to see if user is logged in. if not, redirect to admin page
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    if(isset($_GET['category_ID'])){
        $_SESSION['editcategory']['categoryID']= $_GET['category_ID'];
    }
    
    if (!isset($_SESSION['editcategory']['name'])){
       $editcat_sql = "SELECT * FROM tbcategory WHERE categoryID=".$_GET['category_ID'];
        $editcat_query = mysqli_query($dbconn,$editcat_sql);
        $editcat_result = mysqli_fetch_assoc($editcat_query);
    
        $_SESSION['editcategory']['name'] = $editcat_result['name']; 
    }
    
?>
    <h1>Edit category</h1>
    <form action="index.php?page=editcategoryconfirm" method="post">
        <input name="editname" value="<?php echo $_SESSION['editcategory']['name']; ?>"/> <!--$_SESSION[''][''] inside '' you can name anything, its just like a variable.-->
        <input type="submit" name="btnUpdate" value="Update"/>
        <p><a href="index.php?page=editcategoryselect">Back</a></p>
        
    </form>