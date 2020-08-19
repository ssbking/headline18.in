<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Top Menu</div>
<?php
if(isset($_POST['submit'])) {
 $plinks = $_POST['plinks'];
 if(get_magic_quotes_gpc()) {
  $plinks = stripslashes($plinks);
 }
 $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($plinks).' WHERE optionid = '.$conn->qstr("11").'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("menu.php");
</script>
<?php } else { ?>
Links in top menu:
<form method="post" action="menu.php">
<input class="form-control" type="text" name="plinks" value="<?php echo $toplinks; ?>" size="35" />
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