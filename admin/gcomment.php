<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id=vforms>
<div id="cconfig">Allow Guest Reviews</div>
<?php if (isset($_POST['submit'])) {
    $cablock = $_POST['cablock'];
    $sql3 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($cablock).' WHERE optionid = '.$conn->qstr("33").'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("gcomment.php");
</script>
<?php
} else { ?>
<form method="post" action="gcomment.php">
Allow guest comments [Default - No]<br />
<?php if ($keypublic == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="cablock">
<option value='1'>-- Yes</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='0'>------ No</option>
</select>
<?php } ?>
<?php if ($keypublic == 0) { ?>
<select style="background:#EEFFE3;" class="form-control" name="cablock">
<option value='0'>-- No</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='0'>------ No</option>
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