var express = require('express');
var router = express.Router();
var mysql = require('mysql');
var connection  = mysql.createConnection(global.sql)

router.get('/', function(req, res, next) {
	let sqlData = new Object();
    // let art_id = req.query.id
    let id = req.query.id;
	  connection.query(`SELECT * FROM articles where id = ${id}`, function (error, results, fields) {
		if (error) throw error;
		  // console.log(results);
		  sqlData.data = results
		  sqlData.status=1;
		  sqlData.info = 'success';
		  res.send(sqlData);
	  });
  });

module.exports = router;
