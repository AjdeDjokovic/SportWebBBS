function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}


$(function () {

    var haoyou = getQueryString('username');
    console.log(haoyou);
    $("#haoyou").html("访问用户："+haoyou)


    function getMsgList(){
        $.ajax({
            type:"get",
            url:"haoyou.php",
            data:"act=gethaoyou&haoyou="+haoyou,
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


});


function createEle(obj) {
    var weibo = $("<div id=\"show\" class=\"show\">\n" +
        "                <div class=\"info\">\n" +
        "                    <p class=\"infoText\">" + obj.content + "</p>\n" +
        "                    <p class=\"infoOperation\">\n" +
        "                        <span class=\"infoTime\">" + obj.time + "</span>\n" +
        "                        <span class=\"infoUser\">" + "</span>\n" +
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



