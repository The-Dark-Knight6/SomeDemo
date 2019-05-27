var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var bodyParser = require('body-parser')

global.sql = {
	host     : '129.204.61.122',
  	user     : 'root',
  	password : '123456',
  	database : 'hosts'
}

//·引入路由
var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users'); //‘关于’界面 渲染评论
var addtext = require('./routes/addtext'); //添加文章
var reply = require('./routes/reply'); //‘关于’界面 增加评论
var real = require('./routes/real') // 发布文章的密钥
var findtext = require('./routes/findtext') //渲染文章
var poems = require('./routes/poems') //添加词句
var findpoems = require('./routes/findpoems') //渲染 词句
var detail = require('./routes/detail') //文章 详细 
var totext = require('./routes/totext') // 增加 文章详细界面的 评论 
var fintcom = require('./routes/fintcom') // 渲染 文章详细界面的 评论 

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser.text());
//设置文件上传的大小 最大上传大小不超过50mb
app.use(bodyParser.json({limit: '50mb'}));    
app.use(bodyParser.urlencoded({ 
    limit: '50mb',
    extended:true
}));
//使用路由
app.use('/', indexRouter);
app.use('/users', usersRouter);
app.use('/addtext', addtext);
app.use('/reply', reply);
app.use('/real',real);
app.use('/findtext',findtext);
app.use('/poems',poems);
app.use('/findpoems',findpoems)
app.use('/detail',detail)
app.use('/totext',totext)
app.use('/fintcom',fintcom)

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});
// 后台跨域
app.all('*', function(req, res, next) {
// res.header("Access-Control-Allow-Credentials","true");
// res.setHeader("Access-Control-Allow-Origin", "http://localhost:4200");//���� res.header("Access-Control-Allow-Origin", "http://127.0.0.1:3333"); ��ֻ���� 127.0.0.1:3333������
res.setHeader("Access-Control-Allow-Origin", "*");
res.setHeader("Access-Control-Allow-Headers", "Content-Type,Content-Length, Authorization, Accept,X-Requested-With");
res.setHeader("Access-Control-Allow-Methods","PUT,POST,GET,DELETE,OPTIONS");
res.setHeader("X-Powered-By",' 3.2.1');
if(req.method=="OPTIONS") res.send(200);/*��options������ٷ���*/
else next();
});
// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
