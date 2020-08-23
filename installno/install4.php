<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="author" content="php enter" />
  <meta http-equiv="content-type" content="text/html; charset=us-ascii" />
  <link href="css/styles.css" rel="stylesheet" type="text/css" />
  <title></title>
</head>
<body>
<center>
  <table width="70%" align="center" border="0">
    <tr>
      <td align="center" width="120" height="100px"></td>
    </tr>
  </table>
  <div id="scentral">
    <table width="80%" align="center" border="0">
      <tr>
        <td align="center">
          <h3><img src="css/icon.png" />&nbsp;&nbsp;&nbsp;Install PHP Enter - Step 5</h3>Admin Account<br />
         
        </td>
      </tr>
    </table>
<?php
require_once('../admin/config.php');
include('../classes/adodb/adodb.inc.php');
$dbdriver = "mysqli";
$conn = ADONewConnection($dbdriver);
$conn->Connect($server, $user, $password, $database);
//$conn->debug = true;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!$username) {
        echo "<center>Empty Field: Username:<a href=\"javascript:history.go(-1)\">Go Back</a></center>";
        die();
    }
    if (!$password) {
        echo "<center>Empty Field: Password:<a href=\"javascript:history.go(-1)\">Go Back</a></center>";
        die();
    }
    if (!$email) {
        echo "<center>Empty Field: Email:<a href=\"javascript:history.go(-1)\">Go Back</a></center>";
        die();
    }
    $sql = "INSERT INTO cpadmin (ausername,apassword,aemail)
VALUES ('$username','".(md5($_POST['password']))."','$email')";
    $result = $conn->Execute($sql);
    if ($result == false) {
        print 'error ' . $conn->ErrorMsg() . '<br>';
    } else {
        echo '';
    }
    $sql2 = "UPDATE abcoption SET valueopt = '$email' WHERE optionid = 8";
    $result2 = $conn->Execute($sql2);
    if ($result2 == false) {
        print 'error'  . $conn->ErrorMsg() . '<br>';
    } else {
        echo '';
    }
    $mcFile = "../admin/version.php";
    $fh = fopen($mcFile, 'w') or die("can't open file - check CHMOD");
    $version = '$version';
    $stringData =
"<?php 
$version = '5.3';
?>";
    fwrite($fh, $stringData);
    fclose($fh);
    $saFile = "../admin/salt.php";
    $fh = fopen($saFile, 'w') or die("can't open file - check CHMOD");
    $salt = '$salt';
    $hash = 'YjuPKnBfghlEeNqAuL';
    $hash = sha1(uniqid($hash.mt_rand(), true));
    $stringDatas =
"<?php 
$salt = '$hash';
?>";
    fwrite($fh, $stringDatas);
    fclose($fh);
    $incFile = "../salt.php";
    $fh = fopen($incFile, 'w') or die("can't open file - check CHMOD");
    $salt = '$salt';
    $hash = 'lEeYjuPKnBfghNqAuL';
    $hash = sha1(uniqid($hash.mt_rand(), true));
    $stringsDatas =
"<?php 
$salt = '$hash';
?>";
    fwrite($fh, $stringsDatas);
    fclose($fh);
    echo "<center><font color=\"green\"><h4>Installation Completed Successfully.</h4></font><br /><font color=\"blue\"><h4>Please remove install directory for security reasons.</h4></font></center>";
} else {
    ?>
    <table width="70%" text align="center" border="0">
      <form method="post" action="install4.php">
<tr>
  <td align="center" width="120">Username:</td>
  <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="username"  size="30"></td>
</tr>
<tr>
  <td align="center" width="120">Password</td>
  <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="password" size="30"></td>
</tr>
<tr>
  <td align="center" width="120">Email</td>
  <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="email" size="30"></td>
</tr>
<tr>
  <td align="center" width="120">
<input type="submit" name="submit" id="incinput" style="width:120px" value="Admin Account">
</td></tr>
</table>
</form>
<?php
}  ?>
</div>
<table width="100%" height="422px"  align="center" border="0">
    <tr>
      <td align="center" valign="bottom"><a href="http://phpenter.net"><font size="1">powered by phpenter.net</font></a></td>
    </tr>
  </table>
</body>
</html>