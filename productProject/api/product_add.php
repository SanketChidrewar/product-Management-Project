<?php

session_start();

$title = $_REQUEST['title'];
$description = $_REQUEST['description'];
$price = $_REQUEST['price'];
$category = $_REQUEST['category'];
$company = $_REQUEST['company'];
$userid = $_SESSION['userid'];

include_once 'connectdatabase.php' ; 

$query = "INSERT INTO products(title,description,price,category,company,userid) Values('$title','$description','$price','$category','$company','$userid');";

$result = executeQuery($query);

$response_success = [
    'status' => 'success'
];
$response_error = [
    'status' => 'error'
];

if($result){
    print(json_encode($response_success));
}else{
    print(json_encode($response_error));
}

?>