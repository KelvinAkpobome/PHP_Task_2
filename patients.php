<?php  
include_once("lib/header.php");
require_once('functions/alert.php');
?>

<?php
    displayAlert();
        ?>
<h3>Welcome to Your Dashboard </h3>

Hi  <?php if(isset($_SESSION['full_name']) &&  !empty ($_SESSION['full_name']))
                {echo "<span style='color:blue'>" . $_SESSION['full_name'] . "</span>";}
                ?><br />

Your User ID is <?php if(isset($_SESSION['Loggedin']) &&  !empty ($_SESSION['Loggedin']))
                {echo "<span style='color:blue'>" . $_SESSION['Loggedin'] . "</span>";}
                ?><br />

We have you as a  <?php if(isset($_SESSION['role']) &&  !empty ($_SESSION['role']))
                {echo "<span style='color:blue'>" . $_SESSION['role'] . "</span>";}
                ?> in our database<br />

<p>Book an appointment with a consultant <a href="appointment.php">here</a>. You can as well <a href="paybill.php">Pay</a> bills here.</p> 
<p>Your transactions history is  <a href="transaction.php">here</a>.</p>

<?php include_once("lib/footer.php")?>