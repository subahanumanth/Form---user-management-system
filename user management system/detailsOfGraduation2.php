<?php
$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select *from details_of_graduation";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
             echo "<html><select id='detailsOfGraduation' name='detailsOfGraduation'><option value=''>select</option>";
    while($rows = mysqli_fetch_assoc($row)) {

         ?>
        <option value="<?php echo $rows['details_of_graduation']; ?>" <?php if($detailsOfGraduation == $rows['details_of_graduation']) {echo "selected";} ?>><?php echo $rows['details_of_graduation']; ?></option>
    <?php

    }
     echo "</select></html>";
}
mysqli_close($connection);
?>
s
