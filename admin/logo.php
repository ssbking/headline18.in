<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id="vforms">
<div id="cconfig">Logo</div>
<?php
if (isset($_POST['submit'])) {
    $logoon = $_POST['logoon'];
    $logotext = $_POST['logotext'];
    if (get_magic_quotes_gpc()) {
        $logoon = stripslashes($logoon);
        $logotext = stripslashes($logotext);
    }
    $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($logoon).' WHERE optionid = '.$conn->qstr("25").'');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($logotext).' WHERE optionid = '.$conn->qstr("50").'');
    if ($conn->Execute($sql2) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("logo.php");
</script>
<?php
} else { ?>
Logo image or Text [Logo path: themes/[theme]/styles/images/logo.png] [width:250px height:45px]
<form method="post" action="logo.php">
<?php if ($logoon == 1) { ?>
<select style="background:#EEFFE3;" class="form-control" name="logoon">
<option value='1'>-- Logo Image</option>
<option style="background:#ffffff;" value='1'>---- Logo Image</option>
<option style="background:#ffffff;" value='2'>------ Text</option>
</select>
<?php } ?>
<?php if ($logoon == 2) { ?>
<select style="background:#FFF6C1;" class="form-control" name="logoon">
<option value='2'>-- Text</option>
<option style="background:#ffffff;" value='1'>---- Logo Image</option>
<option style="background:#ffffff;" value='2'>------ Text</option>
</select>
<?php  } ?>
<br /><br />
Logo Text:<br />
<input name="logotext" class="form-control" value="<?php echo $logotext; ?>" type="text"><br /><br />
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