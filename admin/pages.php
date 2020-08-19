<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<script src="<?php echo $sitepath; ?>/scripts/ckeditor/ckeditor.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/ckeditor/config.js"></script>
<div id="vforms">
<div id="cconfig">Pages</div>
<?php
if(isset($_POST['submit'])) {
 $ccaboutus = htmlspecialchars($_POST['aboutus']);
 $ccprivacy = htmlspecialchars($_POST['privacy']);
 $cctherms = htmlspecialchars($_POST['therms']);
 if(get_magic_quotes_gpc()) {
  $ccaboutus = stripslashes(htmlspecialchars($ccaboutus));
  $ccprivacy = stripslashes(htmlspecialchars($ccprivacy));
  $cctherms = stripslashes(htmlspecialchars($cctherms));
 }
 $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($ccaboutus).' WHERE optionid = '.$conn->qstr("18").'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($ccprivacy).' WHERE optionid = '.$conn->qstr("19").'');
 if($conn->Execute($sql2) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql3 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($cctherms).' WHERE optionid = '.$conn->qstr("20").'');
 if($conn->Execute($sql3) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("pages.php");
</script>
<?php
} else { ?>
<form method="post" action="pages.php">
About Us<br /><textarea name="aboutus"><?php echo $siteabout; ?></textarea>
<script>
CKEDITOR.replace( 'aboutus' );
</script>
<br /><br />
Privacy<br /><textarea name="privacy"><?php echo $siteprivacy; ?></textarea>
<script>
CKEDITOR.replace( 'privacy' );
</script>
<br /><br />
Terms of Use<br /><textarea name="therms"><?php echo $siteterms; ?></textarea>
<script>
CKEDITOR.replace( 'therms' );
</script>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" />
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