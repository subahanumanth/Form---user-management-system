<?php
$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select *from blood_group";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
             echo "<html><select id='bloodGroup' name='bloodGroup'><option value=''>select</option>";
    while($rows = mysqli_fetch_assoc($row)) {

         ?>
        <option value="<?php echo $rows['blood_group']; ?>" <?php if(isset($_POST['bloodGroup']) and $_POST['bloodGroup'] == $rows['blood_group']) {echo "selected";} ?>><?php echo $rows['blood_group']; ?></option>
    <?php

    }
     echo "</select></html>";
}
mysqli_close($connection);
?>





