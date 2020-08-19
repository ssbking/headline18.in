<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
include ('../classes/class.GenericEasyPagination.php');
?>
<script>
function goto(site) {
var msg = confirm("Are you sure you want to delete this entry? This action cannot be undone!")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">Manage news items</div>
<?php
if(isset($_GET['ref'])) {
 $id = $_GET['id'];
 $comy = $_GET['comy'];
 $sql = $conn->Prepare('DELETE FROM newser WHERE newsid = '.$conn->qstr($id).'');
 if($conn->Execute($sql) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 $sql3 = $conn->Prepare('DELETE FROM reviews WHERE comrev = '.$conn->qstr($comy).'');
 if($conn->Execute($sql3) === false) {
  print '<div class="error">'.$conn->ErrorMsg().'</div>';
 }
 if(isset($_GET['file'])) {
  $file = $_GET['file'];
  $file1 = $_GET['file'];
  $file2 = $_GET['file'];
  $file = "../uploads/".$file;
  $file1 = "../maxthumb/".$file1;
  $file2 = "../minthumb/".$file2;
  @unlink($file);
  @unlink($file1);
  @unlink($file2);
 }
 echo "<div class ='info'>Changes Saved Successfully</div>";
}
if(@$_GET["page"] != ""):
 $page = @$_GET["page"];
else:
 $page = 1;
endif;
 define('RECORDS_BY_PAGE',32);
 define('CURRENT_PAGE',$page);
 $strSQL = "SELECT * FROM newser ORDER BY newsid DESC";
 $conn->SetFetchMode(ADODB_FETCH_ASSOC);
 $rs = $conn->PageExecute($strSQL,RECORDS_BY_PAGE,CURRENT_PAGE);
 if(!$rs->EOF) {
  $recordsFound = $rs->_maxRecordCount;
  while(!$rs->EOF) {
   if($rs->fields["main"] == 2) {
    echo $rs->fields["title"]." - [Featured]<br /><a href=\"javascript:goto('menage.php?id=".$rs->fields["newsid"]."&file=".$rs->fields["image"]."&comy=".$rs->fields["univer"]."&idblog=".$rs->fields["idblog"]."&ref=1')\"><img id='corect' src='style/images/delete.png' border='0'>Delete</a>";
    echo "&nbsp;&nbsp;<a href='$sitepath/editadmin.php?id=".$rs->fields["newsid"]."'><img id='corect' src='style/images/edit.png' border='0'>Edit Article</a><br /><br />";
   } else {
    echo $rs->fields["title"]."<br /><a href=\"javascript:goto('menage.php?id=".$rs->fields["newsid"]."&file=".$rs->fields["image"]."&comy=".$rs->fields["univer"]."&idblog=".$rs->fields["idblog"]."&ref=1')\"><img id='corect' src='style/images/delete.png' border='0'>Delete</a>";
    echo "&nbsp;&nbsp;<a href='$sitepath/editadmin.php?id=".$rs->fields["newsid"]."'><img id='corect' src='style/images/edit.png' border='0'>Edit Article</a><br /><br />";
   }
   $rs->moveNext();
  }
  $GenericEasyPagination = new GenericEasyPagination(CURRENT_PAGE,RECORDS_BY_PAGE,"eng");
  $GenericEasyPagination->setTotalRecords($recordsFound);
  echo "<br />";
  echo "<strong>Records found: </strong>".$recordsFound;
  echo "<br />Records ";
  echo $GenericEasyPagination->getListCurrentRecords();
  echo "<br />";
  echo $GenericEasyPagination->getCurrentPages();
  echo "<br />";
 }
 $conn->Close();
?>
</div>
<?php
include ('footer.php');
/**************************************
* Revision: v.beta
***************************************/
?>