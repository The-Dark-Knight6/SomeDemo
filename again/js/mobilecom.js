let phone_top=` <div class="nav_content">
<img src="./img/menu.png" alt="" class="choice">
<img src="./img/ico2.ico" alt="">
<img src="./img/mus.svg" alt="" class="music">
</div>`;

let nav_list=` <ul>
<li>
      <h3>index</h3>
      <ul>
            <li>
                  <a href="./PhoneIndex.html">index-page</a>
            </li>
            <li>
                  <a href="./havafun.html">transition</a>
            </li>
      </ul>
</li>
<li>
      <h3>coding</h3>
</li>
<li>
      <h3>writing</h3>
</li>
</ul>`;

if (os.isAndroid || os.isPhone) {
    console.log('phone')
} else {
    window.location.replace('./index.html');
    console.log('computer');
}

window.onload = function(){
   let audio = document.createElement('audio');
   audio.src='./img/qing.mp3';
   $('.music').click(function(){
       if(audio.paused){
        audio.play();
       }else{
        audio.pause();
       }
   })
    $('.choice').click(function (e) {
    e.stopPropagation(); //阻止事件冒泡
    $('.left_nav').toggle(500);
        })
    $(document).click(function () {
    $('.left_nav').hide(500);   
        })
}

