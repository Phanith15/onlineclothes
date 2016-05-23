<?php
    //Redirect back to index page if no stockID has been set
    if(!isset($_GET['stockID'])){
        header("Location:index.php"); //Redirect back to index.php
    }
    $stock_id = $_GET['stockID'];
    $item_sql = "SELECT * FROM stock WHERE stockID=".$stock_id;
    $item_query = mysqli_query($dbconn,$item_sql);
    //check if query working fine
    if ($item_query = mysqli_query($dbconn,$item_sql)){
        $item_result = mysqli_fetch_assoc($item_query);
        ?> <!--Close php first if we want to use html-->
        <p> <img src="images/<?php echo $item_result['bigphoto'] ;?>"</p>
        <h1><?php echo $item_result['name']; ?></h1>
        <p>$<?php echo $item_result['price']; ?><p>
        <p><?php echo $item_result['description']; ?><p>
        <?php
    }
    

?>