<?php
/* Smarty version 3.1.32, created on 2020-08-19 19:02:56
  from 'C:\wamp64\www\headline18.in\themes\classic\main.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5f3d7760a1de36_25333805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f33150337f5e5e4b1507b227dd3a15ca8f440ac3' => 
    array (
      0 => 'C:\\wamp64\\www\\headline18.in\\themes\\classic\\main.php',
      1 => 1566937882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/maindir.php' => 1,
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/footer.php' => 1,
  ),
),false)) {
function content_5f3d7760a1de36_25333805 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.timeAgo.php','function'=>'smarty_modifier_timeAgo',),2=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),3=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.sortby.php','function'=>'smarty_modifier_sortby',),4=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="ROBOTS" content="All" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['metadesc']->value;?>
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
<title><?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
</title>
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
<div class="row mt-4">
<div class="col-lg-8">
<?php if ($_smarty_tpl->tpl_vars['slider']->value == '1') {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser']->value, 'gcd');
$_smarty_tpl->tpl_vars['gcd']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gcd']->value) {
$_smarty_tpl->tpl_vars['gcd']->index++;
$__foreach_gcd_0_saved = $_smarty_tpl->tpl_vars['gcd'];
if ($_smarty_tpl->tpl_vars['gcd']->index < '1') {?>
<div class="row">
<div class="col-md-12">
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h2><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['title']);?>
</a></h2><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h2><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['title']);?>
</a></h2><?php }?>
</div>
</div>
<div class="firstline">
<div class="row">
<div class="col-md-6">
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['gcd']->value['date'],"%A, %B %e, %Y");?>
 <?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['gcd']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>

</div>
<div class="col-md-6"><?php if ($_smarty_tpl->tpl_vars['gcd']->value['userid'] > '0') {
echo $_smarty_tpl->tpl_vars['gcd']->value['user'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[292];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['lang']->value[301];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[292];?>
 <?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/category/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['seoname'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['gcd']->value['idname'];?>
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/categories.php?id=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo $_smarty_tpl->tpl_vars['gcd']->value['idname'];?>
</a>
<?php }?>
</div>
</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['gcd']->value['brief'] == true) {?>
<div class="row"><div class="col-md-12 mb-2"><div class="brief"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['brief']);?>
</div></div></div>
<?php }?>
<div class="row">
<div class="col-md-12">
<div class="featuredcontainer">
<?php if ($_smarty_tpl->tpl_vars['gcd']->value['image'] != 0) {
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html">
<img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['image'];?>
" width="395" alt="<?php echo $_smarty_tpl->tpl_vars['gcd']->value['title'];?>
" />
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
">
<img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['image'];?>
" width="395" alt="<?php echo $_smarty_tpl->tpl_vars['gcd']->value['title'];?>
" />
</a>
<?php }
}
echo smarty_modifier_truncate(stripslashes($_smarty_tpl->tpl_vars['gcd']->value['shortdesc']),880);?>

<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['lang']->value[112];?>
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value[112];?>
</a>
<?php }?>
</div>
</div>
</div>
<?php }
$_smarty_tpl->tpl_vars['gcd'] = $__foreach_gcd_0_saved;
}
} else {
?>
<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['lang']->value[290];?>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
if ($_smarty_tpl->tpl_vars['slider']->value == '2') {?>
<div id="carouselExampleSlidesOnly" class="carousel slide carousel-<?php echo $_smarty_tpl->tpl_vars['efslide']->value;?>
" data-ride="carousel">
<ol class="carousel-indicators nodisplay">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser2']->value, 'gcd');
$_smarty_tpl->tpl_vars['gcd']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gcd']->value) {
$_smarty_tpl->tpl_vars['gcd']->index++;
$__foreach_gcd_1_saved = $_smarty_tpl->tpl_vars['gcd'];
if ($_smarty_tpl->tpl_vars['gcd']->index < 8) {?>
<li data-target="#carouselExampleSlidesOnly" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['gcd']->index;?>
"<?php if ($_smarty_tpl->tpl_vars['gcd']->index == '0') {?> class="active"<?php }?>></li>
<?php }
$_smarty_tpl->tpl_vars['gcd'] = $__foreach_gcd_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ol>
<div class="carousel-inner">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser2']->value, 'gcd');
$_smarty_tpl->tpl_vars['gcd']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gcd']->value) {
$_smarty_tpl->tpl_vars['gcd']->index++;
$__foreach_gcd_2_saved = $_smarty_tpl->tpl_vars['gcd'];
?>
<div class="carousel-item <?php if ($_smarty_tpl->tpl_vars['gcd']->index == '0') {?>active<?php }?>">
<div class="row">
<div class="col-md-12">
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h2><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['title']);?>
</a></h2><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h2><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['title']);?>
</a></h2><?php }?>
</div>
</div>
<div class="firstline">
<div class="row">
<div class="col-md-6">
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['gcd']->value['date'],"%A, %B %e, %Y");?>
 <?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['gcd']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>

</div>
<div class="col-md-6"><?php if ($_smarty_tpl->tpl_vars['gcd']->value['userid'] > '0') {
echo $_smarty_tpl->tpl_vars['gcd']->value['user'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[292];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['lang']->value[301];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[292];?>
 <?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/category/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['seoname'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['gcd']->value['idname'];?>
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/categories.php?id=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo $_smarty_tpl->tpl_vars['gcd']->value['idname'];?>
</a>
<?php }?>
</div>
</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['gcd']->value['brief'] == true) {?>
<div class="row"><div class="col-md-12 mb-2"><div class="brief"><?php echo stripslashes($_smarty_tpl->tpl_vars['gcd']->value['brief']);?>
</div></div></div>
<?php }?>
<div class="row">
<div class="col-md-12">
<div class="featuredcontainer">
<?php if ($_smarty_tpl->tpl_vars['gcd']->value['image'] != 0) {
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html">
<img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['image'];?>
" width="395" alt="<?php echo $_smarty_tpl->tpl_vars['gcd']->value['title'];?>
" />
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
">
<img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['image'];?>
" width="395" alt="<?php echo $_smarty_tpl->tpl_vars['gcd']->value['title'];?>
" />
</a>
<?php }
}
echo smarty_modifier_truncate(stripslashes($_smarty_tpl->tpl_vars['gcd']->value['shortdesc']),880);?>

<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['gcd']->value['helper'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['lang']->value[112];?>
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gcd']->value['idblog'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value[112];?>
</a>
<?php }?>
</div>
</div>
</div>
</div>
<?php
$_smarty_tpl->tpl_vars['gcd'] = $__foreach_gcd_2_saved;
}
} else {
?>
<div class="col-md-12"><div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['lang']->value[290];?>
</div></div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div>
<?php }?>
<div class="row mt-5 row-eq-height">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser']->value, 'le');
$_smarty_tpl->tpl_vars['le']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['le']->value) {
$_smarty_tpl->tpl_vars['le']->index++;
$__foreach_le_3_saved = $_smarty_tpl->tpl_vars['le'];
if ($_smarty_tpl->tpl_vars['le']->index > 0 && $_smarty_tpl->tpl_vars['le']->index < 7) {?>
<div class="col-md-4 mb-3">
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
/styles/images/noimage.png" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
<?php }?>
</a><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
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
/styles/images/noimage.png" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
<?php }?>
</a>
<?php }?>
<div class="p-3">
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a></h5><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a></h5><?php }?>
<span class="firstline"><?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['le']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>
</span>
</div>
</div>
</div>
<?php }
$_smarty_tpl->tpl_vars['le'] = $__foreach_le_3_saved;
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
$__foreach_le_4_saved = $_smarty_tpl->tpl_vars['le'];
if ($_smarty_tpl->tpl_vars['le']->index >= 7 && $_smarty_tpl->tpl_vars['le']->index < 20) {?>
<div class="col-md-4 mt-4 textcenter">
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
/styles/images/noimage.png" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
<?php }?>
</a>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
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
/styles/images/noimage.png" width="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
<?php }?>
</a>
<?php }?>
</div>
<div class="col-md-8">
<div class="p-3">
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a></h5><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['le']->value['title'],70);?>
</a></h5><?php }?>
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
<?php }
$_smarty_tpl->tpl_vars['le'] = $__foreach_le_4_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div>
<div class="col-lg-4">
<div class="row mt-1 mb-3">
<div class="col-md-12">
<div class="menuliner"><?php echo $_smarty_tpl->tpl_vars['lang']->value[122];?>
</div>
</div>
</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, smarty_modifier_sortby($_smarty_tpl->tpl_vars['newser']->value,"-#hits,#univer"), 'lc');
$_smarty_tpl->tpl_vars['lc']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lc']->value) {
$_smarty_tpl->tpl_vars['lc']->index++;
$__foreach_lc_5_saved = $_smarty_tpl->tpl_vars['lc'];
if ($_smarty_tpl->tpl_vars['lc']->index < 5) {?>
<div class="topright">
<div class="row">
<div class="col-sm-1">
<div class="counter"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</div>
</div>
<div class="col-sm-11">
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['lc']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['lc']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['lc']->value['helper'];?>
.html"><?php echo stripslashes($_smarty_tpl->tpl_vars['lc']->value['title']);?>
</a></h5><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['lc']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['lc']->value['idblog'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['lc']->value['title']);?>
</a></h5><?php }?>
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
<?php }
$_smarty_tpl->tpl_vars['lc'] = $__foreach_lc_5_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['adsoffon']->value == '2') {?>
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
<div class="row mt-1 mb-3">
<div class="col-md-12">
<div class="menuliner"><?php echo $_smarty_tpl->tpl_vars['lang']->value[119];?>
</div>
</div>
</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviews']->value, 'gc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gc']->value) {
?>
<div class="topright">
<div class="row">
<div class="col-sm-2">
<?php if ($_smarty_tpl->tpl_vars['gc']->value['userpic'] != '0') {?>
<img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/maxthumb/<?php echo $_smarty_tpl->tpl_vars['gc']->value['userpic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['gc']->value['user'];?>
" width="50" height="50" />
<?php } else { ?>
<img src="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/images/noimage.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['gc']->value['user'];?>
" width="50" height="50" />
<?php }?>
</div>
<div class="col-sm-10">
<div>
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?>
<h6><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['gc']->value['comrev'];?>
/<?php echo $_smarty_tpl->tpl_vars['gc']->value['newscat'];?>
/<?php echo $_smarty_tpl->tpl_vars['gc']->value['newsurl'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['gc']->value['user'];?>
</a></h6>
<?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?>
<h6><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['gc']->value['comrev'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['gc']->value['newscat'];?>
"><?php echo $_smarty_tpl->tpl_vars['gc']->value['user'];?>
</a></h6>
<?php }?>
</div>
<div>
<?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->tpl_vars['gc']->value['comment']),200);?>

</div>
<div class="firstline mt-2">
<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['gc']->value['comdate'],"%A, %b %e, %Y, %H:%M:%S");?>
, <?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['gc']->value['comdate']);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>

</div>
</div>
</div>
</div>
<?php
}
} else {
echo $_smarty_tpl->tpl_vars['lang']->value[300];?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php if ($_smarty_tpl->tpl_vars['slider']->value == '2') {
echo '<script'; ?>
>
$(document).ready(function () {
$('.carousel').carousel({
interval: 5000
})
});
<?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
>
$(function(){
$('#coolMenu').find('> li').hover(function(){
$(this).find('ul')
.removeClass('noJS')
.stop(true, true).toggle('fast');
});
});
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:themes/".((string)$_smarty_tpl->tpl_vars['themes']->value)."/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
