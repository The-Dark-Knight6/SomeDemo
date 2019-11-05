let phone_top=` <div class="nav_content">
<img src="./img/menu.png" alt="" class="choice">
<img src="./img/ico2.ico" alt="">
<img src="./img/mus.svg" alt="">
</div>`;

if (os.isAndroid || os.isPhone) {
    console.log('phone')
} else {
    window.location.replace('./index.html');
    console.log('computer');
}