<?php
/* Smarty version 3.1.30, created on 2017-11-10 16:59:03
  from "E:\www\ueepress2\app\admin\view\product-update.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a056a57a711b2_37134629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '466a95e58a72d1e558279a5f3e63dfdf4cff3044' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\product-update.html',
      1 => 1510304333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a056a57a711b2_37134629 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>修改产品 - 产品管理 - UEECMS</title>
</head>
<body>
<article class="page-container">
<form class="form form-horizontal" id="form-article-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
" name="id">
			<input type="hidden" value="1" name="type">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">标题别名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['slug'];?>
" name="slug">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">价格：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['price'];?>
" name="price">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">促销价格：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['sales'];?>
" name="sales">
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
		<label class="form-label col-xs-4 col-sm-2">关键词：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['keyword'];?>
" name="keyword">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">详情摘要：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="description" cols="" rows="" class="textarea"  dragonfly="true" ><?php echo $_smarty_tpl->tpl_vars['res']->value['description'];?>
</textarea>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">产品置顶：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="check-box">
				<?php if ($_smarty_tpl->tpl_vars['res']->value['stick'] == "1") {?>
				<input type="checkbox"name="stick" checked>
				<?php } else { ?>
				<input type="checkbox"name="stick">
				<?php }?>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">允许评论：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="check-box">
				<?php if ($_smarty_tpl->tpl_vars['res']->value['comment'] == "1") {?>
				<input type="checkbox"name="comment" checked>
				<?php } else { ?>
				<input type="checkbox"name="comment">
				<?php }?>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">
			缩略图：</label>
		<div class="formControls col-xs-6 col-sm-6">
			<div id="uploadpro"></div><div id="deleteupload"></div>
			<input type="hidden" id="img_id1" name="img_id1"  value="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][0])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][0]['id'];
} else { ?>0<?php }?>">
			<input type="hidden" id="img_id2" name="img_id2"  value="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][1])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][1]['id'];
} else { ?>0<?php }?>">
			<input type="hidden" id="img_id3" name="img_id3"  value="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][2])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][2]['id'];
} else { ?>0<?php }?>">
			<input type="hidden" id="img_id4" name="img_id4"  value="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][3])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][3]['id'];
} else { ?>0<?php }?>">
			<input type="hidden" id="img_id5" name="img_id5"  value="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][4])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][4]['id'];
} else { ?>0<?php }?>">
			<div style="width: 800px;height:180px;margin-left: 30px; ">
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg1" src="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][0])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][0]['img_url'];
} else {
echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg<?php }?>" height="150" width="120" >
					<div id="deleteimg1" onclick="deleteimg(1)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg2" src="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][1])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][1]['img_url'];
} else {
echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg<?php }?>" height="150" width="120" >
					<div id="deleteimg2" onclick="deleteimg(2)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg3" src="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][2])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][2]['img_url'];
} else {
echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg<?php }?>" height="150" width="120" >
					<div id="deleteimg3" onclick="deleteimg(3)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg4" src="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][3])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][3]['img_url'];
} else {
echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg<?php }?>" height="150" width="120" >
					<div id="deleteimg4" onclick="deleteimg(4)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg5" src="<?php if (isset($_smarty_tpl->tpl_vars['res']->value['image'][4])) {
echo $_smarty_tpl->tpl_vars['res']->value['image'][4]['img_url'];
} else {
echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg<?php }?>" height="150" width="120" >
					<div id="deleteimg5" onclick="deleteimg(5)" style="width:120px;text-align: center;">删除</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<?php echo '<script'; ?>
 name="content" id="editor" type="text/plain" style="width:100%;height:400px;"><?php echo $_smarty_tpl->tpl_vars['res']->value['content'];
echo '</script'; ?>
>
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
/huploadify/jquery.Huploadify.js"><?php echo '</script'; ?>
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
//删除图片
$(document).ready(function () {
	$("#uploadimg span").click(function () {
		$("#img_id").val("");
		$("#uploadimg").hide();
	});
});

//删除图片
function deleteimg(id)
{
    $("#uploadimg"+id).attr("src",'<?php echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg');
}

//检测字符串是否是指定字符串结尾
function endWith(str,endStr){
    var d=str.length-endStr.length;
    return (d>=0&&str.lastIndexOf(endStr)==d)
}
//获取空白图片位置
function getImgPos()
{
    var i,tempsrc;
    for(i=1;i<6;i++){
        tempsrc = $("#uploadimg"+i)[0].src;
        if( endWith(tempsrc,"upload.jpg") ){
            return i;
        }
    }
    alert("只能上传5张图片！");
}

$(function(){

    //huploadify上传图片
    var up = $('#uploadpro').Huploadify({
        auto:true,
        fileTypeExts:'*.jpg;*.png;*.jpeg;*.gif',
        multi:true,
        formData:{},
        fileSizeLimit:1024,
        showUploadedPercent:true,
        showUploadedSize:true,
        removeTimeout:2000,
        uploader:SCOPE.url,
        onUploadSuccess: function(file, data, response) {
            console.log(data);
            var dataJson = JSON.parse(data);
            if (dataJson.status) {
                var i = getImgPos();
                $("#img_id"+i).val(dataJson.mid);
                $("#uploadimg"+i).attr("src",dataJson.url);
            } else {
                alert(dataJson.msg);
            }
        },
        //返回一个错误，选择文件的时候触发
        onSelectError: function (file, errorCode, errorMsg) {
            alert("上传失败");
        },
    });

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
				url:"<?php echo url(array('path'=>'api/product/updatepro'),$_smarty_tpl);?>
",
				type:"POST",
				success:function(res){
					layer.msg('更新成功!',{icon:1,time:1000});
					setTimeout("self.location='<?php echo url(array('path'=>'admin/products/index'),$_smarty_tpl);?>
';",1000);
				},
				error:function(res){
					layer.msg('更新失败!',{icon:0,time:1000});
				}
			});
		}
	});
	var ue = UE.getEditor('editor');
});
<?php echo '</script'; ?>
>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html><?php }
}
