<?php
   $dbconn = mysqli_connect("localhost","root","","onlineshop");
   if (mysqli_connect_errno()){
        echo "Connection failed:".mysqli_connect_errno();
        exit;
   }


?>