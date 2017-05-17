<?php

define('DB_HOST', db);
define('DB_NAME', 'cakephp');
define('DB_USER', 'cakephp');
define('DB_PASSWORD', 'secret');

// 文字化け対策
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

// PHPのエラーを表示するように設定
error_reporting(E_ALL & ~E_NOTICE);

// データベースの接続
try {
      	$dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, $options);
      	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->query('create table IF NOT EXISTS hoge(id INT(11) NOT NULL auto_increment PRIMARY KEY, text varchar(256))');
	$dbh->query('insert into hoge (text)values (\'test\')');
	$stmt = $dbh->prepare('select * from hoge limit 1'); 
	$stmt->execute(array());
	$result = $stmt->fetch();
	var_dump($result);
} catch (PDOException $e) {
	echo $e->getMessage();
        exit;
}

