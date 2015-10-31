<?php

class db {
	
	public static $db = NULL;
	public static $dbObject = NULL;
		
	private function __construct() {
	}
	
	private function __clone() {
	}


	public static function getDB() {

		$hostname='localhost';
		$username='root';
		$password='';

		try {
		    self::$db = new PDO("mysql:host=$hostname;dbname=events",$username,$password);
		    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
		    // echo 'Connected to Database<br/>';
		    $dbObject = self::$db;


		}
		catch(PDOException $e){
		    echo $e->getMessage();
		}

		return $dbObject;
	}


	public function addRecord($place, $date, $title, $author, $details) {
		echo "Inside";
		$sql = 'INSERT INTO event(place, date, title, author, details) VALUES(\' ' . $place . ' \',\' ' . $date . '\', \' ' . $title . '\', \' ' . $author . '\', \' ' . $details . '\');';
		self::$db->query($sql);
		echo "After";
	}

	public function updateRecord($id, $place, $date, $title, $author, $details) {
		$sql = 'UPDATE event SET place = \'' . $place . '\', title = \' ' . $title . '\', author = \'' . $author . '\', details = \' ' . $details . '\', date = \' ' . $date . '\' WHERE id = ' . $id . ';';
		self::$db->query($sql);
	}
	public function deleteRecord($id) {
		$sql = 'DELETE FROM event WHERE id = ' . $id . ';';
		self::$db->query($sql);
	}

	public function getDataFromDB() {
		$sql = 'SELECT * FROM event';
		$result = self::$db->query($sql)->fetchColumn();
		echo $result;


	}
}



?>