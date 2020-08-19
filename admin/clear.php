<?php session_start();
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
require_once 'salt.php';
require_once 'classes/securesession.class.php';
$ss = new SecureSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if(!$ss->Check() || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
 die();
}
?>
<html>
<body style="font-family:tahoma;font-size:11px;">
<?php
$crepath = realpath('./../');
$cachedir = $crepath."/temp/templates_c/";
if($dir = @dir($cachedir)) {
 while($files = $dir->read()) {
  if(is_file($cachedir.$files)) {
   if(preg_match('/\.php$/',$files) > 0) {
    echo $files."<br />";
    unlink($cachedir.$files);
   }
  }
 }
 $dir->close();
}
unset($dir,$files);
echo "Templates_c directory is empty<br />";
$cachedir2 = $crepath."/temp/cache/";
if($dir2 = @dir($cachedir2)) {
 while($files = $dir2->read()) {
  if(is_file($cachedir2.$files)) {
   if(preg_match('/\.php$/',$files) > 0) {
    echo $files."<br />";
    unlink($cachedir2.$files);
   }
  }
 }
 $dir2->close();
}
unset($dir2,$files);
echo "Cache directory is empty";
/**************************************
* Revision: v.beta
***************************************/
?>
</body></html>