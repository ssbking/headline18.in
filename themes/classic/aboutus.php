<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="ROBOTS" content="All" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$metadesc}" />
<link href="{$sitepath}/themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
{if $frontext == 'rtl'}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/rtl/bootstrap.min.css" />
{else}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/bootstrap.min.css" />
{/if}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/font-awesome.css" />
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/basic.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{$lang.248} {$sitetitle}</title>
</head> 
<body>
{include file="themes/$themes/maindir.php"}
<div class="container minheight">
{if $adsoffon eq 2}
<div class="row mt-2">
<div class="col-md-12 text-center">
{$senseup}
</div>
</div>
{/if}
<div class="row mt-4">
<div class="col-md-12">
<h4>{$lang.248} {$sitetitle}</h4>
</div>
</div>
<div class="row mt-4">
<div class="col-md-12">
{$siteabout|htmlspecialchars_decode|stripslashes|CloseTags}
</div>
</div>
</div>
<script src="{$sitepath}/scripts/jquery.min.js"></script>
<script src="{$sitepath}/scripts/bootstrap.min.js"></script>
<script>{literal}
$(function(){
$('#coolMenu').find('> li').hover(function(){
$(this).find('ul')
.removeClass('noJS')
.stop(true, true).toggle('fast');
});
});
{/literal}</script>
{include file="themes/$themes/footer.php"}