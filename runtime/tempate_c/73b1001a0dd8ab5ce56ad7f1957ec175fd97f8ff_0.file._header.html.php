<?php
/* Smarty version 3.1.30, created on 2017-11-09 09:10:33
  from "E:\www\ueepress\app\index\view\pc\public\_header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03ab09d66e58_93639203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73b1001a0dd8ab5ce56ad7f1957ec175fd97f8ff' => 
    array (
      0 => 'E:\\www\\ueepress\\app\\index\\view\\pc\\public\\_header.html',
      1 => 1510189717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a03ab09d66e58_93639203 (Smarty_Internal_Template $_smarty_tpl) {
?>
<body>
<div class="head" >
    <div class="head_1">
        <div class="head_11" >
            <a href="<?php echo url(array('path'=>'index/index/index'),$_smarty_tpl);?>
" style="z-index:999!important;"><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['logo'][0]['image']['img_url'];?>
"></a>
        </div>
        <div class="head_12">
            <div class="head_121"><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['logo_ls'][0]['image']['img_url'];?>
" alt=""> <?php echo $_smarty_tpl->tpl_vars['ads']->value['logo_ls'][0]['img_alt'];?>
</div>
            <div class="head_121"><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['logo_rs'][0]['image']['img_url'];?>
" alt=""> <?php echo $_smarty_tpl->tpl_vars['ads']->value['logo_rs'][0]['img_alt'];?>
</div>
        </div>
        <div style="clear:both"></div>
        <div class="head_13">
            <ul>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainmenu']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
if ($_smarty_tpl->tpl_vars['v']->value['parent_id'] == "0") {?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "0") {?><a href="<?php echo url(array('path'=>'index/category/index','params'=>array('pcid'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><li><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</li></a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "1") {?><a href="<?php echo url(array('path'=>'index/page/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><li><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</li></a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "2") {?><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkid'];?>
"><li><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</li></a><?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <div id="inner">
            <div class="hot-event">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ads']->value['sliderbox'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <div class="event-item" style="display: block;">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['target_url'];?>
" target="<?php if ($_smarty_tpl->tpl_vars['v']->value['target'] == '0') {?>_self<?php } else { ?>_blank<?php }?>"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['img_url'];?>
" class="photo" style="width: 1200px; height: 495px;" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['img_alt'];?>
" /></a>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <div class="switch-tab">
                    <a href="#" onclick="return false;" class="current">1</a>
                    <a href="#" onclick="return false;">2</a>
                    <a href="#" onclick="return false;">3</a>
                </div>
            </div>
        </div>
        <?php echo '<script'; ?>
 type="text/javascript">
            $('#inner').nav({ t: 5000, a: 3000 });
        <?php echo '</script'; ?>
>
        <div class="head_14">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainmenu2']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <li class="head_141">
                <div class="head_142">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "0") {?><a href="<?php echo url(array('path'=>'index/category/index','params'=>array('pcid'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "1") {?><a href="<?php echo url(array('path'=>'index/page/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['linkid'])),$_smarty_tpl);?>
"><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['linktype'] == "2") {?><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkid'];?>
"><?php }?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
"></a>
                </div>
                <span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </div>
</div><?php }
}
