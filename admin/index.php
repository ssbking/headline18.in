<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id=vforms>
<div id="cconfig">Configuration</div><br />
<?php
if (isset($_POST['submit'])) {
    $sitedisabled = $_POST['sitedisabled'];
    $rewritemod = $_POST['rewritemod'];
    $sitetitle = $_POST['sitetitle'];
    $language = $_POST['language'];
    $themes = $_POST['themes'];
    $sitepath = $_POST['sitepath'];
    $sitemail = $_POST['sitemail'];
    $ntext = $_POST['ntext'];
    $paginate = $_POST['paginate'];
    if (get_magic_quotes_gpc()) {
        $sitedisabled = stripslashes($sitedisabled);
        $rewritemod = stripslashes($rewritemod);
        $sitetitle = stripslashes($sitetitle);
        $language = stripslashes($language);
        $themes = stripslashes($themes);
        $sitepath = stripslashes($sitepath);
        $sitemail = stripslashes($sitemail);
        $ntext = stripslashes($ntext);
        $paginate = stripslashes($paginate);
    }
    $name = array($sitedisabled,$rewritemod,$sitetitle,$language,$themes,$sitepath,$sitemail,$ntext,$paginate);
    foreach ($name as $name) {
        if (strlen($name) < 1) {
            echo "<center>Field must be at least 1 characters long: <a href='index.php'>Go Back</a></center>";
            die();
        }
    }
    $sql = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sitedisabled).' WHERE optionid = '.$conn->qstr("9").'');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql2 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($rewritemod).' WHERE optionid = '.$conn->qstr("10").'');
    if ($conn->Execute($sql2) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql3 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sitetitle).' WHERE optionid = '.$conn->qstr("1").'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql4 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($language).' WHERE optionid = '.$conn->qstr("5").'');
    if ($conn->Execute($sql4) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql5 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($themes).' WHERE optionid = '.$conn->qstr("7").'');
    if ($conn->Execute($sql5) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql6 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sitepath).' WHERE optionid = '.$conn->qstr("4").'');
    if ($conn->Execute($sql6) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql7 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($sitemail).' WHERE optionid = '.$conn->qstr("8").'');
    if ($conn->Execute($sql7) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql8 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($ntext).' WHERE optionid = '.$conn->qstr("12").'');
    if ($conn->Execute($sql8) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql9 = $conn->Prepare('UPDATE abcoption SET valueopt = '.$conn->qstr($paginate).' WHERE optionid = '.$conn->qstr("24").'');
    if ($conn->Execute($sql9) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<?php
}
 $br = $conn->Execute('SELECT username, email FROM users WHERE active = ?', array("3"));
 if ($br) {
     if ($br->fields > 0) {
         $numrows = $br->PO_RecordCount("users");
         echo "<div class='error'><a href='user.php'>Members Waiting For Approval [".$numrows."]</a></div><br /><br />";
     }
 }
?>
<form method="post" action="index.php">
Enable Maintenance Mode<br />
<?php if ($sitedisabled == 1) { ?>
<select style="background:#FFF6C1;" class="input" name="sitedisabled">
<option value='1'>- Website is in maintenance mode</option>
<option style="background:#ffffff;" value='1'>---- Maintenance mode</option>
<option style="background:#ffffff;" value='2'>------ Production mode</option>
</select>
<?php } ?>
<?php if ($sitedisabled == 2) { ?>
<select style="background:#EEFFE3;" class="input" name="sitedisabled">
<option value='2'>-- Website in production mode</option>
<option style="background:#ffffff;" value='1'>---- Maintenance mode</option>
<option style="background:#ffffff;" value='2'>------ Production mode</option>
</select>
<?php } ?>
<br /><br />
Friendly URLs<br />
Requirements: Apache web server with the mod_rewrite module installed.<br />
<?php if ($rewritemod == 1) { ?>
<select style="background:#EEFFE3;" class="input" name="rewritemod">
<option value='1'>-- Friendly URLs Enabled</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>                               
<?php } ?>
<?php if ($rewritemod == 2) { ?>
<select style="background:#FFF6C1;" class="input" name="rewritemod">
<option value='2'>-- Friendly URLs Disabled</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>
<?php } ?>
<br /><br />
WebSite Name<br />
<input class="input" type="text" name="sitetitle" value="<?php echo $sitetitle; ?>" />
<br /><br />
Language<br />
<input class="input" name="language" value="<?php echo $language; ?>" />
<br /><br />
Theme <a href="http://www.phpenter.net/shop.php" target="_blank">Themes for version 5.3.</a><br />
<input class="input" type="text" name="themes" value="<?php echo $themes; ?>" />
<br /><br />
URL (http://www.example.com or http://www.example.com/folder)
<br /><input class="input" type="text" name="sitepath" value="<?php echo $sitepath; ?>" />
<br /><br />
System Email<br />
<input class="input" type="text" name="sitemail" value="<?php echo $sitemail; ?>" />
<br /><br />
Text Direction<br />
<?php if ($frontext == "ltr") { ?>
<select style="background:#EEFFE3;" class="input" name="ntext">
<option value='ltr'>- Left To Right</option>
<option style="background:#ffffff;" value='ltr'>---- Left To Right</option>
<option style="background:#ffffff;" value='rtl'>------ Right to Left</option>
</select>
<?php } ?>
<?php if ($frontext == "rtl") { ?>
<select style="background:#EEFFE3;" class="input" name="ntext">
<option value='rtl'>-- Right to Left</option>
<option style="background:#ffffff;" value='ltr'>---- Left To Right</option>
<option style="background:#ffffff;" value='rtl'>------ Right to Left</option>
</select>
<?php } ?>
<br /><br />
Number of articles on category, serach and profile page<br />
<input class="input" type="text" name="paginate" value="<?php echo $paginate; ?>" />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" />
<br /><br />
<br /><br />
</form>
</div>
</div>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>