<?php
$hostname='localhost';
$username='Wojtek';
$password='';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=test",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
    echo 'Connected to Database<br/>';

    $sql = "SELECT * FROM articles";
	foreach ($dbh->query($sql) as $row)
    {
    echo $row["title"] ." - ". $row["url"] ."<br/>";
    }


    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?> 