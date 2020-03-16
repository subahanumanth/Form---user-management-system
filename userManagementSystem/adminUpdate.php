<?php
include("mysqlConnect.php");
$id = $_GET['id'];
$email = [];
$mobile = [];
$areaOfIntrest3 = [];
$connection = mysql::mysqlConnect();
$query = "select * from detail where id='$id'";
$queryArea = "select * from area_of_intrest1 where user_id='$id'";
$queryEmail = "select * from email where user_id='$id'";
$queryMobile = "select * from mobile where user_id='$id'";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row)) {
    while($rows = mysqli_fetch_assoc($row)) {
        $firstName = $rows['first_name'];
        $lastName = $rows['last_name'];
        $dateOfBirth = $rows['date_of_birth'];
        $detailsOfGraduation = $rows['details_of_graduation'];
        $bloodGroup = $rows['blood_group'];
        $gender  = $rows['gender'];
        $password = $rows['password'];
    }
}

$row1 = mysqli_query($connection, $queryArea);
if(mysqli_num_rows($row1)) {
    while($rows1 = mysqli_fetch_assoc($row1)) {
        array_push($areaOfIntrest3,$rows1['area_of_intrest']);
    }
}

$row2 = mysqli_query($connection, $queryEmail);
if(mysqli_num_rows($row2)) {
    while($rows2 = mysqli_fetch_assoc($row2)) {
        array_push($email,$rows2['email_id']);
    }
}
$email1 = implode(',',$email);

$row3 = mysqli_query($connection, $queryMobile);
if(mysqli_num_rows($row3)) {
    while($rows3 = mysqli_fetch_assoc($row3)) {
        array_push($mobile,$rows3['mobile_no']);
    }
}
$mobile1 = implode(',',$mobile);

mysql::mysqlClose($connection);
?>

<html>  
<head>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script type="text/javascript" src="form.js"></script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
 

<style>
.border {
    border-style:solid;
    border-color:#00FFFF;
    margin: 25px 50px 0px 100px;
    padding : 0px 0px 0px 0px;

}

.heading {
    background-color : #00FFFF;
    height : 60px;

}

.form {
    padding-top : 10px;
}
 
.large {
    font-size:20px;
}
</style>

</head>  
<body>  
<div class="border">
<div class="heading">
<center><h1 class="form">Registration Form</h1></center>
</div><br>

<form name="add_name" id="add_name" method="post" action = "updated.php">
<center><span class="large">First Name : </span> &ensp;<input type="text" name="firstName" value="<?php echo $firstName; ?>"><span style="color:red;"><?php echo $error['firstError']; ?></span></center><br><br>
<center><span class="large">Last Name </span>&ensp; Last Name : <input type="text" name="lastName" value="<?php echo $lastName; ?>"><span style="color:red;"><?php echo $error['lastError']; ?></span></center><br><br>
<center><span class="large">Email :   </span>&ensp; <input type="text" name="email" id="email" class="form-control" style="width:400px;" value="<?php echo $email1; ?>"><span style="color:red;"> <?php echo $error['emailError']; ?></span></center> <br><br>
<center><span class="large">Mobile No : </span>&ensp;<input type="text" name="mobile" id="mobile" class="form-control" style="width:400px;" value="<?php echo $mobile1;  ?>"><span style="color:red;"><?php echo $error['mobileError']; ?></span></center><br><br>
<center><span class="large">Area Of Intrest</span> &ensp;<?php include("areaOfIntrest2.php"); ?><span style="color:red;"><?php echo $error['areaOfIntrestError']; ?></span></center><br><br>
<center><span class="large">Date Of Birth </span> &ensp;<input type="date" id="date" name="date" value="<?php echo $dateOfBirth; ?>"><span style="color:red;"><?php echo $error['dateError']; ?></span></center><br><br>
<center><span class="large">Details Of Graduation </span> &ensp; <?php include("detailsOfGraduation2.php"); ?><span style="color:red;"><?php echo $error['detailsOfGraduationError']; ?></span>&ensp;</center><br><br>
<center><span class="large">Blood Group </span>
<?php include('bloodGroup2.php'); ?><?php echo $error['bloodGroupError']; ?></center><br><br>
<center><span class="large">Gender </span> &ensp;

<input type="radio" id="gender" name="gender" value="male" <?php if($gender == "male") {echo "checked";} ?>>Male
<input type="radio" id="gender" name="gender" value="female" <?php if($gender == "female") {echo "checked";} ?>>Female<span style="color:red;"><?php echo $error['genderError']; ?></span></center><br><br>
<center><span class="large">Profile Picture  </span>&ensp;
<input type="file" name="profile"><br><br>
<center><span class="large">Password  </span>&ensp; <input type="password" name="password" value="<?php echo $password; ?>"><br><br>
<button value="<?php echo $id; ?>" name="button">Submit</button>
</form>  
</body>
</html> 

<script> 
 

 $(document).ready(function(){  
       

///////////////////////////////////////////////////////////////


 $(document).ready(function(){  
     
     $('#email').tokenfield({
  autocomplete:{
   source: ['hanu@gmail.com','siva@gmail.com','suba@gmail.com','inbha@gmail.com','ajith@gmail.com'],
  },
  showAutocompleteOnFocus: true
 });
 
$('#mobile').tokenfield({
  autocomplete:{
   source: ['9442131842','8472431842','9311131812','8231221842','8726351826'],
  },
  showAutocompleteOnFocus: true
 });
       
 });


 </script>


