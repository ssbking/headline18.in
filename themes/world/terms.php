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
<title>{$lang.249} {$sitetitle}</title>
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
<h4>{$lang.249} {$sitetitle}</h4>
</div>
</div>
<div class="row mt-4">
<div class="col-md-12">
{$siteterms|htmlspecialchars_decode|stripslashes|CloseTags}
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
<footer class="page-footer font-small blue pt-4 mt-30">
<div class="container text-center text-md-left">
<div class="row">
<div class="col-md-6 mt-md-0 mt-3">
<h5 class="text-uppercase">{$lang.295}</h5>
<p>{$lang.296}</p>
</div>
<hr class="clearfix w-100 d-md-none pb-3">
<div class="col-md-3 mb-md-0 mb-3">
<h5 class="text-uppercase">{$lang.294}</h5>
<ul class="list-unstyled">
<li>
<a href="{$sitepath}/pageid.php?id=privacy">{$lang.247}</a>
</li>
<li>
<a href="{$sitepath}/pageid.php?id=aboutus">{$lang.248}</a>
</li>
<li>
<a href="{$sitepath}/pageid.php?id=terms">{$lang.249}</a>
</li>
<li>
<a href="{$sitepath}/rss.php" target="_blank"><i class="fa fa-rss"></i></a>
</li>
</ul>
</div>
<div class="col-md-3 mb-md-0 mb-3">
<h5 class="text-uppercase">{$lang.293}</h5>
<ul class="list-unstyled">
<li>
<a href="{$sitepath}">{$lang.110}</a>
</li>
<li>
<a href="http://www.phpenter.net" target="_blank">PHPEnter</a> 5.3.
</li>
<li>
<a href="https://rssatom.com/remote.php?remote={$sitepath}/rss.php" target="_blank">RSS</a>
</li>
</ul>
</div>
</div>
</div>
<div class="footer-copyright text-center py-3">&copy; 2018 Copyright:
<a href="{$sitepath}"> {$sitetitle}</a>
</div>
</footer>
</body>
</html>