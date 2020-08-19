<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Newsletter</div>
<script src="<?php echo $sitepath; ?>/scripts/ckeditor/ckeditor.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/ckeditor/config.js"></script>
<?php
if(isset($_POST['submit'])) {
 $longdesc = $_POST['longdesc'];
 $title = $_POST['title'];
 if(get_magic_quotes_gpc()) {
  $longdesc = stripslashes($longdesc);
  $title = stripslashes($title);
 }
 if(strlen($longdesc) < 3) {
  echo "Field must be at least 3 characters long:
<a href='javascript:history.go(-1)'>Go Back</a></div></div></div>";
  include ('footer.php');
  die();
 }
 if(strlen($title) < 3) {
  echo "Field must be at least 3 characters long:
<a href='javascript:history.go(-1)'>Go Back</a></div></div></div>";
  include ('footer.php');
  die();
 }
 $br = $conn->Execute("SELECT * FROM users ORDER by usid desc");
 if(!$br)
  print $conn->ErrorMsg();
 else
  while(!$br->EOF) {
?>
Username: <?php echo $br->fields['username'] ?> - 
Email: <?php echo $br->fields['email'] ?><br />
<?php
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
$headers .= "From: $sitemail"."\r\n";
$juser = $br->fields['email'];
mail($juser,$title,$longdesc,$headers);
$br->MoveNext();
}
echo "<div class ='info'>&nbsp;Successfully.</div>"; ?>
<?php } else { ?>
<br />
<form method="post" action="newsletter.php" method="post">
Subject:<br /> <input class="form-control" name="title" maxlength="255" />
<br /><br />
Description:<br /><textarea name="longdesc"></textarea>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Send" />
<script>
CKEDITOR.replace( 'longdesc' );
</script>
</form>
</div>
<?php } ?>
</div>
<?php
include ('footer.php');
/**************************************
* Revision: v.beta
***************************************/
?>