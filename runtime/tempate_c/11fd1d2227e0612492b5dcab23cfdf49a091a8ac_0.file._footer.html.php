<?php
/* Smarty version 3.1.30, created on 2017-11-10 13:11:03
  from "E:\www\ueepress2\app\admin\view\public\_footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0534e78c9726_05028725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11fd1d2227e0612492b5dcab23cfdf49a091a8ac' => 
    array (
      0 => 'E:\\www\\ueepress2\\app\\admin\\view\\public\\_footer.html',
      1 => 1510273511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0534e78c9726_05028725 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/lib/layer/2.4/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/h-ui/js/H-ui.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/h-ui.admin/js/H-ui.admin.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/huploadify/jquery.Huploadify.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('STATIC');?>
/admin/js/common.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
var SCOPE = {
    url: '<?php echo url(array('path'=>"api/image/add"),$_smarty_tpl);?>
'
};
//框架跳转
function header_go(url)
{
    $('iframe').attr('src',url);
}

<?php echo '</script'; ?>
><?php }
}
