<?php
$id = $_GET['id'];
$email = [];
$mobile = [];
$areaOfIntrest3 = [];
$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
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

mysqli_close($connection);
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
 
</head>  
<body>  
<form name="add_name" id="add_name" method="post" action = "updated.php">
First Name : <input type="text" name="firstName" value="<?php echo $firstName; ?>"><?php echo $error['firstError']; ?><br><br>
Last Name : <input type="text" name="lastName" value="<?php echo $lastName; ?>"><?php echo $error['lastError']; ?><br><br>
Email :  <input type="text" name="email" id="email" class="form-control" style="width:400px;" value="<?php echo $email1; ?>"> <?php echo $error['emailError']; ?> <br><br>
Mobile No : <input type="text" name="mobile" id="mobile" class="form-control" style="width:400px;" value="<?php echo $mobile1;  ?>"><?php echo $error['mobileError']; ?><br><br>
Area Of Intrest :<?php include("areaOfIntrest2.php"); ?><?php echo $error['areaOfIntrestError']; ?><br><br>
Date Of Birth : <input type="date" id="date" name="date" value="<?php echo $dateOfBirth; ?>"><?php echo $error['dateError']; ?><br><br>
Details Of Graduation : <?php include("detailsOfGraduation2.php"); ?><?php echo $error['detailsOfGraduationError']; ?><br><br>
Blood Group : 
<?php include('bloodGroup2.php'); ?><?php echo $error['bloodGroupError']; ?><br><br>
Gender : 

<input type="radio" id="gender" name="gender" value="male" <?php if($gender == "male") {echo "checked";} ?>>Male
<input type="radio" id="gender" name="gender" value="female" <?php if($gender == "female") {echo "checked";} ?>>Female<?php echo $error['genderError']; ?><br><br>
Profile Picture : 
<input type="file" name="profile"><br><br>
Password : <input type="password" name="password" value="<?php echo $password; ?>"><br><br>
<button value="<?php echo $id; ?>" name="button">Submit</button>
</form>  
</body>
</html> 

<script> 
 

 $(document).ready(function(){  
      var i=1;   
           $('#addEmail').click(function(){  
           i++;  
           $('#email').append('<tr id="rowEmail'+i+'"><td><input type="text" id="email" name="email[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="removeEmail" id="'+i+'" class="btn btn-danger removeEmail">X</button></td></tr>');  
      });  
      $(document).on('click', '.removeEmail', function(){  
           var button_id = $(this).attr("id");   
           $('#rowEmail'+button_id+'').remove();  
      });  
       
 });  

///////////////////////////////////////////////////////////////


 $(document).ready(function(){  
      var i=1;   
           $('#addMobile').click(function(){  
           i++;  
           $('#mobileNo').append('<tr id="rowMobile'+i+'"><td><input type="text" name="mobileNo[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="removeMobile" id="'+i+'" class="btn btn-danger removeMobile">X</button></td></tr>');  
      });  
      $(document).on('click', '.removeMobile', function(){  
           var button_id = $(this).attr("id");   
           $('#rowMobile'+button_id+'').remove();  
      });  


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


