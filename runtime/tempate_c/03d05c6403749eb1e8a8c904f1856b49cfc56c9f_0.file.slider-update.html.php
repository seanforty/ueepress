<?php
/* Smarty version 3.1.30, created on 2017-11-13 08:55:46
  from "E:\www\ueepress2\app\admin\view\slider-update.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08ed92d23b13_88707247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03d05c6403749eb1e8a8c904f1856b49cfc56c9f' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\slider-update.html',
      1 => 1510273511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a08ed92d23b13_88707247 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>添加广告 - 广告管理 - UEECMS</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" onsubmit="return false;">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">图片ID：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" name="id">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">广告组：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sid'];?>
" name="sid">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">图片说明：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_alt'];?>
" id="img_alt" name="img_alt">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
			图片：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<div id="upload"></div><div id="deleteupload"></div>
			<input type="hidden" name="img_id"  id="img_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_id'];?>
">
			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['image'])) {?>
			<div style="vertical-align: bottom;"  id="uploadimg">
				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['image']['img_url'];?>
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
		<label class="form-label col-xs-4 col-sm-3">目标链接：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['target_url'];?>
" name="target_url" id="target_url">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">新窗口打开：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="checkbox" id="target" name="target" <?php if ($_smarty_tpl->tpl_vars['data']->value['target'] == "1") {?>checked<?php }?>>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">排序：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" id="listorder" name="listorder" value="0" aria-valuemax="<?php echo $_smarty_tpl->tpl_vars['data']->value['listorder'];?>
">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="description" cols="" rows="" class="textarea" dragonfly="true" ><?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
</textarea>
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


<?php echo '<script'; ?>
 type="text/javascript">
	//图片上传路径
	var SCOPE = {
	    url : '<?php echo url(array('path'=>"api/Image/add"),$_smarty_tpl);?>
'
	};
<?php echo '</script'; ?>
>

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
	//验证字段ajax提交
	$("#form-admin-add").validate({
		rules:{
            img_id:{
				required:true
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: "POST",
				url: "<?php echo url(array('path'=>'api/sliderbox/update'),$_smarty_tpl);?>
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
