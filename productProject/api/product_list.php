<?php
  session_start();
  $id = $_SESSION['userid'];
  $query = "select id, title, description, category, company, price from products where userid = $id;";

  include_once 'connectdatabase.php';
  $result = executeQuery($query);

  // empty array to collect the products from database
  $products = [];

  while ($row = mysqli_fetch_assoc($result)) {

    // create an associative array with the key-value pairs
    $product = [
      "id" => $row["id"],
      "title" => $row["title"],
      "description" => $row["description"],
      "category" => $row["category"],
      "company" => $row["company"],
      "price" => $row["price"],
    ];

    // array_push($products, $product);

    // add a new object to the products array
    $products[] = $product;
  }

  // print("<pre>");
  // print_r($products);
  // print("</pre>");

  print(json_encode($products));

?>