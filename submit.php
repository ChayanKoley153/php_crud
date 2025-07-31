<?php
session_start();
//  print"<pre>";
// Check the password and confirm password matching
function mismatchpass($pw1, $pw2)
{
    if ($pw1 == $pw2) {
        return true;
    } else {
        return false;
    }
}

function passwordconvert($pw1)
{
    $hash = password_hash($pw1, PASSWORD_BCRYPT);
    return $hash;
}
//  passwordconvert("12345")
//mismatchpass("12345","12345");
// print_r($_POST);
$name = $_POST['nm'];
$phone = $_POST['ph'];
$email = $_POST['em'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
// print_r($_FILES);
// die();
$filename = time() . "-" . $_FILES['avatar']['name'];
$destination = './uploads/' . $filename;

include("./crendentials.php");
$con = new MYSQLi(HOST, USERNAME, PASSWORD, DATABASE);

if ($con->connect_error) {
    die($con->connect_error);
} else {
    if (mismatchpass($pass1, $pass2)) {
        $hash1 = password_hash($pass1, PASSWORD_BCRYPT);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
        $sql = "insert into users (name,phone,email,profile_pic,password)values('$name','$phone','$email','$destination','$hash1')";
        $row = $con->query($sql);
        $rows = $row->affected_rows;
        if ($rows = 1) {
            // echo "Not added";
            $_SESSION['msg'] = "added";
            header("location:index.php");
        } else {
            // echo "Added";
            $_SESSION['msg'] = "notAdded";
            header("location:index.php");
        }
    } else {
        $_SESSION['msg'] = "password_error";
        header("location:signup.php");
    }
}
