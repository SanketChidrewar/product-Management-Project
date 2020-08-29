<?php

function executeQuery($query){


    $conn = mysqli_connect('localhost','root','manager','mydb') or die("Connection Failed");

    $result = mysqli_query($conn,$query);

    mysqli_close($conn);

    return $result;

}

?>