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
var msg = confirm("Are you sure you want to delete this user?\n\rWarning!\n\rRemoving a user will also remove all posts associated with their account.\n\rThis action cannot be undone!!")
if (msg) {window.location.href = site}
else (null)
}
function gotos(sites) {
var msg = confirm("Are you sure you wish to carry out this operation?")
if (msg) {window.location.href = sites}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">User Privileges and Roles</div>
<strong>User Roles</strong><br />
1. <font color="#555555">Commenter. Can only post comments</font><br />
2. <font color="#556E89">Editor. Can add news and post comments</font><br />
<br />
<form name="myforma" action="usersearch.php" method="post">
<input type="text" class="form-control" value="<?php echo @$document ?>" name="document" /><br /><br />
<input type="submit" class="topicbuton" name="submit" value="Search" />
</form>
<?php
if (isset($_GET['ref'])) {
    $id = $_GET['id'];
    $comy = @$_GET['comy'];
    $ref = $_GET['ref'];
    if ($ref == 7) {
        $sql = $conn->Prepare('DELETE FROM users WHERE usid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
        $sql2 = $conn->Prepare('DELETE FROM newser WHERE userid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql2) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
        $sql3 = $conn->Prepare('DELETE FROM reviews WHERE userid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql3) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
        if (isset($_GET['file'])) {
            $file = $_GET['file'];
            $file1 = $_GET['file'];
            $file2 = $_GET['file'];
            $file = "../uploads/".$file;
            $file1 = "../maxthumb/".$file1;
            @unlink($file);
            @unlink($file1);
        }
    }
    if ($ref == 4) {
        $sql2 = $conn->Prepare('UPDATE users SET active= '.$conn->qstr('1').'  WHERE  usid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql2) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
    }
    if ($ref == 1) {
        $sql3 = $conn->Prepare('UPDATE users SET privilege = '.$conn->qstr('1').' WHERE  usid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql3) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
    }
    if ($ref == 2) {
        $sql4 = $conn->Prepare('UPDATE users SET privilege = '.$conn->qstr('2').' WHERE  usid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql4) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
    }
    if ($ref == 3) {
        $sql5 = $conn->Prepare('UPDATE users SET privilege = '.$conn->qstr('3').' WHERE  usid = '.$conn->qstr($id).'');
        if ($conn->Execute($sql5) === false) {
            print '<div class="error">'.$conn->ErrorMsg().'</div>';
        }
    }
    echo "<br /><div class ='info'>Changes Saved Successfully</div>";
}

if (isset($_POST['submit'])) {
    $document = $_POST['document'];

    if (@$_GET["page"] != ""):
 $page = @$_GET["page"]; else:
 $page = 1;
    endif;
    define('RECORDS_BY_PAGE', 40);
    define('CURRENT_PAGE', $page);
    $strSQL = "SELECT * FROM users where username like '%$document%' ORDER BY username";
    $conn->SetFetchMode(ADODB_FETCH_ASSOC);
    $rs = $conn->PageExecute($strSQL, RECORDS_BY_PAGE, CURRENT_PAGE);
    if (!$rs->EOF) {
        $recordsFound = $rs->_maxRecordCount;
        echo "<br />Records Lits:<br />";
        while (!$rs->EOF) {
            if ($rs->fields['active'] == 0) {
                ?>
<?php echo $rs->fields['username'] ?> [<?php echo $rs->fields['email'] ?>]<br />
<a href="usersearch.php?id=<?php echo $rs->fields['usid'] ?>&ref=4">Approve [email not confirmed]</a>
<?php
            } else { ?>
<?php echo $rs->fields['username'] ?> [<?php echo $rs->fields['email'] ?>]<br />
<?php if ($rs->fields['active'] == 3) { ?>
<a href="usersearch.php?id=<?php echo $rs->fields['usid'] ?>&ref=4">Activate (Account Pending Approval)</a>
<?php
}
   }
            echo "<a href=\"javascript:goto('usersearch.php?id=".$rs->fields["usid"]."&file=".$rs->fields["thumbs"]."&ref=7')\">Delete</a>";
            if ($rs->fields['privilege'] == 1) {
                echo "&nbsp;&nbsp;<a href=\"javascript:gotos('usersearch.php?id=".$rs->fields["usid"]."&ref=1')\"><img src='style/images/arrow-green.png' width='10' height='10' border='0'>&nbsp;<font color=\"#555555\">Commenter</font></a>";
                echo "&nbsp;&nbsp;<a href=\"javascript:gotos('usersearch.php?id=".$rs->fields["usid"]."&ref=2')\"><font color=\"#556E89\">Editor</font></a><br /><br />";
            }
            if ($rs->fields['privilege'] == 2) {
                echo "&nbsp;&nbsp;<a href=\"javascript:gotos('usersearch.php?id=".$rs->fields["usid"]."&ref=1')\"><font color=\"#555555\">Commenter</font></a>";
                echo "&nbsp;&nbsp;<a href=\"javascript:gotos('usersearch.php?id=".$rs->fields["usid"]."&ref=2')\"><img src='style/images/arrow-green.png' width='10' height='10' border='0'>&nbsp;<font color=\"#556E89\">Editor</font></a><br /><br />";
            }
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