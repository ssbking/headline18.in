<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php'); ?>
<div id="vforms">
<div id="cconfig">Pages</div>
<?php if (isset($_POST['query'])) {
    $adminuser = $_POST['adminuser'];
    $oldpass = $_POST['oldpass'];
    $password = $_POST['password'];
    if (get_magic_quotes_gpc()) {
        $adminuser = stripslashes($_POST['adminuser']);
        $oldpass = stripslashes($_POST['oldpass']);
        $password = stripslashes($password);
    }
    $name = array($adminuser,$oldpass,$password);
    foreach ($name as $name) {
        if (preg_match("/;/", $name)) {
            echo "Invalid Characters.";
            die();
        }
        if (preg_match("/</", $name)) {
            echo "Invalid Characters.";
            die();
        }
        if (preg_match("/\\[/", $name)) {
            echo "Invalid Characters.";
            die();
        }
    }
    if (strlen($name) < 5) {
        echo "Invalid Characters.";
        die();
    }
    if (strlen($name) > 80) {
        echo "Invalid Characters.";
        die();
    }
    if (preg_match("/ /", $oldpass)) {
        echo "Invalid Characters.";
        die();
    }
    if (preg_match("/ /", $password)) {
        echo "Invalid Characters.";
        die();
    }
    $coldpass = md5($_POST['oldpass']);
    $brecordSet = $conn->Execute('SELECT * FROM cpadmin WHERE apassword = '.$conn->qstr($coldpass).'');
    if ($brecordSet) {
        if ($brecordSet->fields == 0) {
            echo "Sorry, user you are looking for does not exist.";
            $brecordSet->Close();
            $conn->Close();
            die();
        }
    }
    $sql = $conn->Prepare('UPDATE cpadmin SET ausername = '.$conn->qstr($adminuser).', apassword = '.$conn->qstr(md5($password)).' WHERE ausid = '.$conn->qstr('1').'');
    if ($conn->Execute($sql) === false) {
        print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
    } else {
        echo "<div id ='information'>&nbsp;Successfully. <a href='signin.php'>Please log-in again.</a></div>";
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
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
} else { ?>
<form name="maForm" action="incadmin.php" method="post">
Change Username & Password:<br /><br />
Username:<br />
<input name="adminuser" class="form-control" type="text"><br /><br />
Old Password:<br />
<input name="oldpass" class="form-control" type="password"><br /><br />
New Password:<br />
<input name="password" class="form-control" type="password"><br /><br />
<input class="topicbuton" type="submit" value="Submit" name="query" ></div>
</form>
<?php } ?>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>