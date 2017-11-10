<?php
/* Smarty version 3.1.30, created on 2017-11-10 17:12:06
  from "E:\www\ueepress2\app\admin\view\admin-list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a056d66deed95_09782005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb6cc593b23d7d6ebcdfef719db071e2e2a1477b' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\admin-list.html',
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
function content_5a056d66deed95_09782005 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="pop_layer('添加管理员','<?php echo url(array('path'=>'admin/add'),$_smarty_tpl);?>
','800','550')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
		</span>
		<span class="r"></span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>

		<?php if (count($_smarty_tpl->tpl_vars['res']->value) == 0) {?>
		<tr class="text-c">
			<td colspan="9">暂无数据</td>
		</tr>
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
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
				<td>
					<?php if (isset($_smarty_tpl->tpl_vars['item']->value['role'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['role'], 'it');
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
						未关联角色
					<?php }?>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
				<td class="td-status">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
					<span class="label label-success radius">已启用</span>
					<?php } else { ?>
					<span class="label label-default radius">已禁用</span>
					<?php }?>
				</td>
				<td class="td-manage">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
					<a style="text-decoration:none" onClick="admin_stop(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')" href="javascript:;" title="停用">
						<i class="Hui-iconfont">&#xe631;</i></a>
					<?php } else { ?>
					<a style="text-decoration:none" onClick="admin_start(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')" href="javascript:;" title="启用">
						<i class="Hui-iconfont">&#xe615;</i></a>
					<?php }?>
					<a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['id'];
$_prefixVariable1=ob_get_clean();
echo url(array('path'=>'admin/update','params'=>array('id'=>$_prefixVariable1)),$_smarty_tpl);?>
','1','800','500')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
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
/admin/lib/My97DatePicker/4.8/WdatePicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
            url: "<?php echo url(array('path'=>'api/admin/delete'),$_smarty_tpl);?>
",
			type: "POST",
			data:{
                id:id
			},
			dataType: "json",
            success:function(data){
                layer.msg('删除成功!',{icon:1,time:1000});
                setTimeout('window.location.reload()',1000);
            },
            error:function(xhr,textStatus){
                layer.msg('删除失败!',{icon:0,time:1000});
            },
		});
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
        $.ajax({
            url:"<?php echo url(array('path'=>'api/admin/changeStatus'),$_smarty_tpl);?>
",
            type:'POST',
            data:{
                "id":id,
                "status":0
            },
            dataType:"json",
            success:function(res){
                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            },
            error:function(res){
                layer.msg('变更状态失败!',{icon: 5,time:1000});
            }
        });
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
        $.ajax({
            url:"<?php echo url(array('path'=>'api/admin/changeStatus'),$_smarty_tpl);?>
",
            type:'POST',
            data:{
                "id":id,
                "status":1
            },
            dataType:"json",
            success:function(res){
                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', {icon: 6,time:1000});
            },
            error:function(res){
                layer.msg('变更状态失败!',{icon: 5,time:1000});
            }
        });
	});
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
