<?php
/* Smarty version 3.1.30, created on 2017-11-11 09:10:38
  from "E:\www\ueepress2\app\admin\view\public\_header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a064e0e455c94_14536863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3e1a27b61622e1681baa795db317ca1c0dd8a84' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\public\\_header.html',
      1 => 1510273511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a064e0e455c94_14536863 (Smarty_Internal_Template $_smarty_tpl) {
?>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl">
			<a class="logo navbar-logo f-l mr-10 hidden-xs" href="/index.php?module=admin"><?php echo $_smarty_tpl->tpl_vars['uee_name']->value;?>
</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs"><?php echo $_smarty_tpl->tpl_vars['uee_version']->value;?>
</span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li class="dropDown dropDown_hover">
						<a href="<?php echo url(array('path'=>'index/index/index'),$_smarty_tpl);?>
" target="_blank" class="dropDown_A">网站首页</a>
					</li>
					<li class="dropDown dropDown_hover">
						<a href="#" class="dropDown_A"><?php echo $_smarty_tpl->tpl_vars['admin_show_user']->value;?>
 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:void(0)" onclick="header_go('<?php echo url(array('path'=>'admin/admin/getAll'),$_smarty_tpl);?>
')" >管理员信息</a></li>
							<li><a href="<?php echo url(array('path'=>'admin/index/logout'),$_smarty_tpl);?>
" >退出</a></li>
						</ul>
					</li>
					<li class="dropDown dropDown_hover">
						<a href="#" class="dropDown_A">未读消息<i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:void(0)" onclick="header_go('<?php echo url(array('path'=>'admin/Comment/commentList'),$_smarty_tpl);?>
')" title="消息"><i class="Hui-iconfont" style="font-size:14px">评论</i><span class="badge badge-danger"><?php echo $_smarty_tpl->tpl_vars['commentNum']->value;?>
</span></a></li>
							<li><a href="javascript:void(0)" onclick="header_go('<?php echo url(array('path'=>'admin/Comment/messageList'),$_smarty_tpl);?>
')" title="消息"><i class="Hui-iconfont" style="font-size:14px">留言</i><span class="badge badge-danger"><?php echo $_smarty_tpl->tpl_vars['messageNum']->value;?>
</span></a></li>
						</ul>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover">
						<a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header><?php }
}
