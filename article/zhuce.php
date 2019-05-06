
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册</title>
        <script>
		//对注册表单的一些正则限制
          function id(str){
              var arg = /^[\u4E00-\u9FA5A-Za-z0-9_]{4,8}$/;
              return arg.test(str);
          }
          function iphone(str){
              var arg = /^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
              return arg.test(str);
          }
          function mail(str){
              var arg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
              return arg.test(str);
          }
          function password(str){
              var arg = /^[A-Za-z0-9]{8,16}$/;
              return arg.test(str);
          }
          function surepass(){
              var pw1= document.getElementById("pw").value;
              var pw2= document.getElementById("pw1").value;
              return pw1==pw2;
          }   
		  //所返回的函数
          function yanzheng(){
              if(!id(document.getElementById("txt1").value)){
                  alert("用户名由4-8个中文，英文，数字，下划线组成!");
                  document.getElementById("txt1").focus();
                  return false;
              }
              if(!iphone(document.getElementById("iphone").value)){
                  alert("请正确输入手机号码!");
                  document.getElementById("iphone").focus();
                  return false;
              }
              if(!mail(document.getElementById("mail").value)){
                  alert("请正确输入邮箱地址!");
                  document.getElementById("mail").focus();
                  return false;
              }
              if(!password(document.getElementById("pw").value)){
                  alert("请正确输入密码!");
                  document.getElementById("pw").focus();
                  return false;
              }
              if(!surepass()){
                alert("两次密码不相符!");
                document.getElementById("pw1").focus();
                return false;
              }
          }
        </script>
		<style>
            .error{
                color:red;
            }
			body{
				background: url(457.png);
			}
			div.main{
				border: 1px solid #6AB000;
				margin: 0 auto;
				width: 500px;
				height: 600px;
				/*display: block;*/
				margin-top: 30px;
				/*box-shadow: 5px 5px 5px #6AB000;*/
				/*将颜色写在最前面,并将行阴影和列阴影设置为0px,且模糊度为数值,得到四周阴影*/
				box-shadow: #6AB000 0px 0px 20px;
			}
			h1{
				font-weight: bold;
				font-family: "楷体";
				margin-top: 60px;
				text-shadow: 1px 1px green;
				text-align: center;
				letter-spacing: 2px;
				color: coral;
			}
			table{
				margin: 0 auto;
			}
			.pw,.txt{
				width: 230px;
				height: 30px;
				outline: none;
			}
			.pw:focus,.txt:focus{
				border-color: coral;
			}
			.sub{
				background: coral;
				color: white;
				font-weight: bold;
				height: 35px;
				/* 设置边角的圆润程度 */
				border-radius: 50px;
				border: 0px;
				width:120px;
			}
			.sub:hover{
				cursor: pointer;
				animation: mystyle 2s;
				/*动画完成后偶保持最后一个属性值*/
				animation-fill-mode:forwards;
				/*动画播放的次数*/
				animation-iteration-count:1;
			}
			@keyframes mystyle{
				from{background: coral;}
				to{background-color: #6AB000;}
			}
			tr td a{
				float:right;
				text-decoration:none;
				color:red;
			}
			tr td a:hover{
				color:#6AB000;
				text-decoration:underline;
			}
		</style>
	</head>
	<body>
		<div class="main">
			<h1>注    册</h1>
			<form action="zhu.php" method="post" onsubmit="return yanzheng()">
				<table border="0" cellspacing="0" cellpadding="15">
					<tr>
						<td>
							<input type="text" name="id" id="txt1" class="txt" placeholder="  用户名:4-8个中英文,数字,下划线" autocomplete="off"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="iphone" id="iphone" class="pw" placeholder="  手机号码" autocomplete="off"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="mail" id="mail" class="pw" placeholder="  邮箱" autocomplete="off"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" id="pw" class="pw" placeholder="  密码:8-16位英文/数字的组合!"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="surepassword" id="pw1" class="pw" placeholder="  确认密码"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="注   册" class="sub" />
							<input type="reset" value="重   置" class="sub" />
						</td>
					</tr>
					<tr>
						<td>
							<a href="javascript:void(0)" onclick="hui()">返&nbsp;&nbsp;回</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
<script>
//返回函数的设置
function hui(){
	window.location.href="first.php";
}
    //防止页面后退(本系统仅在首页和登录，注册页面使用)
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>
