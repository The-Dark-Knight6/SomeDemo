var express = require('express');
var mysql = require('mysql');
var router = express.Router();
var connection  = mysql.createConnection(global.sql)

router.post('/', function(req, res) {
  let date = new Date()
  let timeStamp = date.getTime()/1000
  let sqlData = new Object() ;
  let ids = req.body.params.id;
  let name = req.body.params.name;
  let commend = req.body.params.comment;
  console.log(req.body)
    connection.query(`INSERT INTO totext (detail_id,name,commend,times) VALUES ('${ids}','${name}','${commend}','${timeStamp}')`, function (error, results) {
      if (error) throw error;
        console.log(results);
         sqlData.data = results
        sqlData.status=1;
        sqlData.info = 'success';
        res.send(sqlData);
    });
});

module.exports = router;
