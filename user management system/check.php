<?php
 $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
 $query = "select *from detail";
 $row = mysqli_query($connection, $query);
 $a=0;
 if(mysqli_num_rows($row)>0) {
     while($rows = mysqli_fetch_assoc($row)) {
         if($_POST['name'] == $rows['first_name'] and $_POST['password'] == $rows['password']) {
              $a = 1;
              $id = $rows['id'];
         }
     }
 }
mysqli_close($connection);
?>
<?php
if($a==1) {
    $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
    $insert = "select *from detail where id='$id'";
    $row = mysqli_query($connection, $insert);
    if(mysqli_num_rows($row) > 0) {
        echo "<html><table border='1'  style='border-collapse: collapse;'>";
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

} else {
    echo "user name not exist";
}
}
mysqli_close($connection);
?>
