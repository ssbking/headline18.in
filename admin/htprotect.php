<?php include('header.php');
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
?>
<div id="vforms">
<div id="cconfig">Htpasswd Password</div>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = array($username,$password);
    foreach ($name as $name) {
        if (strlen($name) < 4) {
            echo "<div class='column errors'>Field must be at least 4 characters long: <a href='htprotect.php'>Go Back</a></div>";
            die();
        }
    }
    $dir = dirname(__file__);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $string = $username . ":" . $password;
    @touch(".htaccess");
    chmod(".htaccess", 0666);
    $fhandle = fopen(".htaccess", "wb");
    fwrite($fhandle, "AuthUserFile " . $dir . "/.htpasswd\n");
    fwrite($fhandle, "AuthName \"Please Login\"\n");
    fwrite($fhandle, "AuthType Basic\n");
    fwrite($fhandle, "require valid-user\n");
    fclose($fhandle);
    chmod(".htaccess", 0444);
    @touch(".htpasswd");
    chmod(".htpasswd", 0666);
    $fhandle = fopen(".htpasswd", "wb");
    fwrite($fhandle, $string);
    fclose($fhandle);
    chmod(".htpasswd", 0444);
    echo "<div class='alert alert-success'>Changes Saved Successfully</div>";
} else {
    ?>
<form action="htprotect.php" method="POST">
Username:<br>
<input name="username" type="text" class="form-control" /><br><br>
Password:<br>
<input name="password" type="text" class="form-control" /><br><br>
<input type="submit" class="topicbuton" name="submit" value="Submit">
</form>
<?php
} ?>
</div>
<?php
include('footer.php');
/**************************************
* Revision: v.beta
***************************************/
?>