<?php
/* Smarty version 3.1.32, created on 2020-08-22 20:05:30
  from 'C:\wamp64\www\headline18\themes\world\categories.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5f417a8aef8d63_46582587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4d3f20ec7895bc7674d62acc91069d535f325d7' => 
    array (
      0 => 'C:\\wamp64\\www\\headline18\\themes\\world\\categories.php',
      1 => 1598126724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/maindir.php' => 1,
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/footer.php' => 1,
  ),
),false)) {
function content_5f417a8aef8d63_46582587 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\headline18\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\wamp64\\www\\headline18\\libs\\plugins\\modifier.timeAgo.php','function'=>'smarty_modifier_timeAgo',),2=>array('file'=>'C:\\wamp64\\www\\headline18\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),3=>array('file'=>'C:\\wamp64\\www\\headline18\\libs\\plugins\\modifier.sortby.php','function'=>'smarty_modifier_sortby',),4=>array('file'=>'C:\\wamp64\\www\\headline18\\libs\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="ROBOTS" content="All" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <?php if ($_smarty_tpl->tpl_vars['frontext']->value == 'rtl') {?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/rtl/bootstrap.min.css" />
    <?php } else { ?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/bootstrap.min.css" />
    <?php }?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/basic.css" />
    <link rel="alternate" type="application/atom+xml" title="<?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
 - RSS" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/rss.php" />
    <?php $_smarty_tpl->_assignInScope('cname', $_GET['id']);?>
    <?php if (isset($_smarty_tpl->tpl_vars['categori']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categori']->value, 'inclink');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inclink']->value) {
?>
    <?php if ($_smarty_tpl->tpl_vars['inclink']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
    <meta name="description"
        content="<?php if ($_smarty_tpl->tpl_vars['inclink']->value['cuscat'] == true) {
echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['inclink']->value['cuscat']);
} else {
echo stripslashes($_smarty_tpl->tpl_vars['inclink']->value['name']);?>
, <?php echo $_smarty_tpl->tpl_vars['metadesc']->value;
}?>" />
    <title><?php echo stripslashes($_smarty_tpl->tpl_vars['inclink']->value['name']);?>
 - <?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
 <?php if (isset($_GET['next'])) {?>[<?php echo $_GET['next'];?>
]<?php } else {
}?>
    </title>
    <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['subcat']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcat']->value, 'clink');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['clink']->value) {
?>
    <?php if ($_smarty_tpl->tpl_vars['clink']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
    <meta name="description"
        content="<?php if ($_smarty_tpl->tpl_vars['clink']->value['cuscat'] == true) {
echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['clink']->value['cuscat']);
} else {
echo stripslashes($_smarty_tpl->tpl_vars['clink']->value['name']);?>
, <?php echo $_smarty_tpl->tpl_vars['metadesc']->value;
}?>" />
    <title><?php echo stripslashes($_smarty_tpl->tpl_vars['clink']->value['name']);?>
 - <?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
 <?php if (isset($_GET['next'])) {?>[<?php echo $_GET['next'];?>
]<?php } else {
}?></title>
    <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:themes/".((string)$_smarty_tpl->tpl_vars['themes']->value)."/maindir.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <div class="container minheight">
        <?php if ($_smarty_tpl->tpl_vars['adsoffon']->value == 2) {?>
        <div class="row mt-2">
            <div class="col-md-12 text-center">
                <?php echo $_smarty_tpl->tpl_vars['senseup']->value;?>

            </div>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12">
                <div class="catline">
                    <i class="fa fa-chevron-right"></i><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value[110];?>
</a>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcat']->value, 'menu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['menu']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categori']->value, 'mainc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainc']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['menu']->value['parent'] == $_smarty_tpl->tpl_vars['mainc']->value['catid']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
                    <i class="fa fa-chevron-right"></i><a
                        href="categories.php?id=<?php echo $_smarty_tpl->tpl_vars['mainc']->value['catid'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['mainc']->value['name']);?>
</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
                    <i class="fa fa-chevron-right"></i><a
                        href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/category/<?php echo $_smarty_tpl->tpl_vars['mainc']->value['catid'];?>
/<?php echo $_smarty_tpl->tpl_vars['mainc']->value['seoname'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['mainc']->value['name']);?>
</a>
                    <?php }?>
                    <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['menu']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
                    <i class="fa fa-chevron-right"></i><a
                        href="categories.php?id=<?php echo $_smarty_tpl->tpl_vars['menu']->value['catid'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value['name']);?>
</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
                    <i class="fa fa-chevron-right"></i><a
                        href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/category/<?php echo $_smarty_tpl->tpl_vars['menu']->value['catid'];?>
/<?php echo $_smarty_tpl->tpl_vars['menu']->value['seoname'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value['name']);?>
</a>
                    <?php }?>
                    <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php $_smarty_tpl->_assignInScope('cname', $_smarty_tpl->tpl_vars['cname']->value);?>
                    <?php if (isset($_smarty_tpl->tpl_vars['categori']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categori']->value, 'inclink');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inclink']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['inclink']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
                    <i class="fa fa-chevron-right"></i><a
                        href="categories.php?id=<?php echo $_smarty_tpl->tpl_vars['inclink']->value['catid'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['inclink']->value['name']);?>
</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
                    <i class="fa fa-chevron-right"></i><a
                        href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/category/<?php echo $_smarty_tpl->tpl_vars['inclink']->value['catid'];?>
/<?php echo $_smarty_tpl->tpl_vars['inclink']->value['seoname'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['inclink']->value['name']);?>
</a>
                    <?php }?>
                    <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-12">
                <?php if (isset($_smarty_tpl->tpl_vars['categori']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categori']->value, 'inclink');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inclink']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['inclink']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['inclink']->value['cuscat'] == true) {
echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['inclink']->value['cuscat']);
}?>
                <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['subcat']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcat']->value, 'clink');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['clink']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['clink']->value['catid'] == $_smarty_tpl->tpl_vars['cname']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['clink']->value['cuscat'] == true) {
echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['clink']->value['cuscat']);
}?>
                <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-8">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser']->value, 'gcd');
$_smarty_tpl->tpl_vars['gcd']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gcd']->value) {
$_smarty_tpl->tpl_vars['gcd']->index++;
$__foreach_gcd_7_saved = $_smarty_tpl->tpl_vars['gcd'];
?>
                <?php if ($_smarty_tpl->tpl_vars['gcd']->index < '1') {?> <div class="row">
                    <div class="col-md-12">
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h2><a
                                href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['title']);?>
</a>
                        </h2><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h2><a
                                href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['title']);?>
</a>
                        </h2><?php }?>
                    </div>
            </div>
            <div class="firstline">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['gcd']->value['date'],"%A, %B %e, %Y");?>
 <?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['gcd']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>

                    </div>
                    <div class="col-md-6"><p>by योगेंद्र सिंह?</p>
                    </div>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['gcd']->value['brief'] == true) {?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="brief"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['brief']);?>
</div>
                </div>
            </div>
            <?php }?>
            <div class="row">
                <div class="col-md-12">
                    <div class="featuredcontainer">
                        <?php if ($_smarty_tpl->tpl_vars['gcd']->value['image'] != 0) {?>
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html">
                            <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['image'];?>
" width="395"
                                alt="<?php echo $_smarty_tpl->tpl_vars['gcd']->value['title'];?>
" />
                        </a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
">
                            <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['image'];?>
" width="395"
                                alt="<?php echo $_smarty_tpl->tpl_vars['gcd']->value['title'];?>
" />
                        </a>
                        <?php }?>
                        <?php }?>
                        <?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->tpl_vars['gcd']->value['shortdesc']),880);?>

                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['lang']->value[112];?>
</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value[112];?>
</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php
$_smarty_tpl->tpl_vars['gcd'] = $__foreach_gcd_7_saved;
}
} else {
?>
            <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['lang']->value[290];?>
</div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <div class="row mt-5 row-eq-height">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser']->value, 'le');
$_smarty_tpl->tpl_vars['le']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['le']->value) {
$_smarty_tpl->tpl_vars['le']->index++;
$__foreach_le_8_saved = $_smarty_tpl->tpl_vars['le'];
?>
                <?php if ($_smarty_tpl->tpl_vars['le']->index > 0 && $_smarty_tpl->tpl_vars['le']->index < 7) {?> <div class="col-md-4 mb-3">
                    <div class="firstblock">
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html">
                            <?php if ($_smarty_tpl->tpl_vars['le']->value['image'] != 0) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/minthumb/<?php echo $_smarty_tpl->tpl_vars['le']->value['image'];?>
" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                            <?php } else { ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/images/noimage.png" width="222" height="135"
                                alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                            <?php }?>
                        </a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
">
                            <?php if ($_smarty_tpl->tpl_vars['le']->value['image'] != 0) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/minthumb/<?php echo $_smarty_tpl->tpl_vars['le']->value['image'];?>
" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                            <?php } else { ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/images/noimage.png" width="222" height="135"
                                alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                            <?php }?>
                        </a>
                        <?php }?>
                        <div class="p-3">
                            <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a
                                    href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a>
                            </h5><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a
                                    href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a>
                            </h5><?php }?>
                            <span class="firstline"><?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['le']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>
</span>
                        </div>
                    </div>
            </div>
            <?php }?>
            <?php
$_smarty_tpl->tpl_vars['le'] = $__foreach_le_8_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="row mt-5">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser']->value, 'le');
$_smarty_tpl->tpl_vars['le']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['le']->value) {
$_smarty_tpl->tpl_vars['le']->index++;
$__foreach_le_9_saved = $_smarty_tpl->tpl_vars['le'];
?>
            <?php if ($_smarty_tpl->tpl_vars['le']->index >= 7 && $_smarty_tpl->tpl_vars['le']->index < 20) {?> <div class="col-md-4 mt-4 textcenter">
                <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html">
                    <?php if ($_smarty_tpl->tpl_vars['le']->value['image'] != 0) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/minthumb/<?php echo $_smarty_tpl->tpl_vars['le']->value['image'];?>
" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                    <?php } else { ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/images/noimage.png" width="222" height="135"
                        alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                    <?php }?>
                </a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['le']->value['image'] != 0) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/minthumb/<?php echo $_smarty_tpl->tpl_vars['le']->value['image'];?>
" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                    <?php } else { ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/images/noimage.png" width="222" height="135"
                        alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
                    <?php }?>
                </a>
                <?php }?>
        </div>
        <div class="col-md-8">
            <div class="p-3">
                <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a
                        href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a>
                </h5><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a
                        href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a>
                </h5><?php }?>
                <div>
                    <?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->tpl_vars['le']->value['shortdesc']),180);?>

                </div>
                <div>
                    <span class="firstline"><?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['le']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>
</span>
                </div>
            </div>
        </div>
        <?php }?>
        <?php
$_smarty_tpl->tpl_vars['le'] = $__foreach_le_9_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="row mt-1 mb-3">
            <div class="col-md-12">
                <div class="menuliner bg-danger"><h5>लोकप्रिय खबरे</h5></div>
            </div>
        </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, smarty_modifier_sortby($_smarty_tpl->tpl_vars['newser']->value,"-#hits,#univer"), 'lc');
$_smarty_tpl->tpl_vars['lc']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lc']->value) {
$_smarty_tpl->tpl_vars['lc']->index++;
$__foreach_lc_10_saved = $_smarty_tpl->tpl_vars['lc'];
?>
        <?php if ($_smarty_tpl->tpl_vars['lc']->index < 5) {?> <div class="topright">
            <div class="row">
                <div class="col-sm-1">
                    <div class="counter"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</div>
                </div>
                <div class="col-sm-11">
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a
                            href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['lc']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['lc']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['lc']->value['helper'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['lc']->value['title']);?>
</a>
                    </h5><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a
                            href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['lc']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['lc']->value['idblog'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['lc']->value['title']);?>
</a>
                    </h5><?php }?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="firstline"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lc']->value['date'],"%a, %B %e, %Y");?>
</div>
                </div>
                <div class="col-md-5">
                    <div class="firstline"><?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['lc']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>
</div>
                </div>
            </div>
    </div>
    <?php }?>
    <?php
$_smarty_tpl->tpl_vars['lc'] = $__foreach_lc_10_saved;
}
} else {
?>
    <?php echo $_smarty_tpl->tpl_vars['lang']->value[297];?>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['adsoffon']->value == '2') {?>
    <div class="row mt-4 mb-3">
        <div class="col-md-12">
            <div class="menuliner"><?php echo $_smarty_tpl->tpl_vars['lang']->value[246];?>
</div>
        </div>
    </div>
    <div class="row mt-4 mb-3 text-center">
        <div class="col-md-12">
            <?php echo $_smarty_tpl->tpl_vars['sensedown']->value;?>

        </div>
    </div>
    <?php }?>
    </div>
    </div>
    </div>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/scripts/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/scripts/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php if ($_smarty_tpl->tpl_vars['slider']->value == '2') {?>
    <?php echo '<script'; ?>
>
        {
            literal
        }
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 5000
            })
        }); {
            /literal}
    <?php echo '</script'; ?>
>
    <?php }?>
    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:themes/".((string)$_smarty_tpl->tpl_vars['themes']->value)."/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
