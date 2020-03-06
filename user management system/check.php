
<?php
include("mysqlConnect.php");

$rights=5;
if(isset($_POST['submit'])){
$name = $_POST['name'];
$password = $_POST['password'];

include("session.php"); 
 
 $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
 $query = "select * from detail where first_name='$name' and password='$password'";
 $row = mysqli_query($connection, $query);
 while($rows = mysqli_fetch_assoc($row)) {
     $rights = $rows['rights'];
     $id = $rows['id'];
 }
mysqli_close($connection);
}
?>

<html>
<h1>Welcome <?php echo $_SESSION['name']; ?></h1>
<div class="topnav">

  <a href="login.php" id="logout">log out</a>
  
</div><br>
</html>

<?php
if($rights == 1) {
    header("Location:adminList.php?id=$id");
} elseif($rights == 0) {
    $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
    $insert = "select *from detail where id='$id'";
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
            <td><a href="adminUpdate.php?id=<?php echo $id ?>">Update</a></td></tr>
            <?php
        }
        echo "</table></html>";

}
} else {
    echo "user not exist";
}
?>

<html>
<style>
#logout {
  margin-left : 1200px;
}

#submit {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  margin-left: 423px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  margin-left: 423px;
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
</style>


</html>
