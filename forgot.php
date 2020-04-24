<?php include_once("lib/header.php")?>
            

            <div>
	<form method="POST" action="processforgot.php">
	  		<h3>Provide the Email Associated with the account</h3>
         <p>
        <?php
            if(isset($_SESSION['error']) &&  !empty ($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
        ?>

         </p>          
        <p>
            <label>Email</label><br />
            <input
            
            <?php              
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];                                                             
                }                
            ?>

             type="text" name="email" placeholder="Email"  />
        <p>
            <button type="submit">Send Reset Code</button>
        </p>
    </form>
<?php include_once("lib/footer.php")?>