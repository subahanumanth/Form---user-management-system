<table id="email">  
<tr>  
<td><input type="text" id="email" name="email[]" class="form-control name_list" placeholder="Email" value="<?php  if(isset($_POST['submit'])) { echo $_POST['email'][0]; } ?>"></td>  
<td><button type="button" name="addEmail" id="addEmail" class="btn btn-success">Add More</button></td>  
</tr>
</table>

