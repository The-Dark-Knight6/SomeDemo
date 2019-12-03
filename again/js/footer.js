let foot = ` <div class="foot">
<img src="../img/social_github.svg" class="githubimg">
<img src="../img/qqs.svg" class="qqimg">
<img src="../img/social_sina.svg" class="sinaimg">
<p style='font-size:0.8rem'>Copyright 2019 小付同学 All Rights Reserved</p>
<p style='font-size:0.8rem'>粤ICP备19054851号-1</p>
</div>`;

let center=`
<ul>
<li>Story</li>
<li>青蛙与啦蛤蟆的区别...</li>
<li>青蛙思想封建，坐井观天，不思进取，是负能量；</li>
<li>癞蛤蟆思想前卫，想吃天鹅肉，有远大抱负，是正能量。</li>
<li>最后青蛙上了饭桌，成了一道菜；</li>
<li>而癞蛤蟆进了供台，改名“金蟾”。</li>
<li>所以长的丑点不怕，关键是要想得美。</li>
<li>人生如果没有梦想，那和咸鱼有什么区别？</li>
<li>即使要做咸鱼，也要做最咸的那一条！</li>
<li>
      <div class="picture">
            <img src="../img/25043752.gif" alt="">
      </div>
</li>
<li>纽约时间比加州时间早三个小时，</li>
<li>但加州时间并没有变慢。</li>
<li>有人22岁就毕业了，</li>
<li>但等了五年才找到好的工作！</li>
<li>有人25岁就当上CEO，</li>
<li>却在50岁去世。</li>
<li>也有人迟到50岁才当上CEO，</li>
<li>然后活到90岁。</li>
<li>有人依然单身，</li>
<li>同时也有人已婚。</li>
<li>奥巴马55岁就退休，</li>
<li>川普70岁才开始当总统.</li>
<li>世上每个人本来就有自己的发展时区。</li>
<li>身边有些人看似走在你前面，</li>
<li>也有人看似走在你后面。</li>
<li>但其实每个人在自己的时区有自己的步程。</li>
<li>不用嫉妒或嘲笑他们。</li>
<li>他们都在自己的时区里，你也是！</li>
<li>生命就是等待正确的行动时机。</li>
<li>所以，放轻松。</li>
<li>你没有落后。</li>
<li>你没有领先。</li>
<li>在命运为你安排的属于自己的时区里，一切都准时。</li>
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
