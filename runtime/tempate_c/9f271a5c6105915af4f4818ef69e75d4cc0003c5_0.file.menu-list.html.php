<?php
/* Smarty version 3.1.30, created on 2017-11-11 04:53:29
  from "E:\www\meswebsite\app\admin\view\menu-list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0611c9cabf19_86833305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f271a5c6105915af4f4818ef69e75d4cc0003c5' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\menu-list.html',
      1 => 1510347078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/_meta.html' => 1,
    'file:public/_footer.html' => 1,
  ),
),false)) {
function content_5a0611c9cabf19_86833305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>菜单管理 - 布局管理 - UEECMS</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 布局管理 <span class="c-gray en">&gt;</span> 菜单管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
		<form style="display:inline;" action="<?php echo url(array('path'=>'admin/menulist/index'),$_smarty_tpl);?>
" method="get">
		菜单列表：
		<span class="select-box inline">
			<select id="menulist" class="select" name="id">
				<option value="0">--请选择菜单</option>
				<?php echo $_smarty_tpl->tpl_vars['menulist']->value;?>

			</select>
		</span>
		<input type="submit" class="btn btn-success" value="选择">
		</form>
		分类列表：
		<span class="select-box inline">
		<select id="catelist" class="select">
			<option value="0">--请选择分类</option>
			<?php echo $_smarty_tpl->tpl_vars['catelist']->value;?>

		</select>
		</span>
		<button class="btn btn-success" type="submit" onclick="addcate()"> 添加</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		页面列表：
		<span class="select-box inline">
		<select id="pagelist" class="select">
			<option value="0">--请选择页面</option>
			<?php echo $_smarty_tpl->tpl_vars['pagelist']->value;?>

		</select>
		</span>
		<button class="btn btn-success" type="submit" onclick="addpage()"> 添加</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="del_all('<?php echo url(array('path'=>'api/Menusite/deleteAll'),$_smarty_tpl);?>
')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		</span>
		<span class="r"></span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>菜单项</th>
					<th width="80">菜单类型</th>
					<th width="120">链接ID</th>
					<th width="75">新窗口打开</th>
					<th width="60">缩略图ID</th>
					<th width="120">排序</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody id="datatr"><?php echo $_smarty_tpl->tpl_vars['menustr']->value;?>
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
//下级菜单展开折叠
function showsub(pid,level){
	if($(".pid-"+pid).is(":hidden")){
		$(".pid-"+pid).fadeIn(100);
	}else{
		$(".pid-"+pid).fadeOut(100);
	}
}

function addline(res) {
    var str = "";
    str += '<tr class="text-c">'
    str += '<td><input type="checkbox" value="'+ res.id +'" name=""></td>';
    str += '<td>'+ res.id +'</td>';
    str += '<td class="text-l">'+ res.title +'</td>';
    if( 1 == res.linktype ){
        str += '<td>页面</td>;';
    }else{
        str += '<td>分类</td>';
    }
    str += '<td>'+res.linkid+'</td>';
    if(0==res.target){
        str += '<td>本窗口打开</td>';
	}else{
        str += '<td>新窗口打开</td>';
	}

    str += '<td>'+res.img_id+'</td>';
    str += '<td><input type="text" size="3" name="listorder" id="listorder" value="'+res.listorder+'" onchange="changeorder(this,'+ res.id +')" ></td>';
    str += '<td class="f-14 td-manage">';
    str += '<a style="text-decoration:none" class="ml-5" onClick="pop_layer(\'菜单编辑\',\'<?php echo url(array('path'=>"admin/Menusite/update",'params'=>array("id"=>"'+res.id+'","mid"=>"'+res.mid+'")),$_smarty_tpl);?>
\',\'800\',\'500\')" href="javascript:;" title="编辑">';
    str += '<i class="Hui-iconfont">&#xe6df;</i></a>';
    str += '<a style="text-decoration:none" class="ml-5"';
    str += 'onClick="del_data(this,\''+res.id+'\',\'<?php echo url(array('path'=>"api/menusite/delete"),$_smarty_tpl);?>
\')" href="javascript:;" title="删除">';
    str += '<i class="Hui-iconfont">&#xe6e2;</i></a></td>';
    str += '</tr>';
	return str;
}

function addpage() {
	var pid = $("#pagelist").val();
    var mid = $("#menulist").val();
	console.log(pid);
	$.ajax({
        url:'<?php echo url(array('path'=>"api/menusite/addpage"),$_smarty_tpl);?>
',
        data:{
            id:pid,
			mid:mid
        },
        dataType:'json',
        type:'post',
        success:function (res) {
            console.log(res);
            var str = addline(res);
            $("#datatr tr:last").after(str);
        },
        error:function (res) {
			alert("111");
        }
	});
}

function addcate() {
	var cid = $("#catelist").val();
	var mid = $("#menulist").val();
	$.ajax({
		url:'<?php echo url(array('path'=>"api/menusite/addCate"),$_smarty_tpl);?>
',
		data:{
		    id:cid,
			mid:mid
		},
		dataType:'json',
		type:'post',
		success:function (res) {
		    var str = addline(res);
			$("#datatr tr:last").after(str);
        },
		error:function (res) {

        }
	});
}

//更新顺序
function changeorder(t,id)
{
	$.ajax({
		url:'<?php echo url(array('path'=>"api/menusite/changeOrder"),$_smarty_tpl);?>
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
