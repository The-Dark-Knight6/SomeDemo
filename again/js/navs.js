let navs = ` <span>正</span><ul>
<li><a href="./index.html">首页</a></li>
<li><a href="./jqtest3.html">验证码</a></li>
<li><a href="./guessnum.html">猜数字</a></li>
<li><a href="./pressgame.html">敲字母</a></li>
<li><a href="./js_table.html">表格检索</a></li>
<li><a href="./calculate.html">计算器</a></li>
<li><a href="./divtable.html">自制列表</a></li>
<li><a href="./Echarts.html">图表</a></li>
</ul>`;

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
    