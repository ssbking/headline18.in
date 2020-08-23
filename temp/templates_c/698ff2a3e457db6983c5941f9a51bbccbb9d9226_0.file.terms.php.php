<?php
/* Smarty version 3.1.32, created on 2020-08-23 03:27:39
  from 'C:\wamp64\www\headline18\themes\world\terms.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5f41e22bae5f66_91299505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '698ff2a3e457db6983c5941f9a51bbccbb9d9226' => 
    array (
      0 => 'C:\\wamp64\\www\\headline18\\themes\\world\\terms.php',
      1 => 1566864193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/maindir.php' => 1,
  ),
),false)) {
function content_5f41e22bae5f66_91299505 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\headline18\\libs\\plugins\\modifier.CloseTags.php','function'=>'smarty_modifier_CloseTags',),));
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
<title><?php echo $_smarty_tpl->tpl_vars['lang']->value[249];?>
 <?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
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
<div class="col-md-12">
<h4><?php echo $_smarty_tpl->tpl_vars['lang']->value[249];?>
 <?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
</h4>
</div>
</div>
<div class="row mt-4">
<div class="col-md-12">
<?php echo smarty_modifier_CloseTags(stripslashes(htmlspecialchars_decode($_smarty_tpl->tpl_vars['siteterms']->value)));?>

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
<footer class="page-footer font-small blue pt-4 mt-30">
<div class="container text-center text-md-left">
<div class="row">
<div class="col-md-6 mt-md-0 mt-3">
<h5 class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['lang']->value[295];?>
</h5>
<p><?php echo $_smarty_tpl->tpl_vars['lang']->value[296];?>
</p>
</div>
<hr class="clearfix w-100 d-md-none pb-3">
<div class="col-md-3 mb-md-0 mb-3">
<h5 class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['lang']->value[294];?>
</h5>
<ul class="list-unstyled">
<li>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/pageid.php?id=privacy"><?php echo $_smarty_tpl->tpl_vars['lang']->value[247];?>
</a>
</li>
<li>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/pageid.php?id=aboutus"><?php echo $_smarty_tpl->tpl_vars['lang']->value[248];?>
</a>
</li>
<li>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/pageid.php?id=terms"><?php echo $_smarty_tpl->tpl_vars['lang']->value[249];?>
</a>
</li>
<li>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/rss.php" target="_blank"><i class="fa fa-rss"></i></a>
</li>
</ul>
</div>
<div class="col-md-3 mb-md-0 mb-3">
<h5 class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['lang']->value[293];?>
</h5>
<ul class="list-unstyled">
<li>
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value[110];?>
</a>
</li>
<li>
<a href="http://www.phpenter.net" target="_blank">PHPEnter</a> 5.3.
</li>
<li>
<a href="https://rssatom.com/remote.php?remote=<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/rss.php" target="_blank">RSS</a>
</li>
</ul>
</div>
</div>
</div>
<div class="footer-copyright text-center py-3">&copy; 2018 Copyright:
<a href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
</a>
</div>
</footer>
</body>
</html><?php }
}
