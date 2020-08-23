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
include('settings.php');
if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
} else {
    die();
}
if ($keypublic == 0) {
    require_once('salt.php');
    require_once('classes/securesession.class.php');
    $ss = new SecSession();
    $ss->check_browser = true;
    $ss->check_ip_blocks = 2;
    $ss->secure_word = $salt;
    $ss->regenerate_id = true;
    if (!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        header('Location: signin.php');
        die();
    }
    if (!$_SESSION['inecsess']) {
        header('Location: signin.php');
        die();
    }
}
?>
<head>
<link rel="stylesheet" href="<?php echo $sitepath; ?>/themes/<?php echo $themes; ?>/styles/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $sitepath; ?>/themes/<?php echo $themes; ?>/styles/font-awesome.css" />
<link rel="stylesheet" href="<?php echo $sitepath; ?>/themes/<?php echo $themes; ?>/styles/basic.css" />
</head>
<body>
<div class="container mt-5">
<div class="row">
<div class="col">
<?php
if ($keypublic == '1' and @$_SESSION['loggedin'] == false) {
    if ((@$_POST['check']) <> @$_SESSION['check']) {
        echo "<div class='ten column'><div class='alert alert-danger'>$lang[134] <a href='$referer#section'>$lang[135]</a></div></div>";
        unset($_SESSION['check']);
        session_destroy();
        die();
    }
}
if (isset($_SESSION['loggedin'])) {
    if (get_magic_quotes_gpc()) {
        $main = stripslashes(htmlspecialchars($_POST['main']));
        $comrev = stripslashes(htmlspecialchars($_POST['comrev']));
        $helper = stripslashes(htmlspecialchars($_POST['helper']));
        $idblog = stripslashes(htmlspecialchars($_POST['idblog']));
        $comment = stripslashes(htmlspecialchars($_POST['comment']));
    } else {
        $main = htmlspecialchars($_POST['main']);
        $comrev = htmlspecialchars($_POST['comrev']);
        $helper = htmlspecialchars($_POST['helper']);
        $idblog = htmlspecialchars($_POST['idblog']);
        $comment = htmlspecialchars($_POST['comment']);
    }
    $shouter = @$_SESSION['INC_USER_ID'];
    $ae = $conn->Execute('SELECT * FROM users WHERE usid = '.$conn->qstr($shouter).' LIMIT 1');
    if (!$ae) {
        print $conn->ErrorMsg();
    } else {
        while (!$ae->EOF) {
            $userid = $ae->fields['usid'];
            $fullname = $ae->fields['fullname'];
            $user = $ae->fields['username'];
            $newimg = $ae->fields['thumbs'];
            $ae->MoveNext();
        }
    }
    if ($fullname == true) {
        $user = $fullname;
    }
} else {
    if (get_magic_quotes_gpc()) {
        $main = stripslashes(htmlspecialchars($_POST['main']));
        $comrev = stripslashes(htmlspecialchars($_POST['comrev']));
        $user = stripslashes(htmlspecialchars($_POST['user']));
        $newimg = stripslashes(htmlspecialchars($_POST['newimg']));
        $userid = stripslashes(htmlspecialchars($_POST['userid']));
        $helper = stripslashes(htmlspecialchars($_POST['helper']));
        $idblog = stripslashes(htmlspecialchars($_POST['idblog']));
        $comment = stripslashes(htmlspecialchars($_POST['comment']));
    } else {
        $main = htmlspecialchars($_POST['main']);
        $comrev = htmlspecialchars($_POST['comrev']);
        $user = htmlspecialchars($_POST['user']);
        $newimg = htmlspecialchars($_POST['newimg']);
        $userid = htmlspecialchars($_POST['userid']);
        $helper = htmlspecialchars($_POST['helper']);
        $idblog = htmlspecialchars($_POST['idblog']);
        $comment = htmlspecialchars($_POST['comment']);
    }
}
$subtext = substr($comment, 0, 8);
if (@$_SESSION["reloadse"] == $subtext) {
    echo "<div class='ten column'><div class='alert alert-danger'>$lang[136]&nbsp;<a href='$referer#section'>$lang[135]</a></div></div>";
    unset($_SESSION['check']);
    session_destroy();
    die();
}
if (strlen($user) < 3) {
    echo "<div class='ten column'><div class='alert alert-danger'>$lang[137]&nbsp;<a href='$referer#section'>$lang[135]</a></div></div>";
    unset($_SESSION['check']);
    session_destroy();
    die();
}
if (strlen($user) > 30) {
    echo "<div class='ten column'><div class='alert alert-danger'>$lang[137]&nbsp;<a href='$referer#section'>$lang[135]</a></div></div>";
    unset($_SESSION['check']);
    session_destroy();
    die();
}
if (strlen($comment) < 10) {
    echo "<div class='ten column'><div class='alert alert-danger'>$lang[138]&nbsp;<a href='$referer#section'>$lang[135]</a></div></div>";
    unset($_SESSION['check']);
    session_destroy();
    die();
}
if (strlen($comment) > 50000) {
    echo "<div class='ten column'><div class='alert alert-danger'>$lang[138]&nbsp;<a href=\"$referer#section\">$lang[135]</a></div></div>";
    unset($_SESSION['check']);
    session_destroy();
    die();
}
if ($comrev == false) {
    echo "<div class='ten column'><div class='alert alert-danger'>$lang[139]&nbsp;<a href=\"$referer#section\">$lang[135]</a></div></div>";
    unset($_SESSION['check']);
    session_destroy();
    die();
}
if ($keypublic == 0) {
    $list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
    if (preg_match($list, $comment)) {
        echo "<div class='ten column'><div class='alert alert-danger'>$lang[140]&nbsp;<a href=\"$referer#section\">$lang[135]</a></div></div>";
        unset($_SESSION['check']);
        session_destroy();
        die();
    }
}
if ($keypublic == 1 and @$_SESSION['loggedin'] == false) {
    $list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
    if (preg_match($list, $comment)) {
        echo "<div class='ten column'><div class='alert alert-danger'>$lang[140]&nbsp;<a href=\"$referer#section\">$lang[135]</a></div></div>";
        unset($_SESSION['check']);
        session_destroy();
        die();
    }
}
if ($keypublic == 0) {
    $sql2 = $conn->Prepare('INSERT INTO reviews (
comrev,
comain,
user,
userid,
userpic,
newscat,
newsurl,
comment
) VALUES (
'.$conn->qstr($comrev).',
'.$conn->qstr('1').',
'.$conn->qstr($user).',
'.$conn->qstr($userid).',
'.$conn->qstr($newimg).',
'.$conn->qstr($idblog).',
'.$conn->qstr($helper).',
'.$conn->qstr($comment).'
)');
    if ($conn->Execute($sql2) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
    $sql3 = $conn->Prepare('UPDATE newser SET commno = commno +  '.$conn->qstr('1').' WHERE univer = '.$conn->qstr($comrev).'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
}
if ($keypublic == 1 and @$_SESSION['loggedin'] == false) {
    $sql2 = $conn->Prepare('INSERT INTO reviews (
comrev,
comain,
user,
userid,
userpic,
newscat,
newsurl,
comment
) VALUES (
'.$conn->qstr($comrev).',
'.$conn->qstr('1').',
'.$conn->qstr($user).',
'.$conn->qstr('0').',
'.$conn->qstr('0').',
'.$conn->qstr($idblog).',
'.$conn->qstr($helper).',
'.$conn->qstr($comment).'
)');
    if ($conn->Execute($sql2) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
    $sql3 = $conn->Prepare('UPDATE newser SET commno = commno +  '.$conn->qstr('1').' WHERE univer = '.$conn->qstr($comrev).'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
}
if ($keypublic == 1 and @$_SESSION['loggedin'] == true) {
    $sql2 = $conn->Prepare('INSERT INTO reviews (
comrev,
comain,
user,
userid,
userpic,
newscat,
newsurl,
comment
) VALUES (
'.$conn->qstr($comrev).',
'.$conn->qstr('1').',
'.$conn->qstr($user).',
'.$conn->qstr($userid).',
'.$conn->qstr($newimg).',
'.$conn->qstr($idblog).',
'.$conn->qstr($helper).',
'.$conn->qstr($comment).'
)');
    if ($conn->Execute($sql2) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
    $sql3 = $conn->Prepare('UPDATE newser SET commno = commno +  '.$conn->qstr('1').' WHERE univer = '.$conn->qstr($comrev).'');
    if ($conn->Execute($sql3) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
}
@$_SESSION["reloadse"] = $subtext;
unset($_SESSION['check']);
$conn->Close();
$asty = $_SERVER['HTTP_REFERER'];
?>
<script>
setTimeout(function(){
<?php if ($asty == true) { ?>
window.location.replace("<?php echo $asty; ?>");
<?php } else { ?>
window.location.replace("<?php echo $sitepath; ?>");
<?php } ?>
}, 500);
</script>
<div class="text-center">
<div class="fa-3x">
<i class="fa fa-spinner fa-pulse"></i>
</div>
<div>
<?php echo $lang['141']; ?>
</div>
</div>
</div>
</div>
</div>
</body>
<?php
######################################
##comment.php                   BETA##
######################################
?>