var express = require('express');
var mysql = require('mysql');
var router = express.Router();
var connection  = mysql.createConnection(global.sql)

router.post('/', function(req, res) {
  let sqlData = new Object() ;
  let title = req.body.params.title;
  let poem = req.body.params.poem;
  console.log(req.body)
    connection.query(`INSERT INTO poems (titles,words) VALUES ('${title}','${poem}')`, function (error, results) {
      if (error) throw error;
        console.log(results);
         sqlData.data = results
        sqlData.status=1;
        sqlData.info = 'success';
        res.send(sqlData);
    });
});

module.exports = router;
