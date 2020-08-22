<?php
/* Smarty version 3.1.32, created on 2020-08-22 05:28:22
  from 'C:\wamp64\www\headline18.in\themes\classic\search.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5f40acf632d415_99620344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcf892943daabb31bc69644b4b8b2f88b485cb50' => 
    array (
      0 => 'C:\\wamp64\\www\\headline18.in\\themes\\classic\\search.php',
      1 => 1566755553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/maindir.php' => 1,
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/footer.php' => 1,
  ),
),false)) {
function content_5f40acf632d415_99620344 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.highlight.php','function'=>'smarty_modifier_highlight',),1=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),2=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\modifier.timeAgo.php','function'=>'smarty_modifier_timeAgo',),3=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\function.paginate_prev.php','function'=>'smarty_function_paginate_prev',),4=>array('file'=>'C:\\wamp64\\www\\headline18.in\\libs\\plugins\\function.paginate_next.php','function'=>'smarty_function_paginate_next',),));
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
<title><?php echo $_smarty_tpl->tpl_vars['lang']->value[298];?>
 - <?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
</title>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['metadesc']->value;?>
" />
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
<div class="col-md-12">
<div class="row mt-1">
<div class="col-md-12 mb-3">
<h4><?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
</div>
</div>
<div class="row mt-1 row-eq-height">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newser']->value, 'le');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['le']->value) {
?>
<div class="col-md-3 mt-4 text-center">
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
/styles/images/noimage.png" wwidth="222" height="135" alt="<?php echo $_smarty_tpl->tpl_vars['le']->value['title'];?>
" />
<?php }?>
</a>
<?php }?>
</div>
<div class="col-md-9">
<div class="p-3">
<?php if ($_smarty_tpl->tpl_vars['rewritemod']->value == 1) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news/<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
/<?php echo $_smarty_tpl->tpl_vars['le']->value['helper'];?>
.html"><?php echo smarty_modifier_highlight($_smarty_tpl->tpl_vars['le']->value['title'],$_smarty_tpl->tpl_vars['hlgid']->value);?>
</a></h5><?php }
if ($_smarty_tpl->tpl_vars['rewritemod']->value == 2) {?><h5><a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/news.php?name=<?php echo $_smarty_tpl->tpl_vars['le']->value['univer'];?>
&amp;cat=<?php echo $_smarty_tpl->tpl_vars['le']->value['idblog'];?>
"><?php echo smarty_modifier_highlight($_smarty_tpl->tpl_vars['le']->value['title'],$_smarty_tpl->tpl_vars['hlgid']->value);?>
</a></h5><?php }?>
<div>
<?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->tpl_vars['le']->value['shortdesc']),480);?>

</div>
<div>
<span class="firstline"><?php echo smarty_modifier_timeAgo($_smarty_tpl->tpl_vars['le']->value['date']);?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[116];?>
</span>
</div>
</div>
</div>
<?php
}
} else {
?>
<div class="alert alert-primary m-3"><?php echo $_smarty_tpl->tpl_vars['lang']->value[172];?>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<div class="row mt-5 text-center">
<div class="col-md-12 mb-5 text-center">
<nav aria-label="Page navigation">
<ul class="pagination text-center">
<li class="page-item"><?php echo smarty_function_paginate_prev(array(),$_smarty_tpl);?>
</li>
<li class="page-item"><span class="page-link"><?php echo $_smarty_tpl->tpl_vars['lang']->value[120];?>
 <?php echo $_smarty_tpl->tpl_vars['paginate']->value['first'];?>
 - <?php echo $_smarty_tpl->tpl_vars['paginate']->value['last'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value[121];?>
 <?php echo $_smarty_tpl->tpl_vars['paginate']->value['total'];?>
</span></li>
<li class="page-item"><?php echo smarty_function_paginate_next(array(),$_smarty_tpl);?>
</li>
</ul>
</nav>
</div>
</div>
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
<?php echo '<script'; ?>
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
