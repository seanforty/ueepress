<?php
/* Smarty version 3.1.30, created on 2017-11-09 09:34:31
  from "E:\www\ueepress\app\admin\view\link-add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03b0a7b604e2_28897779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '360d683428cad8bdd7c873198c91285204865f28' => 
    array (
      0 => 'E:\\www\\ueepress\\app\\admin\\view\\link-add.html',
      1 => 1510191266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a03b0a7b604e2_28897779 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>添加友情链接 - 布局管理 - H-ui.admin v3.1</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" onsubmit="return false;">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>友情链接标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="hidden" value="0" name="id">
			<input type="text" class="input-text" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>友情链接URL：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" name="url">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新窗口打开：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="checkbox" checked name="target">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>
			缩略图：</label>
		<div class="formControls col-xs-6 col-sm-6">
			<div id="upload"></div><div id="deleteupload"></div>
			<input type="hidden" name="img_id"  id="img_id" value="">
			<div style="display:none;vertical-align: bottom;"  id="uploadimg">
				<img src="" height="200" >
				<span><i class="Hui-iconfont">&#xe6a6;</i></span>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="description" cols="" rows="" class="textarea"  dragonfly="true" ></textarea>
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
				required:true
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: "POST",
				url: "<?php echo url(array('path'=>'api/link/add'),$_smarty_tpl);?>
" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
                    setTimeout('parent.location.reload()',1000);
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('添加失败!',{icon:0,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
		}
	});
});
<?php echo '</script'; ?>
> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html><?php }
}
