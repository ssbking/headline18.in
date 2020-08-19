<select name="idblog" id="firstfield" class="form-control" data-validation="length" data-validation-length="5-100">
<option value="">----------</option>
{foreach from=$categori item=caty}
<option value="{$caty.catid}|{$caty.name}|{$caty.seoname}"> {$caty.name|stripslashes}</option>
{foreach from=$subcat item=inc} 
{if $inc.cord neq 0 && $caty.catid eq $inc.parent}
<option value="{$inc.catid}|{$inc.name}|{$inc.seoname}">&nbsp;&nbsp;{$inc.name|stripslashes}</option>
{/if} 
{/foreach}
{/foreach}
</select>





