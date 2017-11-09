<?php
/* Smarty version 3.1.30, created on 2017-11-09 09:10:33
  from "E:\www\ueepress\app\index\view\pc\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03ab09ad2b32_46680893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe87c6c8efc45889196cf1fa822a27e3d26cc9fc' => 
    array (
      0 => 'E:\\www\\ueepress\\app\\index\\view\\pc\\index.html',
      1 => 1510189717,
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
function content_5a03ab09ad2b32_46680893 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="cont">
    <div class="cont_1">
        <div class="cont_11" style="width: 250px;"><?php echo $_smarty_tpl->tpl_vars['moduleone']->value['subtitle'];?>
</div>
        <div class="cont_12"><?php echo $_smarty_tpl->tpl_vars['moduleone']->value['title'];?>
</div>
    </div>
    <div class="cont_2">
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moduleone']->value['cateData'], 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
            <li><a href="<?php echo url(array('path'=>'index/category/index','params'=>array('pcid'=>$_smarty_tpl->tpl_vars['res']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
&nbsp;</a>|</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <li style="float: right;margin-right: 100px;">
                <a href="<?php echo url(array('path'=>'index/category/index','params'=>array('pcid'=>$_smarty_tpl->tpl_vars['moduleone']->value['maincateid'])),$_smarty_tpl);?>
">---更多></a>
            </li>
        </ul>
        <div class="cont_21">
            <div class="cont_22">
                <img src="<?php echo $_smarty_tpl->tpl_vars['moduleone']->value['img'][0]['image']['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['moduleone']->value['img'][0]['img_alt'];?>
" />
            </div>
            <div class="cont_23">
                <div id="freewall" class="free-wall">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moduleone']->value['articles'], 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
                    <div class="brick">
                        <a href="<?php echo url(array('path'=>'index/article/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['res']->value['id'])),$_smarty_tpl);?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['res']->value['image']['img_url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
">
                        </a>
                    </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
            <?php echo '<script'; ?>
 src="<?php echo @constant('STATIC');?>
/index/js/freewall.js" type="text/javascript"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo @constant('STATIC');?>
/index/js/jquery.sliphover.min.js" type="text/javascript"><?php echo '</script'; ?>
>

            <?php echo '<script'; ?>
 type="text/javascript">
                var wall = new freewall("#freewall");
                wall.reset({
                    selector: '.brick',
                    animate: true,
                    cellW: 300,
                    cellH: 'auto',
                    onResize: function() {
                        wall.fitWidth();
                    }
                });
                wall.container.find('.brick img').load("load",function() {
                    wall.fitWidth();
                });
                //call sliphover
                $('#freewall').sliphover();
            <?php echo '</script'; ?>
>
        </div>
    </div>
</div>


<!-- 关于我们 -->
<div class="cont_about">
    <div class="cont_about_1">
        <div class="cont_about_11">
            <div class="cont_about_12" style="width: 250px;">ABOUT US</div>
            <div class="cont_about_13">关于我们</div>
        </div>
        <div class="cont_about_3">
            <div class="cont_about_31">
                <img src="<?php echo $_smarty_tpl->tpl_vars['moduletwo']->value['img'][0]['image']['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['moduletwo']->value['img'][0]['img_alt'];?>
" />
            </div>
        </div>
        <div class="cont_about_4">
            <div class="shouye-about-21">
                <div class="shouye-about-23">
                    <?php echo $_smarty_tpl->tpl_vars['moduletwo']->value['content'];?>

                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>

<!-- 新闻列表 -->
<div class="cont_news">
    <div class="cont_news_1">
        <!-- 第一栏 -->
        <div class="cont_news_11">
            <div class="cont_news_111">
                <div class="cont_news_112" style="width: 200px;"><?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c1_title'];?>
</div>
                <div class="cont_news_113"><?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c1_subtitle'];?>
</div>
                <div class="cont_news_115">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c1_img'][0]['image']['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c1_img'][0]['img_alt'];?>
">
                </div>
                <div class="cont_news_114" style="margin-top:5px;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modulethree']->value['c1_articles'], 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
                    <li><a href="<?php echo url(array('path'=>'index/article/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['res']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
        </div>
        <!-- 第二栏 -->
        <div class="cont_news_11">
            <div class="cont_news_111">
                <div class="cont_news_112" style="width: 200px;"><?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c2_title'];?>
</div>
                <div class="cont_news_113"><?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c2_subtitle'];?>
</div>
                <div class="cont_news_115">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c2_img'][0]['image']['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c2_img'][0]['img_alt'];?>
">
                </div>
                <div class="cont_news_114" style="margin-top:5px;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modulethree']->value['c2_articles'], 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
                    <li><a href="<?php echo url(array('path'=>'index/article/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['res']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
        </div>
        <!-- 第三栏 -->
        <div class="cont_news_11">
            <div class="cont_news_111">
                <div class="cont_news_112" style="width: 200px;"><?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c3_title'];?>
</div>
                <div class="cont_news_113"><?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c3_subtitle'];?>
</div>
                <div class="cont_news_115">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c3_img'][0]['image']['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['modulethree']->value['c3_img'][0]['img_alt'];?>
">
                </div>
                <div class="cont_news_114" style="margin-top:5px;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modulethree']->value['c3_articles'], 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
                    <li><a href="<?php echo url(array('path'=>'index/article/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['res']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
