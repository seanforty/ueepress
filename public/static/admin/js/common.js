/**
 * Created by Administrator on 2017/10/24.
 */

/*数据-编辑-弹窗*/
function pop_layer(title,url,w,h){
    layer_show(title,url,w,h);
}

/*数据-编辑-新开页面*/
function open_layer(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}

//批量删除
function del_all(url)
{
    layer.confirm('确认要全部删除吗？',function(index){
        var s = "";
        var ids = $(".dataid");
        for(x in ids){
            if(ids[x].checked){
                s += ids[x].value + ",";
            }
        }
        s = s.substring(0,s.length-1);
        $.ajax({
            url:url,
            type:"POST",
            dataType:"JSON",
            data:{
                ids:s
            },
            success:function () {
                layer.msg('删除成功!',{icon:1,time:1000});
                location.reload();
            },
            error:function () {
                layer.msg('删除失败!',{icon:0,time:1000});
            }
        });
    });
}

/*数据-删除*/
function del_data(obj,id,url){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url: url,
            type: "POST",
            data:{
                id:id
            },
            dataType: "json",
            success:function(data){
                layer.msg('删除成功!',{icon:1,time:1000});
                location.reload();
            },
            error:function(xhr,textStatus){
                layer.msg('删除失败!',{icon:0,time:1000});
            },
        });
    });
}

//切换状态
function statusswitch(id,url,yes,no) {
    var statusid = $("#statusid-"+id).val();
    if("1"==statusid)
        statusid = 0;
    else
        statusid = 1;

    $.ajax({
        url:url,
        type:"POST",
        dataType:"JSON",
        data:{
            id:id,
            status:statusid
        },
        success:function () {
            layer.msg('状态修改成功!',{icon:1,time:1000});
            if("1"==statusid){
                $("#td-status-" + id + " span").text(yes);
                $("#statusid-" + id).val("1");
                $("#td-status-" + id + " span").removeClass("label-danger");
                $("#td-status-" + id + " span").addClass("label-success");
            }else{
                $("#td-status-" + id + " span").text(no);
                $("#statusid-" + id).val("0");
                $("#td-status-" + id + " span").removeClass("label-success");
                $("#td-status-" + id + " span").addClass("label-danger");
            }
        },
        error:function () {
            layer.msg('状态修改失败!',{icon:0,time:1000});
        }
    });
}

$(function(){

    //huploadify上传图片
    var up = $('#upload').Huploadify({
        auto:true,
        fileTypeExts:'*.jpg;*.png;*.jpeg;*.gif',
        multi:true,
        formData:{key:1,key2:'2'},
        fileSizeLimit:512,
        showUploadedPercent:true,
        showUploadedSize:true,
        removeTimeout:2000,
        uploader:SCOPE.url,
        onUploadSuccess: function(file, data, response) {
            var dataJson = JSON.parse(data);
            if (dataJson.status) {
                $("#img_id").val(dataJson.mid);
                $("#uploadimg img").attr("src",dataJson.url);
                $("#uploadimg").show();
            } else {
                alert(dataJson.msg);
            }
        },
        //返回一个错误，选择文件的时候触发
        onSelectError: function (file, errorCode, errorMsg) {
            alert("上传失败");
        },
    });
});
