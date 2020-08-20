<?php
if (!defined('CONST_VALS')) {
    die('You cannot access this file directly!');
}
if ($editor == '1') {
    ?>
<script src="scripts/ckeditor/ckeditor.js"></script>
<script src="scripts/ckeditor/config.js"></script>
<?php
} ?>
<form action="edit.php" id="incformer" enctype="multipart/form-data" method="post">
<input type="hidden" name="newsid" value="<?php echo $newsid; ?>" />
<input type="hidden" name="univer" value="<?php echo $univer; ?>" />
<input type="hidden" name="curcat" value = "<?php echo $idblog; ?>" />
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<div class="row mt-3">
<div class="col-md-12">
<h4><?php echo $lang['234']; ?></h4>
</div>
</div>
<div class="row mt-2">
<div class="col-md-6">
<label><?php echo $lang['224']; ?></label>
<input type="text" class="form-control" name="title" value="<?php echo $title; ?>" data-validation="length" data-validation-length="5-160" />
</div>
<div class="col-md-6">
<label><?php echo $lang['225']; ?></label>
<?php
$result = "SELECT * FROM categori ORDER by parent, catid ASC";
$an = $conn->Execute($result);
echo "<select name='idblog' class='form-control'>";
if (!$an) {
    print $conn->ErrorMsg();
} else {
    while (!$an->EOF) {
        if ($an->fields['catid'] == $idblog) {
            echo "<option value='".$an->fields['catid']."|".$an->fields['name']."|".$an->fields['seoname']."' selected> ".$an->fields['name']." </option>";
        } else {
            if ($an->fields['cord'] == 0) {
                echo "<option value='".$an->fields['catid']."|".$an->fields['name']."|".$an->fields['seoname']."'> ".$an->fields['name']." </option>";
            } else {
                echo "<option value='".$an->fields['catid']."|".$an->fields['name']."|".$an->fields['seoname']."'> - - ".$an->fields['name']." </option>";
            }
        }
        $an->MoveNext();
    }
}
echo '</select>';
?>
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<label><?php echo $lang['226']; ?></label>
<input type="text" name="brief" class="form-control" value="<?php echo $brief; ?>" data-validation="length" data-validation-length="max500" data-validation-optional="true" />
</div>
</div>
<div class="row mt-3">
<div class="col-md-4">
<div>
<div class="custom-file">
<input type="file" id="file" name="image" class="custom-file-input" />
<label class="custom-file-label" for="customFile"><?php echo $lang['227']; ?></label>
</div>
</div>
<div>
<div class="frb frb-primary mt-2">
<input type="checkbox" id="radio-button-1" name="myoption" value="1"  />
<label for="radio-button-1">
<span class="frb-description"><?php echo $lang['243']; ?></span>
</label>
</div>
</div>
</div>
<div class="col-md-2">
<?php if ($image == true) { ?>
<img width="184" height="112" src="<?php echo 'minthumb/'.$image; ?>">
<?php } ?>
</div>
<div class="col-md-6">
<?php if ($main == 0) { ?>
<div class="frb frb-primary">
<div class="row">					
<div class="col-md-6">
<input type="radio" id="radio-button-2" name="main" value="0" checked />
<label for="radio-button-2">
<span class="frb-description"><?php echo $lang['233']; ?></span>
</label>
</div>
<div class="col-md-6">		
<input type="radio" id="radio-button-3" name="main" value="4" />
<label for="radio-button-3">
<span class="frb-description"><?php echo $lang['229']; ?></span>
</label>
</div>
</div>
</div>
<?php }
if ($main == 4) { ?>
<div class="frb frb-primary">
<div class="row">
<div class="col-md-6">
<input type="radio" id="radio-button-2" name="main" value="0" />
<label for="radio-button-2">
<span class="frb-description"><?php echo $lang['233']; ?></span>
</label>
</div>
<div class="col-md-6">	
<input type="radio" id="radio-button-3" name="main" value="4" checked />
<label for="radio-button-3">
<span class="frb-description"><?php echo $lang['229']; ?></span>
</label>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<div id="editor"></div>
<label><?php echo $lang['230']; ?>&nbsp;&nbsp;<span class="ckarea"><?php echo $lang['231']; ?></span></label>
<textarea name="longdesc" id="longdesc" class="postarea form-control" rows="9" required="required"><?php echo stripslashes($longdesc); ?></textarea>
<?php if ($editor == '1') { ?>
<script>
CKEDITOR.replace( 'longdesc' );
</script>
<?php } ?>
</div>
</div>
<script>
$(document).ready(function(){$("#preview").click(function(){var e=CKEDITOR.instances.longdesc.getData();$("#previewdiv").html(e),$("#previewdiv").show(),$("html, body").animate({scrollTop:$("#previewdiv").offset().top},120),$("#close").show()}),$("#close").click(function(){$("html, body").animate({scrollTop:$("#editor").offset().top},120),$("#previewdiv").toggle(),$("#close").hide()})});
</script>
<div class="row mt-2">
<div class="col-md-12">
<div id="previewdiv"> </div>
</div>
</div>
<div class="row mt-2">
<div class="col-md-2">
<input class="btn btn-danger" type="submit" value="<?php echo $lang['130']; ?>" name="query" />
</div>
<div class="col-md-2">
<input class="btn btn-info" type="button" id="preview" value="<?php echo $lang['302']; ?>"  />
</div>
<div class="col-md-2">
<input class="btn btn-primary" type="button" id="close" value="<?php echo $lang['303']; ?>"  />
</div>
</div>
</form>
<script src="<?php echo $sitepath; ?>/scripts/jquery.form-validator.min.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/jquery.are-you-sure.js"></script>
<script src="<?php echo $sitepath; ?>/scripts/ays-beforeunload-shim.js"></script>
<script>$(function() {$('#incformer').areYouSure({message: "The changes you made will be lost. Are you sure you want to leave this page?"});});</script>
<script>$.validate();</script>
<script>
$('#file').on('change',function(){
var fileName = $(this).val();
$(this).next('.custom-file-label').html(fileName);
});
</script>
<?php if ($editor == '1') { ?>
<script>
$("form").submit(function(e) {
var description = CKEDITOR.instances['longdesc'].getData().replace(/<[^>]*>/gi, '').length;
if (!description) {
$(".ckarea").show();
return false;
}
});
</script>
<?php } ?>