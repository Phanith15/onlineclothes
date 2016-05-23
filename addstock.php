<?php
    session_start();
    if(!isset($_SESSION['admin'])){
         header("Location:index.php?page=admin"); 
    }
    if(!isset($_SESSION['addstock'])){ // When first come to this page
        $_SESSION['addstock']['name'] = "";
        $_SESSION['addstock']['categoryID'] = "1";
        $_SESSION['addstock']['price'] = "";
        $_SESSION['addstock']['topline'] = "";
        $_SESSION['addstock']['description'] = ""; // These values are important when users decide to go back to the page so that all information are still there.
    }

?>

<div class="maincontent">
    <h1>Enter stock details</h1>
    <form method="post" action="index.php?page=confirmaddstock" enctype="multipart/form-data">
        <p>Stock item name: <input class="addstock" type="text" name="name" value="<?php echo $_SESSION['addstock']['name']; ?>"/></p>
        <p>Thumbnail image: <input class="uploadfile" type="file" name="fileToUpload" id="fileToUpload"/></p>
        <p>Category:<select class="dropdown" name="categoryID">
            <?php
                $catlist_sql = "SELECT * FROM tbcategory";
                $catlist_qry = mysqli_query($dbconn,$catlist_sql);
                $catlist_rs = mysqli_fetch_assoc($catlist_qry);
                do{ ?>
                   <option value="<?php echo $catlist_rs['categoryID']; ?>"
                   <?php
                        if($catlist_rs['categoryID']==$_SESSION['addstock']['categoryID']){
                            echo "selected=selected";
                        }
                   ?>
                   ><?php echo $catlist_rs['name'] ?></option>
                         
                <?php }while($catlist_rs = mysqli_fetch_assoc($catlist_qry));
            ?>
        </select></p>
        <p>Price: $ <input class="addstock-price-topline" type="text" name="price" value="<?php echo $_SESSION['addstock']['price'];?>"/></p>
        <p>Topline:<input class="addstock-price-topline" type="text"name="topline" value="<?php echo $_SESSION['addstock']['topline'];?>"/> </p>
        <p>Description: <textarea name="description" cols=60 rows=5  ><?php echo $_SESSION['addstock']['description'];?></textarea> </p>
        <input type="submit" name="btnsubmit" value="Submit"/>
    </form>
</div>