<?php
    //Only Admin can use this page.
    
    session_start(); //To use $_SESSION, we need to use session_start();
    
    //check to see if user is logged in. if not, redirect to admin page
    
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
   
?>
<h1>Delete category</h1>
<?php
    $delcat_sql ="SELECT * FROM tbcategory";
    $delcat_query = mysqli_query($dbconn,$delcat_sql);
    $delcat_result = mysqli_fetch_assoc($delcat_query);
    do{
        ?>
        <p><a href="index.php?page=deletecategoryconfirm&categoryID=<?php echo $delcat_result['categoryID']; ?>"><?php echo $delcat_result['name']; ?></a></p>
        <?php
    }while($delcat_result = mysqli_fetch_assoc($delcat_query));
?>