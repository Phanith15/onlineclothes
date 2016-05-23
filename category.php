<?php
    // if category_id is not set, redirect back to index page
    if(!isset($_GET['category_id'])){
        header("Location:index.php");
    }
    //Get category_id
    $cat_id = $_GET['category_id'];
    $stock_sql = "SELECT stock.stockID,stock.name,stock.price,stock.thumbnail,tbcategory.name AS CateName FROM stock JOIN tbcategory ON stock.categoryID = tbcategory.categoryID WHERE stock.categoryID =".$cat_id;
    if ($stock_query = mysqli_query($dbconn,$stock_sql)){
        $stock_result = mysqli_fetch_assoc($stock_query);
    }
    // check if there is nothing in stock
    
    if(mysqli_num_rows($stock_query)==0){
        echo "Sorry, we have no items currently in stock.";
    }else{
        ?> <!--close php-->
        <h1> <?php echo $stock_result['CateName']; ?> </h1>
        <?php
            do{
                ?>
                <div class="col-md-4">
                    <!--Turn name and price into links-->
                    <a href="index.php?page=item&stockID=<?php echo $stock_result['stockID'];?>"
                        <p><img src="images/<?php echo $stock_result['thumbnail']; ?>"</p>
                        <p><?php echo $stock_result['name'];  ?> </p>
                        <p>$<?php echo $stock_result['price']; ?></p>
                    </a>
                </div>
        <?php
             }while($stock_result = mysqli_fetch_assoc($stock_query))
        ?>
        <?php //Reopen php
    }
?>

 