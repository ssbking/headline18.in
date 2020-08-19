<?php session_start();
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
include ('settings.php');
require_once ('salt.php');
require_once ('classes/securesession.class.php');
enterLogin($salt);
$ac = $conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if (!$ac)
 print $conn->ErrorMsg();
else
 while (!$ac->EOF) {
  if ($ac->fields['cord'] == 0) {
   $categori[] = $ac->fields;
  } else {
   $subcat[] = $ac->fields;
  }
  $ac->MoveNext();
 }
$smarty->assign('categori', $categori);
$smarty->assign('subcat', @$subcat);
$smarty->display('blank.php');
?>
<div class="container minheight mt-2">
<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/jquery.form-validator.min.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/jquery.are-you-sure.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/ays-beforeunload-shim.js"></script>
<script>$(function() {$('#incformer').areYouSure({message: "The changes you made will be lost. Are you sure you want to leave this page?"});});</script>
<div class="row">
<div class="col-md-6">
<?php
if (!@$_SESSION['inecsess']) {
 echo "<div class='alert alert-danger'>$lang[176]</div></div></div></div>";
 $smarty->display('footer.php');
 die();
}
$shouter = @$_SESSION['INC_USER_ID'];
$ad = $conn->Execute('SELECT * FROM users WHERE usid = ?', array($shouter));
if (!$ad)
 print $conn->ErrorMsg();
else
 while (!$ad->EOF) {
  $fullname = $ad->fields['fullname'];
  $username = $ad->fields['username'];
  $homep = $ad->fields['homep'];
  $biosi = $ad->fields['biosi'];
  $thumbs = $ad->fields['thumbs'];
  $ad->MoveNext();
 }
?>
<div class="row mt-4 mb-2">
<div class="col-md-10">
<h4><?php echo $lang['177']; ?></h4>
</div>
<div class="col-md-2">
</div>
</div>
<?php
if (isset($_POST['query'])) {
 if (get_magic_quotes_gpc()) {
  $fullname = htmlspecialchars(stripslashes($_POST['fullname']));
  $homep = htmlspecialchars(stripslashes($_POST['homep']));
  $biosi = htmlspecialchars(stripslashes($_POST['biosi']));
 } else {
  $fullname = htmlspecialchars($_POST['fullname']);
  $homep = htmlspecialchars($_POST['homep']);
  $biosi = htmlspecialchars($_POST['biosi']);
 }
 $first = array(
  'onload',
  'onclick',
  'javascript',
  'script');
 $second = array(
  '-',
  '-',
  '-',
  '-');
 $fullname = str_replace($first, $second, $fullname);
 $biosi = str_replace($first, $second, $biosi);
 @$checkpass = $_POST['checkpass'];
 if ($checkpass == 1) {
  if (get_magic_quotes_gpc()) {
   $oldpass = htmlspecialchars(stripslashes($_POST['oldpass']));
   $newpass = htmlspecialchars(stripslashes($_POST['newpass']));
  } else {
   $oldpass = htmlspecialchars($_POST['oldpass']);
   $newpass = htmlspecialchars($_POST['newpass']);
  }
  if (strlen($oldpass) < 5) {
   echo "<div class='alert alert-danger'>$lang[284] <a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
  if (strlen($oldpass) > 25) {
   echo "<div class='alert alert-danger'>$lang[282] <a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
  if (strlen($newpass) < 5) {
   echo "<div class='alert alert-danger'>$lang[285] <a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
  if (strlen($newpass) > 25) {
   echo "<div class='alert alert-danger'>$lang[283] <a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
  if (preg_match("/\\s/", $newpass)) {
   echo "<div class='alert alert-danger'>$lang[289] <a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
  $newpass = md5($newpass);
  $oldpass = md5($oldpass);
  $sql = $conn->Prepare('UPDATE IGNORE users SET password = ' . $conn->qstr($newpass) . ' WHERE usid = ' . $conn->qstr($shouter) . ' and password = ' . $conn->qstr($oldpass) . '');
  if ($conn->Execute($sql) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  if ($conn->affected_rows() == 0) {
   echo "<div class='alert alert-danger'>$lang[286] <a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  } else {
   session_unset();
   session_destroy();
   $_SESSION = array();
   echo "<div class='alert alert-success'>$lang[287]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
 }
 @$myoption = $_POST['myoption'];
 if ($myoption == 1) {
  $file = $thumbs;
  $file1 = $thumbs;
  $file = "uploads/" . $file;
  $file1 = "maxthumb/" . $file1;
  @unlink($file);
  @unlink($file1);
 }
 if (strlen($homep) > 100) {
  echo "<div class='alert alert-danger'>$lang[186]&nbsp;<a href='link.php'>$lang[135]</div></div></div></div>";
  $smarty->display('footer.php');
  die();
 }
 if (strlen($homep) > 0) {
  if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $homep)) {
   echo "<div class='alert alert-danger'>$lang[187]&nbsp;<a href='link.php'>$lang[135]</div></div></div></div>";
   $smarty->display('footer.php');
   die();
  }
 }
 if (strlen($biosi) > 2000) {
  echo "<div class='alert alert-danger'>$lang[188])&nbsp;<a href='link.php'>$lang[135]</div></div></div></div>";
  $smarty->display('footer.php');
  die();
 }
 if (strlen($fullname) > 85) {
  echo "<div class='alert alert-danger'>$lang[189]&nbsp;<a href='link.php'>$lang[135]</div></div></div></div>";
  $smarty->display('footer.php');
 }
 $fullname = strip_tags($fullname);
 $biosi = strip_tags($biosi);
 if ($myoption == 1) {
  if ($_FILES['image']['name'] == "") {
   $newimage = "";
  } else {
   $current_image = $_FILES['image']['name'];
   $extension = substr(strrchr($current_image, '.'), 1);
   if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "JPG") && ($extension != "png") && ($extension != "gif")) {
    echo "<div class='alert alert-danger'>$lang[190] <a href='link.php'>$lang[135]</div></div></div></div>";
    $smarty->display('footer.php');
    die();
   }
   $time = date("ymdHis");
   $newimage = $time . "." . $extension;
   $destination = "uploads/" . $newimage;
   $action = copy($_FILES['image']['tmp_name'], $destination);
   $image_info = getimagesize($_FILES['image']['tmp_name']);
   if ($image_info == false) {
    echo "<div class='alert alert-danger'>$lang[190] <a href='link.php'>$lang[135]</div></div></div></div>";
    die();
   }
   enterProfilePic($destination, 'maxthumb/' . $newimage, 50, 50);
  }
 }
 if ($myoption == 1) {
  $sql = $conn->Prepare('UPDATE users SET fullname = ' . $conn->qstr($fullname) . ', homep = ' . $conn->qstr($homep) . ', biosi = ' . $conn->qstr($biosi) . ', thumbs = ' . $conn->
   qstr($newimage) . ' WHERE usid = ' . $conn->qstr($shouter) . '');
  if ($conn->Execute($sql) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  
  if ($fullname == true) {
   $sql6 = $conn->Prepare('UPDATE newser SET userpic = ' . $conn->qstr($newimage) . ', user = ' . $conn->qstr($fullname) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
   if ($conn->Execute($sql6) === false) {
    print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
   }
   $sql9 = $conn->Prepare('UPDATE reviews SET userpic = ' . $conn->qstr($newimage) . ', user = ' . $conn->qstr($fullname) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
  if ($conn->Execute($sql9) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  } else {
   $sql6 = $conn->Prepare('UPDATE newser SET userpic = ' . $conn->qstr($newimage) . ', user = ' . $conn->qstr($username) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
   if ($conn->Execute($sql6) === false) {
    print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
   }
  $sql9 = $conn->Prepare('UPDATE reviews SET userpic = ' . $conn->qstr($newimage) . ', user = ' . $conn->qstr($username) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
  if ($conn->Execute($sql9) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  }
  unset($_SESSION['INC_USER_THUMB']);
  $_SESSION['INC_USER_THUMB'] = $newimage;
 } else {
  $sql = $conn->Prepare('UPDATE users SET fullname = ' . $conn->qstr($fullname) . ', homep = ' . $conn->qstr($homep) . ', biosi = ' . $conn->qstr($biosi) . '
    WHERE usid = ' . $conn->qstr($shouter) . '');
  if ($conn->Execute($sql) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  if ($fullname == true) {
   $sql6 = $conn->Prepare('UPDATE newser SET user = ' . $conn->qstr($fullname) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
   if ($conn->Execute($sql6) === false) {
    print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
   }
   $sql9 = $conn->Prepare('UPDATE reviews SET  user = ' . $conn->qstr($fullname) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
  if ($conn->Execute($sql9) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  } else {
   $sql6 = $conn->Prepare('UPDATE newser SET user = ' . $conn->qstr($username) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
   if ($conn->Execute($sql6) === false) {
    print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
   }
   $sql9 = $conn->Prepare('UPDATE reviews SET  user = ' . $conn->qstr($username) . ' WHERE userid = ' . $conn->qstr($shouter) . '');
  if ($conn->Execute($sql9) === false) {
   print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
  }
  }
 }
 echo "<div class ='alert alert-success'>$lang[196] <a href='link.php'>$lang[222]</a></div>";
}
?>
<form method="post" id="incformer" enctype="multipart/form-data" action="link.php">
<div class="row mt-1">
<div class="col-md-12">
<label><?php echo $lang['179']; ?></label>
<input type="text" name="fullname" class="form-control" value="<?php echo $fullname ?>" />
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<label><?php echo $lang['178']; ?></label>
<input type="text" name="homep" class="form-control" data-validation="url" data-validation-optional="true" value="<?php echo $homep ?>" />
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<label><?php echo $lang['180']; ?></label>
<textarea class="form-control" name="biosi"><?php echo $biosi; ?></textarea>
</div>
</div>
<div class="row mt-5">
<div class="col-md-12">
<h4><?php echo $lang['181']; ?></h4>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="frb frb-primary">
<input type="checkbox" id="radio-button-1" name="myoption" value="1"  />
<label for="radio-button-1">
<span class="frb-description"><?php echo $lang['182']; ?></span>
</label>
</div>
</div>
</div>
<div class="row mt-3">
<div class="col-md-12">
<div class="custom-file">
<input type="file" id="file" name="image" class="custom-file-input" />
<label class="custom-file-label" for="customFile"><?php echo $lang['227']; ?></label>
</div>
<script>
$('#file').on('change',function(){
var fileName = $(this).val();
$(this).next('.custom-file-label').html(fileName);
});
</script>
</div>
</div>
<div class="row mt-5">
<div class="col-md-12">
<h4><?php echo $lang['279']; ?></h4>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="frb frb-primary">
<input type="checkbox" id="radio-button-2" name="checkpass" value="1"  />
<label for="radio-button-2">
<span class="frb-description"><?php echo $lang['288']; ?></span>
</label>
</div>
</div>
</div>
<div class="row mt-3">
<div class="col-md-12">
<label><?php echo $lang['280']; ?></label>
<input type="password" name="oldpass" class="form-control" data-validation="length" data-validation-length="5-30" data-validation-optional="true" />
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<label><?php echo $lang['281']; ?></label>
<input type="password" name="newpass" class="form-control" data-validation="length" data-validation-length="5-30" data-validation-optional="true" />
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<input type="submit" value="<?php echo $lang['130']; ?>" name="query" class="btn btn-danger" />
</div>
</div>
</form>
<script>
  $.validate();
</script>
</div>
<div class="col-md-6">
<script>
function goto(site) {
var msg = confirm("<?php echo $lang['192'] ?>")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div class="row mt-4">
<div class="col-md-12">
<h4><?php echo $lang['193']; ?></h4>
</div>
</div>
<?php
if (isset($_GET['ref'])) {
if ($incitem == '0') {
   echo "<div class='alert alert-danger'>" . $lang['232'] . "</div></div></div>";
   $smarty->display('footer.php');
   die();
  }
 $id = $_GET['id'];
 $comy = $_GET['comy'];
 $sql = $conn->Prepare('DELETE FROM newser WHERE newsid = ' . $conn->qstr($id) . '');
 if ($conn->Execute($sql) === false) {
  print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
 }
 $sql3 = $conn->Prepare('DELETE FROM reviews WHERE comrev = ' . $conn->qstr($comy) . '');
 if ($conn->Execute($sql3) === false) {
  print '<div class="alert alert-danger">' . $conn->ErrorMsg() . '</div>';
 }
 if (isset($_GET['file'])) {
  $file = $_GET['file'];
  $file1 = $_GET['file'];
  $file2 = $_GET['file'];
  $file = "uploads/" . $file;
  $file1 = "maxthumb/" . $file1;
  $file2 = "minthumb/" . $file2;
  @unlink($file);
  @unlink($file1);
  @unlink($file2);
 }
 echo "<div class ='alert alert-success'>$lang[196]</div>";
}
$ae = $conn->Execute('SELECT * FROM newser where userid = ? ORDER by newsid desc', array($shouter));
if ($ae->fields == 0) {
 echo "<div class ='alert alert-success'>$lang[291]</div>";
}
if (!$ae)
 print $conn->ErrorMsg();
else
 while (!$ae->EOF) {
?>
<div class="row mt-4">
<div class="col-md-12">
<?php echo $ae->fields['title']; ?>
</div>
</div>
<div class="row mt-2">
<?php if ($ae->fields['main'] == '4') { ?><div class="col-md-3"><span class="draft">[<?php echo $lang['245']; ?>]</span></div><?php } ?><div class="col-md-3"><a href="edit.php?id=<?php echo $ae->fields['newsid']; ?>">[<?php echo $lang['194']; ?>]</a></div><div class="col-md-3"><a href="javascript:goto('link.php?id=<?php echo $ae->fields['newsid']; ?>&file=<?php echo $ae->fields['image']; ?>&ref=1&comy=<?php echo $ae->fields['univer']; ?>')">[<?php echo $lang['195']; ?>]</a></div>
</div>
<?php
 $ae->MoveNext();
 }
?>
</div>
</div>
</div>
<?php
$smarty->display('footer.php');
$conn->Close();
######################################
##link.php                      BETA##
######################################
?>