<?php 
?>
<p> 
        <?php if (isset($_SESSION["Loggedin"])){?>
            <a href="logout.php">Logout</a> |
            <a href="forgot.php">Reset Password</a> 
        <?php }else{ ?>
            <a href="login.php">Login</a> |
            <a href="register.php">Register</a> |
            <a href="forgot.php">Forgot Password</a> |
            <a href="index.php">Home</a> 

        <?php }?>

    </p>

</body>
</html>