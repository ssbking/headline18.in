<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id=vforms>
<div id="cconfig">Posting</div>
WYSIWYG Editor Yes / No
<?php
if(isset($_POST['submit'])) {
 $editortrues = $_POST['editortrues'];
 $maxpostings = $_POST['maxpostings'];
 if(get_magic_quotes_gpc()) {
  $editortrues = stripslashes($editortrues);
  $maxpostings = stripslashes($maxpostings);
 }
 $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($editortrues).' WHERE optionid = '.$conn->qstr("23").'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($maxpostings).' WHERE optionid = '.$conn->qstr("22").'');
 if($conn->Execute($sql2) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("posting.php");
</script
<?php } else { ?>
<form method="post" action="posting.php">
<?php if($editortrue == 1) { ?>
<select style="background:#EEFFE3;" class="form-control" name="editortrues">
<option value='1'>-- Yes</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>
<?php } ?>
<?php if($editortrue == 2) { ?>
<select style="background:#FFF6C1;" class="form-control" name="editortrues">
<option value='2'>-- No</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>
<?php  } ?>
<br /><br />
Max Characters<br />
<input class="form-control" type="text" name="maxpostings" value="<?php echo $maxposting; ?>" />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php } ?>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>