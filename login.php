<h1>Login</h1>
<!--Post method is to send information to the next page-->
<form name="login" method="post" action="index.php?page=admin">
    <p>Username <input name="username" type="text" maxlength=30></p>
    <p>Password <input name="password" type="password" maxlength=30></p>
    <?php
    // Check if correct username and password
        if(isset($_POST['btnlogin']) && !isset($_SESSION['admin'])){
            ?>
            <p><span class="error">Incorrect username or password.</span></p>
            <?php
        }
    
    ?>
    <p><input type="submit" name="btnlogin" value="Submit"></p>
    
</form>