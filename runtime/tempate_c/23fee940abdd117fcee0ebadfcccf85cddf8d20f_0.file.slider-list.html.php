<?php
/* Smarty version 3.1.30, created on 2017-11-12 07:54:45
  from "E:\www\meswebsite\app\admin\view\slider-list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a078dc541b6a2_91767128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23fee940abdd117fcee0ebadfcccf85cddf8d20f' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\slider-list.html',
      1 => 1510346165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a078dc541b6a2_91767128 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>广告列表 - 广告管理 - UEECMS</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form action="<?php echo url(array('path'=>'admin/sliderbox/getList'),$_smarty_tpl);?>
" method="get">
		广告位列表：
		<span class="select-box inline">
			<select id="menulist" name="id" class="select">
				<option value="0">--请选择广告位</option>
				<?php echo $_smarty_tpl->tpl_vars['sliderstr']->value;?>

			</select>
		</span>
		<input type="submit" class="btn btn-success" value=" 选择">
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="pop_layer('添加广告','<?php echo url(array('path'=>'admin/Sliderbox/add','params'=>array('id'=>$_smarty_tpl->tpl_vars['aid']->value)),$_smarty_tpl);?>
','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加广告</a>
		</span>
		<span class="r"></span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>广告图片</th>
					<th width="60">图片说明</th>
					<th width="80">目标链接</th>
					<th width="75">新窗口打开</th>
					<th width="120">排序</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody id="datatr">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['adlist']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
			<tr class="text-c">
				<td><input type="checkbox" name="id" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
				<td><?php if (isset($_smarty_tpl->tpl_vars['v']->value['image']) && is_array($_smarty_tpl->tpl_vars['v']->value['image'])) {?> <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['image']['img_url'];?>
" width="200">
					<?php } else { ?>请添加图片<?php }?>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['img_alt'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['target_url'];?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['v']->value['target'] == "1") {?>是<?php } else { ?>否<?php }?></td>
				<td><input type="text" size="3" name="listorder" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['listorder'];?>
" onchange="changeorder(this,'<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')"></td>
				<td class="f-14 td-manage">
					<a style="text-decoration:none" class="ml-5" onClick="open_layer('编辑','<?php echo url(array('path'=>'admin/sliderbox/update','params'=>array('id'=>$_smarty_tpl->tpl_vars['v']->value['id'])),$_smarty_tpl);?>
')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a style="text-decoration:none" class="ml-5" onClick="del_data(this,'<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo url(array('path'=>"api/sliderbox/delete"),$_smarty_tpl);?>
')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</tbody>
		</table>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
//更新顺序
function changeorder(t,id)
{
	$.ajax({
		url:'<?php echo url(array('path'=>"api/sliderbox/changeOrder"),$_smarty_tpl);?>
',
		data:{
			id:id,
			listorder:t.value
		},
		dataType:"JSON",
		type:"POST",
		success:function (res) {
			layer.msg("顺序更新成功！",{icon:1,time:1000});
			location.reload();
		},
		error:function (res) {
			layer.msg("顺序更新失败！",{icon:0,time:1000});
		}
	});
}
<?php echo '</script'; ?>
> 
</body>
</html><?php }
}
