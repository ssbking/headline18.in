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
 <div id="incral">
<table width="80%" align="center" border="0">
<tr>
<td align="center">
<h3><img src="css/icon.png" />&nbsp;&nbsp;&nbsp;Install PHP Enter - Step 2</h3>MySQL Database
Server<br />
</td>
</tr>
</table>
<?php
$servers = $_POST['host'];
$users = $_POST['user'];
$passwords = $_POST['pass'];
$databases = $_POST['name'];
if (empty($servers)) {
    echo '<div id="warn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Empty field Host</div>';
    die;
}
if (empty($users)) {
    echo '<div id="warn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Empty field DB Name</div>';
    die;
}
if (empty($passwords)) {
    echo '&nbsp;&nbsp;&nbsp;<font style="background:lightyellow">Empty field DB Password. Go back to review your settings.</font>';
}
if (empty($databases)) {
    echo '<div id="warn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Empty field User</div>';
    die;
}
$dbhost = '$server';
$dbusername = '$user';
$dbpassword = '$password';
$dbname = '$database';
$myFile = realpath('./../') . "/admin/config.php";
$fh = fopen($myFile, 'w') or die("can't open file- check CHMOD");
$stringData =
"<?php 
$dbhost = '$servers';
$dbusername = '$users';
$dbpassword = '$passwords';
$dbname = '$databases';
?>";
fwrite($fh, $stringData);
fclose($fh);
error_reporting(0);
include('../admin/config.php');
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuration file successfully updated! <a href="install2.php"><b>Step 3</b></a>
</div>
<table width="100%" height="422px"  align="center" border="0">
    <tr>
      <td align="center" valign="bottom"><a href="http://phpenter.net"><font size="1">powered by phpenter.net</font></a></td>
    </tr>
  </table>
</body>
</html>