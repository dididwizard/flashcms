<?php
include "../../setting.php";

/*function dbType(){
if(define("DB_TYPE", "") == 1){
	return "mysql";
}else if(define("DB_TYPE", "") == 2){
	return "mongodb";
}else if(define("DB_TYPE", "") == 3){
	return "postgre";
}else{
	return "mysql";
}}
*/
/*class DBConnect{
	var $query;
	var $fetchResult;
	
	function query($query){
		$this->query = $query;
	}
	function fetchRow($colume){
			$DBC = new PDO(dbType().":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
			$DBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $DBC->query($this->query);
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$this->fetchResult = $row[$colume];
				echo $this->fetchResult;
			}
			
	}
}
	
$dbc = new DBConnect();
$dbc->query("SELECT * from test");
echo $dbc->fetchRow("test");*/
	
function dbConnect(){
	return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}
	
