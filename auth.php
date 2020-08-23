<?php session_start();
/**********************************************************************
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
************************************************************************/
include('settings.php');
$ac = $conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if (!$ac) {
    print $conn->ErrorMsg();
} else {
    while (!$ac->EOF) {
        if ($ac->fields['cord'] == 0) {
            $categori[] = $ac->fields;
        } else {
            $subcat[] = $ac->fields;
        }
        $ac->MoveNext();
    }
}
$smarty->assign('categori', @$categori);
$smarty->assign('subcat', @$subcat);
$smarty->display('blank.php');
echo '<div>';
echo '<div>';
$id = htmlspecialchars((int)@$_GET['auth']);
if ($id == false) {
    echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
    $smarty->display('footer.php');
    die();
}
if ($id > '7') {
    echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
    $smarty->display('footer.php');
    die();
}
if ($id == '1') {
    ?>
<div class="container minheight mt-3">
<?php
 if (@$_SESSION['INC_USER_ID'] == true) {
     echo "<div class='alert alert-danger'>".$lang['142']."</div></div>";
     $smarty->display('footer.php');
     die();
 }
    if (isset($_POST['Submit'])) {
        if ($stopspam == 2) {
            if (strlen($_POST['check']) < 4) {
                echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (strlen($_SESSION['check']) < 4) {
                echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if ((@$_POST['check']) <> @$_SESSION['check']) {
                if (!isset($_SESSION['check'])) {
                    echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                if (!isset($_POST['check'])) {
                    echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                echo "<div class='alert alert-danger'>".$lang['134']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
        if (get_magic_quotes_gpc()) {
            $ccemail = stripslashes(htmlspecialchars($_POST['email']));
        } else {
            $ccemail = htmlspecialchars($_POST['email']);
        }
        if (!filter_var($ccemail, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger'>".$lang['143']."</div></div>";
            unset($_SESSION['check']);
            session_destroy();
            $smarty->display('footer.php');
            die();
        }
        $ad = $conn->Execute('SELECT * FROM users where email = '.$conn->qstr($ccemail).' LIMIT 1');
        if ($ad) {
            if ($ad->fields > 0) {
                while (!$ad->EOF) {
                    $usid = $ad->fields['usid'];
                    $username = $ad->fields['username'];
                    $password = $ad->fields['password'];
                    $email = $ad->fields['email'];
                    $tips = 'YjuPKnBfghfEeNqAuL';
                    $cchash = sha1(uniqid($tips.mt_rand(), true));
                    $sql = $conn->Prepare('UPDATE users SET tempass = '.$conn->qstr($cchash).' WHERE usid = '.$conn->qstr($usid).'');
                    if ($conn->Execute($sql) === false) {
                        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
                    }
                    $myurl = $sitepath."/auth.php?pub=".$cchash."&amp;auth=2";
                    $headers = 'MIME-Version: 1.0'."\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
                    $headers .= "From: $sitetitle <$sitemail>"."\r\n";
                    $bodys = "<div><h4>$sitetitle</h4>$lang[144] '$username',<br />$lang[145]<br /><br /><a href='$myurl'>$myurl</a><br /><br />$lang[146], $sitetitle $lang[147]";
                    $subject = "$sitetitle";
                    mail($email, $subject, $bodys, $headers);
                    echo "<div class='alert alert-success'>$lang[148]</div>";
                    $ad->MoveNext();
                    if ($stopspam == 2) {
                        unset($_SESSION['check']);
                        session_destroy();
                    }
                }
            } else {
                echo "<div class='alert alert-danger'>$lang[149]</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
    } else {
        $random = rand(100, 800); ?>
<form action="auth.php?auth=1" method="post">
<div class="row mt-5">
<div class="col-md-12">
<h4><?php echo $lang['151']; ?></h4>
</div>
</div>
<div class="row">
<div class="col-md-12">
<?php echo $lang['150']; ?>
</div>
</div>
<div class="row mt-2">
<div class="col-md-5">
<label><?php echo $lang['152']; ?></label>
<input class="form-control" name="email" type="text" data-validation="email" />
</div>
<?php if ($stopspam == 2) { ?>
<div class="col-md-1 mt-4 text-center">
<img src="includes/captcha.php?<?php echo $random; ?>" class="mt-3" width="75" height="28" alt="Captcha" />
</div>
<div class="col-md-3">
<label><?php echo $lang['173']; ?></label>
<input class="form-control" name="check" type="text" autocomplete="off" data-validation="length" data-validation-length="4-4" />
</div>
<?php } ?>
<div class="col-md-2 mt-3">
<div><input class="btn btn-danger mt-3" type="submit" value="<?php echo $lang['151']; ?>" name="Submit"></div>
</div>
</div>
</form>
<?php
    } ?>
</div>
<?php
}
if ($id == '2') {
    ?>
<div class="container minheight mt-3">
<?php
 if (@$_SESSION['INC_USER_ID'] == true) {
     echo "<div class='alert alert-danger'>".$lang['142']."</div></div>";
     $smarty->display('footer.php');
     die();
 }
    if (!isset($_SESSION['chechinc'])) {
        $_SESSION['chechinc'] = 0;
    }
    $_SESSION['chechinc'] = $_SESSION['chechinc'] + 1;
    if ($_SESSION['chechinc'] > 3) {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    if (get_magic_quotes_gpc()) {
        $pub = stripslashes(htmlspecialchars(@$_GET['pub']));
    } else {
        $pub = htmlspecialchars(@$_GET['pub']);
    }
    if ($pub == false) {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    if (!preg_match("/[A-Za-z0-9]+/", $pub) == true) {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    $ae = $conn->Execute('SELECT * FROM users WHERE tempass = '.$conn->qstr($pub).' LIMIT 1');
    if ($ae) {
        if ($ae->fields > 0) {
            $usid = $ae->fields['usid'];
            $username = $ae->fields['username'];
            $password = $ae->fields['password'];
            $email = $ae->fields['email'];
        }
    } else {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    if (@$usid == false) {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    $tips = 'JvKnrQWPsThuJteNQAuH';
    $cchash = sha1(uniqid($tips.mt_rand(), true));
    $cchash = substr($cchash, 0, 8);
    $hashe = md5($cchash);
    $sql = $conn->Prepare('UPDATE users SET password = '.$conn->qstr($hashe).' WHERE usid = '.$conn->qstr($usid).'');
    if ($conn->Execute($sql) === false) {
        print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
    }
    if ($conn->affected_rows() == true) {
        $myurl = $sitepath."/link.php";
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $headers .= "From: $sitetitle <$sitemail>"."\r\n";
        $bodys = "<div><h4>$sitetitle</h4>$lang[144] '$username',<br />$lang[153]<br /><br /><strong>$cchash</strong><br /><br /><a href='$myurl'>$myurl</a><br /><br />$lang[146], $sitetitle $lang[147]</div>";
        $subject = "$lang[154] $sitetitle";
        mail($email, $subject, $bodys, $headers); ?>
<div class="alert alert-success">
<?php echo $lang['155']; ?>
</div>
<?php
    } else {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    } ?>
</div>
<?php
}
if ($id == '3') {
    ?>
<div class="container minheight mt-3">
<?php
 if (@$_SESSION['INC_USER_ID'] == true) {
     echo "<div class='alert alert-danger'>".$lang['142']."</div></div>";
     $smarty->display('footer.php');
     die();
 }
    if (get_magic_quotes_gpc()) {
        $pub = stripslashes(htmlspecialchars($_GET['pub']));
    } else {
        $pub = htmlspecialchars($_GET['pub']);
    }
    if ($pub == false) {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    if (!preg_match("/[A-Za-z0-9]+/", $pub) == true) {
        echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
        $smarty->display('footer.php');
        die();
    }
    $ag = $conn->Execute('SELECT * FROM users WHERE keysi = '.$conn->qstr($pub).' && active = '.$conn->qstr('0').' LIMIT 1');
    if ($ag) {
        if ($ag->fields == 0) {
            echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
            $smarty->display('footer.php');
            die();
        }
    }
    if ($signupapp == 2) {
        $sql = $conn->Prepare('UPDATE users SET active = '.$conn->qstr('1').' WHERE active = '.$conn->qstr('0').' and keysi = '.$conn->qstr($pub).' LIMIT 1');
        if ($conn->Execute($sql) === false) {
            print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
        }
        if ($conn->affected_rows() == 0) {
            echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
            $smarty->display('footer.php');
            die();
        } else {
            echo "<div class='alert alert-success'>$lang[159] $sitetitle <a href='$sitepath/link.php'>$lang[160]</a></div></div>";
            $smarty->display('footer.php');
            die();
        }
    }
    if ($signupapp == 1) {
        $sql = $conn->Prepare('UPDATE users SET active = '.$conn->qstr('3').' WHERE active = '.$conn->qstr('0').' and keysi = '.$conn->qstr($pub).' LIMIT 1');
        if ($conn->Execute($sql) === false) {
            print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
        }
        if ($conn->affected_rows() == 0) {
            echo "<div class='alert alert-danger'>".$lang['139']."</div></div>";
            $smarty->display('footer.php');
            die();
        } else {
            echo "<div class='info'>$lang[157] $sitetitle. $lang[158]</div></div>";
            $smarty->display('footer.php');
            die();
        }
    } ?>
</div>
<?php
}
if ($id == '4') {
    ?>
<div class="container minheight mt-3">
<?php
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
    unset($_SESSION['jumps']);
    session_unset();
    session_destroy();
    $_SESSION = array(); ?>
<script>
setTimeout(function(){
window.location.replace("<?php echo $sitepath; ?>");
}, 500);
</script>
<div class="text-center">
<div class="fa-3x">
  <i class="fa fa-spinner fa-pulse"></i>
</div>
<div>
<?php echo $lang['156']; ?>
</div>
</div>
</div>
<?php
}
if ($id == '5') {
    ?>
<div class="container minheight mt-3">
<?php
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
    if (isset($_POST['Submit'])) {
        if (get_magic_quotes_gpc()) {
            $ccuser = stripslashes($_POST['username']);
            $ccpass = stripslashes($_POST['password']);
            $return = stripslashes($_POST['return']);
        } else {
            $ccuser = $_POST['username'];
            $ccpass = $_POST['password'];
            $return = $_POST['return'];
        }
        $name = array($ccuser,$ccpass);
        if ($stopspam == 2) {
            if (strlen($_POST['check']) < 4) {
                echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (strlen($_SESSION['check']) < 4) {
                echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if ((@$_POST['check']) <> @$_SESSION['check']) {
                if (!isset($_SESSION['check'])) {
                    echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                if (!isset($_POST['check'])) {
                    echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                echo "<div class='alert alert-danger'>".$lang['134']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
        $list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload|script)/i";
        foreach ($name as $name) {
            if (strlen($name) < 5) {
                echo "<div class='alert alert-danger'>$lang[198]</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (strlen($name) > 30) {
                echo "<div class='alert alert-danger'>$lang[198]</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (preg_match($list, $name)) {
                echo "<div class='alert alert-danger'>$lang[140]</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
        if (preg_match($list, $return)) {
            echo "<div class='alert alert-danger'>$lang[140]</div></div>";
            unset($_SESSION['check']);
            session_destroy();
            $smarty->display('footer.php');
            die();
        }
        if (preg_match("/</", $return)) {
            $return = '';
        }
        if (preg_match("/>/", $return)) {
            $return = '';
        }
        if (!filter_var($ccuser, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger'>$lang[203]</div></div>";
            unset($_SESSION['check']);
            session_destroy();
            $smarty->display('footer.php');
            die();
        }
        $ccpass = md5($_POST['password']);
        $ah = $conn->Execute('SELECT * FROM users WHERE email = ? and password = ? LIMIT 1', array($ccuser,$ccpass));
        if ($ah) {
            if ($ah->fields == 0) {
                echo "<div class='alert alert-danger'>$lang[203] <a href='auth.php?auth=5'>$lang[135]</a></div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            } else {
                $sesrow = $ah->fields['active'];
                if ($sesrow == 0) {
                    echo "<div class='alert alert-danger'>$lang[204]</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                if ($sesrow == 3) {
                    echo "<div class='alert alert-danger'>$lang[205]</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                require_once('salt.php');
                require_once('classes/securesession.class.php');
                $ss = new SecSession();
                $ss->check_browser = true;
                $ss->check_ip_blocks = 2;
                $ss->secure_word = $salt;
                $ss->regenerate_id = true;
                $ss->Open();
                $_SESSION['INC_USER_ID'] = $ah->fields['usid'];
                $_SESSION['INC_USER_NAME'] = $ah->fields['username'];
                $_SESSION['INC_USER_THUMB'] = $ah->fields['thumbs'];
                $_SESSION['INC_USER_PRIV'] = $ah->fields['privilege'];
                $_SESSION['loggedin'] = true;
                $incsess = md5(uniqid(rand(), true));
                $_SESSION['inecsess'] = $incsess;
                session_write_close();
                $incuser = $ah->fields['usid'];
                $ah->MoveNext();
            } ?>
<script>
setTimeout(function(){
window.location.replace("<?php if ($return == false) { ?><?php echo $sitepath; ?><?php } else { ?>//<?php echo $return; ?><?php } ?>");
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
<?php
        }
    } else {
        $random = rand(100, 800);
        if (isset($_GET['return'])) {
            $return = htmlspecialchars($_GET['return']);
        } else {
            $return = '';
        }
        $list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload|script)/i";
        if (preg_match($list, $return)) {
            echo "<div class='alert alert-danger'>$lang[140]</div></div>";
            $smarty->display('footer.php');
            die();
        } ?>
<form action="auth.php?auth=5" name="ccform" method="post">
<input name="return" value="<?php echo $return; ?>" type="hidden" />
<div class="row mt-5">
<div class="col-md-12">
<h4><?php echo $lang['201'] ?></h4>
</div>
</div>
<div class="row">
<div class="col-md-12">
<?php echo $lang['202'] ?>
</div>
</div>
<div class="row mt-2">
<div class="col-md-4">
<label><?php echo $lang['152'] ?></label>
<input name="username" class="form-control" type="email" data-validation="email" data-validation-length="5-80" />
</div>
<div class="col-md-4">
<label><?php echo $lang['207'] ?></label>
<input name="password" class="form-control" type="password" data-validation="length" data-validation-length="5-30" />
</div>
<?php if ($stopspam == 2) { ?>
<div class="col-md-1 mt-3 text-center">
<img src="includes/captcha.php?<?php echo $random; ?>" class="mt-3" width="75" height="28" alt="Captcha" />
</div>
<div class="col-md-3">
<label><?php echo $lang['173']; ?></label>
<input class="form-control" name="check" type="text" autocomplete="off" data-validation="length" data-validation-length="4-4" />
</div>
<?php } ?>
</div>
<div class="row mt-5">
<div class="col-md-2">
<input class="btn btn-danger" type="submit" value="<?php echo $lang['130'] ?>" name="Submit" />
</div>
<div class="col-md-3">
<?php echo $lang['199']; ?>
</div>
<div class="col-md-7">
<?php echo $lang['200']; ?><br />
</div> 
</div> 
</form>
<?php
    } ?>
</div>
<?php
}
?>
<?php
if ($id == '6') {
    ?>
<div class="container minheight mt-3">
<?php
 require_once('salt.php');
    require_once('classes/securesession.class.php');
    enterLogin($salt);
    if (!@$_SESSION['inecsess']) {
        echo "<div class='alert alert-danger'>$lang[176]</div></div>";
        $smarty->display('footer.php');
        die();
    } ?>
<div class="row mt-5">
<div class="col-md-12">
<h4><?php echo $lang['183'] ?></h4>
</div>
</div>
<div class="row mt-1 mb-3">
<div class="col-md-12">
<a href="post.php" class="btn btn-danger"><?php echo $lang['220']; ?></a>
</div>
</div>
<form action="post.php" method="post">
<div class="row mt-4">
<div class="col-md-12">
<label><?php echo $lang['221']; ?></label>
<input type="text" name="incname" class="form-control" placeholder="http://" data-validation="url" />
</div>
</div>
<div class="row mt-1">
<div class="col-md-12">
<input class="btn btn-danger mt-3" type="submit" value="<?php echo $lang['221']; ?>" name="Submit">
</div>
</div>
</form>
</div>
<?php
}
if ($id == '7') {
    ?>
<div class="container minheight mt-3">
<?php
if (isset($_POST['Submit'])) {
        if ($stopspam == 2) {
            if (strlen($_POST['check']) < 4) {
                echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (strlen($_SESSION['check']) < 4) {
                echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if ((@$_POST['check']) <> @$_SESSION['check']) {
                if (!isset($_SESSION['check'])) {
                    echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                if (!isset($_POST['check'])) {
                    echo "<div class='alert alert-danger'>".$lang['174']."</div></div>";
                    unset($_SESSION['check']);
                    session_destroy();
                    $smarty->display('footer.php');
                    die();
                }
                echo "<div class='alert alert-danger'>".$lang['134']."</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
        $privilege = $_POST['privilege'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $ipse = $_SERVER['REMOTE_ADDR'];
        $tipser = 'JvKnrQWPsThuJteNQAuH';
        $keys = sha1(uniqid($tipser.mt_rand(), true));
        $keys = substr($keys, 0, 35);
        if (get_magic_quotes_gpc()) {
            $privilege = stripslashes($privilege);
            $username = stripslashes($username);
            $password = stripslashes($password);
            $email = stripslashes($email);
            $keys = stripslashes($keys);
        }
        $list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload|script)/i";
        $name = array($username,$password,$email);
        foreach ($name as $name) {
            if (preg_match("/\\s/", $name)) {
                echo "<div class='alert alert-danger'>$lang[289] <a href='auth.php?auth=7'>$lang[135]</a></div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (preg_match($list, $name)) {
                echo "<div class='alert alert-danger'>$lang[140] <a href='auth.php?auth=7'>$lang[135]</a></div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (preg_match("/</", $name)) {
                echo "<div class='alert alert-danger'>$lang[140] '<' <a href='auth.php?auth=7'>$lang[135]</a></div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (strlen($name) < 5) {
                echo "<div class='alert alert-danger'>$lang[198] <a href='auth.php?auth=7'>$lang[135]</a></div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
            if (strlen($name) > 30) {
                echo "<div class='alert alert-danger'>$lang[198] <a href='auth.php?auth=7'>$lang[135]</a></div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
        if (strlen($email) < 5) {
            echo "<div class='alert alert-danger'>$lang[213] <a href='auth.php?auth=7'>$lang[135] </a></div></div>";
            unset($_SESSION['check']);
            session_destroy();
            $smarty->display('footer.php');
            die();
        }
        if (strlen($email) > 50) {
            echo "<div class='alert alert-danger'>$lang[213] <a href='auth.php?auth=7'>$lang[135] </a></div></div>";
            unset($_SESSION['check']);
            session_destroy();
            $smarty->display('footer.php');
            die();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger'>$lang[203]</div></div>";
            unset($_SESSION['check']);
            session_destroy();
            $smarty->display('footer.php');
            die();
        }
        $an = $conn->Execute('SELECT email FROM users WHERE email = '.$conn->qstr($email).'');
        if ($an) {
            if ($an->fields > 0) {
                echo "<div class='alert alert-danger'>$lang[214]</div></div>";
                unset($_SESSION['check']);
                session_destroy();
                $smarty->display('footer.php');
                die();
            }
        }
        $sql = $conn->Prepare('INSERT INTO users (
privilege,
username,
password,
email,
ipos,
thumbs,
keysi
) VALUES (
'.$conn->qstr($privilege).',
'.$conn->qstr($username).',
'.$conn->qstr(md5($password)).',
'.$conn->qstr($email).',
'.$conn->qstr($ipse).',
'.$conn->qstr('0').',
'.$conn->qstr($keys).'
)');
        if ($conn->Execute($sql) === false) {
            print '<div class="alert alert-danger">'.$conn->ErrorMsg().'</div>';
        }
        $myurl = $sitepath."/auth.php";
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $headers .= "From: $sitetitle <$sitemail>"."\r\n";
        $bodys = "<div><h4>$sitetitle</h4></div><div>$lang[144] $username, $lang[217]</div><br /><br /><div><a href='$myurl?pub=$keys&amp;auth=3'>$myurl?pub=$keys&amp;auth=3</a></div><br /><br /><div>$lang[146], $sitetitle $lang[147]</div>";
        $subject = "$lang[216] $sitetitle";
        mail($email, $subject, $bodys, $headers);
        $adminsubject = $sitetitle." - $username $lang[219]";
        $adminbody = "<div><h4>$sitetitle</h4></div><div>$lang[218]</div><br /><br /><div>$username $lang[219]</div><br /><br /><div><a href='$sitepath'>$sitetitle</a></div>";
        if ($messaging == '1') {
            mail($sitemail, $adminsubject, $adminbody, $headers);
        }
        echo "<div class='alert alert-success'>$lang[215]</div>";
        unset($_SESSION['check']);
        session_destroy();
    } else {
        $random = rand(100, 800); ?>
<form action="auth.php?auth=7" id="inrform" method="post">
<input type="hidden" name="privilege" value="<?php echo $signuprole ?>">
<div class="row mt-5">
<div class="col-md-12">
<h4><?php echo $lang['211'] ?></h4>
</div>
</div>
<div class="row">
<div class="col-md-4">
<label><?php echo $lang['206'] ?></label>
<input name="username" class="form-control" type="text" data-validation="length" data-validation-length="5-30" />
</div>
<div class="col-md-4">
<label><?php echo $lang['207'] ?></label>
<input name="password" class="form-control" type="password" data-validation="length" data-validation-length="5-30" />
</div>
<div class="col-md-4">
<label><?php echo $lang['152'] ?></label>
<input name="email" class="form-control" type="text" />
</div>
</div>
<div class="row mt-3">
<?php if ($stopspam == 2) { ?>
<div class="col-md-1 mt-3 text-center">
<img src="includes/captcha.php?<?php echo $random; ?>" class="mt-3" width="75" height="28" alt="Captcha" />
</div>
<div class="col-md-3">
<label><?php echo $lang['173']; ?></label>
<input class="form-control" name="check" type="text" autocomplete="off" data-validation="length" data-validation-length="4-4" />
</div>
<?php } ?>
<div class="col-md-2 mt-3">
<input class="btn btn-danger mt-3" type="submit" value="<?php echo $lang['211']; ?>" name="Submit">
</div>
</div>
</form>
<?php
    } ?>
</div>
<?php
} ?>
</div>
</div>
<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script>
$(function(){
$('#coolMenu').find('> li').hover(function(){
$(this).find('ul')
.removeClass('noJS')
.stop(true, true).toggle('fast');
});
});
</script>
<script src="<?php echo $sitepath; ?>/scripts/jquery.form-validator.min.js"></script>
<script>
  $.validate();
</script>
<?php
$smarty->display('footer.php');
$conn->Close();
######################################
##auth.php                      BETA##
######################################
?>