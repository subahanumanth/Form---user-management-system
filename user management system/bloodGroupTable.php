<?php
include("mysqlConnect.php");
?>

<?php

if(isset($_POST['submit'])) {
    $bg = $_POST['bg'];
    $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
    $insert = "insert into blood_group (blood_group) values('$bg')";
    mysqli_query($connection, $insert);
    mysqli_close($connection);
}

$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select *from blood_group";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
    echo "<html><table border='1'  style='border-collapse: collapse; margin-left:360px; width:30%;' id='customers'>";
    while($rows = mysqli_fetch_assoc($row)) {
        ?>
        <tr><td><?php echo $rows['blood_group']; ?></td>
            <td><a href="bloodGroupDelete.php?id=<?php echo $rows['id']; ?>">Delete</td></tr>
    <?php
    }
    echo "</html></table>";
}
mysqli_close($connection);
?>
<html>
<style>
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
<form method="post">
<button name="add">Add Blood Group</button>
</form>
</html>
<?php
if(isset($_POST['add'])) {
    ?>
    <html><form method="post"><input type="text" name="bg" style="margin-left:465px;" placeholder="Blood Group"><br><br><input type="submit" name="submit" id="submit"></form></html>
<?php
}
?>
