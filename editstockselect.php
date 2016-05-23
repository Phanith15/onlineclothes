<?php
    //Only Admin can use this page.
    session_start(); //To use $_SESSION, we need to use session_start();
    //check to see if user is logged in. if not, redirect to admin page
    if(!isset($_SESSION['admin'])){ // if not logged in
        header("Location:index.php?page=admin"); // Bring to admin page.
    }
    //unset($_SESSION['editcategory']); //Unset editcategory page when u click back. It means it will remember what u just clicked in editcategory page.
    if (isset($_GET['categoryID'])){
        
    }
    
    $editstock_sql = "SELECT * FROM tbcategory";
    $editstock_query = mysqli_query($dbconn,$editstock_sql);
    $editstock_result = mysqli_fetch_assoc($editstock_query);
    
?>
    <h1>Edit stock</h1>
    <form action="index.php?page=editstockconfirm" method="get">
        <select name="categoryID">
            <option value="">Choose a category</option>
            <?php
                do{
                   ?> <option value="<?php echo $editstock_result['categoryID'];?>"><?php echo $editstock_result['name']; ?></option>
                   <?php
                }while($editstock_result = mysqli_fetch_assoc($editstock_query));
            ?>
        </select>
        <input type="submit" value="Submit">
        
    </form>
    

