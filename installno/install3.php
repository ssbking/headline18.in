<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="author" content="php enter" />
  <meta http-equiv="content-type" content="text/html; charset=us-ascii" />
  <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
  <table width="80%" align="center" border="0">
    <tr>
      <td align="center" width="120" height="100px"></td>
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
    ?>
<div id="incral">
<table width="70%" align="center" border="0">
<tr>
<td align="center">
<h3><img src="css/icon.png" />&nbsp;&nbsp;&nbsp;Install PHP Enter - Step 4</h3>Root url and path<br />
</td>
</tr>
</table>
<?php
if (get_magic_quotes_gpc()) {
        $incpath = stripslashes($_POST['incpath']);
    } else {
        $incpath = $_POST['incpath'];
    }

    if (!$incpath) {
        echo "<center>Empty Field: Root Path:<a href=\"javascript:history.go(-1)\">Go Back</a></center>";
        die();
    }
    $arecordSet = $conn->Execute("UPDATE abcoption SET valueopt = '$incpath' WHERE optionid = 4");
    $conn->Close();
    echo"&nbsp;&nbsp;&nbsp; Path: " . $incpath . "<br />&nbsp;&nbsp;&nbsp; <a href=\"install4.php\"><b>Step 5</b></a>"; ?>
</div>
<table width="100%" height="422px"  align="center" border="0">
<tr>
<td align="center" valign="bottom"><a href="http://www.phpenter.net"><font size="1">powered by phpenter.net</font></a></td>
</tr>
</table>
</body>
</html>
<?php
} else {
        ?>
<div id="scentral">
<table width="70%" align="center" border="0">
<tr>
<td align="center">
<h3><img src="css/icon.png" />&nbsp;&nbsp;&nbsp;Install PHP Enter - Step 4</h3>Root url<br />
</td>
</tr>
</table>
<table width="70%" text align="center" border="0">
<form method="post" action="install3.php">
<tr>
<td align="center">Root URL </td>
<td align="center">
<font style="font-size:11px;">(http://www.example.com or http://www.example.com/news)</font><br />
<input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="incpath" size="30"></td>
</tr>
<tr>
<td align="center" width="120">
<input type="submit" name="submit" id="incinput" style="width:120px" value="Next Step">
</td></tr>
</table>
</form>
</div>
<table width="100%" height="422px"  align="center" border="0">
    <tr>
      <td align="center" valign="bottom"><a href="http://phpenter.net"><font size="1"
      font="" color="#4F4F4F">powered by phpenter.net</font></a></td>
    </tr>
  </table>
</body>
</html>
<?php
    }  ?>
