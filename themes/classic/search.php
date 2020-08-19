<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="ROBOTS" content="All" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="keywords" content="{$keywords}" />
<link href="{$sitepath}/themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
{if $frontext == 'rtl'}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/rtl/bootstrap.min.css" />
{else}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/bootstrap.min.css" />
{/if}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/font-awesome.css" />
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/basic.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{$lang.298} - {$sitetitle}</title>
<meta name="description" content="{$metadesc}" />
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
<div class="row mt-1">
<div class="col-md-12 mb-3">
<h4>{$smarty.get.q|escape}</h4>
</div>
</div>
<div class="row mt-1 row-eq-height">
{foreach $newser as $le}
<div class="col-md-3 mt-4 text-center">
{if $rewritemod == 1}<a href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">
{if $le.image neq 0}
<img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
{else}
<img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135" alt="{$le.title}" />
{/if}
</a>
{/if}
{if $rewritemod == 2}<a href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">
{if $le.image neq 0}
<img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
{else}
<img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" wwidth="222" height="135" alt="{$le.title}" />
{/if}
</a>
{/if}
</div>
<div class="col-md-9">
<div class="p-3">
{if $rewritemod == 1}<h5><a href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">{$le.title|highlight:$hlgid}</a></h5>{/if}
{if $rewritemod == 2}<h5><a href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">{$le.title|highlight:$hlgid}</a></h5>{/if}
<div>
{$le.shortdesc|stripslashes|truncate:480}
</div>
<div>
<span class="firstline">{$le.date|timeAgo} {$lang.116}</span>
</div>
</div>
</div>
{foreachelse}
<div class="alert alert-primary m-3">{$lang.172}</div>
{/foreach}
</div>
<div class="row mt-5 text-center">
<div class="col-md-12 mb-5 text-center">
<nav aria-label="Page navigation">
<ul class="pagination text-center">
<li class="page-item">{paginate_prev}</li>
<li class="page-item"><span class="page-link">{$lang.120} {$paginate.first} - {$paginate.last} {$lang.121} {$paginate.total}</span></li>
<li class="page-item">{paginate_next}</li>
</ul>
</nav>
</div>
</div>
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