<?php  
   session_start();
    print"<pre>";
    // // print_r($_POST);
    //  print_r($_FILES);
    $imagepath;
    $id=$_POST['old_user_id'];
    $name=$_POST['editName'];
    $phone=$_POST['editPhone'];
    $email=$_POST['editEmail'];
    $image=$_POST['old_profile_pic'];
    if($_FILES['editAvatar']['error']!=0){
            //echo "User not changed the picture then old will stay in db";
            $imagepath=$image;
        }
        else{
            //echo "User has changed the picture the new picture will be at instade to old picture";
            $filename=time()."-".$_FILES['editAvatar']['name'];
            $destination="./uploads/".$filename;
            $imagepath=$destination;
            move_uploaded_file($_FILES['editAvatar']['tmp_name'],$imagepath);
        }


    include('./crendentials.php');
    $con=new MYSQLi(HOST,USERNAME,PASSWORD,DATABASE);
    if($con->connect_error)die($con->connect_error);
    else{
        $sql="update users set name='$name',phone='$phone',email='$email',profile_pic='$imagepath' where id=$id";
        $row=$con->query($sql);
        $rows=$row->affected_rows;
        if($rows=1){
            $_SESSION['msg']="Update success";
            header("location:index.php");
        }
        else{
            $_SESSION['msg']="Update error";
            header("location:index.php");
        }

    }
?>