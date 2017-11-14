<?php
/* Smarty version 3.1.30, created on 2017-11-14 08:29:59
  from "E:\www\ueepress2\app\index\view\pc\acategory.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0a3907c96dc1_28806672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73e45303cf89a261855ae837246dfeb54214e4a0' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\acategory.html',
      1 => 1510619312,
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
function content_5a0a3907c96dc1_28806672 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="contant">
  <div class="list_box">
      <?php $_smarty_tpl->_subTemplateRender("file:pc/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="list_right">
      <div class="box_bt">
        <div class="box_right_title">鹤川资讯</div>
        <div class="bt_text_y"><span><?php echo $_smarty_tpl->tpl_vars['crumbstr']->value;?>
</span></div>
      </div>
      <div class="pro_photo">
        <div class="info_news">
          <ul>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value['data'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <li> <a href="<?php echo url(array('path'=>'index/article/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
"> <span><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a> </li>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </ul>
        </div>
      </div>
      <div class="cl"></div>
      <div class="page"><?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>

      </div>
    </div>
  </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
