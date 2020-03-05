var username;
$(function () {
    $("body").delegate("#comment","propertychange input",function () {
        if($(this).val().length > 0)
        {
            $('#inputButton').prop('disabled',false);
        }else{
            $('#inputButton').prop('disabled',true);
        }
    });

    function getMsgList(){
        $.ajax({
            type:"get",
            url:"weibo.php",
            data:"act=get",
            success:function (msg) {
                // console.log(msg);
                var obj = eval("(" + msg + ")");
                $.each(obj,function (key,value) {
                    var weibo = createEle(value);
                    // console.log(value);
                    weibo.get(0).obj = value;
                    $("#messageList").prepend(weibo);
                })
            },
            error:function (xhr) {
            }
        })
    }
    getMsgList();

    function getUsername()
    {
        $.ajax({
            type:"get",
            url:"weibo.php",
            data:"act=getUsername",
            success:function (msg) {
                username = msg;
            },
            error:function (xhr) {
            }
        })
    }
    getUsername();
    console.log(username);

    $('#inputButton').click(function () {
        var text = $("#comment").val();
        $.ajax({
            type:"get",
            url:"weibo.php",
            data:"act=add&content="+text,
            success:function (msg) {
                var obj = eval("(" + msg + ")");
                // console.log(obj);
                var weibo = createEle(obj);
                weibo.get(0).obj = obj;
                $("#messageList").prepend(weibo);
                $("#comment").val("");
            },
            error:function (xhr) {
                alert(xhr.status);
            }
        })
    }
    )
    $("body").delegate(".infoDel","click",function () {
        var obj = $(this).parents(".show").get(0).obj;
        $(this).parents(".show").remove();
        $.ajax({
            type:"get",
            url:"weibo.php",
            data:"act=del&time="+obj.time,
            success:function (msg) {
                var obj = eval("(" + msg + ")");
                if(obj.error != "0")
                {
                    alert("删除失败");
                }
            },
            error:function (xhr) {
                alert(xhr.status);
            }
        })
    });
});


function createEle(obj) {
    var weibo = $("<div id=\"show\" class=\"show\">\n" +
        "                <div class=\"info\">\n" +
        "                    <p class=\"infoText\">" + obj.content + "</p>\n" +
        "                    <p class=\"infoOperation\">\n" +
        "                        <span class=\"infoTime\">" + obj.time + "</span>\n" +
        "                        <span class=\"infoUser\">" + "</span>\n" +
        "                        <span class=\"infoHandle\">\n" +
        "                            <a href=\"javascript:void(0)\" class=\"infoDel\">删除</a>\n" +
        "                        </span>\n" +
        "                    </p>\n" +
        "                </div>\n" +
        "            </div>");
    return weibo;
}

// function formartDate() {
//     var date = new Date();
//     var arr = [date.getFullYear() + "-",date.getMonth() + 1 + "-",date.getDate() + " ",date.getHours() + ":",date.getMinutes() + ":",date.getSeconds()];
//     return arr.join("");
// }



