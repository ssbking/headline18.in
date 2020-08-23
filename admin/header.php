<?php session_start();
require_once 'salt.php';
require_once 'classes/securesession.class.php';
$ss = new SecureSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if (!$ss->Check() || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    $_SESSION = array();
    header('Location: signin.php');
    die();
}
include('adoconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link href="<?php echo $sitepath; ?>/themes/<?php echo $themes; ?>/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<title>Admin Panel</title>
</head>
<body>
<table width="950px" background="style/images/header.jpg" height="35px" cellspacing="2" cellpadding="5" align="center" border="0">
 <tr>
  <td align="right" width="180px">
   <div id=stopnavy><strong><a href="<?php echo $sitepath; ?>/admin">Control Panel</a></strong></div>
   </td>
   <td>
   </td>
   <td align="left" width="180px"><strong><font color="#FFFFFF"><div id="topnavy"><div id="stopnavy"><a href="<?php echo $sitepath; ?>/postadmin.php">New Story</a></div></div></font></strong>
  </td>
 </tr>
</table>
<table cellspacing=1 cellpadding=0 width="952px" align="center" border="0">
 <tr>
   <td width="210px" valign="top"><div id="border">
<div id="headers"><img src="style/images/home.png" width="16" height="16" border="0" />&nbsp;&nbsp;Home</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="index.php">Admin</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="<?php echo $sitepath; ?>">Homepage</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;Version: 5.3.<br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;Licence: GNU GPL<br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="signout.php">Log Out</a><br />
<div id="headers"><img src="style/images/configuration.png" width="16" height="16" border="0">&nbsp;&nbsp;Settings</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="index.php">Configuration</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="pages.php">Static Pages</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="meta.php">Meta Desc & Keywords</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="announ.php">Announcements</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="protect.php">Spam Protection</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="caching.php">Cache</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="editing.php">Editing/Deleting Posts</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="posting.php">Posting</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="register.php">Registration Settings</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="optimize.php">Optimize Tables</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="frontpage.php">Front Page</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="menu.php">Top Menu</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="htprotect.php">Htpasswd Password</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="gcomment.php">Allow Guest Reviews</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="logo.php">Logo</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="incadmin.php">Admin Password</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="notification.php">Admin Notification</a><br />
<div id="headers"><img src="style/images/news.png" width="16" height="16" border="0">&nbsp;&nbsp;Listing</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="menage.php">Manage News</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="listsearch.php">Search News</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="reviews.php">News Comments</a><br />
<div id="headers"><img src="style/images/categories.png" width="16" height="16" border="0">&nbsp;&nbsp;Categories</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="addcat.php">New Category</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="categories.php">Manage Categories</a><br />
<div id="headers"><img src="style/images/users.png" width="16" height="16" border="0">&nbsp;&nbsp;Members</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="user.php">Members</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="usersearch.php">Search Members</a><br />
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="newsletter.php">Newsletter</a><br />
<div id="headers"><img src="style/images/banner.png" width="16" height="16" border="0">&nbsp;&nbsp;Banners</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="ads.php">Banners</a><br />
<div id="headers"><img src="style/images/support.png" width="16" height="16" border="0">&nbsp;&nbsp;Support</div>
&nbsp;<img src="style/images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="http://forums.phpenter.net">Support Forum</a><br /><br />
  </td>
  <td align="left" valign="top">
  <div id="borders">
<?php
if (!@$_SESSION['incsess']) {
    echo "<div class='column center error'>Something went wrong with your session. Please <a href='signout.php'>sign out</a> and sign in again</td></tr></table></div></div></div></div>";
    include('footer.php');
    $_SESSION = array();
    die();
}
?>