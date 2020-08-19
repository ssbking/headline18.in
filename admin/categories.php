<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<script>
function goto(site) {
var msg = confirm("Deleting this category will also delete all sections and articles in this category. Are you sure you want to continue?")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">Categories</div>
<?php
if(isset($_GET['ref'])) {
 $id = $_GET['id'];
 $cr = $conn->Execute('SELECT * FROM newser WHERE idblog = '.$conn->qstr($id).'');
 if(!$cr)
  print $conn->ErrorMsg();
 else
  while(!$cr->EOF) {
   $univer[] = $cr->fields['univer'];
   $cr->MoveNext();
  }
 @$ids = join(',',@$univer);
 if(@$univer == false) {
  $sql = $conn->Prepare('DELETE FROM reviews WHERE (comrev IN (null))');
 } else {
  $sql = $conn->Prepare('DELETE FROM reviews WHERE (comrev IN ('.$ids.'))');
 }
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql2 = $conn->Prepare('DELETE FROM categori WHERE catid = '.$conn->qstr($id).' or  parent = '.$conn->qstr($id).'');
 if($conn->Execute($sql2) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql3 = $conn->Prepare('DELETE FROM newser WHERE idblog = '.$conn->qstr($id).'');
 if($conn->Execute($sql3) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
}
$br = $conn->Execute('SELECT * FROM categori ORDER BY parent ASC');
if(!$br)
 print $conn->ErrorMsg();
else
 while(!$br->EOF) {
  if($br->fields['cord'] == 0) {
   echo "<div class='ten'><div class='two column'>".$br->fields['name']."</div><div class='two column'><a href=\"javascript:goto('categories.php?id=".$br->fields["catid"]."&ref=1')\">Delete</a></div><div class='two column'><a href='setcat.php?id=".$br->fields['catid'].
    "'>Edit</a></div><div class='three column'><a href='addsubcat.php?id=".$br->fields['catid']."'>Add Subcategory</a></div></div>";
  } else {
   echo "<div class='ten'><div class='two column'>- - - ".$br->fields['name']."</div><div class='two column'><a href=\"javascript:goto('categories.php?id=".$br->fields["catid"]."&ref=1')\">Delete</a></div><div class='two column'><a href='setcat.php?id=".$br->fields['catid']."'>Edit</a></div></div>";
  }
  $br->MoveNext();
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