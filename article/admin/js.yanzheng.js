function istitle(str){
    var reg = /^[\u4E00-\u9FA5A-Za-z0-9_]{1,20}$/;
    return reg.test(str);
}
function isauthor(str){
    var reg =/^[\u4E00-\u9FA5A-Za-z0-9_]{1,10}$/;
    return reg.test(str);
}
function isdescription(str){
    // console.log(str,(str.length>=20 && str.length<=100))
    return(str.length>=20 && str.length<=100)
}
function iscontent(str){
    return(str.length>=50 && str.length<=10000)
}

function yan(){
    if(!istitle(document.getElementById("title").value)){
        alert("标题长度1-20，中文、英文、数字、下划线");
        document.getElementById("title").focus();
        return false;
    }
    if(!isauthor(document.getElementById("author").value)){
        alert("作者长度1-10，中文、英文、数字、下划线");
        document.getElementById("author").focus();
        return false;
    }
    if(!isdescription(document.getElementById("description").value)){
        alert("文章简介长度为20-100个字符");
        document.getElementById("description").focus();
        return false;
    }
    if(!iscontent(document.getElementById("content").value)){
        alert("文章内容长度为50-10000个字符");
        document.getElementById("content").focus();
        return false;
    }
}