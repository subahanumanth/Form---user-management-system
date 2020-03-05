<?php
$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select *from blood_group";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
             echo "<html><select>";
    while($rows = mysqli_fetch_assoc($row)) {

         ?>
        <option><?php echo $rows['blood_group']; ?></option>
    <?php

    }
     echo "</select></html>";
}
mysqli_close($connection);
?>
