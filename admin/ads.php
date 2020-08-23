<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id="vforms">
<div id="cconfig">Banners</div>
HTML or Adsense
<?php
if (isset($_POST['submit'])) {
    $adsoffon = $_POST['adsoffon'];
    $senseup = $_POST['senseup'];
    $sensedown = $_POST['sensedown'];
    if (get_magic_quotes_gpc()) {
        $adsoffon = stripslashes($adsoffon);
        $senseup = stripslashes($senseup);
        $sensedown = stripslashes($sensedown);
        $sensehead = stripslashes($sensehead);
    }
    $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($adsoffon).' WHERE optionid = '.$conn->qstr("28").'');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($senseup).' WHERE optionid = '.$conn->qstr("29").'');
    if ($conn->Execute($sql2) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql3 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sensedown).' WHERE optionid = '.$conn->qstr("30").'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql4 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sensehead).' WHERE optionid = '.$conn->qstr("52").'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("ads.php");
</script>
<?php
} else { ?>
<form method="post" action="ads.php">
Google Adsense Off/On<br />
<?php if ($adsoffon == 1) { ?>
<select style="background:#FFF6C1;" class="form-control" name="adsoffon">
<option value='1'>- Adsense Off</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------On</option>
</select>
<?php } ?>
<?php if ($adsoffon == 2) { ?>
<select style="background:#EEFFE3;" class="form-control" name="adsoffon">
<option value='2'>-- Adsense On</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------ On</option>
</select>
<?php } ?>
<br /><br />
Adsense I Responive Ad Unit<br /><textarea name="senseup"><?php echo @$senseup; ?></textarea><br /><br />
<br /><br />
Adsense II Responive Ad Unit<br /><textarea name="sensedown"><?php echo @$sensedown; ?></textarea><br /><br />
<br /><br />
Adsense III head Responive Ad Unit<br /><textarea name="sensehead"><?php echo @$sensehead; ?></textarea><br /><br />
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