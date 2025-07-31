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
        <?php  
        if(isset($_SESSION['msg'])){
            if($_SESSION['msg']=="success"){?>
                <div class='alert alert-success'>One user deleted successfully.</div>
        <?php
            }
            elseif($_SESSION['msg']=="error"){?>
                <div class='alert alert-danger'>Failed to delete.</div>
         <?php
            }
               elseif($_SESSION['msg']=="Update success"){?>
                <div class='alert alert-success'>One user's data updated.</div>
         <?php
            }
               elseif($_SESSION['msg']=="Update error"){?>
                <div class='alert alert-danger'>Faild to update data.</div>
         <?php
            }
             elseif(isset($_SESSION['msg'])){
            if($_SESSION['msg']=="added"){?>
     <div class='alert alert-success'>One user data added successfully</div>
            <?php
            }
            elseif($_SESSION['msg']=="notAdded"){?>
     <div class='alert alert-danger'>Failed to add user data,please try again....</div>
          <?php
            }
             else{?>
               <div class='alert alert-warning'>Something went wrong.</div>    
          <?php
            }
            
        }
        unset($_SESSION['msg']);
      
          
        }
        
        
        ?>
    <table class='table table-bordered table-hover'>
    <th>Id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Profile Picture</th>
    <th>#</th>
  
    <?php
    // Create database credentials for connecting the database
    const HOST="localhost";
    const USERNAME="root";
    const PASSWORD="";
    const DATABASE="crud";
    // Use that variable for create the Mysql database connection 
    $con=new MYSQLi(HOST,USERNAME,PASSWORD,DATABASE);
    $sql="select * from users";
    $row=$con->query($sql);

    if($con->connect_error){
        die($con->connect_error);
    }
    else{
        // echo "Connected with database";
        while($rows=$row->fetch_assoc()){?>
        <tr>
            <td><?php echo $rows['id']; ?></td>
            <td><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['phone']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><img src="<?php echo $rows['profile_pic']; ?>" alt="" height="50px"></td>
            <td><a href="show.php?id=<?php echo $rows['id']; ?>" class='btn btn-primary'>Show</a></td>
        </tr>

     <?php
        }
    }
    
    
    
    ?>
      </table>
      </div>
    
</body>
</html>