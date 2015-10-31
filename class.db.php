<?php
  define('SEPARATOR', DIRECTORY_SEPARATOR);    
  define('ROOT', dirname(__FILE__));
	class db {
		private static $db = NULL;
		public static $dbObject = NULL;
		
		private function __construct() {
		}
		
		private function __clone() {
		}
	
		
		public static function getDB() {
			$file = ROOT . SEPARATOR . 'db' . SEPARATOR . 'db.sqlite';
			$ifExist = file_exists($file);
		
		
			if(!self::$db) {
				self::$db = new PDO('sqlite:' . $file);
				self::$dbObject = new db();
			}
		
			if(!$ifExist) {
				self::$db->query('CREATE TABLE bookmark (  
    					id int(10)  NOT NULL,  
    					title varchar(255) NOT NULL);'
				);
       
		
			}
			return self::$dbObject;
		}
		
// 		public function addFilm($name, $year, $country, $details) {
// 			self::$db->query('INSERT INTO films(name, year, country, details) VALUES(
// 					\'' . $name . '\' , ' . $year . ', \'' . $country . '\', \'' . $details . '\');'
// 					);
					
// 		}
		
		public function addFilm($name, $genre, $year, $country, $details) {
			self::$db->query('INSERT INTO films(name, genre, year, country, details) VALUES(
					\'' . $name . '\', \'' . $genre . '\', ' . $year . ', \'' . $country . '\', \'' . $details . '\');'
			);
				
		}
		
		public function deleteFilm($id) {
			self::$db->query('DELETE FROM films WHERE id=' . $id . ';');
		}
		
		public function updateFilm($id, $name, $genre, $year, $country, $details) {
			
			self::$db->query('UPDATE films SET
						name = \' ' . $name . '\',
						genre = \' ' . $genre . '\',
						country = \' ' . $country . '\',
						details = \' ' . $details . '\',
						year =  ' . $year . '
						
					WHERE id = ' . $id);
			
		}
		
		
		public function getData($id = NULL) {
			if (!$id){
				$result = self::$db->query('SELECT * FROM films;')->fetchAll();
				
			} else {
				$result = self::$db->query('SELECT * FROM films WHERE id=' . $id . ';')->fetchAll();
				
			}	
			
			return $result;
			
			
		}
		
		
	}