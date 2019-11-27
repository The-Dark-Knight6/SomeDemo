let phone_top=` <div class="nav_content">
<img src="../img/menu.png" alt="" class="choice">
<img src="../img/ico2.ico" alt="" class="myhost">
<img src="../img/mus.svg" alt="" class="music">
</div>`;

let nav_list=` <ul class="mast">
<li>
      <h3>index</h3>
      <ul>
            <li>
                  <a href="../phone/PhoneIndex.html">首页</a>
            </li>
            <li>
                  <a href="../phone/people.html">摩登时代</a>
            </li>
            <li>
            <a href="../phone/record.html">前言搭后语</a>
      </li>
            <li>
                  <a href="../phone/lifetime.html">时间线</a>
            </li>
            <li>
            <a href="../phone/somelink.html">一些小链接</a>
      </li>
      
      </ul>
</li>
<li>
      <h3>coding</h3>
      <ul>
            <li><a href="javascript:;">996</a></li>
            <li><a href="javascript:;">000</a></li>
            <li><a href="javascript:;">369</a></li>
    </ul>
</li>
<li>
      <h3>writing</h3>
      <ul>
            <li><a href="javascript:;">132</a></li>
            <li><a href="javascript:;">000</a></li>
            <li><a href="javascript:;">369</a></li>
    </ul>
</li>
<li>
      <h3>sound</h3>
      <ul>
            <li><a href="javascript:;">852852852852852852852</a></li>
            <li><a href="javascript:;">456</a></li>
            <li><a href="javascript:;">987</a></li>
            <li><a href="javascript:;">852</a></li>
            <li><a href="javascript:;">456</a></li>
            <li><a href="javascript:;">987</a></li>
            <li><a href="javascript:;">852</a></li>
            <li><a href="javascript:;">456</a></li>
            <li><a href="javascript:;">987</a></li>
            <li><a href="javascript:;">852</a></li>
            <li><a href="javascript:;">456</a></li>
            <li><a href="javascript:;">987</a></li>
            <li><a href="javascript:;">456</a></li>
            <li><a href="javascript:;">987</a></li>
            <li><a href="javascript:;">456</a></li>
            <li><a href="javascript:;">000</a></li>
    </ul>
</li>
</ul>`;

if (os.isAndroid || os.isPhone) {
    console.log("%c Welcome to my blog","color:green");
} else {
    window.location.replace('../index.html');
}

let act_music=null,
audio = document.createElement('audio');
window.onload = function(){
   $('.music').click(function(){
       if(audio.paused){
        audio.src='../img/qing.mp3';
        audio.play();
        start();
       }else{
        audio.pause();
        end();
       }
   })
    $('.choice').click(function (e) {
    e.stopPropagation(); //阻止事件冒泡
    $('.left_nav').toggle(500);
        })
    $(document).click(function () {
    $('.left_nav').hide(500);   
        })
        $('.myhost').click(function(){
            window.location.replace('../phone/PhoneIndex.html');
        })
}
//飘雪
function snowFlow(left,height,src){
    let container=document.createElement('div');
    let pic=document.createElement('img');
    let snowFlow=document.querySelector('.app');
    pic.className='pic';
    container.className='container';	
    snowFlow.appendChild(container);
    container.appendChild(pic);
    container.style.left=left+'px';
    container.style.height=height+'px';
    pic.src=src;
    setTimeout(function(){
        snowFlow.removeChild(container);
    },5000);
}
function music_back(){
    let left=Math.random()*window.innerWidth;
    let height=Math.random()*window.innerHeight;
    let src = '../snow.png';
    snowFlow(left,height,src);
}
function start(){
    if(act_music!=null){
        clearInterval(act_music);
        act_music=null
    }
    act_music=setInterval(music_back,500);
}
function end(){
    clearInterval(act_music);
    act_music=null;
}
