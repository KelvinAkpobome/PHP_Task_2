<?php include_once("lib/header.php")?>

<div>
	<form  action="processpaybill.php" method="POST">
	  		<h1>Pay Bill</h1>
                   <p>All <strong>fields</strong> are required</p>
         <p>
        <?php
            if(isset($_SESSION['error']) &&  !empty ($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
        ?>

         </p>          

		<p>
            <label>Customer Email</label><br />
            <input 
            <?php              
                if(isset($_SESSION['custemail'])){
                    echo "value=" . $_SESSION['custemail'];                                                             
                }                
            ?>
             type="text" name="custemail" placeholder="Customer Email" />
        </p>
        <p>
            <label>Amount</label><br />
            <input 
            <?php              
                if(isset($_SESSION['amount'])){
                    echo "value=" . $_SESSION['amount'];                                                             
                }                
            ?>
            type="number" name="amount" placeholder="Enter Amount"  />
        </p>
        <p>
            <label>Currency</label><br />
            <input
            <?php              
                if(isset($_SESSION['currency'])){
                    echo "value=" . $_SESSION['currency'];                                                             
                }                
            ?>
            type="text" name="currency" placeholder="example: NGN for Naira"/>
        </p>

        
        <p>
            <button type="submit">Pay</button>
        </p>
    </form>

    <?php include_once("lib/footer.php")?>