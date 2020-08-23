<?php
/* Smarty version 3.1.32, created on 2020-08-19 19:14:42
  from 'C:\wamp64\www\headline18.in\themes\classic\blank.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
  'version' => '3.1.32',
  'unifunc' => 'content_5f3d7a22f3f455_32975157',
  'has_nocache_code' => false,
  'file_dependency' =>
  array(
    '2b638953548278d7edcb64215c259d59f8ea6106' =>
    array(
      0 => 'C:\\wamp64\\www\\headline18.in\\themes\\classic\\blank.php',
      1 => 1566482704,
      2 => 'file',
    ),
  ),
  'includes' =>
  array(
    'file:themes/".((string)$_smarty_tpl->tpl_vars[\'themes\']->value)."/maindir.php' => 1,
  ),
), false)) {
    function content_5f3d7a22f3f455_32975157(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="ROBOTS" content="All" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value; ?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['metadesc']->value; ?>
" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value; ?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value; ?>
/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<?php if ($_smarty_tpl->tpl_vars['frontext']->value == 'rtl') {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/rtl/bootstrap.min.css" />
<?php } else { ?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value;?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value;?>
/styles/bootstrap.min.css" />
<?php } ?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value; ?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value; ?>
/styles/font-awesome.css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value; ?>
/themes/<?php echo $_smarty_tpl->tpl_vars['themes']->value; ?>
/styles/basic.css" />
<link rel="alternate" type="application/atom+xml" title="<?php echo $_smarty_tpl->tpl_vars['sitetitle']->value; ?>
 - RSS" href="<?php echo $_smarty_tpl->tpl_vars['sitepath']->value; ?>
/rss.php" />
<title><?php echo $_smarty_tpl->tpl_vars['sitetitle']->value; ?>
</title>
</head> 
<body>
<?php $_smarty_tpl->_subTemplateRender("file:themes/".((string)$_smarty_tpl->tpl_vars['themes']->value)."/maindir.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
    }
}
