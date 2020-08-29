<?php

$id = $_REQUEST['id'];

include_once 'connectdatabase.php';

$query = "delete from products where id = $id";

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