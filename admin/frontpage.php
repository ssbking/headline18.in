<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Front Page</div>
<?php
if(isset($_POST['submit'])) {
 $sliders = $_POST['sliders'];
 $efslides = $_POST['efslides'];
 if(get_magic_quotes_gpc()) {
  $sliders = stripslashes($sliders);
  $efslides = stripslashes($efslides);
 }
 $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sliders).' WHERE optionid = '.$conn->qstr("35").'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($efslides).' WHERE optionid = '.$conn->qstr("36").'');
 if($conn->Execute($sql2) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("frontpage.php");
</script>
<?php } else { ?>
<form method="post" action="frontpage.php">
Image Slider On/Off<br />
<?php if($slider == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="sliders">
<option value='1'>- Off</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------ On</option>
</select>
<?php } ?>
<?php if($slider == 2) { ?>
<select style="background:#EEFFE3;" class="form-control" name="sliders">
<option value='2'>-- On</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------ On</option>
</select>
<?php } ?>
<br /><br />
Slider Effect</font><br />
<?php if($efslide == "horizontal") { ?>
<select style="background:#EEFFE3;" class="form-control" name="efslides">
<option value='horizontal'>- Horizontal</option>
<option style="background:#ffffff;" value='horizontal'>Horizontal</option>
<option style="background:#ffffff;" value='fade'>Fade</option>
</select>
<?php } ?>
<?php if($efslide == "fade") { ?>
<select style="background:#EEFFE3;" class="form-control" name="efslides">
<option value='fade'>- Fade</option>
<option style="background:#ffffff;" value='horizontal'>Horizontal</option>
<option style="background:#ffffff;" value='fade'>Fade</option>
</select>
<?php } ?>
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