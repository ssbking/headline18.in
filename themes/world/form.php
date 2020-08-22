<div id="incform">
<form name="cform" method="post" action="{$sitepath}/comment.php">
<input type="hidden" name="comrev" value="{$incname}" />
<input type="hidden" name="main" value="0" />
<input type="hidden" name="helper" value="{$helper}" />
<input type="hidden" name="idblog" value="{$idblog}" />
<div class="row mt-3">
<div class="col-md-12">
{$lang.129}
</div>
</div>
<div class="row">
<div class="col-md-12">
<textarea name="comment" rows="6" class="form-control" required="required"></textarea>
</div>
</div>
<div class="row mt-3">
<div class="col-md-12">
<input type="submit" class="btn btn-danger" name="submit" value="{$lang.130}" />
</div>
</div>
</form>
</div>