<?php
/* Smarty version 3.1.30, created on 2017-11-13 08:51:56
  from "E:\www\ueepress2\app\index\view\pc\public\_footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08ecac8613e1_50967883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f190a1d24da16745d1ed1fb68ee6a17c54fd1c1' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\public\\_footer.html',
      1 => 1510534245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a08ecac8613e1_50967883 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--底部-->
<div class="bot">
    <div class="w1100">
        <?php if (isset($_smarty_tpl->tpl_vars['link']->value)) {?>
        <div class="friend">友情链接：
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" target="<?php if ($_smarty_tpl->tpl_vars['v']->value['target'] == "1") {?>_blank<?php } else { ?>_self<?php }?>"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
        <?php }?>
        <div class="bot_nav">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainmenu2']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "0") {?><a href="<?php echo url(array('path'=>'index/page/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "1") {?><a href="<?php echo url(array('path'=>'index/pcategory/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "2") {?><a href="<?php echo url(array('path'=>'index/acategory/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "3") {?><a href="<?php echo url(array('path'=>'index/cases/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "4") {?><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkid'];?>
"><?php }?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
        <div class="bot2 clearfix">
            <div class="logo fl">
                <a href="<?php echo url(array('path'=>'index/index/index'),$_smarty_tpl);?>
">
                    <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['logo'][0]['image']['img_url'];?>
"/></a>
            </div>
            <div class="tact fl">
                <p><?php echo $_smarty_tpl->tpl_vars['footer']->value['copyright'];?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['footer']->value['beianhao'];?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['footer']->value['footercontact'];?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['footer']->value['footertext'];?>
</p>
            </div>
            <div class="ewm fr">
                <img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['footer_img'][0]['image']['img_url'];?>
" width="114" height="112"/>
                <p>
                    <span style="display:none;"></span></p>
            </div>
        </div>
    </div>
</div>
<!--幻灯片事件绑定-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/index/js/jquery.banner.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function () {
    $(".banner").swBanner();
});
<?php echo '</script'; ?>
>
<!--走马灯-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/index/js/jquery.scrollshow.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type=text/javascript>
jQuery(document).ready(function () {
    jQuery("#h_customer_slide").scrollShow("right", {
        step: 1,
        time: 5000
    }); //滚动图片数和间隔时间
});
<?php echo '</script'; ?>
>
<!--在客服悬浮-->
<div class="sidebar_qq">
<a href="<?php echo $_smarty_tpl->tpl_vars['footer']->value['floatservicelink'];?>
" target="_blank"><img alt="在线客服" src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['float_service'][0]['image']['img_url'];?>
"></a>
</div>
</body>
</html><?php }
}
