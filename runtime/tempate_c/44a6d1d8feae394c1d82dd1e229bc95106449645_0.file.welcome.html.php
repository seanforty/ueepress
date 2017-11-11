<?php
/* Smarty version 3.1.30, created on 2017-11-11 04:53:22
  from "E:\www\meswebsite\app\admin\view\welcome.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0611c2dfaae6_85431142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44a6d1d8feae394c1d82dd1e229bc95106449645' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\welcome.html',
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
function content_5a0611c2dfaae6_85431142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用<?php echo $_smarty_tpl->tpl_vars['desktop']->value['uee_name'];?>
 <span class="f-14"><?php echo $_smarty_tpl->tpl_vars['desktop']->value['uee_version'];?>
</span>！</p>
	<p>登录次数：<?php echo $_smarty_tpl->tpl_vars['desktop']->value['logintimes'];?>
 </p>
	<p>上次登录IP：<?php echo $_smarty_tpl->tpl_vars['desktop']->value['lastloginip'];?>
  上次登录时间：<?php echo $_smarty_tpl->tpl_vars['desktop']->value['lastlogintime'];?>
</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>文章</th>
				<th>评论</th>
				<th>留言</th>
				<th>管理员</th>
				<th>角色</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php echo $_smarty_tpl->tpl_vars['desktop']->value['articlenum'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['desktop']->value['commentnum'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['desktop']->value['messagenum'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['desktop']->value['adminnum'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['desktop']->value['rolenum'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>Copyright &copy;2015-2017 <?php echo $_smarty_tpl->tpl_vars['desktop']->value['uee_name'];?>
 All Rights Reserved.<br>
			本后台系统由<a href="http://www.ueecms.com/" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['desktop']->value['uee_name'];?>
">UEECMS</a>技术支持</p>
	</div>
</footer>
<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>
</html><?php }
}
