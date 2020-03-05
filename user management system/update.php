<?php
$id = $_GET['id'];
$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select *from detail";
$extractEmail= "select email_id from email where id='$id'";
$extractmobile = "select mobile_no from mobile where user_id='$id'"; 
$extractAreaOfIntrest = "select area_of_intrest from area_of_intrest where user_id='$id'";
$row = mysqli_query($connection, $query);
$rowEmail = mysqli_query($connection, $extractEmail);
if(mysqli_num_rows($row)) {
    while($rows = mysqli_fetch_assoc($query)) {
        $firstName = $rows['first_name'];
         $lastName = $rows['last_name'];
          $dateOfBirth = $rows['date_of_birth '];
           $detailsOfGraduation = $rows['details_of_graduation'];
            $bloodGroup = $rows['blood_group'];
          $gender = $rows['gender'];
         $profilePicture = $rows['profile_picture'];
    }
}
