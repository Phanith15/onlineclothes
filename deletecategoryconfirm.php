<?php
    //Only Admin can use this page.
    
    session_start(); //To use $_SESSION, we need to use session_start();
    
    //check to see if user is logged in. if not, redirect to admin page
    
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
   
?>
<h1>Confirm category to delete</h1>
<?php
    $delcat_sql ="SELECT * FROM tbcategory WHERE categoryID=".$_GET['categoryID'];
    $delcat_query = mysqli_query($dbconn,$delcat_sql);
    $delcat_result = mysqli_fetch_assoc($delcat_query);
    
    //Check if there are any stock items in this categoryID
    $check_sql ="SELECT * FROM stock WHERE categoryID=".$_GET['categoryID'];
    $check_query = mysqli_query($dbconn,$check_sql);
    $count_numrow = mysqli_num_rows($check_query);
    
    ?>
    <p>
        <?php
            if($count_numrow>0){
                echo "Warning! There are ".$count_numrow." stock item(s) in this category. If you delete the category they will also be removed from the database";
            }
        ?>
    </p>
    <p><?php echo "Do you really wish to delete ".$delcat_result['name']." ?";?></p>
    <p><a href="index.php?page=deletecategory&category_ID=<?php echo $_GET['categoryID'] ?>">Yes, delete it</a>|<a href="index.php?page=deletecategoryselect"> No, go back</a> | <a href="index.php?page=admin">Back to admin panel</a> </p>
    <?php
?>