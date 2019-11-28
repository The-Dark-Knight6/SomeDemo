let foot = ` <div class="foot">
<img src="../img/social_github.svg" class="githubimg">
<img src="../img/qqs.svg" class="qqimg">
<img src="../img/social_sina.svg" class="sinaimg">
<p style='font-size:0.8rem'>Copyright @ 2019-2020 Class Fu</p>
<p style='font-size:0.8rem'>粤ICP备19054851号</p>
</div>`;

let center=`
<ul>
<li>Story</li>
<li>青蛙与啦蛤蟆的区别...</li>
<li>青蛙思想封建，坐井观天，不思进取，为负能量；</li>
<li>癞蛤蟆思想前卫，想吃天鹅肉，有远大抱负，是正能量。</li>
<li>最后青蛙上了餐桌，成了一道菜；</li>
<li>而癞蛤蟆进了庙堂，改名“金蟾”。</li>
<li>所以长的寒蝉点没事，关键是要想得美。</li>
<li>即便做咸鱼，也要做最咸的那条...</li>
<li>
      <div class="picture">
            <img src="../img/25043752.gif" alt="">
      </div>
</li>

<li>It's the best of times,</li>
<li>it's the worst of times.</li>
</ul>
<img src="" data-src="../img/309617.jpg" alt="">
<ul class="center_word">
<li>闻道有先后</li>
<li>术业有专攻</li>
<li>外行看热闹</li>
<li>内行看门道</li>
</ul>
<img src="" data-src="../img/315441.jpg" alt="">
<ul>
<li>热闹：</li>
<li>
      <ul>
            <li>
                  <div class="picture">
                        <img src="" data-src="../img/25043751.gif" alt="">
                  </div>
            </li>
      </ul>
</li>
<li>门道：</li>
<li>
      <ul>
            <li>Web Server：liunx, centos 7.0.5 version, nginx</li>
            <li>Building Tool：visual studio code, winscp, upupw, git</li>
            <li>Coding Language：html, css, javascript, jquery, json</li>
            <li>Code Store： github</li>
      </ul>
</li>
</ul>
<img src="" data-src="../img/323822.jpg" alt="">
<div class="text">
<ul class="endpoem">
      <li>滕王高阁临江渚，佩玉鸣鸾罢歌舞。</li>
      <li>画栋朝飞南浦云，珠帘暮卷西山雨。</li>
      <li>闲云潭影日悠悠，物换星移几度秋。</li>
      <li>阁中帝子今何在？槛外长江空自流。</li>
</ul>
</div>`

$(window).on('scroll',function () {//当页面滚动的时候绑定事件
    $('img').each(function () {//遍历所有的img标签
        if (checkShow($(this)) && !isLoaded($(this)) ){
            // 需要写一个checkShow函数来判断当前img是否已经出现在了视野中
            //还需要写一个isLoaded函数判断当前img是否已经被加载过了
            loadImg($(this));//符合上述条件之后，再写一个加载函数加载当前img
        }
    })
})
function checkShow($img) { // 传入一个img的jq对象
    var scrollTop = $(window).scrollTop();  //即页面向上滚动的距离
    var windowHeight = $(window).height(); // 浏览器自身的高度
    var offsetTop = $img.offset().top;  //目标标签img相对于document顶部的位置
    if (offsetTop < (scrollTop + windowHeight) && offsetTop > scrollTop) { //在2个临界状态之间的就为出现在视野中的
        return true;
    }
    return false;
}
function isLoaded ($img) {
    return $img.attr('data-src') === $img.attr('src'); //如果data-src和src相等那么就是已经加载过了
}
function loadImg ($img) {
    $img.attr('src',$img.attr('data-src')); // 加载就是把自定义属性中存放的真实的src地址赋给src属性
}
