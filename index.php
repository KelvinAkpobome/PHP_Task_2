<?php  include_once('lib/header.php');  ?>
<div class="login">
    <p>
        <?php 
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo "<p class='info'>" . $_SESSION['message'] . "</span>";
                session_destroy();
            }
        ?>
    </p>
    Hi, This is Designers Pitch <br /><hr />
    <p>We want to inject creativity into every mind</p>
    <p>Coding and designs is a journey we have loved</p>
    <p>We are sure you will love it too</p>


<?php include_once('lib/footer.php'); ?>

