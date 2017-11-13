<?php
/* Smarty version 3.1.30, created on 2017-11-14 05:43:08
  from "E:\www\meswebsite\app\index\view\pc\pcategory.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0a11ecbad378_55958764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00170c78b78cee1b0d199e7fee32641f35cd761c' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\index\\view\\pc\\pcategory.html',
      1 => 1510609384,
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
function content_5a0a11ecbad378_55958764 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="box_right_title">产品中心</div>
                <div class="bt_text_y"><span><?php echo $_smarty_tpl->tpl_vars['crumbstr']->value;?>
</span></div>
            </div>
            <div class="pro_pic">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value['data'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <li>
                        <div class="proimg_bk"><a href="<?php echo url(array('path'=>'index/product/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
" class="proimg">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['thumbnail'];?>
" ></a></div>
                        <div class="clearfix"></div>
                        <a href="<?php echo url(array('path'=>'index/product/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
"><p><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</p></a>
                    </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </div>
            <div class="clearfix"></div>

            <div class="page"><?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>
</div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
