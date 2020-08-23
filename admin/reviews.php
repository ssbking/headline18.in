<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
include('../classes/class.GenericEasyPagination.php');
?>
<script>
function goto(site) {
var msg = confirm("Are you sure you want to delete this entry? This action cannot be undone!")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">Comments</div>
<?php
if (isset($_GET['ref'])) {
    $comrev = $_GET['comrev'];
    $revid = $_GET['revid'];
    $sql = $conn->Prepare('UPDATE newser SET commno = commno - '.$conn->qstr('1').' WHERE univer = '.$conn->qstr($comrev).'');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql3 = $conn->Prepare('DELETE FROM reviews WHERE revid = '.$conn->qstr($revid).'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>";
}
if (@$_GET["page"] != ""):
 $page = @$_GET["page"];
else:
 $page = 1;
endif;
 define('RECORDS_BY_PAGE', 32);
 define('CURRENT_PAGE', $page);
 $strSQL = "SELECT * FROM reviews ORDER BY revid DESC";
 $conn->SetFetchMode(ADODB_FETCH_ASSOC);
 $rs = $conn->PageExecute($strSQL, RECORDS_BY_PAGE, CURRENT_PAGE);
 if (!$rs->EOF) {
     $recordsFound = $rs->_maxRecordCount;
     while (!$rs->EOF) {
         echo $rs->fields['comment'] . "&nbsp;&nbsp;<a href=\"javascript:goto('reviews.php?revid=".$rs->fields['revid']."&comrev=".$rs->fields['comrev']."&ref=1')\"><br />Delete Comment</a><br /><br />";
         $rs->moveNext();
     }
     $GenericEasyPagination = new GenericEasyPagination(CURRENT_PAGE, RECORDS_BY_PAGE, "eng");
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
include('footer.php');
/**************************************
* Revision: v.beta
***************************************/
?>
