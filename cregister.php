<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Company Registration</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
 
  <link rel="stylesheet" type="text/css" href="css/skillix.css">
</head>


<body>
	<div class="container-fluid">
		<div class="row"   style="padding-top: 110px;">
			<div class="col-sm-3">
				
			</div>

			
		<div class="col-sm-6" style="background-color: lightgrey; border-radius: 10px; " >
			<h6 style="color: black; padding-left: 10px; padding-top: 10px;"><i class="fa fa-user-circle-o  fa-2x" aria-hidden="true"><b> 
			Register Here...</b></h6></i>
			<form style=" padding-top: 4vh; " method="POST" action="#" >
		
		 
			<div class="form-group">
		<b><label for="formGroupExampleInput" >Job Category</label></b>
		<input type="text"  name="j_cat" class="form-control  " id="inputbtn"  placeholder="Provide Category of Job" required oninvalid="this.setCustomValidity('Please Enter Category of Job...!!!')" oninput="this.setCustomValidity('')">
		</div>
		 



		<div class="form-group">
		<b><label for="formGroupExampleInput" >Contact Number</label></b>
		<input type="Number"  name="cno" class="form-control  " id="inputbtn"  placeholder="Enter Contact Number" required pattern="[0-9]{10}" minlength="10" maxlength="10" oninvalid="this.setCustomValidity('Please Provide a contact number which has Whatssapp account...!!!')" oninput="this.setCustomValidity('')">
		</div>

		<div class="form-group">
		<b><label for="exampleInputEmail1">Email Address</label></b>
		<input type="email" name="email" class="form-control" id="inputbtn" placeholder="Enter Email" aria-describedby="emailHelp" required  oninvalid="this.setCustomValidity('Please Provide E-Mail ID of your Company...!!!')" oninput="this.setCustomValidity('')">
		</div>

		<div class="form-group ">
	 	<b><label for="inputPassword3" >Password</label></b>
		 <input type="password" class="form-control " placeholder="Enter Password " id="inputPassword3epwd"  name="pwd"  required  style="border-radius: 10px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="border-radius: 10px;" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="this.setCustomValidity('Please Enter Password in Correct Foramt...!!!')" oninput="this.setCustomValidity('')">
		</div>

		
			

		<div class="form-group ">
		   <b><label class="label1">About Your Company :</label></b><br></br>
            <textarea  id="company_info" class="input" name="company_info" rows="4" cols="50"  required style="border-radius: 10px;" placeholder="Write About your Company Here..." oninvalid="this.setCustomValidity('Please share some information about your company like techonology used etc etc...!!!')" oninput="this.setCustomValidity('')"></textarea>
        </div> 
            <div class="form-group ">
           <b> <label class="label1">Upload Your Logo of your Comapany :</label></b><br><br>
                <input type="file" class="file"  name="logo" required oninvalid="this.setCustomValidity('Please upload a logo of your Company for better communications with other...!!!')" oninput="this.setCustomValidity('')"><br><br>
              </div>
				
		<button type="submit"  name="submit" class="btn btn-danger" style="padding-left: 60px; padding-right: 60px;  margin-bottom:20px;  border-radius: 30px;">Submit</button>
		<a href="register.php"  class="btn btn-danger" style="padding-left: 60px; padding-right: 60px;  margin-bottom:20px;  border-radius: 30px;">Back</button></a>
<?php

// including database connectivity file
include "db.php";


if (isset($_POST['submit'])) 
{
	
    $Company_Name = $_POST['username'];//Name
    $Job_Category = $_POST['j_cat'];//Category
    $Number = $_POST['cno'];//Number
    $Email = $_POST['email'];//Email
    $Password = $_POST['pwd'];//Password
    $c_pwd = $_POST['c_pwd'];
    $About_us = $_POST['company_info'];//About us
    $Logo = $_POST['logo'];//Logo

    // logic of unique email id
    if ($dbconnect -> connect_errno) 
    {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }

    $get_user = mysqli_query($dbconnect,"SELECT * FROM company_registration where 
    		Email = '$Email'");

 	if(mysqli_num_rows($get_user)>0)
 	{
 	?>
	 	<script type="text/javascript">
	 		alert("E-Mail is Already Submitted, Please Try Another E-Maill...!!!");//Alert for Already used E-mail
	 	</script>
 	<?php
 	}

 	// Password Verification
    else if ($Password != $c_pwd) //Checks for Password Authentication
    {
        echo "<script> alert('Password is not matched Correctly to Confirm Password Field, Please Try Agin...!!!'); </script>";
    }
 	else
 	{
 		$sql= "insert into company_registration(Company_name, Job_Category, Number, Email, Password, About_us, Logo) values('$Company_Name', '$Job_Category', '$Number' , '$Email' , '$Password' , '$About_us' , '$Logo')";

        if ($dbconnect->query($sql) === TRUE) 
        {
            echo "<p style='color:green;padding-left:10px;font-family: Consolas;font-weight:bold;font-size:20px;'> Registration Successfully Completed. <a href='login.php'> Click Here to Login </a> </p>";
        } 
      
}	
?>
</form>

		</div>
		</div>	
	</div>

</body>
</html>

<?php include 'footer.php'; ?>//Including footer file
 
