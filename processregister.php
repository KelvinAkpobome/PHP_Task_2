<?php session_start();

$errorCount = 0;

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :  $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] :  $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] :  $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;

if ($errorCount >0 ){

    $session_error = "You have ". $errorCount . " error"; 

    if($errorCount > 1){

        $session_error .= "s";
    }

    $session_error .= " in your form";
    $_SESSION['error'] = $session_error;  
    header("Location: register.php");    
}
else{
    $allUsers = scandir("db/users/");

    $countofUsers = count($allUsers);

    $newuserId = ($countofUsers-1);

    $userObject = [
        'id'=>$newuserId,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=> password_hash($password, PASSWORD_DEFAULT),
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department,
    ];

    for ($counter = 0; $counter < $countofUsers; $counter++){

       $currentuser = $allUsers[$counter];
                if($currentuser == $email .".json"){
                   $_SESSION["error"] = "This user already exist";
                  header("Location: register.php"); 
                 die();
                }
    }
        file_put_contents("db/users/". $email. ".json", json_encode($userObject));
        $_SESSION['message'] = " You have  successfully registered, you can now log in" .$first_name;
        header("Location: login.php");  

}

