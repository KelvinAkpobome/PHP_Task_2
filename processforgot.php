<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;

if ($errorCount >0 ){

    $session_error = "You have ". $errorCount . " error"; 

    if($errorCount > 1){

        $session_error .= "s";
    }

    $session_error .= " in your form";
    $_SESSION['error'] = $session_error;  
    header("Location: forgot.php");    
}
else{
    $allUsers = scandir("db/users/");

    $countofUsers = count($allUsers);
    for ($counter = 0; $counter < $countofUsers; $counter++){

        $currentuser = $allUsers[$counter];
         if($currentuser == $email .".json"){
           $token = "";
           $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','A','B','C','D','E','F','G','H','I','J'];

           for ($i = 0; $i<60; $i++)
           {
               $index = mt_rand(0,count($alphabets)-1);
               $token .= $alphabets[$index];
           }
             

           $subject = "Password Reset Link";
           $message = "A password reset link was initialized from your account with us, if you are not aware of this please ignore, visit http://localhost/sngh/reset.php?token";
            $token;
            $header = "From: no-reply@sngh.com" ."\r\n". 

            file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));

            $try = mail($email,$subject,$message,$header);

            if ($try){
                $_SESSION['message'] = "Password reset has been sent to ". $email;
                header("Location: login.php");
            }else{
                $_SESSION['error'] = "Something went wrong with sending link to ". $email;
                header("Location: forgot.php");
            }
            die();
        }
     }
         file_put_contents("db/users/". $email. ".json", json_encode($userObject));
         $_SESSION['error'] = $email. "is not registered with us" ;
         header("Location: forgot.php");  
 

}