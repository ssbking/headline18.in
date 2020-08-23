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
    {assign var="cname" value=$smarty.get.id}
    {if isset($categori)}
    {foreach from=$categori item=inclink}
    {if $inclink.catid eq $cname}
    <meta name="description"
        content="{if $inclink.cuscat eq true}{$inclink.cuscat|strip_tags}{else}{$inclink.name|stripslashes}, {$metadesc}{/if}" />
    <title>{$inclink.name|stripslashes} - {$sitetitle} {if isset($smarty.get.next)}[{$smarty.get.next}]{else}{/if}
    </title>
    {/if}
    {/foreach}
    {/if}
    {if isset($subcat)}
    {foreach from=$subcat item=clink}
    {if $clink.catid eq $cname}
    <meta name="description"
        content="{if $clink.cuscat eq true}{$clink.cuscat|strip_tags}{else}{$clink.name|stripslashes}, {$metadesc}{/if}" />
    <title>{$clink.name|stripslashes} - {$sitetitle} {if isset($smarty.get.next)}[{$smarty.get.next}]{else}{/if}</title>
    {/if}
    {/foreach}
    {/if}
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
        <div class="row">
            <div class="col-md-12">
                <div class="catline">
                    <i class="fa fa-chevron-right"></i><a href="{$sitepath}" title="{$sitetitle}">{$lang.110}</a>
                    {foreach from=$subcat item=menu}
                    {if $menu.catid == $cname}
                    {foreach from=$categori item=mainc}
                    {if $menu.parent eq $mainc.catid}
                    {if $rewritemod == 2}
                    <i class="fa fa-chevron-right"></i><a
                        href="categories.php?id={$mainc.catid}">{$mainc.name|stripslashes}</a>
                    {/if}
                    {if $rewritemod == 1}
                    <i class="fa fa-chevron-right"></i><a
                        href="{$sitepath}/category/{$mainc.catid}/{$mainc.seoname}.html">{$mainc.name|stripslashes}</a>
                    {/if}
                    {/if}
                    {/foreach}
                    {/if}
                    {if $menu.catid == $cname}
                    {if $rewritemod == 2}
                    <i class="fa fa-chevron-right"></i><a
                        href="categories.php?id={$menu.catid}">{$menu.name|stripslashes}</a>
                    {/if}
                    {if $rewritemod == 1}
                    <i class="fa fa-chevron-right"></i><a
                        href="{$sitepath}/category/{$menu.catid}/{$menu.seoname}.html">{$menu.name|stripslashes}</a>
                    {/if}
                    {/if}
                    {/foreach}
                    {assign var="cname" value=$cname}
                    {if isset($categori)}
                    {foreach from=$categori item=inclink}
                    {if $inclink.catid eq $cname}
                    {if $rewritemod == 2}
                    <i class="fa fa-chevron-right"></i><a
                        href="categories.php?id={$inclink.catid}">{$inclink.name|stripslashes}</a>
                    {/if}
                    {if $rewritemod == 1}
                    <i class="fa fa-chevron-right"></i><a
                        href="{$sitepath}/category/{$inclink.catid}/{$inclink.seoname}.html">{$inclink.name|stripslashes}</a>
                    {/if}
                    {/if}
                    {/foreach}
                    {/if}
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-12">
                {if isset($categori)}
                {foreach from=$categori item=inclink}
                {if $inclink.catid eq $cname}
                {if $inclink.cuscat eq true}{$inclink.cuscat|htmlspecialchars_decode}{/if}
                {/if}
                {/foreach}
                {/if}
                {if isset($subcat)}
                {foreach from=$subcat item=clink}
                {if $clink.catid eq $cname}
                {if $clink.cuscat eq true}{$clink.cuscat|htmlspecialchars_decode}{/if}
                {/if}
                {/foreach}
                {/if}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-8">
                {foreach from=$newser item=gcd}
                {if $gcd@index < '1' } <div class="row">
                    <div class="col-md-12">
                        {if $rewritemod == 1}<h2><a
                                href="{$sitepath}/news/{$gcd.univer}/{$gcd.idblog}/{$gcd.helper}.html">{$gcd.title|stripslashes}</a>
                        </h2>{/if}
                        {if $rewritemod == 2}<h2><a
                                href="{$sitepath}/news.php?name={$gcd.univer}&amp;cat={$gcd.idblog}">{$gcd.title|stripslashes}</a>
                        </h2>{/if}
                    </div>
            </div>
            <div class="firstline">
                <div class="row">
                    <div class="col-md-6">
                        {$gcd.date|date_format:"%A, %B %e, %Y"} {$gcd.date|timeAgo} {$lang.116}
                    </div>
                    <div class="col-md-6"><p>by योगेंद्र सिंह?</p>
                    </div>
                </div>
            </div>
            {if $gcd.brief eq true}
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="brief">{$gcd.brief|stripslashes}</div>
                </div>
            </div>
            {/if}
            <div class="row">
                <div class="col-md-12">
                    <div class="featuredcontainer">
                        {if $gcd.image neq 0}
                        {if $rewritemod == 1}
                        <a href="{$sitepath}/news/{$gcd.univer}/{$gcd.idblog}/{$gcd.helper}.html">
                            <img class="img-fluid" src="{$sitepath}/maxthumb/{$gcd.image}" width="395"
                                alt="{$gcd.title}" />
                        </a>
                        {/if}
                        {if $rewritemod == 2}
                        <a href="{$sitepath}/news.php?name={$gcd.univer}&amp;cat={$gcd.idblog}">
                            <img class="img-fluid" src="{$sitepath}/maxthumb/{$gcd.image}" width="395"
                                alt="{$gcd.title}" />
                        </a>
                        {/if}
                        {/if}
                        {$gcd.shortdesc|stripslashes|truncate:880}
                        {if $rewritemod == 1}
                        <a href="{$sitepath}/news/{$gcd.univer}/{$gcd.idblog}/{$gcd.helper}.html">{$lang.112}</a>
                        {/if}
                        {if $rewritemod == 2}
                        <a href="{$sitepath}/news.php?name={$gcd.univer}&amp;cat={$gcd.idblog}">{$lang.112}</a>
                        {/if}
                    </div>
                </div>
            </div>
            {/if}
            {foreachelse}
            <div class="alert alert-danger">{$lang.290}</div>
            {/foreach}
            <div class="row mt-5 row-eq-height">
                {foreach $newser as $le}
                {if $le@index > 0 && $le@index < 7} <div class="col-md-4 mb-3">
                    <div class="firstblock">
                        {if $rewritemod == 1}<a href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">
                            {if $le.image neq 0}
                            <img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
                            {else}
                            <img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135"
                                alt="{$le.title}" />
                            {/if}
                        </a>{/if}
                        {if $rewritemod == 2}<a href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">
                            {if $le.image neq 0}
                            <img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
                            {else}
                            <img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135"
                                alt="{$le.title}" />
                            {/if}
                        </a>
                        {/if}
                        <div class="p-3">
                            {if $rewritemod == 1}<h5><a
                                    href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">{$le.title|truncate:70}</a>
                            </h5>{/if}
                            {if $rewritemod == 2}<h5><a
                                    href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">{$le.title|truncate:70}</a>
                            </h5>{/if}
                            <span class="firstline">{$le.date|timeAgo} {$lang.116}</span>
                        </div>
                    </div>
            </div>
            {/if}
            {/foreach}
        </div>
        <div class="row mt-5">
            {foreach $newser as $le}
            {if $le@index >= 7 && $le@index < 20} <div class="col-md-4 mt-4 textcenter">
                {if $rewritemod == 1}<a href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">
                    {if $le.image neq 0}
                    <img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
                    {else}
                    <img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135"
                        alt="{$le.title}" />
                    {/if}
                </a>
                {/if}
                {if $rewritemod == 2}<a href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">
                    {if $le.image neq 0}
                    <img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
                    {else}
                    <img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135"
                        alt="{$le.title}" />
                    {/if}
                </a>
                {/if}
        </div>
        <div class="col-md-8">
            <div class="p-3">
                {if $rewritemod == 1}<h5><a
                        href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">{$le.title|truncate:70}</a>
                </h5>{/if}
                {if $rewritemod == 2}<h5><a
                        href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">{$le.title|truncate:70}</a>
                </h5>{/if}
                <div>
                    {$le.shortdesc|stripslashes|truncate:180}
                </div>
                <div>
                    <span class="firstline">{$le.date|timeAgo} {$lang.116}</span>
                </div>
            </div>
        </div>
        {/if}
        {/foreach}
    </div>
    </div>
    <div class="col-lg-4">
        <div class="row mt-1 mb-3">
            <div class="col-md-12">
                <div class="menuliner bg-danger"><h5>लोकप्रिय खबरे</h5></div>
            </div>
        </div>
        {foreach from=$newser|@sortby:"-#hits,#univer" item=lc}
        {if $lc@index < 5} <div class="topright">
            <div class="row">
                <div class="col-sm-1">
                    <div class="counter">{counter}</div>
                </div>
                <div class="col-sm-11">
                    {if $rewritemod == 1}<h5><a
                            href="{$sitepath}/news/{$lc.univer}/{$lc.idblog}/{$lc.helper}.html">{$lc.title|stripslashes}</a>
                    </h5>{/if}
                    {if $rewritemod == 2}<h5><a
                            href="{$sitepath}/news.php?name={$lc.univer}&amp;cat={$lc.idblog}">{$lc.title|stripslashes}</a>
                    </h5>{/if}
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="firstline">{$lc.date|date_format:"%a, %B %e, %Y"}</div>
                </div>
                <div class="col-md-5">
                    <div class="firstline">{$lc.date|timeAgo} {$lang.116}</div>
                </div>
            </div>
    </div>
    {/if}
    {foreachelse}
    {$lang.297}
    {/foreach}
    {if $adsoffon eq '2'}
    <div class="row mt-4 mb-3">
        <div class="col-md-12">
            <div class="menuliner">{$lang.246}</div>
        </div>
    </div>
    <div class="row mt-4 mb-3 text-center">
        <div class="col-md-12">
            {$sensedown}
        </div>
    </div>
    {/if}
    </div>
    </div>
    </div>
    <script src="{$sitepath}/scripts/jquery.min.js"></script>
    <script src="{$sitepath}/scripts/bootstrap.min.js"></script>
    {if $slider == '2'}
    <script>
        {
            literal
        }
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 5000
            })
        }); {
            /literal}
    </script>
    {/if}
    <script>
        {
            literal
        }
        $(function () {
            $('#coolMenu').find('> li').hover(function () {
                $(this).find('ul')
                    .removeClass('noJS')
                    .stop(true, true).toggle('fast');
            });
        }); {
            /literal}
    </script>
    {include file="themes/$themes/footer.php"}