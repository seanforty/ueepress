<?php
/* Smarty version 3.1.30, created on 2017-11-09 17:18:41
  from "E:\www\ueepress2\app\admin\view\system-base.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a041d71ea4033_94235677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ead43f45f25ffb72f7733391d6f7f4d742294a1' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\system-base.html',
      1 => 1510219117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a041d71ea4033_94235677 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>系统管理<span class="c-gray en">&gt;</span>基本设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-update" onclick="return false;">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
				<span>首页设置</span>
				<span>安全设置</span>
				<span>邮件设置</span>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="sitename" placeholder="50个字符以内" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sitename'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>网站副名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="sitesubtitle" placeholder="50个字符以内" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sitesubtitle'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>SEO标题：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="title" placeholder="50个字符以内" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>SEO关键词：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="keywords" placeholder="建议3-5个关键词,用英文,隔开" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['keywords'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>SEO描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="description" class="textarea"  dragonfly="true" ><?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
</textarea>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>版权信息：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="copyright" placeholder="&copy; 2016 H-ui.net" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['copyright'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">备案号：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="beianhao" placeholder="如: 京ICP备00000000号" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['beianhao'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">底部文本：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="footertext" placeholder="如: 地址/声明等" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['footertext'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>顶部欢迎语：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headerwelcome" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headerwelcome'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>顶部联系电话：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headercontact" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headercontact'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">底部联系方式：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="footercontact" placeholder="如: 电话/营业时间" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['footercontact'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">顶部菜单标题1：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headermenutitle1" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headermenutitle1'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">顶部菜单链接1：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headermenulink1" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headermenulink1'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">顶部菜单标题2：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headermenutitle2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headermenutitle2'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">顶部菜单链接2：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headermenulink2" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headermenulink2'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">顶部菜单标题3：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headermenutitle3" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headermenutitle3'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">顶部菜单链接3：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="headermenulink3" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['headermenulink3'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">统计代码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="statistics" class="textarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
</textarea>
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">模块1-标题：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="indexmodule1_title" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['indexmodule1_title'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">模块1-说明：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="indexmodule1_subtitle" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['indexmodule1_subtitle'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">模块1-内容：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="indexmodule1_content" rows="5" class="textarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['indexmodule1_content'];?>
</textarea>
					</div>
				</div>

			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">允许访问后台的IP列表：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="iplist" class="textarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['iplist'];?>
</textarea>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台登录失败最大次数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="maxfailtimes" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['maxfailtimes'];?>
">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">邮件发送模式：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="emailmode"  class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailmode'];?>
">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">SMTP服务器：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="smtpserver" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['smtpserver'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">SMTP 端口：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="smtpport" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['smtpport'];?>
">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">邮箱帐号：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="emailusr" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailusr'];?>
">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">邮箱密码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="password" name="emailpwd" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailpwd'];?>
" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">收件邮箱地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="emailrev" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['emailrev'];?>
" class="input-text">
					</div>
				</div>
			</div>
			<div class="tabCon">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="save_info();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
//保存网站基础设置
function save_info() {
	$.ajax({
		url:'<?php echo url(array('path'=>"api/siteinfo/update"),$_smarty_tpl);?>
',
		type:"POST",
		data:$("#form-update").serialize(),
		dataType:"JSON",
		success:function (res) {
            layer.msg('更新成功!',{icon:1,time:1000});
        },
		error:function (res) {
		    alert("更新失败");
        }
	});
}

$(function(){
    //tab切换窗口
	$("#tab-system").Huitab({
		index:0
	});
});
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
