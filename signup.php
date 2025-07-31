<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="">Name</label>
                        <input type="text" name="nm" id="" class='form-control'>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                         <label for="">Phone</label>
                        <input type="text" name="ph" id="" class='form-control'>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                         <label for="">Email</label>
                        <input type="text" name="em" id="" class='form-control'>
                    </div>
                </div>
            </div>
                <div class="form-group">
                <div class="row">
                    <div class="col">
                         <label for="">Password</label>
                        <input type="password" name="pass1" id="" class='form-control'>
                    </div>
                </div>
            </div>
                <div class="form-group">
                <div class="row">
                    <div class="col">
                         <label for="">Confirm Password</label>
                        <input type="password" name="pass2" id="" class='form-control'>
                    </div>
                </div>
            </div>
                <div class="form-group">
                <div class="row">
                    <div class="col">
                         <label for="">Profile Picture</label>
                        <input type="file" name="avatar" id="" class='form-control'>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <button class='btn btn-success'>Register</button>
                        <button class='btn btn-warning'>Reset</button>
                    </div>
                </div>
            </div>
         
<?php
  if(isset($_SESSION['msg'])){
    if($_SESSION['msg']=="password_error"){?>
    <div class='alert alert-danger'>Password did not match.</div>

   <?php
    }
    unset($_SESSION['msg']);
  }


?>
        </form>
    </div>
    
</body>
</html>