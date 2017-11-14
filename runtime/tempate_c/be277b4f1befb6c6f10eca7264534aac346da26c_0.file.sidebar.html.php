<?php
/* Smarty version 3.1.30, created on 2017-11-14 08:28:48
  from "E:\www\ueepress2\app\index\view\pc\sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0a38c00e3cd7_98258180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be277b4f1befb6c6f10eca7264534aac346da26c' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\sidebar.html',
      1 => 1510619312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0a38c00e3cd7_98258180 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="lift_zuo cl">
    <div class="lift_zuo cl">
        <div class="n_pro_list">
            <div class="list_prop">
                <p><?php echo $_smarty_tpl->tpl_vars['sidetitle']->value;?>
</p>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['side']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <li id="navId1">
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "0") {?><li class="l1"><a href="<?php echo url(array('path'=>'index/page/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "1") {?><li class="l1"><a href="<?php echo url(array('path'=>'index/pcategory/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "2") {?><li class="l1"><a href="<?php echo url(array('path'=>'index/acategory/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "3") {?><li class="l1"><a href="<?php echo url(array('path'=>'index/cases/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "4") {?><li class="l1"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkid'];?>
"><?php }?>
                    title="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" class="a1"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </div>

            <div class="list1" id="fontred">
                <p>产品推荐</p>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recopro']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <li>
                        <div class="proimg_bk">
                            <a href="<?php echo url(array('path'=>'index/product/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
" class="proimg">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['thumbnail'];?>
" width=""></a>
                        </div>
                        <a href="/productshow_56.html"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></a>
                    </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </div>

        </div>
    </div>
</div><?php }
}
