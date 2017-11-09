<?php
/* Smarty version 3.1.30, created on 2017-11-08 00:51:17
  from "E:\www\UeePress\app\index\view\pc\public\_footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a01e485cb6626_01305110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1043f6abf0167d7a9b1152df6a2907bff9b1ddb0' => 
    array (
      0 => 'E:\\www\\UeePress\\app\\index\\view\\pc\\public\\_footer.html',
      1 => 1509555451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a01e485cb6626_01305110 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="foot">
    <div class="footer">
        <div class="foot_left">
            <form name="leavemessage" id="leavemessage" onSubmit="return false;">
                <li>
                    <input type="text" name="lc_name" id="lc_name" class="shouye-gbook-111" required="true" placeholder="请输入姓名" >
                    <div class="cl"></div>
                </li>
                <li>
                    <input type="text" name="lc_mobile" id="lc_mobile" class="shouye-gbook-111" required="true" placeholder="请输入电话" >
                    <div class="cl"></div>
                </li>
                <li>
                    <input type="text" name="lc_email" id="lc_email" class="shouye-gbook-111" placeholder="请输入邮箱" required="true" >
                    <div class="cl"></div>
                </li>
                <li>
                    <input type="text" name="lc_title" id="lc_title" class="shouye-gbook-111" placeholder="请输入标题" required="true" >
                    <div class="cl"></div>
                </li>
                <li>
                    <textarea name="lc_content" id="lc_content" class="shouye-gbook-112" required="true" ></textarea>
                    <div class="cl"></div>
                </li>
                <li>
                    <div class="main_but">
                        <input type="button" onclick="submitmessage()" name="tijiao" id="tijiao1" class="shouye-gbook-114">
                        <!-- <input type="reset" id="chongzhi" class="gbook_1" style="margin-left:30px; height:35px; width:100px; border:0px; font-size:16px;" value="重    置"> -->
                        <div class="cl"></div>
                    </div>
                </li>
            </form>
        </div>
        <div class="foot_right">
            <div class="foot_right_1">分享到：
                <div class="bdsharebuttonbox">
                    <a href="#" class="bds_more" data-cmd="more"></a>
                    <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
                    <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
                    <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
                    <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
                    <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
                </div>
                <?php echo '<script'; ?>
>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];<?php echo '</script'; ?>
>
            </div>
            <div style="clear:both"></div>
            <div class="foot_right_2">
                <div id="botbj">
                    <div id="bot">
                        <div id="fot">
                            <p>
                                <?php echo $_smarty_tpl->tpl_vars['footer']->value['copyright'];?>
 <?php echo $_smarty_tpl->tpl_vars['footer']->value['beianhao'];?>
<br />
                                <?php echo $_smarty_tpl->tpl_vars['footer']->value['footertext'];?>

                            </p>
                            <p>
                                <br />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foot_right_3">
                <li>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['footer_img'][0]['image']['img_url'];?>
" alt=""><br>
                    <span><?php echo $_smarty_tpl->tpl_vars['ads']->value['footer_img'][0]['img_alt'];?>
</span>
                </li>
            </div>
            <div class="foot_right_4" style="margin-left:20px;">
                <div class="foot_right_41">
                    <span><?php echo $_smarty_tpl->tpl_vars['footer']->value['footercontact'];?>
</span>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="to-top"><img src="picture/top_03.png" alt=""></a>


<?php echo '<script'; ?>
 type="text/javascript">
//ajax提交留言
function submitmessage() {
    var lc_name,lc_mobile,lc_email,lc_title,lc_content;
    lc_name = $("#lc_name").val();
    lc_mobile  = $("#lc_mobile").val();
    lc_email= $("#lc_email").val();
    lc_title= $("#lc_title").val();
    lc_content=$("#lc_content").val();
    console.log(lc_name);
    if(!lc_name){
        layer.msg("姓名不能为空！",{icon:5});return "";
    }
    if(!lc_mobile){
        layer.msg("电话不能为空！",{icon:5});return "";
    }
    if(!lc_email){
        layer.msg("邮箱不能为空！",{icon:5});return "";
    }
    if(!lc_title){
        layer.msg("标题不能为空！",{icon:5});return "";
    }
    if(!lc_content){
        layer.msg("内容不能为空！",{icon:5});return "";
    }

    $.ajax({
        url:'<?php echo url(array('path'=>"api/comment/saveMessage"),$_smarty_tpl);?>
',
        type:"POST",
        data:{
            name:lc_name,
            mobile:lc_mobile,
            email:lc_email,
            title:lc_title,
            content:lc_content
        },
        dataType:"JSON",
        success:function (res) {
            layer.msg("留言已提交！",{icon:1});
        },
        error:function (res) {
            console.log(res);
            layer.msg("留言提交失败！原因："+res.responseJSON.errMsg,{icon:0});
        }
    });


}

<?php echo '</script'; ?>
><?php }
}
