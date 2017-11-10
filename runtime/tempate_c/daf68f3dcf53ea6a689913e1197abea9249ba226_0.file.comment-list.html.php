<?php
/* Smarty version 3.1.30, created on 2017-11-10 14:22:09
  from "E:\www\ueepress2\app\admin\view\comment-list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0545917a08f7_41521851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daf68f3dcf53ea6a689913e1197abea9249ba226' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\comment-list.html',
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
function content_5a0545917a08f7_41521851 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" type="text/css" href="<?php echo @constant('STATIC');?>
/admin/lib/kkpager/kkpager_blue.css" />
<title>评论列表 - 评论管理 - UEECMS</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 评论列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="keyword" id="keyword" placeholder=" 评论名称" style="width:250px" class="input-text">
		<button class="btn btn-success" type="submit" onclick="search_comment()"><i class="Hui-iconfont">&#xe665;</i> 搜评论</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="del_all('<?php echo url(array('path'=>"api/comment/deleteAll"),$_smarty_tpl);?>
')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		</span>
		<span class="r"></span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="id" value=""></th>
					<th width="25">ID</th>
					<th width="100">标题</th>
					<th width="120">时间</th>
					<th width="150">用户</th>
					<th width="120">文章</th>
					<th width="60">状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody id="datatr">
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
					<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['val']->value['create_time'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
<br><?php echo $_smarty_tpl->tpl_vars['val']->value['mobile'];?>
</td>
					<td><a href="<?php echo url(array('path'=>'admin/article/update','params'=>array('id'=>$_smarty_tpl->tpl_vars['val']->value['aid'])),$_smarty_tpl);?>
" title="<?php ob_start();
echo $_smarty_tpl->tpl_vars['val']->value['article']['title'];
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['val']->value['article']['title'];?>
</a></td>
					<td class="td-status" id="td-status-<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" onclick="statusswitch(<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
,'<?php echo url(array('path'=>'api/comment/changeStatus'),$_smarty_tpl);?>
','已读','未读')">
						<input type="hidden" id="statusid-<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['status'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['val']->value['status'] == "1") {?>
						<span class="label label-success radius">已读</span>
						<?php } else { ?>
						<span class="label label-danger radius">未读</span>
						<?php }?>
					</td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="pop_layer('查看评论','<?php echo url(array('path'=>'admin/comment/readComment','params'=>array('id'=>$_smarty_tpl->tpl_vars['val']->value['id'])),$_smarty_tpl);?>
')" href="javascript:;" title="查看"><i class="Hui-iconfont">&#xe720;</i></a>
						<a style="text-decoration:none" class="ml-5" onClick="del_data(this,'<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
','<?php echo url(array('path'=>"api/comment/delete"),$_smarty_tpl);?>
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
<div style="margin: 0 40px;">
	<div id="kkpager"></div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:public/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/kkpager/kkpager.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/My97DatePicker/4.8/WdatePicker.js"><?php echo '</script'; ?>
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
			return '<?php echo url(array('path'=>"admin/comment/commentList",'params'=>array("page"=>"'+n")),$_smarty_tpl);?>
;
		}
	});
});

//评论搜索功能
function search_comment()
{
    var logmin = $("#logmin").val();
    var logmax = $("#logmax").val();
    var keyword = $("#keyword").val();
    location.href = '<?php echo url(array('path'=>"admin/comment/commentList",'params'=>array("keyword"=>"'+keyword+'","logmin"=>"'+logmin+'","logmax"=>"'+logmax")),$_smarty_tpl);?>
;
}


<?php echo '</script'; ?>
> 
</body>
</html><?php }
}
