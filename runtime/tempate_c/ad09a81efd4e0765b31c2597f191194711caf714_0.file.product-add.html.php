<?php
/* Smarty version 3.1.30, created on 2017-11-11 04:57:30
  from "E:\www\meswebsite\app\admin\view\product-add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0612ba82ffe3_98133014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad09a81efd4e0765b31c2597f191194711caf714' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\product-add.html',
      1 => 1510337597,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a0612ba82ffe3_98133014 (Smarty_Internal_Template $_smarty_tpl) {
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
			<input type="hidden" value="1" name="type">
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
		<label class="form-label col-xs-4 col-sm-2">价格：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="price">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">促销价格：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" name="sales">
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
		<label class="form-label col-xs-4 col-sm-2">摘要描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="description" cols="" rows="" class="textarea"  dragonfly="true" ></textarea>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">置顶：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="check-box">
				<input type="checkbox"name="stick">
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">允许评论：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="check-box">
				<input type="checkbox"name="comment" checked>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">
			缩略图：</label>
		<div class="formControls col-xs-6 col-sm-6">
			<div id="uploadpro"></div><div id="deleteupload"></div>
			<input type="hidden" id="img_id1" name="img_id1"  value="0">
			<input type="hidden" id="img_id2" name="img_id2"  value="0">
			<input type="hidden" id="img_id3" name="img_id3"  value="0">
			<input type="hidden" id="img_id4" name="img_id4"  value="0">
			<input type="hidden" id="img_id5" name="img_id5"  value="0">
			<div style="width: 800px;height:180px;margin-left: 30px; ">
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg1" src="<?php echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg" height="150" width="120" >
					<div id="deleteimg1" onclick="deleteimg(1)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg2" src="<?php echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg" height="150" width="120" >
					<div id="deleteimg2" onclick="deleteimg(2)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg3" src="<?php echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg" height="150" width="120" >
					<div id="deleteimg3" onclick="deleteimg(3)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg4" src="<?php echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg" height="150" width="120" >
					<div id="deleteimg4" onclick="deleteimg(4)" style="width:120px;text-align: center;">删除</div>
				</div>
				<div style="border: 1px red solid;width:120px;height:150px;float: left;margin-left: 20px;">
					<img id="uploadimg5" src="<?php echo @constant('STATIC');?>
/admin/h-ui.admin/images/upload.jpg" height="150" width="120" >
					<div id="deleteimg5" onclick="deleteimg(5)" style="width:120px;text-align: center;">删除</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2">产品详情：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<?php echo '<script'; ?>
 id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo '</script'; ?>
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
                url:"<?php echo url(array('path'=>'api/product/addpro'),$_smarty_tpl);?>
",
                type:"POST",
                success:function(res){
                    layer.msg('添加成功!',{icon:1,time:1000});
                    setTimeout("self.location='<?php echo url(array('path'=>'admin/products/index'),$_smarty_tpl);?>
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
