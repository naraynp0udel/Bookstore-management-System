<?php
$host="localhost";
$database="bookstore";
$dbusername="root";
$dbpassword="";
$dsn="mysql:host=$host;dbname=$database;charset=utf8";
$pdo= new PDO($dsn,$dbusername,$dbpassword); #Connection for Mysql

$query = "INSERT INTO registered_users(Name, Email, Password) VALUES ('Maniraj','manirajg9@gmail.com','test2212')";
$query_success=$pdo->query($query);
#Inserting the data to the registerd users table

?>
