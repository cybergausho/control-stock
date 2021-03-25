<?php 

session_start();
/* DATABASE CONFIGURATION */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'taro');
define('DB_PASSWORD', '0ndavag4');
define('DB_DATABASE', 'stock');
define("BASE_URL", "http://localhost/stock/"); 

function getDB(){
$dbhost=DB_SERVER;
$dbuser=DB_USERNAME;
$dbpass=DB_PASSWORD;
$dbname=DB_DATABASE;

try {
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->exec("set names utf8");
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
catch (PDOException $e) {
echo 'Error de conexion : ' . $e->getMessage();
}

}

?>