<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id="vforms">
<div id="cconfig">Registration Settings</div>
<?php
if (isset($_POST['submit'])) {
    $spamon = $_POST['spamon'];
    $regmode = $_POST['regmode'];
    if (get_magic_quotes_gpc()) {
        $spamon = stripslashes($spamon);
        $regmode = stripslashes($regmode);
    }
    $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($spamon).' WHERE optionid = '.$conn->qstr("15").'');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($regmode).' WHERE optionid = '.$conn->qstr("14").'');
    if ($conn->Execute($sql2) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("register.php");
</script>
<?php
} else { ?>
<form method="post" action="register.php">
Manually Approve New Members<br />
<?php if ($signupapp == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="spamon">
<option value='1'>- Manually Approve New Members On</option>
<option style="background:#ffffff;" value='1'>---- Manually Approve New Members On</option>
<option style="background:#ffffff;" value='2'>------ Manually Approve New Members Off</option>
</select>
<?php } ?>
<?php if ($signupapp == 2) { ?>
<select style="background:#EEFFE3;" class="form-control" name="spamon">
<option value='2'>-- Manually Approve New Members Off</option>
<option style="background:#ffffff;" value='1'>---- Manually Approve New Members On</option>
<option style="background:#ffffff;" value='2'>------ Manually Approve New Members Off</option>
</select>
<?php } ?>
<br /><br />
Default Registration Role</font><br />
<?php if ($signuprole == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="regmode">
<option value='1'>- Commenter - Can only post comments</option>
<option style="background:#ffffff;" value='1'>---- Commenter - Can only post comments</option>
<option style="background:#ffffff;" value='2'>------ Editor - Can add news and post comments</option>
</select>
<?php } ?>
<?php if ($signuprole == 2) { ?>
<select style="background:#EEFFE3;" class="form-control" name="regmode">
<option value='2'>- Editor - Can add news and post comments</option>
<option style="background:#ffffff;" value='1'>---- Commenter - Can only post comments</option>
<option style="background:#ffffff;" value='2'>------ Editor - Can add news and post comments</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php } ?>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>