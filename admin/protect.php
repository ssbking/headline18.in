<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id=vforms>
<div id="cconfig">Configuration</div>
<?php if (isset($_POST['submit'])) {
    $cablock = $_POST['captcha'];
    $sql3 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($cablock).' WHERE optionid = '.$conn->qstr("31").'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("protect.php");
</script>
<?php
} else { ?>
<form method="post" action="protect.php">
Spam protection helps prevent automated abuse of your site (such as comment spam or bogus registrations) by using a CAPTCHA to ensure that only humans perform certain actions.
<br />
<font color="#3A586A">Captcha Spam Protection On/Off</font><br />
<?php if ($stopspam == 2) { ?>
<select style="background:#EEFFE3;" class="form-control" name="captcha">
<option value='2'>-- Yes</option>
<option style="background:#ffffff;" value='2'>---- Yes</option>
<option style="background:#ffffff;" value='1'>------ No</option>
</select>
<?php } ?>
<?php if ($stopspam == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="captcha">
<option value='1'>-- No</option>
<option style="background:#ffffff;" value='2'>---- Yes</option>
<option style="background:#ffffff;" value='1'>------ No</option>
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