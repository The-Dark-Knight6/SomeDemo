var express = require('express');
var mysql = require('mysql');
var router = express.Router();
var connection  = mysql.createConnection(global.sql)

router.post('/', function(req, res) {
  let date = new Date()
  let timeStamp = date.getTime()/1000
  let sqlData = new Object() ;
  let title = req.body.params.title;
  let article = req.body.params.article;
  let a_type = req.body.params.type;
  console.log(req.body)
    connection.query(`INSERT INTO articles (titles,contents,times,types) VALUES ('${title}','${article}','${timeStamp}','${a_type}')`, function (error, results) {
      if (error) throw error;
        console.log(results);
         sqlData.data = results
        sqlData.status=1;
        sqlData.info = 'success';
        res.send(sqlData);
    });
});

module.exports = router;
