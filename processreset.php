<?php session_start();

$errorCount = 0;

$token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;


$_SESSION['token'] = $token;
$_SESSION['email'] = $email;

f ($errorCount >0 ){

    $session_error = "You have ". $errorCount . " error"; 

    if($errorCount > 1){

        $session_error .= "s";
    }

    $session_error .= " in your form";
    $_SESSION['error'] = $session_error;  
    header("Location: register.php");    
}
else{

    $allUserstokens = scandir("db/tokens/");

    $countofUserstokens = count($allUserstokens);

}
?>
