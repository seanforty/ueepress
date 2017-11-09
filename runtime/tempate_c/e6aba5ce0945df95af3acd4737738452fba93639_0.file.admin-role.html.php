<?php
/* Smarty version 3.1.30, created on 2017-11-09 09:29:37
  from "E:\www\ueepress\app\admin\view\admin-role.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a03af81cff1c5_77418969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6aba5ce0945df95af3acd4737738452fba93639' => 
    array (
      0 => 'E:\\www\\ueepress\\app\\admin\\view\\admin-role.html',
      1 => 1510189716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a03af81cff1c5_77418969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray">
		<span class="l">
			<a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','<?php echo url(array('path'=>'admin/role/add'),$_smarty_tpl);?>
','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a>
		</span>
		<span class="r"></span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">角色管理</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th width="200">角色名</th>
				<th>用户列表</th>
				<th width="300">描述</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if (count($_smarty_tpl->tpl_vars['res']->value) == 0) {?>
			<tr class="text-c"><td colspan="6">暂无数据</td></tr>
		<?php } else { ?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name=""></td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
				<td>
				<?php if (isset($_smarty_tpl->tpl_vars['item']->value['admin'])) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['admin'], 'it');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
?>
						<?php echo $_smarty_tpl->tpl_vars['it']->value['title'];?>

					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php } else { ?>
					暂无数据
				<?php }?>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['remark'];?>
</td>
				<td class="f-14">
					<a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['id'];
$_prefixVariable1=ob_get_clean();
echo url(array('path'=>'admin/role/update','params'=>array('id'=>$_prefixVariable1)),$_smarty_tpl);?>
','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick="admin_role_del(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<?php }?>
		</tbody>
	</table>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo url(array('path'=>"api/role/delete"),$_smarty_tpl);?>
',
			data:{
			    id:id
			},
			dataType: 'json',
			success: function(res){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(res) {
			    alert(data.msg);
                layer.msg("删除失败",{icon:1,time:1000});
			},
		});		
	});
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
