<?php
/* Smarty version 3.1.30, created on 2017-11-11 11:09:28
  from "E:\www\ueepress2\app\admin\view\link-update.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0669e8b65c13_46087404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bc567d8309782b37f13af9c33f7b590d1a32393' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\link-update.html',
      1 => 1510369760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a0669e8b65c13_46087404 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>编辑友情链接 - 布局管理 - UEECMS</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" onsubmit="return false;">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>友情链接标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
" name="id">
				<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
" class="input-text" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>友情链接URL：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['url'];?>
" class="input-text" name="url">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新窗口打开：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if ($_smarty_tpl->tpl_vars['res']->value['target'] == 1) {?><input type="checkbox" checked name="target">
				<?php } else { ?><input type="checkbox" name="target"><?php }?>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>
				缩略图：</label>
			<div class="formControls col-xs-6 col-sm-6">
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
					<img src="<?php echo $_smarty_tpl->tpl_vars['res']->value['image']['img_url'];?>
" height="200" >
					<span><i class="Hui-iconfont">&#xe6a6;</i></span>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="description" cols="" rows="" class="textarea"  dragonfly="true" ><?php echo $_smarty_tpl->tpl_vars['res']->value['description'];?>
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
                    url: "<?php echo url(array('path'=>'api/link/update'),$_smarty_tpl);?>
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
