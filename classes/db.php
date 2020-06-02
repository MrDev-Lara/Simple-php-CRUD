<?php
	include "config.php";
	class db{
		private static $PDO;
		public static function connection(){
			if(!isset(self::$PDO)){
				try{
					self::$PDO = new pdo('mysql:host='.DB_HOST.'; dbname='.DB_NAME,DB_USER,DB_PASS);
				}catch(PDOexception $e){
					echo "Connection Failed ...." .$e->getMessage();
			}
			}
			return self::$PDO;
		}
		public static function prepareown($sql){
			return self::connection()->prepare($sql);
		}
	}
?>