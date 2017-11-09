<?php
/* Smarty version 3.1.30, created on 2017-11-08 06:18:44
  from "E:\www\UeePress\app\index\view\pc\page.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a023144051be9_22298872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26612bb4b2b00f9ffc9f1fc5658288ed1e4048f8' => 
    array (
      0 => 'E:\\www\\UeePress\\app\\index\\view\\pc\\page.html',
      1 => 1509923301,
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
function content_5a023144051be9_22298872 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--内容 开始-->
<div class="danye" style="padding: 100px 20px;width: 1160px;">
	<div class="danye_a" style="padding-left: 10px;"><img src="<?php echo @constant('STATIC');?>
/index/images/db_03.png" alt="">&nbsp;当前位置：<a href="index.php">首页</a> > <?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</div>
  	<div class="danye_1"> 
		<div class="damye_1a"></div>
  		<div style="clear:both"></div>
  		<div class="danye_2"><img src="<?php echo @constant('STATIC');?>
/index/images/dx_03.png" alt="分隔符"></div>
    	<div class="danye_12" style="padding: 0 10px; text-indent:2em">
            <?php echo $_smarty_tpl->tpl_vars['res']->value['content'];?>

        </div>
	</div>
</div>
<!--内容 结束-->

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
