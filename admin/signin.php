<?php session_start();
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
require_once 'classes/securesession.class.php';
require_once 'salt.php';
unset($_SESSION['cusid']);
unset($_SESSION['INC_USER_ID']);
unset($_SESSION['INC_USER_NAME']);
unset($_SESSION['CC_MODER']);
unset($_SESSION['INC_USER_THUMB']);
unset($_SESSION['INC_USER_PRIV']);
unset($_SESSION['HTTP_USER_AGENT']);
unset($_SESSION['logged_in']);
unset($_SESSION['loggedin']);
unset($_SESSION['ss_fprint']);
unset($_SESSION['incsess']);
unset($_SESSION['inecsess']);
include ('adoconn.php');
if(isset($_POST['Submit'])) {
 $ccuser = $_POST['username'];
 $ccpass = $_POST['password'];
 if(get_magic_quotes_gpc()) {
  $ccuser = stripslashes($ccuser);
  $ccpass = stripslashes($ccpass);
 }
 $name = array($ccuser,$ccpass);
 foreach($name as $name) {
  if(preg_match("/</",$name)) {
   echo "<center><font face='verdana'>Invalid Characters '<' </font></center>";
   die();
  }
  if(preg_match("/\\[/",$name)) {
   echo "<center><font face='verdana'>Invalid Characters '[' </font></center>";
   die();
  }
  if(strlen($name) < 3) {
   echo "<center><span style=\"font-size:13px;font-family:verdana;color:#888\">The field must be at least 3 characters long.";
   die();
  }
 }
 $ccpass = md5($_POST['password']);
 $brecordSet = $conn->Execute('SELECT * FROM cpadmin WHERE ausername = '.$conn->qstr($ccuser).' and apassword = '.$conn->qstr($ccpass).'');
 if($brecordSet) {
  if($brecordSet->fields == 0) {
   echo "Sorry, user you are looking for does not exist.";
   $brecordSet->Close();
   $conn->Close();
   die();
  }
 }
 if(!$brecordSet)
  print $conn->ErrorMsg();
 else
  while(!$brecordSet->EOF) {
   $bval[] = $brecordSet->fields;
   $uname = $brecordSet->fields['ausername'];
   $brecordSet->MoveNext();
   $ss = new SecureSession();
   $ss->check_browser = true;
   $ss->check_ip_blocks = 2;
   $ss->secure_word = $salt;
   $ss->regenerate_id = true;
   $ss->Open();
   $_SESSION['CC_MODER'] = $uname;
   $_SESSION['logged_in'] = true;
   $incsess = md5(uniqid(rand(),TRUE));
   $_SESSION['incsess'] = $incsess;
   session_write_close();
   $conn->Close();
   header('Location: index.php');
   die();
  }
} else { ?>
<!DOCTYPE html>
<html> 
<head>
<meta charset="UTF-8" />
<link type="text/css" href="style/style.css" rel="stylesheet" />
</head>
<body>
<div class="ten column"></div>
<div class="ten">
<div class="five column centered login">


<form action="signin.php" method="post">
<div class="ten column">
<h3>Admin Login</h3>
</div>
<div class="ten column">
Username
</div>
<div class="ten column">
<input class="input" maxlength="25"  name="username" type="text" />
</div>
<div class="ten column">
Password 
</div>
<div class="ten column">
<input class="input" maxlength="25" name="password" type="password" />
</div>
<div class="ten column">
<input class="topicbuton" type="submit" value="Sign In" name="Submit" />
</div>
<div class="ten column">
<a href="http://www.phpenter.net">Powered by phpEnter.net</a>
</div>
</form>
</div>
</div>
</body>
</html>
<?php
$conn->Close();
}
/**************************************
* Revision: v.beta
***************************************/
?>