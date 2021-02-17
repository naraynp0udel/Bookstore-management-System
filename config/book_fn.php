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
    if(isset($_POST['Add_Book']))
{
    $Book_name=strip_tags(trim($_POST['Book_name']," "));
    $Author_name=strip_tags(trim($_POST['Author_name'],""));
    $Publication=strip_tags(trim($_POST['Publication'],""));
    $Edition=strip_tags(trim($_POST['Edition'],""));
    $ISBN=strip_tags(trim($_POST["ISBN"]," "));
    $Stock=strip_tags(trim($_POST["Stock"]," "));

    $dir="../upload/";
    $image=$_FILES['uploadfile']['name'];
    $temp_name=$_FILES['uploadfile']['tmp_name'];
 
    if($image!="")
    {
        if(file_exists($dir.$image))
        {
            $image= time().'_'.$image;
        }
 
        $fdir= $dir.$image;
        move_uploaded_file($temp_name, $fdir);
    }
  
        $query = "INSERT INTO books(`Book Name`,`Author Name`,`Edition`,`Publication`,`ISBN Number`,`Stock`,`image`) VALUES (?,?,?,?,?,?,?)";
    
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$Book_name);
        $stmt->bindparam(2,$Author_name);
        $stmt->bindparam(3,$Edition);
        $stmt->bindparam(4,$Publication);
        $stmt->bindparam(5,$ISBN);
        $stmt->bindparam(6,$Stock);
        $stmt->bindparam(7,$image);
        $stmt->execute();

        
}
    
}
function show_list_of_books()
{
    $con=connectdb();
    if(isset($_POST['List_Book']))
    {
    $Book_name=strip_tags(trim($_POST['Book_name']," "));
    $Author_name=strip_tags(trim($_POST['Author_name'],""));
    $Publication=strip_tags(trim($_POST['Publication'],""));
    $Edition=strip_tags(trim($_POST['Edition'],""));
    $ISBN=strip_tags(trim($_POST["ISBN"]," "));
    
    if($Book_name&$Author_name)#$Book_name&$Author_name&$Publication&$Edition&$ISBN
    {
        $query="select `Book Name` from books where ?=? or ?=?";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$Book_name);
        $stmt->bindparam(2,$Book_name);
        $stmt->bindparam(3,$Author_name);
        $stmt->bindparam(4,$Author_name);
        $stmt->execute();
        $results=$stmt->fetchAll();
        foreach ($results as $result)
        {
        print($result[0]);
        }
    }
    elseif ($ISBN)
    {
        $param="ISBN";
        $query="select * from books where ?=? ";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$param);
        $stmt->bindparam(2,$ISBN);
        $stmt->execute();
        $results=$stmt->fetchAll();
        foreach ($results as $result)
        {
        print($result[2]);
        }
    }
}
}

function update_book()
{
$con=connectdb();


}
?>