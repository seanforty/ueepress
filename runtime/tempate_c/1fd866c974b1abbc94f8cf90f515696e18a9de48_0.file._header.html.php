<?php
/* Smarty version 3.1.30, created on 2017-11-13 08:51:56
  from "E:\www\ueepress2\app\index\view\pc\public\_header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08ecac7385a2_60021807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fd866c974b1abbc94f8cf90f515696e18a9de48' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\public\\_header.html',
      1 => 1510534245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a08ecac7385a2_60021807 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="top">
    <div class="top1">
        <div class="w1100 clearfix">
            <div class="hyy fl"><?php echo $_smarty_tpl->tpl_vars['header']->value['headerwelcome'];?>
</div>
            <div class="dt fr">
                <a href="<?php echo $_smarty_tpl->tpl_vars['header']->value['headermenulink1'];?>
"><?php echo $_smarty_tpl->tpl_vars['header']->value['headermenutitle1'];?>
</a>
                <span>/</span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['header']->value['headermenulink2'];?>
"><?php echo $_smarty_tpl->tpl_vars['header']->value['headermenutitle2'];?>
</a>
                <span>/</span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['header']->value['headermenulink3'];?>
"><?php echo $_smarty_tpl->tpl_vars['header']->value['headermenutitle3'];?>
</a>
            </div>
        </div>
    </div>
    <div class="top2 w1100 clearfix">
        <div class="logo fl">
            <a href="<?php echo url(array('path'=>'index'),$_smarty_tpl);?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['logo'][0]['image']['img_url'];?>
" width="150" height="100" alt="鹤川泵业（上海）有限公司" title="鹤川泵业（上海）有限公司" /></a>
        </div>
        <div class="name fl">
            <h1><?php echo $_smarty_tpl->tpl_vars['header']->value['sitename'];?>
</h1>
            <h2><?php echo $_smarty_tpl->tpl_vars['header']->value['sitesubtitle'];?>
</h2></div>
        <div class="tact fr"><div style="color: #ff8a00;font-size: 20px;overflow:hidden;padding-top: 60px;padding-left: 65px;"><strong>400-086-9986</strong></div></div>
    </div>
    <div class="nav">
        <ul class="w1100 clearfix">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainmenu']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <li id="navId1">
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
</a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ul>
    </div>
    <!--banner start-->
    <div class="banner">
        <ul class="banList">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ads']->value['sliderbox'], 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <li class="active">
                <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['target_url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['img_url'];?>
" /></a>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ul>
        <div class="fomW">
            <div class="jsNav">
                <a href="javascript:;" class="trigger current"></a>
                <a href="javascript:;" class="trigger"></a>
                <a href="javascript:;" class="trigger"></a>
            </div>
        </div>
    </div>
    <!--banner end-->
</div><?php }
}
