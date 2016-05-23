<?php
    //Only Admin can use this page.
    session_start(); //To use $_SESSION, we need to use session_start();
    //check to see if user is logged in. if not, redirect to admin page
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    unset($_SESSION['editcategory']); //Unset editcategory page when u click back. It means it will remember what u just clicked in editcategory page.
    
    $editcat_sql = "SELECT * FROM tbcategory";
    $editcat_query = mysqli_query($dbconn,$editcat_sql);
    $editcat_result = mysqli_fetch_assoc($editcat_query);
    
?>
    <h1>Edit category</h1>
    <?php
        do{
            ?>
            <p><a href="index.php?page=editcategory&category_ID=<?php echo $editcat_result['categoryID'];  ?>"><?php echo $editcat_result['name'] ?></a></p>
            <?php
        }while($editcat_result = mysqli_fetch_assoc($editcat_query));
    ?>
