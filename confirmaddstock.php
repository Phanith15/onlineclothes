<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:index.php");
    }
    //Check submit button
    if(isset($_POST['btnsubmit'])){
        $_SESSION['addstock']['name']= $_POST['name'];
        $_SESSION['addstock']['categoryID']= $_POST['categoryID'];
        $_SESSION['addstock']['price']= $_POST['price'];
        $_SESSION['addstock']['topline']= $_POST['topline'];
        $_SESSION['addstock']['description']= $_POST['description'];
        
    } else{
        header("Location:index.php");
    }
    if($_FILES['fileToUpload']['name']!=""){//Check if file was chosen
        $_SESSION['addstock']['thumbnail'] = $_FILES["fileToUpload"]["name"];
        $target_dir = "images/";
        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        //Check if image fiel is an actual image or fake image
        if(isset($_POST['btnsubmit'])){
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check!== false){
                $uploadOk = 1;
            }else{
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        //Check if file already exists
        if(file_exists($target_file)){
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        //Check file size
        if($_FILES["fileToUpload"]["size"] > 500000){ //Max 500 KB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        //Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            echo "Sorry, only JPG, JPEG, PNG and GIF files are allowed.";
            $uploadOk = 0; 
        }
        //Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0){
            echo "Sorry, your file was not uploaded.";
        // If everything is ok, try to upload file
        } else{
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
                echo "The file".basename($_FILES["fileToUpload"]["name"])."has been uploaded.";
                //Display all info
                ?>
                <div class="maincontent">
                    <p><a href="index.php?page=admin">Back to admin</a></p>
                    <h1>Confirm item details</h1>
                    <p>Stock item name:<?php echo $_SESSION['addstock']['name'];  ?> </p>
                    <p>Thumbnail:<img src="images/<?php echo $_SESSION['addstock']['thumbnail'];  ?>" </p>
                    <p>Category: </p>
                </div>
                
                <?php
                
            }else{
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    }

?>
<p><a href="index.php?page=addstock">Go back</a></p>