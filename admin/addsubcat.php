<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">New SubCategory</div>
<?php
if(isset($_POST['submit'])) {
 $title = $_POST['names'];
 if(strlen($title) < 1) {
  echo "<center>Field must be at least 1 characters long: <a href='javascript:history.go(-1)'>Go Back</a></center>";
  die();
 }
 $parent = $_POST['parents'];
 if(get_magic_quotes_gpc()) {
  $title = stripslashes($title);
 }
 $sql = $conn->Prepare('INSERT INTO categori (name, parent, cord) VALUES ('.$conn->qstr($title).','.$conn->qstr($parent).','.$conn->qstr('1').')');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
?>
<script>
window.location.replace("categories.php");
</script>
<?php
} else {
 $id = $_GET['id'];
 $br = $conn->Execute('SELECT * FROM categori WHERE catid = '.$conn->qstr($id).'');
 if(!$br)
  print $conn->ErrorMsg();
 else
  while(!$br->EOF) {
?>
<form method="post" action="addsubcat.php">
Category Name:<br/><input name="names" class="form-control" size="85" /><br />
<input type="hidden" name="parents" value="<?php echo $br->fields['catid']; ?>">
<br />
<input type="submit" class="topicbuton" name="submit" value=" Submit" /> 
</form>
<?php
$br->MoveNext();
  }
}
?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>