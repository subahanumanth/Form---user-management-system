<html>
<form method="post">
<button name="add">Add</button>
</form>
</html>
<?php
if(isset($_POST['add'])) {
    ?>
    <html><form method="post"><input type="text" name="detailsOfGraduation"><input type="submit" name="submit"></form></html>
<?php
}
?>
<?php

if(isset($_POST['submit'])) {
    $bg = $_POST['detailsOfGraduation'];
    $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
    $insert = "insert into details_of_graduation (details_of_graduation) values('$bg')";
    mysqli_query($connection, $insert);
    mysqli_close($connection);
}


$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select *from details_of_graduation ";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
    echo "<html><table border='1'  style='border-collapse: collapse;'>";
    while($rows = mysqli_fetch_assoc($row)) {
        ?>
        <tr><td><?php echo $rows['details_of_graduation']; ?></td>
            <td><a href="detailsOfGraduationDelete.php?id=<?php echo $rows['id']; ?>">Delete</td></tr>
    <?php
    }
    echo "</html></table>";
}
mysqli_close($connection);
?>
