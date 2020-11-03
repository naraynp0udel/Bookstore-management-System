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
        return $conn;
//         $query = "INSERT INTO registered_users(f_name,m_name,l_name, Email,Phone_Num, Password) VALUES (?,?,?,?,?,?)";
// $f='fsfs';
// $m='fsfsf';
// $l='fsfs';
// $e='fsfsf';
// $p=76;
// $pa='fsf';
// $stmt=$conn->prepare($query);
// $stmt->bindparam(1,$f);
// $stmt->bindparam(2,$m);
// $stmt->bindparam(3,$l);
// $stmt->bindparam(4,$e);
// $stmt->bindparam(5,$p);
// $stmt->bindparam(6,$pa);
// $stmt->execute();
#Inserting the data to the registerd users table
    }

    catch(PDOException $e ) {
            echo "Connection Failed". $e->getMessage(); #$e->getMessage() gives the error message ( useful for debugging in development purpose)
    }
}



?>
