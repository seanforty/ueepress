<?php
/* Smarty version 3.1.30, created on 2017-11-10 14:14:58
  from "E:\www\ueepress2\app\admin\view\page-list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0543e23eca57_91032385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd665e71ddc285ffc93bef7ca8b7de746b6412a5c' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\page-list.html',
      1 => 1510286158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a0543e23eca57_91032385 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>页面列表 - 内容管理 - UEECMS</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 内容管理 <span class="c-gray en">&gt;</span> 页面列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="del_all('<?php echo url(array('path'=>"api/article/deleteAll"),$_smarty_tpl);?>
')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" data-title="添加页面" data-href="<?php echo url(array('path'=>'admin/page/add'),$_smarty_tpl);?>
" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加页面</a>
		</span>
		<span class="r"></span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>标题</th>
					<th width="80">分类</th>
					<th width="120">更新时间</th>
					<th width="75">浏览次数</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody id="datatr">
			<?php if ($_smarty_tpl->tpl_vars['res']->value['data']) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value['data'], 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" name="id" class="dataid"></td>
					<td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</u></td>
					<td>
						<?php if (isset($_smarty_tpl->tpl_vars['val']->value['category'])) {?>
							<?php echo $_smarty_tpl->tpl_vars['val']->value['category']['title'];?>

						<?php } else { ?>
							暂无分类
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['val']->value['create_time'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['val']->value['read'];?>
</td>
					<td class="td-status"><span class="label label-success radius">已发布</span></td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="open_layer('页面编辑','<?php echo url(array('path'=>'admin/page/update','params'=>array('id'=>$_smarty_tpl->tpl_vars['val']->value['id'])),$_smarty_tpl);?>
')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a style="text-decoration:none" class="ml-5" onClick="del_data(this,'<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
','<?php echo url(array('path'=>"api/article/delete"),$_smarty_tpl);?>
')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php } else { ?>
			<tr><td colspan="8">暂无数据</td></tr>
			<?php }?>
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
$(function () {
	//分页插件kkpager
	kkpager.generPageHtml({
		pno:'<?php echo $_smarty_tpl->tpl_vars['res']->value['pagination']['currentpage'];?>
',
		total:'<?php echo $_smarty_tpl->tpl_vars['res']->value['pagination']['totalpage'];?>
',
		totalRecords:'<?php echo $_smarty_tpl->tpl_vars['res']->value['pagination']['totalcount'];?>
',
		mode:'link',
		getLink : function(n){
			return '<?php echo url(array('path'=>"admin/article/getList",'params'=>array("page"=>"'+n")),$_smarty_tpl);?>
;
		}
	});
});
<?php echo '</script'; ?>
> 
</body>
</html><?php }
}
