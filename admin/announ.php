<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Announcement</div>
<?php
if(isset($_POST['submit'])) {
 $newson = $_POST['newson'];
 $newstext = $_POST['newstext'];
 if(get_magic_quotes_gpc()) {
  $newstext = stripslashes($newstext);
 }
 $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($newson).' WHERE optionid = '.$conn->qstr("16").'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($newstext).' WHERE optionid = '.$conn->qstr("17").'');
 if($conn->Execute($sql2) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("announ.php");
</script>
<?php } else { ?>
<form method="post" action="announ.php">
Announcement Off/On<br />
<?php if($newson == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="newson">
<option value='1'>- Announcements Off</option>
<option style="background:#ffffff;" value='1'>---- Announcements Off</option>
<option style="background:#ffffff;" value='2'>------Announcements On</option>
</select>
<?php } ?>
<?php if($newson == 2) { ?>
<select style="background:#EEFFE3;" class="form-control" name="newson">
<option value='2'>-- Announcements On</option>
<option style="background:#ffffff;" value='1'>---- Announcements Off</option>
<option style="background:#ffffff;" value='2'>------ Announcements On</option>
</select>
<?php } ?>
<br /><br />Announcement<br />
<textarea name="newstext"><?php echo $newstext; ?></textarea><br /><br />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php } ?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>