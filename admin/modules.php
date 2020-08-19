<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Modules</div>
<div id="form">
<?php
if(isset($_GET['ref'])) {
 $ref = $_GET['ref'];
 $id = $_GET['id'];
 if($ref == 0) {
  $sql = $conn->Prepare('UPDATE abcoption SET active="0" WHERE  optionid = '.$conn->qstr($id).'');
  if($conn->Execute($sql) === false) {
   print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
  }
  $sql1 = $conn->Prepare('UPDATE modules SET mactive="0" WHERE  idmod = '.$conn->qstr($id).'');
  if($conn->Execute($sql1) === false) {
   print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
  }
  echo "<div class ='info'>Changes Saved Successfully</div>";
 }
 if($ref == 1) {
  $sql2 = $conn->Prepare('UPDATE abcoption SET active="1" WHERE  optionid = '.$conn->qstr($id).'');
  if($conn->Execute($sql2) === false) {
   print '<div class="error">'.$conn->ErrorMsg().'</div>';
  }
  $sql3 = $conn->Prepare('UPDATE modules SET mactive="1" WHERE  idmod = '.$conn->qstr($id).'');
  if($conn->Execute($sql3) === false) {
   print '<div class="error">'.$conn->ErrorMsg().'</div>';
  }
  echo "<div class ='info'>Changes Saved Successfully</div>";
 }
 if($ref == 2) {
  $sql4 = $conn->Prepare('UPDATE abcoption SET active="2" WHERE  optionid = '.$conn->qstr($id).'');
  if($conn->Execute($sql4) === false) {
   print '<div class="error">'.$conn->ErrorMsg().'</div>';
  }
  $sql5 = $conn->Prepare('UPDATE modules SET mactive="1" WHERE  idmod = '.$conn->qstr($id).'');
  if($conn->Execute($sql5) === false) {
   print '<div class="error">'.$conn->ErrorMsg().'</div>';
  }
  echo "<div class ='info'>Changes Saved Successfully</div>";
 }
?>
<script>
window.location.replace("modules.php");
</script>
<?php
}
foreach($arr as $key => $field) {
 foreach($arr as $key => $field) {
  if($field['active'] == 0) {
   echo "<div id='nulled'>";
   echo "<div id='zero'>".$field['nameopt']."</div>";
   echo "<div id='first'><a href='modules.php?id=".$field['optionid']."&ref=1'>Activate [Without menu link]</a></div>";
   echo "<div id='second'><a href='modules.php?id=".$field['optionid']."&ref=2'>Activate [Top menu link]</a></div>";
   echo "</div>";
  }
  if($field['active'] == 1) {
   echo "<div id='nulled'>";
   echo "<div id='first'><a href='".$field['valueopt']."'>".$field['nameopt']."</a></div>";
   echo "<div id='zero'><a href='modules.php?id=".$field['optionid']."&ref=0'>Deactivate</a></div>";
   echo "<div id='second'><a href='modules.php?id=".$field['optionid']."&ref=2'>Activate [Top menu link]</a></div>";
   echo "</div>";
  }
  if($field['active'] == 2) {
   echo "<div id='nulled'>";
   echo "<div id='second'><a href='".$field['valueopt']."'>".$field['nameopt']."</a></div>";
   echo "<div id='first'><a href='modules.php?id=".$field['optionid']."&ref=1'>Activate [Without menu link]</a></div>";
   echo "<div id='zero'><a href='modules.php?id=".$field['optionid']."&ref=0'>Deactivate</a></div>";
   echo "</div>";
  }
 }
}
?>
</div>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>