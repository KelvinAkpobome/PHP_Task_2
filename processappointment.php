<?php session_start();

$errorCount = 0;

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :  $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] :  $errorCount++;
$age = $_POST['age'] != "" ? $_POST['age'] :  $errorCount++;
$appointmentdate = $_POST['appointmentdate'] != "" ? $_POST['appointmentdate'] :  $errorCount++;
$appointmenttime = $_POST['appointmenttime'] != "" ? $_POST['appointmenttime'] :  $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;
$initcomment = $_POST['initcomment'];


$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['age'] = $age;
$_SESSION['appointmentdate'] = $appointmentdate;
$_SESSION['appointmenttime'] = $appointmenttime;
$_SESSION['department'] = $department;




if ($errorCount >0 ){

    $session_error = "Please review your submission. You seem to  have ". $errorCount . " error"; 

    if($errorCount > 1){

        $session_error .= "s";
    }

    $session_error .= " at the moment";
    $_SESSION['error'] = $session_error;  
    header("Location: appointment.php");    
}else{
    $bookings = [
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'appointmentdate'=>$appointmentdate,
        'appointmenttime'=>$appointmenttime,
        'age'=> $age,
        'gender'=>$gender,
        'department'=>$department,
        'initcomment'=>$initcomment,
    ];

    file_put_contents("db/bookings/". $email. ".json", json_encode($bookings));
        $_SESSION['message'] = "Dear " .$first_name. ", You have  successfully booked an appointment with the " .$department. " department";
        header("Location: patients.php"); 
        session_destroy(); 
}

