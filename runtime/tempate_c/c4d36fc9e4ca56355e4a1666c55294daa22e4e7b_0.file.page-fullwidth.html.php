<?php
/* Smarty version 3.1.30, created on 2017-11-11 22:57:00
  from "E:\www\meswebsite\app\index\view\pc\page-fullwidth.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a070fbcb0f623_36899753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4d36fc9e4ca56355e4a1666c55294daa22e4e7b' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\index\\view\\pc\\page-fullwidth.html',
      1 => 1510412169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pc/public/_meta.html' => 1,
    'file:pc/public/_header.html' => 1,
    'file:pc/public/_footer.html' => 1,
  ),
),false)) {
function content_5a070fbcb0f623_36899753 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="contant">
    <div class="list_box">
        <div class="box_bt" style="border-bottom: 1px solid #e1e1e1;width: 1100px;">
            <div class="box_right_title"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</div>
            <div class="bt_text_y"><span>您现在所在位置：<a href='/'>首页</a> > <a href='/aboutus.html'>关于鹤川</a> > 公司简介</span></div>
        </div>
        <div class="box_right_con" style="width: 1060px;margin-left:20px;margin-right: 20px;"><?php echo $_smarty_tpl->tpl_vars['res']->value['content'];?>
</div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
