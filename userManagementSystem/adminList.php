
<html><h1><b>Welcome Admin</b></h1></html>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}


#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

#logout {
  margin-left:490px;
}

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="/bloodGroup/bloodGroupTable.php">Manage Blood Group</a>
  <a href="/areaOfIntrest/areaOfIntrestTable.php">Manage Area Of Intrest</a>
  <a href="/detailsOfGraduation/detailsOfGraduationTable.php">Manage Details Of Graduation</a>
  <a href="login.php" id="logout">Log Out</a>
</div><br>

</body>
</html>



<?php
$id =  $_GET['id'];
include("mysqlConnect.php");
$connection = mysql::mysqlConnect();
$insert = "select *from detail where id!=$id";
$row = mysqli_query($connection, $insert);
if(mysqli_num_rows($row) > 0) {
    echo "<html><table border='1'  style='border-collapse: collapse;  width:100%;' id='customers'>";
    while($rows = mysqli_fetch_assoc($row)) {
    $id = $rows['id'];
    ?>
      <tr><td><?php echo $rows['first_name'] ?></td><td><?php echo $rows['last_name'] ?></td><td><?php echo $rows['date_of_birth'] ?></td><td><?php echo $rows['details_of_graduation'] ?></td><td><?php echo $rows['blood_group'] ?></td><td><?php echo $rows['gender'] ?></td><td><?php echo $rows['profile_picture'] ?></td>
    <?php
        $extractQuery= "select email_id from email where user_id=$id";
        $d = mysqli_query($connection, $extractQuery);
            $q=[];
            while($a = mysqli_fetch_assoc($d)) {
            ?>
               <?php array_push($q,$a['email_id']); ?>
        <?php
            }
            $y= implode(",",$q);
        ?>
            <td><?php echo $y ?></td>
        <?php
            $extractQuery1 = "select mobile_no from mobile where user_id=$id";
        $d1 = mysqli_query($connection, $extractQuery1);
            $q1=[];
            while($a1 = mysqli_fetch_assoc($d1)) {
            ?>
               <?php array_push($q1,$a1['mobile_no']); ?>
        <?php
            }
            $y1= implode(",",$q1);
        ?>
            <td><?php echo $y1 ?></td>
         <?php
            $extractQuery2 = "select area_of_intrest from area_of_intrest1 where user_id=$id";
        $d2 = mysqli_query($connection, $extractQuery2);
            $q2=[];
            while($a2 = mysqli_fetch_assoc($d2)) {
            ?>
               <?php array_push($q2,$a2['area_of_intrest']); ?>
        <?php
            }
            $y2= implode(",",$q2);
        ?>
            <td><?php echo $y2 ?></td>
            <td><a href="adminDelete.php?id=<?php echo $id ?>">Delete</a></td>
            <td><a href="adminUpdate.php?id=<?php echo $id ?>">Update</a></td></tr>
            <?php
        }
        echo "</table></html>";
        
}
mysql::mysqlClose($connection);
?>

