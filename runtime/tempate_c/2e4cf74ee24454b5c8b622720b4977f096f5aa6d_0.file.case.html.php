<?php
/* Smarty version 3.1.30, created on 2017-11-14 06:12:11
  from "E:\www\meswebsite\app\index\view\pc\case.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0a18bb015eb8_57657149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e4cf74ee24454b5c8b622720b4977f096f5aa6d' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\index\\view\\pc\\case.html',
      1 => 1510611128,
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
function content_5a0a18bb015eb8_57657149 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <li><div class="proimg_bk"><a href="<?php echo url(array('path'=>'index/pcategory/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
" onclick="return false;" class="proimg">
                     <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['thumbnail'];?>
" width="245" height="245"></a></div>
                     <div class="clearfix"></div>
                     <a href="<?php echo url(array('path'=>'index/pcategory/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
" onclick="return false;"><p><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
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
