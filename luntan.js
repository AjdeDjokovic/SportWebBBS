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
            url:"luntan.php",
            data:"act=get",
            success:function (msg) {
                console.log(msg);
                var obj = eval("(" + msg + ")");
                console.log(obj);
                $.each(obj,function (key,value) {
                    var weibo = createEle2(value);
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
                console.log(msg);
                $("#username").html("用户名："+msg);
            },
            error:function (xhr) {
            }
        })
    }
    getUsername();



    $('#inputButton').click(function () {
            var text = $("#comment").val();
            $.ajax({
                type:"get",
                url:"luntan.php",
                data:"act=add&content="+text,
                success:function (msg) {
                    console.log(msg);
                    var obj = eval("(" + msg + ")");
                    console.log(obj);
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

});

function createEle(obj) {
    // var luntan = $("<div class=\"media text-muted pt-3\">\n" +
    //     "            <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect fill=\"#e83e8c\" width=\"100%\" height=\"100%\"/><text fill=\"#e83e8c\" dy=\".3em\" x=\"50%\" y=\"50%\">32x32</text></svg>\n" +
    //     "            <a href=\"tiezi.html?tablename="+obj.tablename+"\">\n" +
    //     "                <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">\n" +
    //     "                    <strong class=\"d-block text-gray-dark\">"+obj.username+"&nbsp&nbsp&nbsp"+obj.time+"</strong>\n" +
    //     obj.content +
    //     "                </p>\n" +
    //     "            </a>\n" +
    //     "        </div>");
    var luntan = $("<div class=\"media text-muted pt-3\">\n" +
        "            <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect fill=\"#e83e8c\" width=\"100%\" height=\"100%\"></rect><text fill=\"#e83e8c\" dy=\".3em\" x=\"50%\" y=\"50%\">32x32</text></svg>\n" +
        "            <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">\n" +
        "                <strong class=\"d-block text-gray-dark\"><a href=\"haoyou.html?username="+obj.username+"\">"+obj.username+"&nbsp&nbsp&nbsp"+obj.time+"</a></strong>\n" +
        "                <a href=\"tiezi.html?tablename="+obj.tablename+"\">"+obj.content+"</a>\n" +
        "            </p>\n" +
        "        </div>");
    return luntan;
}

function createEle2(obj) {
    // var luntan = $("<div class=\"media text-muted pt-3\">\n" +
    //     "            <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect fill=\"#e83e8c\" width=\"100%\" height=\"100%\"/><text fill=\"#e83e8c\" dy=\".3em\" x=\"50%\" y=\"50%\">32x32</text></svg>\n" +
    //     "            <a href=\"tiezi.html?tablename="+obj.Tables_in_database2+"\">\n" +
    //     "                <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">\n" +
    //     "                    <strong class=\"d-block text-gray-dark\">"+obj.username+"&nbsp&nbsp&nbsp"+obj.time+"</strong>\n" +
    //     obj.content +
    //     "                </p>\n" +
    //     "            </a>\n" +
    //     "        </div>");
    var luntan = $("<div class=\"media text-muted pt-3\">\n" +
        "            <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect fill=\"#e83e8c\" width=\"100%\" height=\"100%\"></rect><text fill=\"#e83e8c\" dy=\".3em\" x=\"50%\" y=\"50%\">32x32</text></svg>\n" +
        "            <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">\n" +
        "                <strong class=\"d-block text-gray-dark\"><a href=\"haoyou.html?username="+obj.username+"\">"+obj.username+"&nbsp&nbsp&nbsp"+obj.time+"</a></strong>\n" +
        "                <a href=\"tiezi.html?tablename="+obj.Tables_in_database2+"\">"+obj.content+"</a>\n" +
        "            </p>\n" +
        "        </div>");
    return luntan;
}

