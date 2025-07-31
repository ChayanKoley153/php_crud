<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   <div class="container">
<div class="card">
    <div class="card-header">
     <h4>User details of <?php echo $_GET['id']; ?></h4>
    </div>

    <?php
    //   if(isset($_GET['id'])){
    //     echo "User id is : ". $_GET['id'];
    //  }
    const HOST="localhost";
    const USERNAME="root";
    const PASSWORD="";
    const DATABASE="crud";
    $con=new MYSQLi(HOST,USERNAME,PASSWORD,DATABASE);
    $sql="select * from users where id=".$_GET['id'];
    $row=$con->query($sql);
    if($con->connect_error){
        die($con->connect_error);
    }
    else{
         while($rows=$row->fetch_assoc()){?>
            
      <div class="card-body">
        <form action="edit.php" method='POST' enctype="multipart/form-data">
        <div class="form-group">
        
        <p><span style='color:crimson;font-size:20px'>Details of</span> : <span style='color:Blue'><?php echo $rows['name']; ?></span></p>
        <div class="row">
            <div class="col">

      
        <p>UserId: <?php echo $rows['id']; ?></p>
              </div>
        </div>
     <div class="row">
        <div class="col">

       <label for="">Name</label>
      <input type="text" value='<?php echo $rows['name']; ?>' name='editName' class='form-control'>  
           </div>
     </div>
     <div class="row">
        <div class="col">
            <label for="">Phone</label>
           <input type="number" value='<?php echo $rows['phone']; ?>' name='editPhone' class='form-control'>
        </div>
     </div>
       <div class="row">
        <div class="col">
            <label for="">Email</label>
       <input type="text" id="" value='<?php echo $rows['email'];  ?>' name='editEmail' class='form-control'>
        </div>
       </div>
      
        <p>Profile Picture <img src="<?php echo $rows['profile_pic']; ?>" height='250px' title="<?php echo $rows['name'] ?>'image" alt="user_image">
    
       <input type="file" name="editAvatar" id="" class='form-control'>
    </p>

        <p>
            <a href="delete.php?id=<?php echo $rows['id']; ?>" class='btn btn-danger'>Delete</a>
            <button class='btn btn-success' type='submit'>Update</button>
          
    </p>
    </div>
      <input type="hidden" name="old_user_id" value="<?php echo $rows['id']; ?>">
    <input type="hidden" name="old_profile_pic" value="<?php echo $rows['profile_pic']; ?>">
      </div>

     <?php
         }
    }
    
   
    ?>
    </div>
    </form>
    </div>
</body>
</html>