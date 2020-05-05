<?php
include_once('lib/header.php'); 
require_once('functions/alert.php');
//require_once('functions/user.php');



//if(!isset($_SESSION['loggedin'])){
 // header('Location: login.php');
//}
?>




<h3>Dashboard</h3>
<p >Welcome  <?php echo $_SESSION['full_name'];?> <br />You are saved in our Database as an <?php echo $_SESSION['role'];?>  </p>
<p>Click <a href="transaction.php">here</a> to view all transaction history</p>

<div>
<div>
  
  <?php 
  //Loop through the users folder to fetch all users into container


  $allUsers = array_diff(scandir("db/users/"), array('.', '..'));// allowing only files in array
  
  $users = [];// container for users 
  if($allUsers){
    foreach($allUsers as $user){
      $userString = file_get_contents("db/users/".$user); 
      $userObject = json_decode($userString,true);
      $users[] = $userObject;    
    }

    ?>
    <h1>The Staff and Patient Records</h1>

<table>
  <tr>
    <th>S/No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Designation</th>
    <th>Department</th>
    <th>Registration Date</th>
    <th>Last Login</th>
  </tr>
    <?php

    // display users
    for($counter=0;$counter < count($users);$counter++){
      $staffAndUser = $users[$counter];
      
      if($staffAndUser['designation'] == 'Medical Team(MT)'){
        //show staff details here
        $staff = $staffAndUser;
        ?>

      
        <tr>
          <td><?php echo $staff['id'];?></td>
          <td><?php echo $staff['first_name'];?></td>
          <td><?php echo $staff['last_name'];?></td>
          <td><?php echo $staff['email'];?></td>
          <td><?php echo $staff['gender'];?></td>
          <td><?php echo $staff['designation'];?></td>
          <td><?php echo $staff['department'];?></td>
          <td><?php echo $staff['createdTime'];?></td>
          <td><?php echo $staff['lastLogin'];?></td>
          
        </tr>
        
      
      <?php   
      }else if($staffAndUser['designation'] == 'Patients'){
        // show patient details here
        $patients = $staffAndUser;
       
        ?>
        <!-- <h1>The Patients Records</h1> -->


  <tr>
    <td><?php echo $patients['id'];?></td>
    <td><?php echo $patients['first_name'];?></td>
    <td><?php echo $patients['last_name'];?></td>
    <td><?php echo $patients['email'];?></td>
    <td><?php echo $patients['gender'];?></td>
    <td><?php echo $patients['designation'];?></td>
    <td><?php echo $patients['department'];?></td>
    <td><?php echo $patients['createdTime'];?></td>
    <td><?php echo $patients['lastLogin'];?></td>
    
  </tr>
  

      <?php
      }
    }
    ?>
    </table>
    <?php
    
  }
  
  ?>  
		<br>
    <p><a href="register.php">Add User below</a></p>
    
      
</div>	
<?php // session_destroy();?>
</div>
</div>
<?php include_once('lib/footer.php'); ?>