<?php  include_once("lib/header.php")?>
<h3>Welcome to Your Dashboard </h3>

<?php if (!isset($_SESSION["Loggedin"])){
    header("Location: login.php");
}
?>
Hi <?php if(isset($_SESSION['full_name']) &&  !empty ($_SESSION['full_name']))
                {echo "<span style='color:blue'>" . $_SESSION['full_name'] . "</span>";}
                ?><br />

Your User ID is <?php if(isset($_SESSION['Loggedin']) &&  !empty ($_SESSION['Loggedin']))
                {echo "<span style='color:blue'>" . $_SESSION['Loggedin'] . "</span>";}
                ?><br />

Pleased to have as a member of the <?php if(isset($_SESSION['role']) &&  !empty ($_SESSION['role']))
                {echo "<span style='color:blue'>" . $_SESSION['role'] ."</span>";}
                ?> department. <br />

<p>Check your appointments <a href="bookings.php">here.</a>
<?php include_once("lib/footer.php")?>