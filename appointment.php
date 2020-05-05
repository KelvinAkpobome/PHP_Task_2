<?php include_once("lib/header.php")?>


	<form name= "appointment" action="processappointment.php" method="POST">
	  		<h2>Appointment Form</h2>
                   <p>A<strong> few</strong> fields are required</p>
         <p>
        <?php
            if(isset($_SESSION['error']) &&  !empty ($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
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
            <label>Appointment Date</label><br />
            <input  
            <?php              
                if(isset($_SESSION['appointmentdate'])){
                    echo "value=" . $_SESSION['appointmentdate'];                                                             
                }                
            ?>
            type="date" name="appointmentdate" placeholder="Appointment Date" />
        </p>

        <p>
            <label>Appointment Time</label><br />
            <input  
            <?php              
                if(isset($_SESSION['appointmenttime'])){
                    echo "value=" . $_SESSION['appointmenttime'];                                                             
                }                
            ?>
            type="time" name="appointmenttime" placeholder="Appointment Time" />
        </p>


        <p>
            <label>Age</label><br />
            <input
            <?php              
                if(isset($_SESSION['age'])){
                    echo "value=" . $_SESSION['age'];                                                             
                }                
            ?>
             type="number" name="age" placeholder="Age"  />
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
            <label>Department</label><br />
                <select name="department" >
                    <option value=""><strong>Select One</strong></option>
                        <option <?php if(isset($_SESSION['department']) && $_SESSION['department'] == 'Obstetrics'){echo "selected";} ?>>Obstetric</option>
                        <option 
                            <?php              
                                if(isset($_SESSION['department']) && $_SESSION['department'] == 'Maternity'){
                                echo "selected";                                                           
                                }                
                            ?>
                >Maternity</option>
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Pediatrics'){
                        echo "selected";                                                           
                    }                
                ?>
                >Pediatrics</option>
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Gynecology'){
                        echo "selected";                                                           
                    }                
                ?>
                >Gynecology</option>
            </select>
        </p>
        <p>Brief Statement<br> <em>Optional</em><br> <textarea name="initcomment" placeholder="50 words or less"> </textarea> </p> 
        <p>
            <button type="submit">Submit</button>
        </p>
    </form>

<?php include_once("lib/footer.php")?>