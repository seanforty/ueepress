<?php
/* Smarty version 3.1.30, created on 2017-11-11 14:53:27
  from "E:\www\ueepress2\app\index\view\pc\page.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a069e67a241f1_30834574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '388aa809b844e29924f65b3cb1e40fcdefb1d991' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\index\\view\\pc\\page.html',
      1 => 1510383188,
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
function content_5a069e67a241f1_30834574 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="contant">
    <div class="list_box">
        <div class="lift_zuo cl">
            <div class="n_pro_list">
                <div class="list" id="fontred">
                    <p>关于鹤川</p>
                    <ul>
                        <li><a href="/aboutus_1.html" id="leftId1">公司简介</a></li>
                        <li><a href="/aboutus_2.html" id="leftId2">企业文化</a></li>
                        <li><a href="/aboutus_3.html" id="leftId3">公司发展</a></li>
                        <li><a href="/honor.html" id="leftId8">鹤川资质</a></li>
                    </ul>
                    <?php echo '<script'; ?>
 language="javascript" type="text/javascript">
                        try {
                            document.getElementById("leftId" + left).className = "font_red";
                        }
                        catch (e) {
                        }
                    <?php echo '</script'; ?>
>
                </div>

                <div class="list1" id="fontred">
                    <p>产品推荐</p>
                    <ul>
                        <li>
                            <div class="proimg_bk">
                                <a href="/productshow_56.html" class="proimg"><img
                                        src="picture/s_636371959519295874.jpg"/></a>
                            </div>
                            <a href="/productshow_56.html"><span>AS潜水排污泵</span></a>
                        </li>

                        <li>
                            <div class="proimg_bk">
                                <a href="/productshow_55.html" class="proimg"><img
                                        src="picture/s_636377792133195980.jpg"/></a>
                            </div>
                            <a href="/productshow_55.html"><span>ZW无堵塞自吸式排污泵</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box_right">
            <div class="box_bt">
                <div class="box_right_title"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</div>
                <div class="bt_text_y"><span>您现在所在位置：<a href='/'>首页</a> > <a href='/aboutus.html'>关于鹤川</a> > 公司简介</span>
                </div>
            </div>
            <div class="box_right_con"><?php echo $_smarty_tpl->tpl_vars['res']->value['content'];?>
</div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
