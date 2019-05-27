var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  console.log('the host request...')
  res.send('hello,get')
});

module.exports = router;
