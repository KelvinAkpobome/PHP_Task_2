<?php  include_once("lib/header.php")?>
<h3> Booked Appointments </h3>

 <?php $allbookings = scandir("db/bookings/");

    $staffDepartment =  $_SESSION['designation'];
    $countofbookings = count($allbookings);
    $newbooking = ($countofbookings-2);

    if($newbooking == 0){
        echo "No booking exist at this time";
        die();
    }else{
        $patientData = [];
      for ($counter=1; $counter < $countofbookings; $counter++) { 
         if(file_exists('db/bookings/'.$staffDepartment.'.json')){
             //open or read json data
            $bookingStrings= file_get_contents('db/bookings/'.$staffDepartment.'.json'); 
            $data = json_decode($bookingStrings, true);
            $patientData[] = $data;
            break;
        } 
    }
}
    ?>
<?php include_once("lib/footer.php")?>