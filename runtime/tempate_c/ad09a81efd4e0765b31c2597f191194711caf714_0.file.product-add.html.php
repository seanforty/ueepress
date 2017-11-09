<?php
/* Smarty version 3.1.30, created on 2017-11-10 07:53:24
  from "E:\www\meswebsite\app\admin\view\product-add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a04ea744cd870_37412007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad09a81efd4e0765b31c2597f191194711caf714' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\product-add.html',
      1 => 1510271014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a04ea744cd870_37412007 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>新增产品 - 产品管理 - UEECMS</title>
</head>
<body>
<article class="page-container">
<form class="form form-horizontal" id="form-article-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="hidden" value="0" name="id">
			<input type="text" class="input-text" value="" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">标题别名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="slug">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
			<select name="cate_id" class="select">
				<option value="0">全部分类</option>
				<?php echo $_smarty_tpl->tpl_vars['menustr']->value;?>

			</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">排序值：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="0" name="listorder">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">关键词：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="keyword">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="description" cols="" rows="" class="textarea"  dragonfly="true" ></textarea>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">文章作者：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="author">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">文章来源：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="sources">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">文章置顶：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="check-box">
				<input type="checkbox"name="stick">
				<label for="checkbox-pinglun">&nbsp;</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">允许评论：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="check-box">
				<input type="checkbox"name="comment" checked>
				<label for="checkbox-pinglun">&nbsp;</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">
			缩略图：</label>
		<div class="formControls col-xs-6 col-sm-6">
			<div id="upload"></div><div id="deleteupload"></div>
			<input type="hidden" name="img_id"  id="img_id" value="0">
			<div style="display:none;vertical-align: bottom;"  id="uploadimg">
				<img src="" height="200" >
				<span><i class="Hui-iconfont">&#xe6a6;</i></span>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<?php echo '<script'; ?>
 id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo '</script'; ?>
>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">阅读次数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="0" name="read">
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
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
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/ueditor/1.4.3/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function () {
    //删除图片
	$("#uploadimg span").click(function () {
		$("#img_id").val("");
		$("#uploadimg").hide();
	});
});

$(function(){
	//表单验证
	$("#form-article-add").validate({
		rules:{
			title:{
				required:true,
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
            $(form).ajaxSubmit({
                url:"<?php echo url(array('path'=>'api/article/add'),$_smarty_tpl);?>
",
                type:"POST",
                success:function(res){
                    layer.msg('添加成功!',{icon:1,time:1000});
                    setTimeout("self.location='<?php echo url(array('path'=>'admin/article/getList'),$_smarty_tpl);?>
';",1000);
                },
                error:function(res){
                    layer.msg('添加失败!',{icon:0,time:1000});
                }
            });
		}
	});

	var ue = UE.getEditor('editor');
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
