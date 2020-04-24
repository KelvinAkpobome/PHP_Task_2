<?php include_once("lib/header.php")?>

<?php if (isset($_SESSION["Loggedin"]) && !empty($_SESSION["Loggedin"])){
    header("Location: dashboard.php");
}
?>

<div>
	<form method="POST" action="processregister.php">
	  		<h1>Register</h1>
                   <p>All <strong>fields</strong> are required</p>
         <p>
        <?php
            if(isset($_SESSION['error']) &&  !empty ($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
        ?>

         </p>          

		<p>
            <label>First Name</label><br />
            <input  
            <?php              
                if(isset($_SESSION['first_name'])){
                    echo "value=" . $_SESSION['first_name'];                                                             
                }                
            ?>
            type="text" name="first_name" placeholder="First Name" />
        </p>
        <p>
            <label>Last Name</label><br />
            <input
            <?php              
                if(isset($_SESSION['last_name'])){
                    echo "value=" . $_SESSION['last_name'];                                                             
                }                
            ?>
             type="text" name="last_name" placeholder="Last Name"  />
        </p>
        <p>
            <label>Email</label><br />
            <input
            
            <?php              
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];                                                             
                }                
            ?>

             type="text" name="email" placeholder="Email"  />
        </p>

        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password"  />
        </p>
        <p>
            <label>Gender</label><br />
            <select name="gender" >
                <option value="">Select One</option>
                <option 
                <?php              
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                        echo "selected";                                                           
                    }                
                ?>
                >Female</option>
                <option 
                <?php              
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                        echo "selected";                                                           
                    }                
                ?>
                >Male</option>
            </select>
        </p>
       
        <p>
            <label>Designation</label><br />
            <select name="designation" >
            
                <option value="">Select One</option>
                <option 
                <?php              
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                        echo "selected";                                                           
                    }                
                ?>
                >Medical Team (MT)</option>
                <option 
                <?php              
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                        echo "selected";                                                           
                    }                
                ?>
                >Patient</option>
            </select>
        </p>
        <p>
            <label>Department</label><br />
            <input
            <?php              
                if(isset($_SESSION['department'])){
                    echo "value=" . $_SESSION['department'];                                                             
                }                
            ?>
             type="text" name="department" placeholder="Department"  />
           
        </p>
        <p>
            <button type="submit">Register</button>
        </p>
    </form>
<?php include_once("lib/footer.php")?>