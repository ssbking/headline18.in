<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id=vforms>
<div id="cconfig">Admin Notification Off / On</div>
<?php
if (isset($_POST['submit'])) {
    $incitem = $_POST['incitem'];
    if (get_magic_quotes_gpc()) {
        $incitem = stripslashes($incitem);
    }
    $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($incitem).' WHERE optionid = '.$conn->qstr("21").'');
    if ($conn->Execute($sql) === false) {
        print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<?php
} ?>
<form method="post" action="notification.php">
<?php if ($messaging == 1) { ?>
<select class="form-control" style="background:#EEFFE3;" name="incitem">
<option value='1'>-- On</option>
<option style="background:#ffffff;" value='1'>---- On</option>
<option style="background:#ffffff;" value='2'>------ Off</option>
</select>
<?php } ?>
<?php if ($messaging == 2) { ?>
<select class="form-control" style="background:#FFF6C1;" name="incitem">
<option value='2'>-- Off</option>
<option style="background:#ffffff;" value='1'>---- On</option>
<option style="background:#ffffff;" value='2'>------ Off</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>