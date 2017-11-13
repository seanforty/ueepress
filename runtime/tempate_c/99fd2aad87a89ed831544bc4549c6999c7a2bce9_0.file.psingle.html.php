<?php
/* Smarty version 3.1.30, created on 2017-11-13 09:00:40
  from "E:\www\ueepress2\app\index\view\pc\psingle.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08eeb8e5a5a2_53654165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99fd2aad87a89ed831544bc4549c6999c7a2bce9' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\psingle.html',
      1 => 1510534245,
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
function content_5a08eeb8e5a5a2_53654165 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="box_right_title">产品中心</div>
                <div class="bt_text_y"><span><?php echo $_smarty_tpl->tpl_vars['crumbstr']->value;?>
</span>
                </div>
            </div>

            <!--下部分代码-->
            <div class="column">
                <div class="siderightCon">
                    <div class="nypro">
                        <div id="preview">
                            <div class="jqzoom" id="spec-n1">
                                <?php if (count($_smarty_tpl->tpl_vars['res']->value['images']) != 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['res']->value['images'][0]['img_url'];?>
" width="398" height="398"><?php }?>
                            </div>
                            <div id="spec-n5">
                                <div class="control" id="spec-left">
                                    <img onclick="moveright()" src="<?php echo @constant('STATIC');?>
/index/images/left.gif"/>
                                </div>
                                <div id="spec-list" >
                                    <ul class="list-h">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value['images'], 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                                    <li><div class="proimg_bk"><a class="proimg"><img onmouseover="selectimg(this)" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['img_url'];?>
" height="70" width="90"></a></div></li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </ul>
                                </div>
                                <div class="control" id="spec-right">
                                    <img onclick="moveleft()" src="<?php echo @constant('STATIC');?>
/index/images/right.gif"/>
                                </div>
                            </div>
                        </div>
                    </div>
<?php echo '<script'; ?>
>
function selectimg(t) {
    var src = t.src;
    $("#spec-n1 img").attr("src",src);
}
function moveleft() {
    var count = $(".list-h").children("li").length;
    if(count>4){
        $(".list-h li:first").css("width","0");
    }
}
function moveright() {
    $(".list-h li:first").removeAttr("style");
}
<?php echo '</script'; ?>
>
                    <div class="product_bigimg_text">
                        <h2><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</h2>
                        <div class="prod-right-title">
                            <div class="text1"><?php echo $_smarty_tpl->tpl_vars['res']->value['description'];?>
</div>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="line"></div>

                    <div id="con"><!--TAB切换 BOX-->
                        <ul id="tags"><!--TAB 标题切换-->
                            <li class=selectTag><A onmouseover="selectTag('tagContent0',this)" href="javascript:void(0)"
                                                   onFocus="this.blur()">产品介绍</A></LI>
                        </ul><!--TAB 标题切换 END-->

                        <div id=tagContent><!--内容-->
                            <div class="tagContent selectTag" id=tagContent0><!--商品介绍-->
                                <?php echo $_smarty_tpl->tpl_vars['res']->value['content'];?>

                            </div><!--商品介绍 END-->
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
