function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}

$(function () {
    $("body").delegate("#comment","propertychange input",function () {
        if($(this).val().length > 0)
        {
            $('#inputButton').prop('disabled',false);
        }else{
            $('#inputButton').prop('disabled',true);
        }
    });

    var tablename = getQueryString('tablename');
    console.log(tablename);

    $('#inputButton').click(function () {
            var text = $("#comment").val();
            $.ajax({
                type:"get",
                url:"tiezi.php",
                data:"act=add&content="+text+"&tablename="+tablename,
                success:function (msg) {
                    console.log(msg);
                    var obj = eval("(" + msg + ")");
                    console.log(obj);
                    var weibo = createEle(obj);
                    weibo.get(0).obj = obj;
                    $("#messageList").append(weibo);
                    $("#comment").val("");
                },
                error:function (xhr) {
                    alert(xhr.status);
                }
            })
        }
    );

    function getMsgList(){
        $.ajax({
            type:"get",
            url:"tiezi.php",
            data:"act=get&tablename="+tablename,
            success:function (msg) {
                console.log(msg);
                var obj = eval("(" + msg + ")");
                console.log(obj);
                $.each(obj,function (key,value) {
                    var weibo = createEle(value);
                    // console.log(value);
                    weibo.get(0).obj = value;
                    $("#messageList").append(weibo);
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
                console.log(msg);
                $("#username").html("用户名："+msg);
            },
            error:function (xhr) {
            }
        })
    }
    getUsername();

});

function createEle(obj) {
    // var luntan1 = $("<div class=\"media text-muted pt-3\">\n" +
    //     "            <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect fill=\"#007bff\" width=\"100%\" height=\"100%\"></rect><text fill=\"#007bff\" dy=\".3em\" x=\"50%\" y=\"50%\">32x32</text></svg>\n" +
    //     "                <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">\n" +
    //     "                    <strong class=\"d-block text-gray-dark\">"+obj.username+"&nbsp&nbsp&nbsp"+obj.time+"</strong>\n" +
    //     obj.content +
    //     "        </div>");
    var luntan = $("<div class=\"media text-muted pt-3\">\n" +
        "            <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect fill=\"#e83e8c\" width=\"100%\" height=\"100%\"></rect><text fill=\"#e83e8c\" dy=\".3em\" x=\"50%\" y=\"50%\">32x32</text></svg>\n" +
        "            <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">\n" +
        "                <strong class=\"d-block text-gray-dark\"><a href=\"haoyou.html?username="+obj.username+"\">"+obj.username+"&nbsp&nbsp&nbsp"+obj.time+"</a></strong>\n" +
        obj.content +
        "            </p>\n" +
        "        </div>");
    return luntan;
}

