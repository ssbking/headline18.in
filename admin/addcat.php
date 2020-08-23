<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include('header.php');
?>
<div id="vforms">
<div id="cconfig">New Category</div>
<?php
if (isset($_POST['submit'])) {
    $parent = $_POST['parent'];
    $name = $_POST['name'];
    if (strlen($name) < 2) {
        echo "Field must be at least 2 characters long: <a href='javascript:history.go(-1)'>Go Back</a>";
        die();
    }
    $helper = preg_replace('/([?,\s+,|,\/,!,",\',:,#,@,$,^,.,%,&,*,(,),[,\,\],\,])/', "-", $name);
    $sql = $conn->Prepare('INSERT INTO categori (parent, cord, name, seoname, cuscat) VALUES ('.$conn->qstr($parent).','.$conn->qstr('0').','.$conn->qstr($name).','.$conn->qstr($helper).','.$conn->qstr('0').')');
    if ($conn->Execute($sql) === false) {
        print '<div class="error">'.$conn->ErrorMsg().'</div>';
    }
    echo "<div class ='info'>Changes Saved Successfully</div>"; ?>
<script>
window.location.replace("addcat.php");
</script>
<?php
} else {
        $brecordSet = $conn->Execute('SELECT MAX(catid) FROM `categori`');
        $rs = $brecordSet->fetchRow();
        $lastitem = $rs['MAX(catid)'] + 1; ?>
<form method="post" action="addcat.php">
Category Name:<br /><input name="name" class="form-control" /><br /><br />
<input type="hidden" name="parent" value="<?php echo $lastitem ?>" /><br />
<input type="Submit" class="topicbuton" name="submit" value=" Submit" />
</form>
<?php
    } ?>
</div>
<?php
include('footer.php');
$conn->Close();
/**************************************
* Revision: v.beta
***************************************/
?>