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
        <li><a href="./noplace.html">无主之地</a></li>
    </ul>
</li>
<li>
    <div>
        <img src="./img/menu.png" class="top_img">
        <span class="top_span">低级JS禅修之道</span>
    </div>
    <ul>
        <li><a href="./divtable.html">自制列表</a></li>
        <li><a href="./Echarts.html">图表</a></li>
        <li><a href="./css_world.html">css世界</a></li>
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
        <span class="top_span">MOBA</span>
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
    <h3 class="desc"></h3>
</div>
</div>`

//浮动展示内容
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
    //判断设备
    if(os.isPc){
        console.info("%c Welcome to my blog","color:red");
      }else if(os.isAndroid || os.isPhone){
        window.location.replace('../phone/PhoneIndex.html')
      }
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
    let fly_p = document.querySelector('.desc');
    for(let i = 0;i < a_name.length ; i++){
        a_name[i].addEventListener('mouseover',function(){
            float_tip.style.display='block';
            fly_cont.innerHTML = this.innerHTML;
            switch(fly_cont.innerHTML){
                case '首页':fly_p.innerHTML='所赖君子见机，达人知命。老当益壮，宁移白首之心？穷且益坚，不坠青云之志。';break;
                case '自制列表':fly_p.innerHTML='寄蜉蝣于天地，渺沧海之一粟。哀吾生之须臾，羡长江之无穷。挟飞仙以遨游，抱明月而长终。';break;
                case '图表':fly_p.innerHTML='惟江上之清风，与山间之明月，耳得之而为声，目遇之而成色，取之无禁，用之不竭。';break;
                case '表格检索':fly_p.innerHTML='江流有声，断岸千尺；山高月小，水落石出。曾日月之几何，而江山不可复识矣。';break;
                case '猜数字':fly_p.innerHTML='既自以心为形役，奚惆怅而独悲？悟已往之不谏，知来者之可追。';break;
                case '按压密码':fly_p.innerHTML='江畔何人初见月？江月何年初照人？人生代代无穷已，江月年年望相似。';break;
                case '无主之地':fly_p.innerHTML='俱往矣，数风流人物，还看今朝。';break;
                default :fly_p.innerHTML='流水落花春去也，天上人间。'
            }
        })
        a_name[i].addEventListener('mouseleave',function(){
            float_tip.style.display='none';
        })
    }
}