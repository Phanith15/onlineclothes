<!DOCTYPE html>
    <?php
        // connect to Mysql database.
        include("dbconnect.php");
    ?>
    <html>
        <head>
           <meta charset= "UTF-8">
            <link href= "css/style.css" rel="stylesheet">
           <link href= "css/newstyle.css" rel="stylesheet">
           
           <title>Online Shopping Clothes</title>
        </head>
        <body>
            <div class="container">
                <?php
                    include("header.php");
                    // check to see if user is visiting a page other than home page
                    if (!isset($_GET['page'])) {
                        ?> <div class="banner"><img src="images/banner2.jpg" alt= "Online Clothes"></div>
                        <?php
                    }
                ?>
            </div>
            
            <div class="container" style="background-color: gray">   
                <div class="maincontent">
                   <?php
                       if (!isset($_GET['page'])){ //Display only some default home page if user dont select on anything
                             include("home.php");    
                       }else{
                            $page= $_GET['page'];
                            include("$page.php"); //This will show different content (Skirts, Dresses, Pants..)
                       }
                   ?>  
                </div>
                <div class="seccontent">
                     <?php
                        include ("secondcontend.php"); // Easy to maintian your code
                    ?>              
                </div>             
            </div> <!--End of Container-->  
        </body>
        <!--<footer class="footer">
            <p>Instant update database project by <a href="mailto:pnlovenz@gmail.com">pnlovenz@gmail.com</a></p>
        </footer>  -->
    </html>