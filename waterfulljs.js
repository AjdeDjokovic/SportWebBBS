window.onload = function () {
    imgLocation("container","box");
    var imgData = {"data":[{"src":"1.jpg"},{"src":"2.jpg"},{"src":"3.jpg"},{"src":"4.jpg"},{"src":"5.jpg"},{"src":"6.jpg"},{"src":"7.jpg"},{"src":"8.jpg"},{"src":"9.jpg"},{"src":"10.jpg"}]};
    window.onscroll = function () {
        if(checkFlag())
        {
            var cparent = document.getElementById("container");
            for(var i = 0;i < imgData.data.length;i++)
            {
                var ccontent = document.createElement("div");
                ccontent.className = "box";
                cparent.appendChild(ccontent);
                var box_img = document.createElement("div");
                box_img.className = "box_img";
                ccontent.appendChild(box_img);
                var img = document.createElement("img");
                img.src = "image/" + imgData.data[i].src;
                box_img.appendChild(img);
            }
            imgLocation("container","box");
        }
            
        
    }


}

function checkFlag() {
    var cparent = document.getElementById("container");
    var ccontent = getChildElement(cparent,"box");
    var lastContentHeight = ccontent[ccontent.length - 1].offsetTop;
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    var pageHeight = document.documentElement.clientHeight || document.body.clientHeight;
    if(lastContentHeight < scrollTop + pageHeight)
    return true;
    else
        return false;
    
}

function imgLocation(parent,content) {
    var cparent = document.getElementById(parent);
    var ccontent = getChildElement(cparent,content);
    var imgWidth = ccontent[0].offsetWidth;
    var cols = Math.floor(document.documentElement.clientWidth / imgWidth);
    cparent.style.cssText = "width:" + imgWidth * cols + "px;margin:0 auto";

    var BoxHeightArr = [];
    for(var i = 0;i < ccontent.length;i++)
    {
        if(i < cols)
        {
            BoxHeightArr[i] = ccontent[i].offsetHeight;
        }
        else
        {
            var min = 0;
            for(var j = 1;j < BoxHeightArr.length;j++) {
                if(BoxHeightArr[min] > BoxHeightArr[j])
                    min = j;
            }
            ccontent[i].style.position = "absolute";
            ccontent[i].style.top = BoxHeightArr[min] + "px";
            ccontent[i].style.left = ccontent[min].offsetLeft + "px";
            BoxHeightArr[min] += ccontent[i].offsetHeight;
        }
    }

}


    


function getChildElement(parent,content) {
    var contentArr = [];
    var allcontent = parent.getElementsByTagName("*");
    for(var i = 0;i < allcontent.length;i++)
    {
        if(allcontent[i].className == content)
            contentArr.push(allcontent[i]);
    }
    return contentArr;
}