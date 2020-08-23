<?php @session_start();
/* * ********************************************************************
*  Copyright notice PHP Enter
*
*  (c) 2011 Predrag Rukavina - admin[at]phpenter[dot]net
*  All rights reserved
*
*  This script is part of the PHP Enter project.
*  The PHP Enter project is free software; you can redistribute it and/or
*  modify it under the terms of the GNU General Public License
*  as published by the Free Software Foundation; either version 2
*  of the License, or (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
*  MA  02110-1301, USA.
*
*  This copyright notice MUST appear in all copies of the script!
* ********************************************************************** */
include('settings.php');
require_once('includes/library/HTMLPurifier.auto.php');
include('classes/class.upload.php');
$config = HTMLPurifier_Config::createDefault();
$config->set('Core.Encoding', 'UTF-8');
$purifier = new HTMLPurifier($config);
define('CONST_VAL', '1');
require_once 'admin/salt.php';
require_once 'admin/classes/securesession.class.php';
$ss = new SecureSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if (!$ss->Check() || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    $_SESSION = array();
    header('Location: admin/signin.php');
    die();
}
$ac = $conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if (!$ac) {
    print $conn->ErrorMsg();
} else {
    while (!$ac->EOF) {
        if ($ac->fields['cord'] == 0) {
            $categori[] = $ac->fields;
        } else {
            $subcat[] = $ac->fields;
        }
        $ac->MoveNext();
    }
}
$smarty->assign('categori', $categori);
$smarty->assign('subcat', @$subcat);
$smarty->display('blank.php');
?>
<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/jquery.form-validator.min.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/jquery.are-you-sure.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/ays-beforeunload-shim.js"></script>
<script>$(function() {$('#incformer').areYouSure({message: "The changes you made will be lost. Are you sure you want to leave this page?"});});</script>
<script>
$(function(){
$('#coolMenu').find('> li').hover(function(){
$(this).find('ul')
.removeClass('noJS')
.stop(true, true).toggle('fast');
});
});
</script>
<?php
echo '<div>';
echo '<div>';
echo '<div class="container minheight mt-2">';
if (!@$_SESSION['incsess']) {
    echo "<div class='alert alert-danger'>$lang[299]</div></div>";
    $smarty->display('footer.php');
    die();
}
if (isset($_POST['query'])) {
    if ($editortrue == 2) {
        $editor = '2';
    }
    if ($editortrue == 1) {
        $editor = '1';
    }
    if (get_magic_quotes_gpc()) {
        $main = stripslashes($_POST['main']);
        $idblog = stripslashes($_POST['idblog']);
        $title = stripslashes($_POST['title']);
        $brief = stripslashes($_POST['brief']);
        $address = stripslashes($_POST['address']);
        $longdesc = stripslashes(html_entity_decode($_POST['longdesc']));
    } else {
        $main = $_POST['main'];
        $idblog = $_POST['idblog'];
        $title = $_POST['title'];
        $brief = $_POST['brief'];
        $address = $_POST['address'];
        $longdesc = html_entity_decode($_POST['longdesc']);
    }
    $main = $purifier->purify($main);
    $idblog = $purifier->purify($idblog);
    $title = $purifier->purify($title);
    $brief = $purifier->purify($brief);
    $address = $purifier->purify($address);
    if (strlen($idblog) < 1) {
        echo "<div class='alert alert-danger'>$lang[238] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
        $smarty->display('footer.php');
        die();
    }
    $delimiter = explode("|", $idblog);
    $idblog = $delimiter[0];
    $idname = $delimiter[1];
    $seoname = $delimiter[2];
    enterBlacklist($address, $title, $brief, $longdesc, $smarty);
    if (strlen($title) < 5 or strlen($title) > 160) {
        echo "<div class='alert alert-danger'>$lang[239] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
        $smarty->display('footer.php');
        die();
    }
    if (strlen($brief) > 500) {
        echo "<div class='alert alert-danger'>$lang[240] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
        $smarty->display('footer.php');
        die();
    }
    if (strlen($longdesc) < 50 or strlen($longdesc) > $maxposting) {
        echo "<div class='alert alert-danger'>$lang[241] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
        $smarty->display('footer.php');
        die();
    }
    if ($_FILES['image']['name'] == "") {
        $newimage = "0";
    } else {
        $newimage = $_FILES['image']['name'];
        $filetype = substr(strrchr($newimage, '.'), 1);
        if (($filetype != "jpeg") && ($filetype != "jpg") && ($filetype != "JPG") && ($filetype != "gif") && ($filetype != "png")) {
            echo "<div class='alert alert-danger'>$lang[190] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
            $smarty->display('footer.php');
            die();
        }
        $imagesize = getimagesize($_FILES['image']['tmp_name']);
        if ($imagesize == false) {
            echo "<div class='alert alert-danger'>$lang[190] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
            $smarty->display('footer.php');
            die();
        }
        $picwidth = $imagesize[0];
        $picheight = $imagesize[1];
        if ($picwidth > 2200 || $picheight > 2200) {
            echo "<div class='alert alert-danger'>$lang[191] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
            $smarty->display('footer.php');
            $conn->Close();
            die();
        }
        if ($picwidth < 250 || $picheight < 250) {
            echo "<div class='alert alert-danger'>$lang[236] <a href='javascript:history.go(-1)'>$lang[135]</a></div></div>";
            $smarty->display('footer.php');
            $conn->Close();
            die();
        }
        if ($newimage == false) {
            $newimage = "0";
        } else {
            $newimage = $_FILES['image']['name'];
            $time = date("ymdHis");
            if ($newimage == false) {
                $newimage = "0";
            } else {
                $handle = new Upload($_FILES['image']);
                if ($handle->uploaded) {
                    $handle->file_new_name_body = $time;
                    $handle->image_convert = 'jpg';
                    $handle->Process('uploads');
                    $handle->file_new_name_body = $time;
                    $handle->image_convert = 'jpg';
                    $handle->image_resize = true;
                    $handle->image_ratio_crop = true;
                    $handle->image_precrop = array(
      '0',
      '0',
      '22%',
      '0');
                    $handle->image_y = 135;
                    $handle->image_x = 222;
                    $handle->Process('minthumb');
                    $handle->file_new_name_body = $time;
                    $handle->image_convert = 'jpg';
                    $handle->image_resize = true;
                    $handle->image_ratio_y = true;
                    $handle->image_x = 395;
                    $handle->Process('maxthumb');
                    if ($handle->processed) {
                        $handle->Clean();
                    } else {
                        echo 'error : ' . $handle->error;
                    }
                }
            }
        }
        $newimage = $time . ".jpg";
    }
    $helper = preg_replace('/\s+/', '_', $_POST['title']);
    $helper = preg_replace('/[^A-Za-z0-9\-_+ ]/', '', $helper);
    $except = htmlspecialchars_decode($longdesc);
    $except = strip_tags($except);
    $univer = date("ymdHis");
    $ae = $conn->Prepare('INSERT INTO newser (main,univer,idblog,idname,seoname,editor,userid,user,userpic,title,helper,brief,address,shortdesc,image,longdesc) VALUES (' . $conn->qstr($main) . ',' . $conn->qstr($univer) . ',' . $conn->qstr($idblog) . ',' . $conn->qstr($idname) . ',' . $conn->qstr($seoname) . ',' . $conn->qstr($editor) . ',' . $conn->qstr('0') .
  ',' . $conn->qstr('0') . ',' . $conn->qstr('0') . ',' . $conn->qstr($title) . ',' . $conn->qstr($helper) . ',' . $conn->qstr($brief) . ',' . $conn->qstr($address) . ',' . $conn->
  qstr($except) . ',' . $conn->qstr($newimage) . ',' . $conn->qstr($longdesc) . ')');
    if ($conn->Execute($ae) === false) {
        print $conn->ErrorMsg();
    } ?>
<script>
setTimeout(function(){
window.location.replace("<?php echo $sitepath; ?>/postadmin.php");
}, 500);
</script>
<div class="text-center">
<div class="fa-3x">
<i class="fa fa-spinner fa-pulse"></i>
</div>
<div>
<?php echo $lang['141']; ?>
</div>
</div>
<?php
} else {
        include('includes/postadmin.php');
    }
?>
</div>
</div>
</div>
<script src="<?php echo $sitepath; ?>/scripts/jquery.form-validator.min.js"></script>
<script>
$.validate();
</script>
<?php
$smarty->display('footer.php');
######################################
##post.php                      BETA##
######################################
 ?>