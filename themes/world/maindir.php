<!-- top menu -->
<div class="row">
    <div class="container d-flex justify-content-between align-items-center navbar-top"
    style="width: 99%;background: linear-gradient(330deg, rgba(228,230,133,1) 17%, rgba(255,255,255,1) 63%);
                padding-top: inherit;padding-bottom: inherit;">
        <!-- logo/brand text -->
        <div class="logo">
            {if $logoon == '2'}
            <a class="navbar-brand" href="/">{$logotext}</a>
            {/if}
            {if $logoon == '1'}
            <a class="navbar-brand" href="/"><img src="{$sitepath}/themes/{$themes}/styles/images/newlogo.jpeg"
                    alt="{$sitetitle}" width="200" height="55" style="padding-left: 18px;"></a>
            {/if}
        </div>
        <!-- logo ends  -->
        {if $adsoffon eq 2}
        <div class="row mt-4 mb-3 text-center">
<div class="col-md-12">
{$sensehead}
</div>
</div>
{/if}
        <ul class="navbar-left">
            <li>
                <p id="nowtime"></p>
            </li>
            <!-- <li>30°C,London</li> -->
        </ul>
<!-- live timer -->
<!-- change the path to scripots later -->
<script src="{$sitepath}/themes/world/assets/js/moment.js"></script>
<script>
    var myVar = setInterval(myTimer, 1000);

    function myTimer() {
        var d = moment().format('MMMM Do YYYY, h:mm:ss a');
        var time = document.getElementById("nowtime");
        time.innerHTML = d;
    }

    function myStopFunction() {
        clearInterval(myVar);
    }
</script>
<!-- live timer ends -->

        <div class="d-flex">
            <ul class="navbar-right">
                <li style="border-color: azure;border: solid;">
                    <a href="#">हिन्दी</a>
                </li>
                <li>
                    <a href="#">मराठी</a>
                </li>


                <li>
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<nav class="container navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="row">
    <div class="col-md-8">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul id="coolMenu" class="nav navbar-nav ml-auto">
                {foreach from=$categori item=caty}
                {assign var="ifavaible" value=$caty@total}
                {if $caty@index < {$toplinks}} {if $rewritemod==2} <li class="nav-item"><a class="nav-link"
                        href="{$sitepath}/categories.php?id={$caty.catid}">{$caty.name|stripslashes}</a>
                    {/if}
                    {if $rewritemod == 1}
                    <li class="nav-item"><a class="nav-link"
                            href="{$sitepath}/category/{$caty.catid}/{$caty.seoname}.html">{$caty.name|stripslashes}</a>
                        {/if}
                        <ul>
                            {foreach from=$subcat item=inc}
                            {if $inc.cord neq 0 && $caty.catid eq $inc.parent}
                            {if $rewritemod == 2}
                            <li class="nav-item"><a class="nav-link"
                                    href="{$sitepath}/categories.php?id={$inc.catid}">{$inc.name|stripslashes|replace:"
                                    ":"&nbsp;"}</a>
                                {/if}
                                {if $rewritemod == 1}
                            <li class="nav-item"><a class="nav-link"
                                    href="{$sitepath}/category/{$inc.catid}/{$inc.seoname}.html">{$inc.name|stripslashes|replace:"
                                    ":"&nbsp;"}</a>
                                {/if}
                                {/if}
                                {/foreach}
                        </ul>
                    </li>
                    {/if}
                    {/foreach}
                    <li class="nav-item">
                        {if $ifavaible > {$toplinks}}<a class="nav-link" href="#">{$lang.114}</a>
                        <ul>
                            {foreach from=$categori item=morecat}
                            {if $morecat.cord eq 0 && $morecat@index >= {$toplinks}}
                            {if $rewritemod == 2}
                            <li class="nav-item"><a class="nav-link"
                                    href="{$sitepath}/categories.php?id={$morecat.catid}">{$morecat.name|stripslashes|replace:"
                                    ":"&nbsp;"}</a>
                                {/if}
                                {if $rewritemod == 1}
                            <li class="nav-item"><a class="nav-link"
                                    href="{$sitepath}/category/{$morecat.catid}/{$morecat.seoname}.html">{$morecat.name|stripslashes|replace:"
                                    ":"&nbsp;"}</a>
                                {/if}
                                {/if}
                                {foreachelse}
                            <li class="nav-item"><a class="nav-link" href="{$sitepath}">Categories</li></a>
                            {/foreach}
                        </ul>
                        {/if}
            </ul>
        </div>
    </div>


    <div class="col-md-4">
            <form action="{$sitepath}/search.php" method="GET">
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input name="q" class="form-control my-0 py-1 amber-border" type="text" placeholder="{$lang.298}"
                        aria-label="Search" {if $smarty.get.q|default eq false}{else}
                        value="{$smarty.get.q|escape|default}" {/if} />
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text amber lighten-3"> <i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</nav>
<!-- <div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="menuline">
                {nocache}{if $smarty.session.logged_in|default eq true}
                <a href="{$sitepath}/postadmin.php"><i class="fa fa-chevron-right"></i> {$lang.115}</a>
                <a href="{$sitepath}/admin"><i class="fa fa-chevron-right"></i> Admin Panel</a>
                <a href="{$sitepath}/admin/signout.php"><i class="fa fa-chevron-right"></i> {$lang.209}</a>
                {else}
                {if $smarty.session.loggedin|default eq true}
                <a href="{$sitepath}/link.php"><i class="fa fa-chevron-right"></i> {$lang.208}</a>
                <a href="{$sitepath}/auth.php?auth=6"><i class="fa fa-chevron-right"></i> {$lang.115}</a>
                <a href="{$sitepath}/auth.php?auth=4"><i class="fa fa-chevron-right"></i> {$lang.209}</a>
                {/if}
                {if $smarty.session.loggedin|default eq false}
                <a href="{$sitepath}/auth.php?auth=7"><i class="fa fa-chevron-right"></i> {$lang.211}</a>
                <a href="{$sitepath}/auth.php?auth=5"><i class="fa fa-chevron-right"></i> {$lang.210}</a>
                {/if}
                {/if}{/nocache}
                {if isset($startmenu)}{foreach from=$startmenu item=sm}
                {if $sm.active eq 2}
                <a href="{$sitepath}/{$sm.valueopt}"><i class="fa fa-chevron-right"></i>{$sm.nameopt}</a>
                {/if}
                {/foreach}{/if}
            </div>
        </div>
      
    </div>
</div> -->
{if $newson eq 2}<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="alert alert-success">{$newstext}</div>
        </div>
    </div>
</div>{/if}