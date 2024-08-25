<?php
////////////////////////// PDO  ///////////////////////////////////////

    $db_host='localhost';
    $db_user='root';
    $db_pass='';
    $db_name='shahedwebsite_db';
    $password='';

     try {
        $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
         $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_conn->exec("set names utf8");
       
    } catch(PDOException $ex) {
        die("Failed to connect to the database: " . $ex->getMessage());
        
    }
////////////////////////// OPJECT   ///////////////////////////////////////

	$db = new mysqli("localhost", "root", "");
	mysqli_set_charset($db, 'utf8');
	mysqli_select_db($db,"shahedwebsite_db");

///////////////////////////// FUNCTION ////////////////////////////////////
	$conn = mysqli_connect('localhost', 'root','', 'shahedwebsite_db');
    $conn->set_charset("utf8");
//
?>