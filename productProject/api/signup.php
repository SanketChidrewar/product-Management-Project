<?php

    // $name = $_REQUEST['name'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    
    // print_r[$_REQUEST];
    // print("printed values");

    include_once "connectdatabase.php";

    $query = "INSERT INTO user(name,email,phone,password) values('$name','$email','$phone','$password');";
    $result = executeQuery($query);

    $response_success = [
        'status'=> 'success'
    ];
    $response_error = [
        'status'=> 'failed'
    ];

    if($result){
        print(json_encode($response_success));
    }else{
        print(json_encode($response_error));
    }

?>