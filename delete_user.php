<?php

    $id = $_POST['id'];

    include("connection.php");

    $query = "DELETE FROM table1 WHERE id = '$id'";

    $res = mysqli_query($connect, $query);

    

?>