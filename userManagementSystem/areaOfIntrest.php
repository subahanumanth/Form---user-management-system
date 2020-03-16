<?php

$connection = mysql::mysqlConnect();
$query = "select *from area_of_intrest";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
             echo "<html><select id='areaOfIntrest' name='areaOfIntrest[]' multiple><option value=''>select</option>";
    while($rows = mysqli_fetch_assoc($row)) {

         ?>
        <option value="<?php echo $rows['area_of_intrest']; ?>" <?php if(in_array($rows['area_of_intrest'],$_POST['areaOfIntrest'])) {echo "selected";} ?>><?php echo $rows['area_of_intrest']; ?></option>
    <?php

    }
     echo "</select></html>";
}
mysql::mysqlClose($connection);
?>





