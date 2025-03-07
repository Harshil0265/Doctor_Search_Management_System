<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("connection.php");





if($_POST){

    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $sqlmain= "select * from webuser where email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            //TODO
            $database->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $database->query("insert into webuser values('$email','p')");

            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$nic','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }



    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

?>


    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">It's Okey, Now Create User Account.</p>
                </td>
            </tr>
			<tr>
		<td class="label-td" colspan="2">
			<form action="" method="POST" >
				<label for="newemail" class="form-label">Email: </label>
		</td>
	</tr>
	<tr>
		<td class="label-td" colspan="2">
			<input type="email" name="newemail" id="newemail" class="input-text" placeholder="Enter Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Please enter a valid email address with no capital letters, containing '@' and '.'" required>
		</td>
	</tr>
			<tr>
    <td class="label-td" colspan="2">
        <label for="tele" class="form-label">Mobile Number: </label>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <div style="display: flex;">
            <select name="countryCode" class="input-text" style="flex: 1;">
                <option value="1">United States (+1)</option>
                <option value="86">China (+86)</option>
				<option value="91" selected> India (+91) </option>
				 <option value="62">Indonesia(+62)</option> 
				 <option value="92">Pakistan (+92)</option>
                 <option value="55">Brazil  (+55)</option>
				  <option value="234">Nigeria (+234)</option>
				   <option value="880">Bangladesh (+880)</option>
				    <option value="7">Russia (+7)</option>
					 <option value="52">Mexico (+52)</option>
					  <option value="81">Japan (+81)</option>
					   <option value="63">Philippines (+63)</option>
					    <option value="84">Vietnam (+84)</option>
						 <option value="20">Egypt (+20)</option>
						  <option value="33">France (+33)</option>
            </select>
            <input type="tel" name="tele" class="input-text" placeholder="1234567890" pattern="[0-9]{10}" title="Please enter only digits" style="flex: 2;" required>
        </div>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <label for="newpassword" class="form-label">Create New Password: </label>
    </td>
</tr>
<tr>
    <td class="label-td" colspan="2">
        <input type="password" name="newpassword" class="input-text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{'\":;?/.,]).{8,}" title="Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long" placeholder="New Password" required oninvalid="this.setCustomValidity('Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long')" oninput="this.setCustomValidity('')" required>
    </td>
</tr>
			<tr>
				<td class="label-td" colspan="2">
					<label for="cpassword" class="form-label">Confirm Password: </label>
				</td>
			</tr>
			<tr>
				<td class="label-td" colspan="2">
					<input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" >
				</td>
			</tr>
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>

                </td>
            </tr>
             
            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>