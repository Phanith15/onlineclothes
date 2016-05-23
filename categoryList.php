<?php
    $cat_sql = "SELECT * FROM tbcategory";
    $cat_query = mysqli_query($dbconn,$cat_sql);
    $cat_row = mysqli_fetch_assoc($cat_query);
        // Everytime user click on Category (Skirts,Dresses,...) It will link to the same page index.php but with dynamic display    
        do{ ?>
             <a href= "index.php?page=category&category_id=<?php echo $cat_row['categoryID'];?>"><?php echo $cat_row['name']; ?> </a>
            <?php  
        }while($cat_row = mysqli_fetch_assoc($cat_query))
?>