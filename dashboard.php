<?php  include_once("lib/header.php")?>
<h3> Dashboard </h3>

<?php if (!isset($_SESSION["Loggedin"])){
    header("Location: login.php");
}
?>
Welcome <?php echo $_SESSION['full_name']?> . You are logged in as a <?php echo $_SESSION['role']?> and your user ID is <?php echo $_SESSION['Loggedin']?>

<?php include_once("lib/footer.php")?>