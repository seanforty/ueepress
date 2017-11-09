<?php
/* Smarty version 3.1.30, created on 2017-11-08 07:39:23
  from "E:\www\UeePress\app\index\view\pc\category.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a02442bbbbb62_11704628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d6601a21ff63f1807ea806f00dca8ca2e915e49' => 
    array (
      0 => 'E:\\www\\UeePress\\app\\index\\view\\pc\\category.html',
      1 => 1509922463,
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
function content_5a02442bbbbb62_11704628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--内容 开始-->
<div class="danye">
    <div class="danye_a" style="margin-left: 20px;">
        <img src="<?php echo @constant('STATIC');?>
/index/images/db_03.png" alt="" />&nbsp;
        <?php echo $_smarty_tpl->tpl_vars['crumbstr']->value;?>

    </div>

    <div class="danye_11"style="width: 1050px;margin-top: 20px;">
        <?php if (isset($_smarty_tpl->tpl_vars['submenu']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['submenu']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <?php if (isset($_smarty_tpl->tpl_vars['scid']->value)) {?>
        <div class="content_left_content" ><a href="<?php echo url(array('path'=>'index/category/index','params'=>array('pcid'=>$_smarty_tpl->tpl_vars['pcid']->value,'scid'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['scid']->value == $_smarty_tpl->tpl_vars['v']->value['id']) {?><b><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</b><?php } else {
echo $_smarty_tpl->tpl_vars['v']->value['title'];
}?></a></div>
            <?php } else { ?>
        <div class="content_left_content" ><a href="<?php echo url(array('path'=>'index/category/index','params'=>array('pcid'=>$_smarty_tpl->tpl_vars['pcid']->value,'scid'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></div>
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
    </div>

    <div class="danye_1">
        <div style="clear:both"></div>
        <div class="danye_2"><img src="<?php echo @constant('STATIC');?>
/index/images/dx_03.png" alt="分隔线" /></div>
        <div class="danye_12">
            <div class="news_pord_1">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articlelist']->value['data'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <li><a href="<?php echo url(array('path'=>'index/article/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
">
                            <div class="news_pord_11"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</div>
                            <span class="news_pord_12"><?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>
</span>
                        </a>
                    </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                 </ul>
                <div style="clear:both"></div>
                <div class="main_page">
                    <ul></ul>
                </div>
            </div>

            <div style="clear:both"></div>
            <div class="main_page">
                <ul><?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>
</ul>
            </div>
        </div>
    </div>
</div>
<!--内容 结束-->

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
