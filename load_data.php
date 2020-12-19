<?php 

    include("connection.php");

    $query = "SELECT * FROM table1 ORDER BY id ASC";

    $res = mysqli_query($connect, $query);

    $output = "";

    $output .= "
        <table class='table table-bordered table-striped'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        
    ";

    echo "<a href='add_user.php'>
        <button class='btn btn-success my-3'>Add New User</button>
    </a>";

    if(mysqli_num_rows($res) < 1){
        $output .= "
            <tr>
                <td colspan='5' align='center'>NO DATA</td>
            </tr>
        ";
    }

    while($row = mysqli_fetch_array($res)){
        $output .= "
            <tr>
                <td>". $row['id'] ."</td>
                <td>" .$row['first_name']. "</td>
                <td>" .$row['surname']. "</td>
                <td>" .$row['email']. "</td>
                <td>
                    <div class='col-md-12'>
                        <div class='row'>

                            <div class='col-md-6'>
                                <a href='edit_user.php?id=".$row['id']."'>
                                    <button id='".$row['id']."' class='btn btn-success col-md-12'>Edit</button>
                                </a>
                                    </div>

                            <div class='col-md-6'>
                                <button id='".$row['id']."' class='delete btn btn-danger col-md-12'>Delete</button>
                            </div>


                        </div>
                    </div>
                </td>
            </tr>
        ";
    }

    echo $output;

?>