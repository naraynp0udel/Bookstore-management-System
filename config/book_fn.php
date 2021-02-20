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
if(isset($_POST['Delete_Book']))
{
    verify_token();
    delete_book();
}
if(isset($_POST['Update_Book']))
{
    verify_token();
    update_book();
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
        $query="select `Book Name`,`image` from books where `Book Name`=? and `Author Name`=?";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$Book_name);
        $stmt->bindparam(2,$Author_name);
        $stmt->execute();
        $results=$stmt->fetchAll();
        foreach ($results as $result)
        {
            print($result[0]."<br>");
            print($result[1]."<br>");
            print($result[2]."<br>");
        }
    }
    elseif ($ISBN)
    {
       
        $query="select `Book Name`,`Stock`,`image` from books where `ISBN Number`=? ";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$ISBN);
        $stmt->execute();
        $results=$stmt->fetchAll();
        foreach ($results as $result)
        {
        print($result[0]."<br>");
        print($result[1]."<br>");
        print($result[2]."<br>");
        }
    }
}
}

function update_book()
{
    $con=connectdb();
    if(isset($_POST['Update_Book']))
    {
    $Book_name=strip_tags(trim($_POST['Book_name']," "));
    $Author_name=strip_tags(trim($_POST['Author_name'],""));
    // $Publication=strip_tags(trim($_POST['Publication'],""));
    // $Edition=strip_tags(trim($_POST['Edition'],""));
    $ISBN=strip_tags(trim($_POST["ISBN"]," "));
    $Stock=strip_tags(trim($_POST["Stock"]," "));
    $query="Update books SET `Book Name`=? , `Author Name`=? ,`Stock`=? where `ISBN Number`=? ";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$Book_name);
        $stmt->bindparam(2,$Author_name);
        $stmt->bindparam(3,$Stock);
        $stmt->bindparam(4,$ISBN);
        $stmt->execute();

    }
}
function delete_book()
{
    $con=connectdb();  
    if(isset($_POST['Delete_Book']))
    { 
        $Book_name=strip_tags(trim($_POST['Book_name']," "));
        $Author_name=strip_tags(trim($_POST['Author_name'],""));
        $ISBN=strip_tags(trim($_POST["ISBN"]," "));
        $query="Delete from books where `Book Name`=? and `Author Name`=? and `ISBN Number`=? ";
        $stmt=$con->prepare($query);
        $stmt->bindparam(1,$Book_name);
        $stmt->bindparam(2,$Author_name);
        $stmt->bindparam(3,$ISBN);
        $stmt->execute();
    }
}
?>