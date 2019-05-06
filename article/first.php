<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登录界面</title>
		<!-- jquery-validation验证表单 -->
		<!--<script src="jquery-3.3.1.min.js"></script>
		<script src="jquery.validate.min.js"></script>
		<script src="messages_zh.js"></script>-->
		<!--<script>
			$().ready(function(){
				$('#deng').validate({
					rules:{
						id:{
							required:true,
							rangelength:[2,10]
						},
						name:{
							required:true,
							rangelength:[2,10]
						}
					},
					messages:{
						id:{
							required:"请输入用户名",
							rangelength:"2-10个字符"
						},
						name:{
							required:"请输入用户名",
							rangelength:"2-10个字符"
						}
					}
				})
			})
		</script>-->
		
		<style>
			.error{
				color: red;
			}
			body{
				background-image: url(222.png);
			}
			div.main{
				border: 1px solid green;
				margin: 0 auto;
				width: 500px;
				height: 400px;
				display: block;
				margin-top: 100px;
				box-shadow: 7px 7px 5px green;
			}
			h1{
				font-weight: bold;
				font-family: "微软雅黑";
				margin-top: 50px;
				text-shadow: 1px 1px green;
				text-align: center;
				letter-spacing: 6px;
				color: green;
			}
			table{
				margin: 0 auto;
			}
			.sub,.pw,.txt{
				width: 230px;
				height: 30px;
				outline: none;
			}
			.pw:focus,.txt:focus{
				border-color: green;
			}
			.sub{
				background: green;
				color: white;
				font-weight: bold;
				height: 35px;
				border-radius: 50px;
				border: 0px;
			}
			.sub:hover{
				animation: mystyle 2s;
				/*动画完成后偶保持最后一个属性值*/
				animation-fill-mode:forwards;
				/*动画播放的次数*/
				animation-iteration-count:1;
				cursor:pointer;
			}
			a.hre{
				text-decoration: none;
				color: red;
				margin-left: 250px;
			}
			a.hre:hover{
				color:#6AB000;
				cursor: pointer;
				text-decoration:underline;
			}
			@keyframes mystyle{
				from{background: green;}
				to{background-color: #6AB000;}
			}
			div.other{
				font-size:15px;
				text-align:center;
				text-shadow: 1px 1px green;
				color:green;	
				letter-spacing:3px;
				margin:5px;
			}
		</style>
		
		<script>
			//正则表达式验证表单
			function isid(str){
				var cha = /^[\u4E00-\u9FA5A-Za-z0-9_]{4,8}$/;
				return cha.test(str);
			}
			function ispassword(str){
				var cha = /^[A-Za-z0-9]{8,16}$/ ;
				return cha.test(str);
			}
			//将正则表达式验证提交给tijiao（）函数，用onsubmit调用
			function tijiao(){
				if(!isid(document.getElementById("txt1").value)){
					alert("用户名由4-8个中文，英文，数字，下划线组成!");
					document.getElementById("txt1").focus();
					return false;
				}
				
				if(!ispassword(document.getElementById("pw").value)){
					alert("密码为8-16位英文和数字的组合!");
					document.getElementById("pw").focus();
					return false;
				}
			}
</script>
	</head>
	<body>
		<div class="main">
			<h1>欢迎登录</h1>
			<div class="other">文章发布系统</div>
			<form action="deng.php" method="post" id="deng" onsubmit=" return tijiao()">
				<table border="0" cellspacing="0" cellpadding="15">
					<tr>
						<td>
							<input type="text" name="id" id="txt1" class="txt" placeholder="  用户名" autocomplete="off"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="name" id="pw" class="pw" placeholder="  密码"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="登   录" class="sub" />
						</td>
					</tr>
				</table>
			</form>
			<a href="zhuce.php" class="hre">没有帐号？注册</a>
		</div>

	</body>
</html>
<script language="javascript">
        //防止页面后退(本系统仅在首页和登录，注册页面使用)
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>