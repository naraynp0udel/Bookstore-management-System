<?php
include_once 'auth.php';
include_once 'dbconnect.php';

if(isset($_POST['Add_Book']))
{
    verify_token();
    add_book();
}
if(isset($_POST['List_Book']))
{
    verify_token();
    show_list_of_books();
}

function add_book()
{
    $con=connectdb();

    $Book_name=strip_tags(trim($_POST['Book_name']," "));
    $Author_name=strip_tags(trim($_POST['Author_name'],""));
    $Publication=strip_tags(trim($_POST['Publication'],""));
    $Edition=strip_tags(trim($_POST['Edition'],""));
    $ISBN=strip_tags(trim($_POST["ISBN"]," "));
    $Stock=strip_tags(trim($_POST["Stock"]," "));
  
        $query = "INSERT INTO books(`Book Name`,`Author Name`,`Edition`,`Publication`,`ISBN Number`,`Stock`) VALUES (?,?,?,?,?,?)";
    
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$Book_name);
        $stmt->bindparam(2,$Author_name);
        $stmt->bindparam(3,$Edition);
        $stmt->bindparam(4,$Publication);
        $stmt->bindparam(5,$ISBN);
        $stmt->bindparam(6,$Stock);
        $stmt->execute();

        

    
}
function show_list_of_books()
{
    $con=connectdb();
    $Book_name=strip_tags(trim($_POST['Book_name']," "));
    $Author_name=strip_tags(trim($_POST['Author_name'],""));
    $Publication=strip_tags(trim($_POST['Publication'],""));
    $Edition=strip_tags(trim($_POST['Edition'],""));
    $ISBN=strip_tags(trim($_POST["ISBN"]," "));
    
    if(empty($Book_name&$Author_name&$Publication&$Edition&$ISBN))
    {
        $query="select * from books";
        $stmt=$con->prepare($query);
        $result=$stmt->execute();
        
        print_r(var_dump($result));
    }
    elseif ($ISBN)
    {
        $param="ISBN";
        $query="select * from books where ?=? ";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$param);
        $stmt->bindparam(2,$ISBN);
        $result=$stmt->execute();
        print_r(var_dump($result));
    }
}

function update_book()
{
$con=connectdb();


}
?>