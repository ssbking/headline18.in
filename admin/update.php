<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Update -> 5.3.</div>
<?php 
$query = ("INSERT IGNORE INTO `abcoption` (`optionid`, `nameopt`, `valueopt`, `module`, `active`) VALUES
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
(51, 'fromail', 'admin@example.com', 0, 0);");
$result = $conn->Execute($query);


$query1 = ("SHOW COLUMNS FROM `newser` LIKE 'except'");
$result1 = $conn->Execute($query1);
if ($conn->affected_rows() !== 0) {
$query2 = ("ALTER TABLE `newser` CHANGE `except` `shortdesc` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;");
$result2 = $conn->Execute($query2);
}


$query3 = ("SHOW INDEX FROM users WHERE KEY_NAME = 'Username';");
$result3 = $conn->Execute($query3);
if ($conn->affected_rows() !== 0) {
$query4 = ("ALTER TABLE `users` DROP INDEX `Username`;");
$result4 = $conn->Execute($query4);
}


echo "<div class ='info'>All done!</div>";
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.5.3.
***************************************/
?>