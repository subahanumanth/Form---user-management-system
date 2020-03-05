<html>
<table id="mobileNo">
<tr>  
<td><input type="text" id="mobileNo" name="mobileNo[]" placeholder="Enter your Name" class="form-control name_list" value="<?php  if(isset($_POST['submit'])) { echo $_POST['mobileNo'][0]; } ?>"/></td>  
<td><button type="button" name="addMobile" id="addMobile" class="btn btn-success">Add More</button></td>  
</tr>  
</table>
</html>
