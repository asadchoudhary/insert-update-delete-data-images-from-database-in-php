<?php
include('database.php');
$msg= null;
if(isset($_POST['save'])){
        if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['phone_number'])&&!empty($_POST['email']) && !empty($_POST['adress'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $adress = $_POST['adress'];
            
           
                $image="";
                $server_folder="images/";
                $Server_path=$server_folder.basename($_FILES['photo']['name']);
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $Server_path)) {
                    $image=$_FILES['photo']['name'];
                }
                $query="INSERT INTO  employees VALUES ('','$first_name','$last_name','$phone_number ','$email','$adress','$image')";
                $results=mysqli_query($conn,$query);
                    if($results){
                        $msg="User Registration Successfull";
                    }
            
                
            
        }else{$msg = "Fill all input fields";}  
}
if(isset($msg))
{
    echo("<script>alert('".$msg."');window.location.replace('insert.php');</script>");
}
?>






<!-- ?php
include_once 'database.php';
$sucess = "";

if(isset($_POST['save']))
{  
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $phone_number  = $_POST['phone_number'];
    $email      = $_POST['email'];
    $adress      = $_POST['adress'];
     
    $sql        = "INSERT INTO employees (first_name,last_name,phone_number,email,adress)
    VALUES ('$first_name','$last_name','$phone_number','$email','$adress')";

    if (mysqli_query($conn, $sql))
    {
        $sucess = "Insert has been successfully.!"; 
    }
    else
    {
 echo "Error: " . $sql . "
    " . mysqli_error($conn);
 }
 mysqli_close($conn);
}
?>

 -->