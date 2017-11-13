<?php
/* Smarty version 3.1.30, created on 2017-11-14 06:14:10
  from "E:\www\meswebsite\app\index\view\pc\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0a19322429c4_21622756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60920c9f75435ba9b21c2b2245b664504b27e35c' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\index\\view\\pc\\index.html',
      1 => 1510611248,
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
function content_5a0a19322429c4_21622756 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:pc/public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="con">
    <!--提出问题-->
    <div class="wenOuter">
        <div class="wenInner">
            <div class="tit"><h2>企业生产常出现的问题</h2><span>Enterprise production often problems</span><i></i></div>
            <ul>
                <li><span>01</span>生产排程不合理，<b>订单延误、漏单经常发生</b></li>
                <li><span>02</span>生产现场管理混乱，造成<b>人力资源和物料的浪费</b></li>
                <li><span>03</span><b>生产进度不透明，</b>给业务和跟单带来诸多不便</li>
                <li><span>04</span>不能及时了解产品不良率，<b>质量控制难度大</b></li>
                <li><span>05</span>仓储管理不规范，造成<b>材料积压过多，物料查找麻烦</b></li>
            </ul>
        </div>
    </div>

    <!-- html -->
    <div class="ck-slide">
        <div class="ck-slidebox">
            <div class="slideWrap">
                <ul class="dot-wrap">
                    <li onclick="selectit(this)" style="background-color:#ccc;" class="current"><a href="javascript:;"><div class="block"><span>全程监控</span><br><br>数据可视呈现<br>高效远程管理</div></a></li>
                    <li onclick="selectit(this)"><a href="javascript:;"><div class="block"><span>全程监控</span><br><br>数据可视呈现<br>高效远程管理</div></a></li>
                    <li onclick="selectit(this)"><a href="javascript:;"><div class="block"><span>全程监控</span><br><br>数据可视呈现<br>高效远程管理</div></a></li>
                    <li onclick="selectit(this)"><a href="javascript:;"><div class="block"><span>全程监控</span><br><br>数据可视呈现<br>高效远程管理</div></a></li>
                    <li onclick="selectit(this)"><a href="javascript:;"><div class="block"><span>全程监控</span><br><br>数据可视呈现<br>高效远程管理</div></a></li>
                    <li onclick="selectit(this)"><a href="javascript:;"><div class="block"><span>全程监控</span><br><br>数据可视呈现<br>高效远程管理</div></a></li>
                </ul>
            </div>
        </div>
        <div class="ck-slide-imgs">
            <ul class="ck-slide-wrapper">
                <li><a href="javascript:;"><img src="<?php echo @constant('STATIC');?>
/index/pic/slider1.jpg" alt=""></a></li>
                <li style="display:none"><a href="javascript:;"><img src="<?php echo @constant('STATIC');?>
/index/pic/slider2.jpg" alt=""></a></li>
                <li style="display:none"><a href="javascript:;"><img src="<?php echo @constant('STATIC');?>
/index/pic/slider3.jpg" alt=""></a></li>
                <li style="display:none"><a href="javascript:;"><img src="<?php echo @constant('STATIC');?>
/index/pic/slider4.jpg" alt=""></a></li>
                <li style="display:none"><a href="javascript:;"><img src="<?php echo @constant('STATIC');?>
/index/pic/slider3.jpg" alt=""></a></li>
                <li style="display:none"><a href="javascript:;"><img src="<?php echo @constant('STATIC');?>
/index/pic/slider4.jpg" alt=""></a></li>
            </ul>
        </div>

        <a href="javascript:;" class="ctrl-slide ck-prev">上一张</a>
        <a href="javascript:;" class="ctrl-slide ck-next">下一张</a>
    </div>
<?php echo '<script'; ?>
 src="<?php echo @constant('STATIC');?>
/index/js/slide.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $('.ck-slide').ckSlide({
        dir: 'x'
    });
    function selectit(t)
    {
        $(".dot-wrap li").css("background","none");
        t.style.backgroundColor= "#6399eb";
    }
<?php echo '</script'; ?>
>
    <!--解决问题-->
    <div class="whyOuter">
        <div class="whyInner">
            <div class="tit"><h2>为什么选择普中MES</h2><span>Why choose us</span><i></i></div>
            <ul>
                <li class="w1"><a href="javascript:;"><i></i><b>网络下单，方便快捷</b>
                    <p>实现定制化MES系统产品网络下单，MES系统生产厂家直接面向客户，由客户自主选择配提升客户满意度。</p><em>+</em></a></li>
                <li class="w2"><a href="javascript:;"><i></i><b>高级排产，动态平衡</b>
                    <p>利用MES软件智能的计划排程算法，同时考虑物料和能力的限制， MES系统预测订单优先级，实现智能排产</p><em>+</em></a></li>
                <li class="w3"><a href="javascript:;"><i></i><b>生产过程，全程撑控</b>
                    <p>MES系统实时监控订单的生产进度、车间人员效率和产品质量，及时修正生产中出现的问题。</p><em>+</em></a></li>
                <li class="w4"><a href="javascript:;"><i></i><b>仓库管理，精准高效</b>
                    <p>MES系统把物料入库、出库、盘点方便精准，高效定位物料位置；MES系统提供生产线上物料和发生事件的全面追踪。</p><em>+</em></a></li>
                <li class="w5"><a href="javascript:;"><i></i><b>人员设备，高效协同</b>
                    <p>MES系统设备监控，记录设备状态与生产实时数据；安灯呼叫，MES系统优化车间管理，促进部门间合作。</p><em>+</em></a></li>
                <li class="w6"><a href="javascript:;"><i></i><b>产品追溯，直达源头</b>
                    <p>MES系统全程记录产品生命周期，实现物料批次、作业人员、设备工艺等追溯信息整合。</p><em>+</em></a></li>
                <li class="w7"><a href="javascript:;"><i></i><b>管理决策，数据说话</b>
                    <p>MES系统实现企业数据管理科学化，数据分析智能化以及信息查询快速及时。</p><em>+</em></a></li>
            </ul>
        </div>
    </div>
    <!--客户案例-->
    <div class="case w1100">
        <div class="bt">
            <h2>服务客户</h2>
            <p>OUR CUSTOMERS</p>
        </div>
        <div class="photo" id="h_customer_slide">
            <a href="javascript:void(0);" class="plus"></a>
            <div class="box">
                <ul class="pic clearfix">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cases']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <?php if (isset($_smarty_tpl->tpl_vars['v']->value['image']['img_url'])) {?>
                    <li>
                        <div class="proimg_bk"><a class="proimg"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['img_url'];?>
" height="247" width="247"></a></div>
                        <p><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</p></li>
                    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </div>
            <a href="javascript:void(0);" class="minus"></a>
        </div>
        <a href="<?php echo $_smarty_tpl->tpl_vars['caselink']->value;?>
" class="more" title="查看更多">查看更多+</a>
    </div>
    <!--售后服务-->
    <div class="service">
        <div class="w1100 clearfix">
            <div class="tact fl">
                <h2>全国热销服务热线</h2>
                <p><?php echo $_smarty_tpl->tpl_vars['header']->value['headercontact'];?>
</p>
            </div>
            <div class="fw fr">
                <h2><?php echo $_smarty_tpl->tpl_vars['indexmodule1']->value['indexmodule1_title'];?>

                    <span><?php echo $_smarty_tpl->tpl_vars['indexmodule1']->value['indexmodule1_subtitle'];?>
</span></h2>
                <div class="wz">
                    <?php echo $_smarty_tpl->tpl_vars['indexmodule1']->value['indexmodule1_content'];?>

                </div>
            </div>
        </div>
    </div>
    <!--资讯文章-->
    <div class="news w1100 clearfix">
        <div class="gs fl">
            <h2>
                <a href="<?php echo $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule2_link'];?>
" title="查看更多">MORE+</a><?php echo $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule2_title'];?>

                <span><?php echo $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule2_subtitle'];?>
</span></h2>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule2_list'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <li>
                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</span>
                    <a href="<?php echo url(array('path'=>'index/articles/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <div class="hy fr">
            <h2>
                <a href="<?php echo $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule3_link'];?>
" title="查看更多">MORE+</a><?php echo $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule3_title'];?>

                <span><?php echo $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule3_subtitle'];?>
</span></h2>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indexmodule2']->value['indexmodule3_list'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <li>
                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</span>
                    <a href="<?php echo url(array('path'=>'index/articles/index','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:pc/public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
