<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
$id = $_GET['id'];
?>
<div id="vforms">
<div id="cconfig">Edit Category</div>
<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $caty = $_POST['caty'];
    $custom = $_POST['custom'];
    if (get_magic_quotes_gpc()) {
        $caty = stripslashes($caty);
        $custom = stripslashes($custom);
    }
    if (strlen($custom) < 1) {
        echo "Field must be at least 1 characters long: <a href='javascript:history.go(-1)'>Go Back</a>";
        die();
    }
    $custom = htmlspecialchars($custom);
    $helper = preg_replace('/([?,\s+,|,\/,!,",\',:,#,@,$,^,.,%,&,*,(,),[,\,\],\,])/', "-", $caty);
    $sql = $conn->Prepare('UPDATE categori SET name= '.$conn->qstr($caty).', seoname= '.$conn->qstr($helper).', cuscat= '.$conn->qstr($custom).' WHERE catid = '.$conn->qstr($id).'');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    $sql2 = $conn->Prepare('UPDATE newser SET idname= '.$conn->qstr($caty).', seoname= '.$conn->qstr($helper).' WHERE idblog = '.$conn->qstr($id).'');
    if ($conn->Execute($sql2) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("categories.php");
</script>
<?php
} else {
        $br = $conn->Execute('SELECT * FROM categori WHERE catid = '.$conn->qstr($id).'');
        if (!$br) {
            print $conn->ErrorMsg();
        } else {
            while (!$br->EOF) {
                ?>
<form method="post" action="setcat.php?id=<?php echo $id ?>">
Category Name<br />
<input name="caty" value="<?php echo $br->fields['name']; ?>" class="form-control" /><br /><br />
Custom Code: [Optional] - 0 for disabled [HTML is allowed]
<br />
<textarea name="custom"><?php echo $br->fields['cuscat']; ?></textarea><br /><br />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" />
</form><br />
<?php
$br->MoveNext();
            }
        }
    }
?>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>