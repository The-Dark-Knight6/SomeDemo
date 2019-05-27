var express = require('express');
var mysql = require('mysql');
var router = express.Router();
var connection  = mysql.createConnection(global.sql)

/* GET users listing. */
router.post('/', function(req, res) {
  let date = new Date()
  let timeStamp = date.getTime()/1000
  let sqlData = new Object() ;
  let name = req.body.params.name;
  let comment = req.body.params.comment;
  // console.log(req.body)
  if(name==''||name==undefined){
    sqlData.status=0;
    sqlData.info = '请输入正常的昵称';
    res.send(sqlData);
  }else if(comment==''||comment==undefined){
    sqlData.status=0;
    sqlData.info = '请输入您的想法';
    res.send(sqlData);
  }else {
    connection.query(`INSERT INTO personw (name,comments,times) VALUES ('${name}','${comment}','${timeStamp}')`, function (error, results) {
      if (error) throw error;
        console.log(results);
         sqlData.data = results
        sqlData.status=1;
        sqlData.info = 'success';
        res.send(sqlData);
    });
  }
});

module.exports = router;
