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
  <div id="central">
    <table width="80%" align="center" border="0">
      <tr>
        <td align="center">
          <h3><img src="css/icon.png" />&nbsp;&nbsp;&nbsp;Install PHP Enter - Step 1</h3>MySQL Database
          Server<br />
          Please enter your hostname, database name, password and username.
        </td>
      </tr>
    </table>
    <form name="formcheck" action="install1.php" method="post">
      <table width="80%" align="center" border="0">
        <tr>
          <td align="center" width="120">Database Host:</td>
          <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="host" size="30" /></td>
        </tr>
        <tr>
          <td align="center" width="120">DB Name:</td>
          <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="name" size="30" /></td>
        </tr>
        <tr>
          <td align="center" width="120">DB Password:</td>
          <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="pass" size="30" /></td>
        </tr>
        <tr>
          <td align="center" width="120">DB Username:</td>
          <td align="center"><input type="text" style="font-size: 18px; border: #cccccc 1px solid ; background-color: #F8F8F8" name="user" size="30" /></td>
        </tr>
      </table>
      <table width="80%"  align="center" border="0">
        <tr>
          <td align="center"><input type="submit" id="incinput" name="submit" value="Next Step" /></td>
        </tr>
      </table>
    </form>
  </div>
  <table width="100%" height="222px"  align="center" border="0">
    <tr>
      <td align="center" valign="bottom"><a href="http://phpenter.net"><font size="1">powered by phpenter.net</font></a></td>
    </tr>
  </table>
</body>
</html>
