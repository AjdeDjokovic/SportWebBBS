<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>上传头像</title>

    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
    </script>
</head>
<body>
<p style="color:red;">只支持以下图片格式：
    jpg, gif, png, jpeg;  上传照片请不要大于2M</p>
<form action="portrait_upload2.php" method="post" enctype="multipart/form-data">

    <div style="display: none" id="first_img">
        <img id="xmTanImg" width="100px" />
    </div>

    <input type="file" name="Filedata" id="Filedata" onchange="showTheImg(this)"/>
    <!--<button onclick="fileUpload()">上传</button>-->
    <button>提交</button>
</form>
<script>
    //选择图片，马上预览
    function showTheImg(obj) {
        $('#first_img').css("display",'block');
        var file = obj.files[0];
        console.log(file.path);
        $("#qrImg").val(new Date().getTime()+"_"+file.name);
        console.log("file.size = " + file.size);  //file.size 单位为byte
        var reader = new FileReader();
        //读取文件过程方法
        reader.onloadstart = function (e) {
            console.log("开始读取....");
        };
        reader.onprogress = function (e) {
            console.log("正在读取中....");
        };
        reader.onabort = function (e) {
            console.log("中断读取....");
        };
        reader.onerror = function (e) {
            console.log("读取异常....");
        };
        reader.onload = function (e) {
            console.log("成功读取....");
            var img = document.getElementById("xmTanImg");
            img.src = e.target.result;
            //或者 img.src = this.result;  //e.target == this
        };
        reader.readAsDataURL(file);
    }


</script>

</html>
