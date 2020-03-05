<html>
<form method="post">
<button name="add">Add</button>
</form>
</html>
<?php
if(isset($_POST['add'])) {
    ?>
    <html><form method="post"><input type="text" name="bg"><input type="submit" name="submit"></form></html>
<?php
}
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
    echo "<html><table border='1'  style='border-collapse: collapse;'>";
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
