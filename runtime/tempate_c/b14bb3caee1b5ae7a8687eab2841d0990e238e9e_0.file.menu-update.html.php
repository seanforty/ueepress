<?php
/* Smarty version 3.1.30, created on 2017-11-12 05:38:06
  from "E:\www\meswebsite\app\admin\view\menu-update.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a076dbe300b34_86326659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b14bb3caee1b5ae7a8687eab2841d0990e238e9e' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\menu-update.html',
      1 => 1510412169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a076dbe300b34_86326659 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>添加菜单项 - 布局管理 - UEECMS</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" onsubmit="return false;">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>菜单项：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
" name="id" id="menu-item-id">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">上级菜单：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="select" name="parent_id" id="menu-item-parent-id" size="1">
				<option value="0">--选择上级菜单</option>
				<?php echo $_smarty_tpl->tpl_vars['menustr']->value;?>

			</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">链接类型：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="select" name="linktype" size="1">
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['res']->value['linktype'] == "0") {?>selected<?php }?>>页面类型</option>
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['res']->value['linktype'] == "1") {?>selected<?php }?>>产品分类</option>
				<option value="2" <?php if ($_smarty_tpl->tpl_vars['res']->value['linktype'] == "2") {?>selected<?php }?>>文章分类</option>
				<option value="3" <?php if ($_smarty_tpl->tpl_vars['res']->value['linktype'] == "3") {?>selected<?php }?>>案例类型</option>
				<option value="4" <?php if ($_smarty_tpl->tpl_vars['res']->value['linktype'] == "4") {?>selected<?php }?>>其它链接</option>
			</select></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">链接：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['linkid'];?>
" id="linkid" name="linkid">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">新窗口打开：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="select" name="target" size="1">
				<?php if ($_smarty_tpl->tpl_vars['res']->value['target'] == "0") {?>
					<option value="0" selected>本窗口打开</option>
					<option value="1">新窗口打开</option>
				<?php } else { ?>
					<option value="1" selected>新窗口打开</option>
					<option value="0">本窗口打开</option>
				<?php }?>
			</select></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			缩略图：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<div id="upload"></div><div id="deleteupload"></div>
			<input type="hidden" name="img_id"  id="img_id" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['img_id'];?>
">
			<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'])) {?>
			<div style="vertical-align: bottom;"  id="uploadimg">
				<img src="<?php echo $_smarty_tpl->tpl_vars['res']->value['image']['img_url'];?>
" height="200" >
				<span><i class="Hui-iconfont">&#xe6a6;</i></span>
			</div>
			<?php } else { ?>
			<div style="display:none;vertical-align: bottom;"  id="uploadimg">
				<img src="" height="200" >
				<span><i class="Hui-iconfont">&#xe6a6;</i></span>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">排序：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['listorder'];?>
" id="listorder" name="listorder">
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input onclick="" class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/jquery.validation/1.14.0/jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/jquery.validation/1.14.0/validate-methods.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/jquery.validation/1.14.0/messages_zh.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){

	$("#form-admin-add").validate({
		rules:{
			title:{
				required:true,
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			if( $("#menu-item-parent-id").val() == $("#menu-item-id").val() ){
                layer.msg('不能选择自己作为上级菜单!',{icon:0,time:2000});
                return "";
			}

			$(form).ajaxSubmit({
				type: "POST",
				url: "<?php echo url(array('path'=>'api/menulist/updateMenuContent'),$_smarty_tpl);?>
" ,
				success: function(data){
					layer.msg('更新成功!',{icon:1,time:1000});
                    setTimeout('parent.location.reload()',1000);
				},
                error: function(res){
					layer.msg('更新失败!',{icon:0,time:1000});
				}
			});
		}
	});
});
<?php echo '</script'; ?>
> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html><?php }
}
