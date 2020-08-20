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
          <h3><img src="css/icon.png" />&nbsp;&nbsp;&nbsp;Install PHP Enter - Step 3</h3>MySQL Database
          Server<br />
        </td>
      </tr>
    </table>
	<?php
require_once('../admin/config.php');
include('../classes/adodb/adodb.inc.php');
$dbdriver = "mysqli";
$conn = ADONewConnection($dbdriver);
$conn->Connect($server, $user, $password, $database);

$sql = "CREATE TABLE IF NOT EXISTS `abcoption` (
  `optionid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nameopt` varchar(255) NOT NULL,
  `valueopt` text,
  `module` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`optionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

$sql2 = "INSERT INTO `abcoption` (`optionid`, `nameopt`, `valueopt`, `module`, `active`) VALUES
(1, 'sitetitle', 'World News', 0, 0),
(2, 'metadesc', 'World / International News - Get latest breaking news & top stories today in United States (US), Europe, Middle East and Americas.', 0, 0),
(3, 'keywords', 'news, headline, headlines, technology, latest news, tech news, world news', 0, 0),
(4, 'sitepath', 'http://localhost/phpenterpro', 0, 0),
(5, 'language', 'english', 0, 0),
(6, 'caching', '0', 0, 0),
(7, 'themes', 'classic', 0, 0),
(8, 'sitemail', 'admin@example.com', 0, 0),
(9, 'sitedisabled', '2', 0, 0),
(10, 'rewritemod', '1', 0, 0),
(11, 'toplinks', '7', 0, 0),
(12, 'frontext', 'ltr', 0, 0),
(13, 'customheader', '0', 0, 0),
(25, 'logoon', '2', 0, 0),
(14, 'signuprole', '2', 0, 0),
(15, 'signupapp', '2', 0, 0),
(16, 'newson', '1', 0, 0),
(17, 'newstext', 'World / International News - Get latest breaking news & top stories today in United States (US), Europe, Middle East and Americas.', 0, 0),
(18, 'siteabout', 'About Us Text', 0, 0),
(19, 'siteprivacy', 'Privacy Text', 0, 0),
(20, 'siteterms', 'Terms Text', 0, 0),
(21, 'messaging', '1', 0, 0),
(22, 'maxposting', '25800', 0, 0),
(23, 'editortrue', '1', 0, 0),
(26, 'maxtopic', '15', 0, 0),
(27, 'hottopic', '1', 0, 0),
(28, 'adsoffon', '1', 0, 0),
(29, 'senseup', '', 0, 0),
(30, 'sensedown', '', 0, 0),
(31, 'stopspam', '2', 0, 0),
(32, 'incitem', '1', 0, 0),
(33, 'keypublic', '0', 0, 0),
(34, 'keycaptcha', '0', 0, 0),
(35, 'slider', '1', 0, 0),
(36, 'efslide', 'horizontal', 0, 0),
(24, 'paginate', '25', 0, 0),
(37, 'aitem', '1', 0, 0),
(38, 'bitem', '1', 0, 0),
(39, 'citem', '1', 0, 0),
(40, 'ditem', '1', 0, 0),
(41, 'mailtype', '2', 0, 0),
(42, 'smserver', 'SMTP server', 0, 0),
(43, 'smport', '25', 0, 0),
(44, 'smuser', 'SMTP username', 0, 0),
(45, 'smpass', 'SMTP password', 0, 0),
(46, 'mailauth', '0', 0, 0),
(47, 'social', '0', 0, 0),
(48, 'svalue', '0', 0, 0),
(49, 'secret', '0', 0, 0),
(50, 'logotext', 'phpEnter', 0, 0),
(51, 'fromail', 'admin@example.com', 0, 0);";
$sql3 = "CREATE TABLE IF NOT EXISTS `categori` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '1',
  `cord` tinyint(1) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci,
  `seoname` text COLLATE utf8_unicode_ci,
  `cuscat` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1; ";

$sql4 = "INSERT INTO `categori` (`catid`, `parent`, `cord`, `name`, `seoname`, `cuscat`) VALUES
(1, 1, 0, 'World News', 'World_News', '0'),
(2, 2, 0, 'Business', 'Business', '0'),
(3, 3, 0, 'Tech', 'Tech', '0'),
(4, 4, 0, 'Travel', 'Travel', '0'),
(5, 5, 0, 'Health', 'Health', '0'),
(6, 6, 0, 'Internet', 'Internet', '0'),
(7, 7, 0, 'Entertainment', 'Entertainment', '0'),
(9, 9, 0, 'Sports', 'Sports', '0'),
(10, 10, 0, 'Science', 'Science', '0'),
(11, 7, 1, 'Movies', 'Movies', '0');";

$sql5 = "CREATE TABLE IF NOT EXISTS `cpadmin` (
  `ausid` int(11) NOT NULL AUTO_INCREMENT,
  `ausername` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `apassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `aemail` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ausid`),
  UNIQUE KEY `Username` (`ausername`),
  UNIQUE KEY `Email` (`aemail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";


$sql6 = "CREATE TABLE IF NOT EXISTS `newser` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `univer` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `idblog` int(11) NOT NULL,
  `idname` text COLLATE utf8_unicode_ci,
  `seoname` text COLLATE utf8_unicode_ci,
  `editor` tinyint(1) NOT NULL DEFAULT '2',
  `userid` text COLLATE utf8_unicode_ci,
  `user` text COLLATE utf8_unicode_ci,
  `userpic` varchar(17) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `title` text COLLATE utf8_unicode_ci,
  `helper` text COLLATE utf8_unicode_ci,
  `brief` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `image` varchar(17) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shortdesc` text COLLATE utf8_unicode_ci,
  `longdesc` text COLLATE utf8_unicode_ci,
  `commno` int(11) unsigned NOT NULL DEFAULT '0',
  `rating` int(10) unsigned NOT NULL DEFAULT '0',
  `total_rating` int(10) unsigned NOT NULL DEFAULT '0',
  `total_ratings` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`newsid`),
  FULLTEXT KEY `title` (`title`,`shortdesc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

$sql7 = "CREATE TABLE IF NOT EXISTS `reviews` (
  `revid` int(11) NOT NULL AUTO_INCREMENT,
  `comrev` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `idrev` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `comain` tinyint(1) NOT NULL DEFAULT '0',
  `user` text COLLATE utf8_unicode_ci,
  `userid` int(10) NOT NULL DEFAULT '0',
  `userpic` varchar(17) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `usermail` text COLLATE utf8_unicode_ci,
  `newsurl` text COLLATE utf8_unicode_ci,
  `newscat` tinyint(5) NOT NULL DEFAULT '0',
  `comdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`revid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";


$sql8 = "CREATE TABLE IF NOT EXISTS `users` (
  `usid` int(11) NOT NULL AUTO_INCREMENT,
  `privilege` tinyint(1) NOT NULL DEFAULT '2',
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tempass` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `homep` text COLLATE utf8_unicode_ci,
  `biosi` text COLLATE utf8_unicode_ci,
  `ipos` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumbs` varchar(17) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `keysi` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lastime` datetime DEFAULT NULL,
  PRIMARY KEY (`usid`),
  UNIQUE KEY `Email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
$result = $conn->Execute($sql);
if ($result == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result2 = $conn->Execute($sql2);
if ($result2 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result3 = $conn->Execute($sql3);
if ($result3 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result4= $conn->Execute($sql4);

if ($result4 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result5 = $conn->Execute($sql5);

if ($result5 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result6 = $conn->Execute($sql6);
if ($result6 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result7 = $conn->Execute($sql7);
if ($result7 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
$result8 = $conn->Execute($sql8);
if ($result8 == false) {
    print 'error'  . $conn->ErrorMsg() . '<br>';
} else {
    echo '';
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Database tables successfully created. <a href="install3.php"><b>Step 4</b></a>
</div>
  <table width="100%" height="422px"  align="center" border="0">
    <tr>
      <td align="center" valign="bottom"><a href="http://phpenter.net"><font size="1">powered by phpenter.net</font></a></td>
    </tr>
  </table>
</body>
</html>