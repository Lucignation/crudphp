<?php

    include("connection.php");

    $id = $_GET['id'];

    $query = "SELECT * FROM table1 WHERE id='$id'";

    $res = mysqli_query($connect, $query);

    $row = mysqli_fetch_array($res);

    $f = $row['first_name'];
    $s = $row['surname'];
    $e = $row['email'];

    if(isset($_POST['edit_user'])){
        $fname = $_POST['first_name'];
        $sname = $_POST['surname'];
        $em = $_POST['email'];
    

        $query = "UPDATE table1 SET first_name='$fname', surname='$sname', email='$em' WHERE id ='$id'";

        $res = mysqli_query($connect, $query);

        if($res){
            echo "<script>alert('You have successfully added a new user')</script>";
            header("Location:index.php");
        }else{
            echo "<script>alert('Failed to add a new user')</script>";
        }
    }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!--- bootstrap cdn --->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

</head>
<body>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 jumbotron my-5">
                    <h4 class="text-center my-2">Edit User</h4>

                    <form method="post">

                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $f ?>" autocomplete="off" required />

                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control" value="<?php echo $s  ?>" autocomplete="off" required />

                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $e ?>" autocomplete="off" required />

                        <input type="submit" name="edit_user" class="btn btn-success my-2" value="Update User" />

                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    
</body> 
</html>