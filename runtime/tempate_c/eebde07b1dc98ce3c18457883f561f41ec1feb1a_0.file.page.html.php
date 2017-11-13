<?php
/* Smarty version 3.1.30, created on 2017-11-13 08:06:57
  from "E:\www\meswebsite\app\index\view\pc\page.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08e221677831_62536550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eebde07b1dc98ce3c18457883f561f41ec1feb1a' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\index\\view\\pc\\page.html',
      1 => 1510531589,
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
function content_5a08e221677831_62536550 (Smarty_Internal_Template $_smarty_tpl) {
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
