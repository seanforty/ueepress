<?php
/* Smarty version 3.1.30, created on 2017-11-13 08:58:33
  from "E:\www\ueepress2\app\index\view\pc\page.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08ee39d4b418_08838481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '388aa809b844e29924f65b3cb1e40fcdefb1d991' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\page.html',
      1 => 1510534245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pc/public/_meta.html' => 1,
    'file:pc/public/_header.html' => 1,
    'file:pc/sidebar.html' => 1,
    'file:pc/public/_footer.html' => 1,
  ),
),false)) {
function content_5a08ee39d4b418_08838481 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="contant">
    <div class="list_box">
        <?php $_smarty_tpl->_subTemplateRender("file:pc/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="box_right">
            <div class="box_bt">
                <div class="box_right_title"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</div>
                <div class="bt_text_y"><span><?php echo $_smarty_tpl->tpl_vars['crumbstr']->value;?>
</span>
                </div>
            </div>
            <div class="box_right_con"><?php echo $_smarty_tpl->tpl_vars['res']->value['content'];?>
</div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
