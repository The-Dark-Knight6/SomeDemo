let navs =`
<span>
<img src="./img/smile.svg" style='width:90px'>
</span>
<ul class="slide_ul">
<li>
    <div>
        <img src="./img/menu.png" class="top_img">
        <span class="top_span">中央</span>
    </div>
    <ul>
        <li><a href="./index.html">首页</a></li>
    </ul>
</li>
<li>
    <div>
        <img src="./img/menu.png" class="top_img">
        <span class="top_span">高级js禅修之路</span>
    </div>
    <ul>
        <li><a href="./divtable.html">自制列表</a></li>
        <li><a href="./Echarts.html">图表</a></li>
    </ul>
</li>
<li>

    <div>
        <img src="./img/menu.png" class="top_img">
        <span class="top_span">通稿2019</span>
    </div>
    <ul>
        <li><a href="./js_table.html">表格检索</a></li>
    </ul>
</li>
<li>
    <div>
        <img src="./img/menu.png" class="top_img">
        <span class="top_span">MOBA前世今生</span>
    </div>
    <ul>
        <li><a href="./jqtest3.html">验证码</a></li>
        <li><a href="./guessnum.html">猜数字</a></li>
        <li><a href="./pressgame.html">按压密码</a></li>
    </ul>
</li>
<li>
    <div>
        <img src="./img/menu.png" class="top_img">
        <span class="top_span">there's nothing</span>
    </div>
    <ul>
        <li><a href="./calculate.html">计算器</a></li>
    </ul>
</li>
</ul>`

let float=` <div class="float_tip">
<div class="fly_cont">
    <p></p>
</div>
</div>`

// window.onload=function(){
//     $('a').mouseover(function(){
//         $('.float_tip').show();
//         $('.fly_cont>p').text($(this).text());
//     })
//     $('a').mouseleave(function(){
//         $('.float_tip').hide();
//     })
// }


window.onload=function(){
    // 导航栏点击折叠效果
    $('.slide_ul>li>div').click(function () {
        $(this).siblings().slideToggle();
        $(this).parent().siblings().find('ul').slideUp();
    })
    //文字title属性
    $('.top_span').each(function(){
        $(this).attr({
            'title':$(this).text()
        })
    })
    //浮动展示的内容
    let a_name=document.getElementsByTagName('a');
    let float_tip = document.querySelector('.float_tip');
    let fly_cont = document.querySelector('.fly_cont').children[0];
    for(let i = 0;i < a_name.length ; i++){
        a_name[i].addEventListener('mouseover',function(){
            float_tip.style.display='block';
            fly_cont.innerHTML = this.innerHTML;
        })
        a_name[i].addEventListener('mouseleave',function(){
            float_tip.style.display='none';
        })
    }
}