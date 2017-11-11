<?php
/* Smarty version 3.1.30, created on 2017-11-11 04:55:30
  from "E:\www\meswebsite\app\admin\view\public\_menu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a061242e2c499_90756708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c9a821ccd41e242c54113141e4f9158da7c8c55' => 
    array (
      0 => 'E:\\www\\meswebsite\\app\\admin\\view\\public\\_menu.html',
      1 => 1510347329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a061242e2c499_90756708 (Smarty_Internal_Template $_smarty_tpl) {
?>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe616;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/products/index'),$_smarty_tpl);?>
" data-title="产品管理" href="javascript:void(0)">产品管理</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/pcategory/index'),$_smarty_tpl);?>
" data-title="产品分类" href="javascript:void(0)">产品分类</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/cases/index'),$_smarty_tpl);?>
" data-title="案例列表" href="javascript:void(0)">案例列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 内容管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/articles/index'),$_smarty_tpl);?>
" data-title="文章管理" href="javascript:void(0)">文章管理</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/acategory/index'),$_smarty_tpl);?>
" data-title="文章分类" href="javascript:void(0)">文章分类</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/page/index'),$_smarty_tpl);?>
" data-title="页面列表" href="javascript:void(0)">页面列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/comment/commentList'),$_smarty_tpl);?>
" data-title="文章评论" href="javascript:;">文章评论</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/comment/commentList'),$_smarty_tpl);?>
" data-title="产品评论" href="javascript:;">评论列表</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/comment/messageList'),$_smarty_tpl);?>
" data-title="在线留言" href="javascript:void(0)">在线留言</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-layout">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 布局管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/Menulist/index'),$_smarty_tpl);?>
" data-title="菜单管理" href="javascript:void(0)">菜单管理</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/Sliderbox/getList'),$_smarty_tpl);?>
" data-title="广告管理" href="javascript:void(0)">广告管理</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/Link/getList'),$_smarty_tpl);?>
" data-title="友链管理" href="javascript:void(0)">友情链接</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/admin/getAll'),$_smarty_tpl);?>
" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/role/getAll'),$_smarty_tpl);?>
" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-image">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/image/getList'),$_smarty_tpl);?>
" data-title="系统设置" href="javascript:void(0)">图片列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url(array('path'=>'admin/siteinfo/index'),$_smarty_tpl);?>
" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
					<li><a data-href="<?php echo url(array('path'=>'admin/sitetext/filterText'),$_smarty_tpl);?>
" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div><?php }
}
