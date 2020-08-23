<?php
/* Smarty version 3.1.32, created on 2020-08-20 07:51:54
  from 'C:\wamp64\www\headline18.in\themes\classic\submit_tree.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
  'version' => '3.1.32',
  'unifunc' => 'content_5f3e2b9a309462_64381397',
  'has_nocache_code' => false,
  'file_dependency' =>
  array(
    '50644c79eb6bf2c6ff0bb2ebaba497beb83e43c5' =>
    array(
      0 => 'C:\\wamp64\\www\\headline18.in\\themes\\classic\\submit_tree.php',
      1 => 1566482717,
      2 => 'file',
    ),
  ),
  'includes' =>
  array(
  ),
), false)) {
    function content_5f3e2b9a309462_64381397(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><select name="idblog" id="firstfield" class="form-control" data-validation="length" data-validation-length="5-100">
<option value="">----------</option>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categori']->value, 'caty');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['caty']->value) {
                ?>
<option value="<?php echo $_smarty_tpl->tpl_vars['caty']->value['catid']; ?>
|<?php echo $_smarty_tpl->tpl_vars['caty']->value['name']; ?>
|<?php echo $_smarty_tpl->tpl_vars['caty']->value['seoname']; ?>
"> <?php echo stripslashes($_smarty_tpl->tpl_vars['caty']->value['name']); ?>
</option>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcat']->value, 'inc');
                if ($_from !== null) {
                    foreach ($_from as $_smarty_tpl->tpl_vars['inc']->value) {
                        ?> 
<?php if ($_smarty_tpl->tpl_vars['inc']->value['cord'] != 0 && $_smarty_tpl->tpl_vars['caty']->value['catid'] == $_smarty_tpl->tpl_vars['inc']->value['parent']) {?>
<option value="<?php echo $_smarty_tpl->tpl_vars['inc']->value['catid'];?>
|<?php echo $_smarty_tpl->tpl_vars['inc']->value['name'];?>
|<?php echo $_smarty_tpl->tpl_vars['inc']->value['seoname'];?>
">&nbsp;&nbsp;<?php echo stripslashes($_smarty_tpl->tpl_vars['inc']->value['name']);?>
</option>
<?php } ?> 
<?php
                    }
                }
                $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
</select>





<?php
    }
}
