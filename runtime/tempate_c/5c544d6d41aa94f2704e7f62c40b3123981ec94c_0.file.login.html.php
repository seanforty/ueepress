<?php
/* Smarty version 3.1.30, created on 2017-11-09 09:10:38
  from "E:\www\ueepress\app\admin\view\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03ab0e10fac5_92094279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c544d6d41aa94f2704e7f62c40b3123981ec94c' => 
    array (
      0 => 'E:\\www\\ueepress\\app\\admin\\view\\login.html',
      1 => 1510189717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a03ab0e10fac5_92094279 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>后台登录 - UEECMS</title>
</head>
<body style="background-color: #00b7ee;">
<div id="container" style="margin-top: 10%;">
	<div class="loginWraper" style="height: 100%;margin-left: 20%;">
		<div id="loginform" class="loginBox">
			<form class="form form-horizontal" id="login-form" onclick="return false;">
				<div class="row cl">
					<label class="form-label col-xs-3"></label>
					<div class="formControls col-xs-8">
						<h2>UEECMS后台管理系统</h2>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
					<div class="formControls col-xs-8">
						<input name="username" id="username" type="text" placeholder="账户" class="input-text size-L" style="width:300px;">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
					<div class="formControls col-xs-8">
						<input name="password" id="password" type="password" placeholder="密码" class="input-text size-L" style="width:300px;">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe72d;</i></label>
					<div class="formControls col-xs-8">
						<input name="captcha" id="captcha" class="input-text size-L" type="text" placeholder="验证码" value="" style="width:150px;">
						<img src="<?php echo url(array('path'=>'api/login/captcha'),$_smarty_tpl);?>
" onclick="this.src='<?php echo url(array('path'=>'api/login/captcha'),$_smarty_tpl);?>
?id='+Math.random();">
					</div>
				</div>
				<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<label for="online"><input type="checkbox" name="online" id="online" value="">使我保持登录状态</label>
				</div>
			</div>
				<div class="row cl">
					<div class="formControls col-xs-8 col-xs-offset-3">
						<input type="submit" onclick="loginsubmit()" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
						<input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="footer" style="margin-top: 10%;">&copy; Copyright 2017 All Rights Reserved <a href="http://www.ueecms.com/">UEECMS 1.0</a></div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
/admin/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
//如果当前不是顶级窗体则跳转
if(self != top){
    top.location.href = "<?php echo url(array('path'=>'admin/login/index'),$_smarty_tpl);?>
";
}

function loginsubmit()
{
	var username = $("#username").val();
	var password = $("#password").val();
	var captcha  = $("#captcha").val();

	if(!username){
		layer.msg('用户名为空!',{icon:0,time:1000});
		//return false;
	}
	if(!password){
		layer.msg('密码为空!',{icon:0,time:1000});
		return false;
	}
	if(!captcha){
		layer.msg('验证码为空!',{icon:0,time:1000});
		return false;
	}

	$.ajax({
		url:'<?php echo url(array('path'=>"api/login/login"),$_smarty_tpl);?>
',
		type:'POST',
		dataType:'JSON',
		data:{
			username:username,
			password:password,
			captcha:captcha
		},
		success:function (res) {
			if(res.status){
				layer.msg('登录成功!',{icon:1,time:1000});
				window.location.href="<?php echo url(array('path'=>'admin/index/index'),$_smarty_tpl);?>
";
			}else{
				layer.msg(res.msg,{icon:0,time:1000});
			}
		},
		error:function (res) {
			console.log(res);
			layer.msg('登录失败!',{icon:0,time:1000});
		}
	});
}

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
