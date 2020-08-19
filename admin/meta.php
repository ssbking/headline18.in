<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Meta Description & Keywords</div>
<?php
if(isset($_POST['submit'])) {
 $ccmdesc = $_POST['ccmdesc'];
 $cckwords = $_POST['cckwords'];
 if(get_magic_quotes_gpc()) {
  $ccmdesc = stripslashes($ccmdesc);
  $cckwords = stripslashes($cckwords);
 }
 $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($ccmdesc).' WHERE optionid = '.$conn->qstr("2").'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($cckwords).' WHERE optionid = '.$conn->qstr("3").'');
 if($conn->Execute($sql2) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("meta.php");
</script>
<?php } else { ?>
<form method="post" action="meta.php">
Meta Description<br />
<textarea name="ccmdesc"><?php echo $metadesc; ?></textarea><br /><br />
Meta Keywords<br />
<textarea name="cckwords"><?php echo $keywords; ?></textarea><br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php } ?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>