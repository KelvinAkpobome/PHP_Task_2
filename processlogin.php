<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;

$_SESSION['email'] = $email;

if ($errorCount >0 ){

    $session_error = "Please review, you seem to have ". $errorCount . " error"; 

    if($errorCount > 1){

        $session_error .= "s";
    }

    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error;  

    header("Location: login.php"); 
} else{
    $allUsers = scandir("db/users/");
    $countofUsers = count($allUsers);

    for ($counter = 0; $counter < $countofUsers; $counter++){

        $currentuser = $allUsers[$counter];
                 if($currentuser == $email .".json"){
                     $userString = file_get_contents("db/users/".$currentuser);
                     $userObject = json_decode($userString);
                     $passwordFromdb = $userObject->password;
                     $passwordFromuser = password_verify($password, $passwordFromdb);
                     if ($passwordFromdb == $passwordFromuser){
                         $_SESSION["Loggedin"] = $userObject->id;
                         $_SESSION['full_name'] = $userObject->first_name. " " . $userObject->last_name;
                        $_SESSION['role'] = $userObject->designation;
                        
                        if ($userObject->designation == "Patient"){
                            header("Location: patients.php");
                            die();
                        }elseif($userObject->designation == "Admin Member"){
                            header("Location: admin.php");
                            die();
                        }
                        else{
                            header("Location: mt.php");
                        }
                         die();
                     }
                 }
     }
     $_SESSION["error"] = "INVALID LOGIN DETAILS";
     header("Location: login.php"); 
}
?>