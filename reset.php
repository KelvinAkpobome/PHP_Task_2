<?php include_once("lib/header.php")?>
            
 <?php if (!isset($_GET['token']) && !isset($_SESSION['token'])){
     $_SESSION['error'] = "You are not allowed to do this ";
     header("Location: login.php");
 }?>
            <div>
	<form method="POST" action="processreset.php">
              <h3>Reset Password</h3>
              
            <P>Reset the password for: [email]</p>
         <p>
        <?php
            if(isset($_SESSION['error']) &&  !empty ($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
        ?>

         </p>   
         <p>
             <input
             <?php
            if(isset($_SESSION['token']) ){
                echo "value='"  . $_SESSION['token'] . "'";
                echo "value='"  . $_GET['token'] . "'";

            }
        ?>
             
             type="hidden", name="token" ,value="<?php echo $_GET['token']?>">
         </p>       
        <p>
            <label>Email</label><br />
            <input type="text" name="email" placeholder="Email"  />

        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password"  />
        </p>

        <p>
            <button type="submit">Reset Password</button>
        </p>
    </form>
<?php include_once("lib/footer.php")?>