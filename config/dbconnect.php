<?php
function connectdb()
{
    
    $host="localhost";
    $database="bookstore";
    $db_user="root";
    $db_password="";
    $dsn="mysql:host=$host;dbname=$database;charset=utf8";

    try{
        $conn= new PDO($dsn,$db_user,$db_password); #Connection for Mysql
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #PDO::ERRMODE_EXCEPTION Throws a PDOException if an error occurs
        echo "Connected";
    }
    catch(PDOException $e ) {
            echo "Connection Failed". $e->getMessage(); #$e->getMessage() gives the error message ( useful for debugging in development purpose)
    }
}
// $query = "INSERT INTO registered_users(Name, Email, Password) VALUES ('Maniraj','manirajg9@gmail.com','test2212')";
// $query_success=$pdo->query($query);
#Inserting the data to the registerd users table
connectdb();
?>
