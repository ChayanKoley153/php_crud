<?php
session_start();
require('./crendentials.php');
$con=new MYSQLi(HOST,USERNAME,PASSWORD,DATABASE);
$sql="delete from users where id=".$_GET['id'];
$row=$con->query($sql);
if($con->connect_error){
    die($con->connect_error);
}

    // echo "Connected";
    $rows=$row->affected_rows;
    if($rows=1){
        echo "success";
        $_SESSION['msg']="success";
        header("location:index.php");
          
    }
    else{
        
        $_SESSION['msg']="error";
        header("location:index.php");
    }


?>