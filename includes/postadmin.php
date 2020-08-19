<?php if(!defined('CONST_VAL')) {
die('You cannot access this file directly!');
}
if($editortrue == '1') {
?>
<script src="scripts/ckeditor/ckeditor.js"></script>
<script src="scripts/ckeditor/config.js"></script>
<?php
}
?>
<form action="postadmin.php" id="incformer" enctype="multipart/form-data" method="post">
<div class="row mt-3">
<div class="col-md-12">
<h4><?php echo $lang['233']; ?> - Admin</h4>
</div>
</div>
<input type="hidden" name="address" value="0" />
<input type="hidden" name="token" value="0" />
<div class="row mt-2">
<div class="col-md-6">
<label><?php echo $lang['224']; ?></label>
<input type="text" class="form-control" name="title" data-validation="length" data-validation-length="5-160" />
</div>
<div class="col-md-6">
<label><?php echo $lang['225']; ?></label>
<?php $smarty->display('submit_tree.php'); ?>
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<label><?php echo $lang['226']; ?></label>
<input type="text" name="brief" class="form-control" data-validation="length" data-validation-length="max500" data-validation-optional="true" />
</div>
</div>
<div class="row mt-3">
<div class="col-md-6">
<div class="custom-file">
<input type="file" id="file" name="image" class="custom-file-input" />
<label class="custom-file-label" for="customFile"><?php echo $lang['227']; ?></label>
</div>
</div>
<div class="col-md-6">
<div class="frb-group">
<div class="row">
<div class="col-md-6">
<div class="frb frb-primary">
<input type="radio" id="radio-button-1" name="main" value="0" checked />
<label for="radio-button-1">
<span class="frb-description"><?php echo $lang['233']; ?></span>
</label>
</div>
</div>
<div class="col-md-6">
<div class="frb frb-primary">
<input type="radio" id="radio-button-4" name="main" value="4"  />
<label for="radio-button-4">
<span class="frb-description"><?php echo $lang['229']; ?></span>
</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row mt-2">
<div class="col-md-12">
<div id="editor"></div>
<label><?php echo $lang['230']; ?>&nbsp;&nbsp;<span class="ckarea"><?php echo $lang['231']; ?></span></label>
<textarea name="longdesc" id="longdesc" class="postarea form-control" rows="9" required="required"></textarea>
<?php 
if($editortrue == '1') {
?>
<script>
CKEDITOR.replace( 'longdesc', {
    customConfig: '<?php echo $sitepath; ?>/scripts/ckeditor/ckeditor_config.js'
});
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
<script>
$('#file').on('change',function(){
var fileName = $(this).val();
$(this).next('.custom-file-label').html(fileName);
});
</script>
<?php if($editortrue == '1') { ?>
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