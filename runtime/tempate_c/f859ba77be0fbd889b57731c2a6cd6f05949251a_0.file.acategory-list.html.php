<?php
/* Smarty version 3.1.30, created on 2017-11-11 05:08:06
  from "E:\www\meswebsite\app\admin\view\acategory-list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a061536973b08_29143872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f859ba77be0fbd889b57731c2a6cd6f05949251a' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\acategory-list.html',
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
function content_5a061536973b08_29143872 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>分类管理 - 内容管理 - UEECMS</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 内容管理 <span class="c-gray en">&gt;</span> 分类管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="del_all('<?php echo url(array('path'=>'api/category/deleteAll'),$_smarty_tpl);?>
')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a href="javascript:;" onclick="pop_layer('添加分类','<?php echo url(array('path'=>'admin/acategory/add'),$_smarty_tpl);?>
','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" data-attr="0" name="id"></th>
				<th width="40">ID</th>
				<th width="200">类目</th>
				<th width="200">缩略图</th>
				<th width="300">描述</th>
				<th width="200">排序</th>
				<th width="70">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php echo $_smarty_tpl->tpl_vars['menuStr']->value;?>

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
//展示二三级分类
function showsub(pid,level){
	if($(".pid-"+pid).is(":hidden")){
		$(".pid-"+pid).fadeIn(500);
	}else{
		$(".pid-"+pid).fadeOut(500);
	}
}

//变更排序
function changeorder(obj,id) {
    var listorder = obj.value;
	$.ajax({
		url:"<?php echo url(array('path'=>'api/category/changeListOrder'),$_smarty_tpl);?>
",
		type:"POST",
		dataType:"JSON",
		data:{
		    id:id,
			listorder:listorder
		},
		success:function () {
            layer.msg('更新成功!',{icon:1,time:1000});
            location.reload();
        },
		error:function () {
            layer.msg('更新失败!',{icon:0,time:1000});
        }
	});
}

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
