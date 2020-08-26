<?php

session_start();

  // check if the session name is valid
  if (!isset($_SESSION['name'])) {
    header("location: signin.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--  loding all CDN from external file  -->
    <?php include_once 'pages/header.php'; ?>

    <style>

        h4 {
        text-align: center;
        margin-bottom: 50px;
        margin-top: 50px;
        }

        .btn-add {
        margin-bottom: 20px;
        }
        .user-info {
        font-weight: 600;
        }

    </style>

</head>
<body onload="getAllProducts()">

    <div class="container">
    <div class="user-info float-right"><?= $_SESSION["name"] ?> (<?= $_SESSION["email"] ?>)<button onclick="logout()" class="btn btn-link">Logout</button></div>
        <h4>Product List</h4>

        <button onclick="addProduct()" class="btn btn-success btn-add float-right">Add</button>
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Company</th>
                <th>Category</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody id="products">

            </tbody>
        </table>
  </div>

    <!--  loding all jquery CDN from external file  -->
    <?php  include_once 'pages/footer.php' ?>

    <script>
    
    function logout() {
      const answer = confirm("Are you sure you want to logout ?")
      if (answer) {
        window.location = "signin.php"
      }
    }

    function addProduct() {
      // redirect to product_add.php page
      window.location = 'product_add.php'
    }

    function getAllProducts() {
      $.get('api/product_list.php', function(response) {
        let rows = ''
        const products = JSON.parse(response)
        for (let index = 0; index < products.length; index++) {
          const product = products[index]
          rows += `<tr>`
          rows += ` <td>${product['id']}</td>`
          rows += ` <td>${product['title']}</td>`
          rows += ` <td>${product['price']}</td>`
          rows += ` <td>${product['company']}</td>`
          rows += ` <td>${product['category']}</td>`
          rows += ` <td>
            <button onclick="deleteProduct(${product['id']})" class="btn btn-link text-danger">Delete</button>
            <button onclick="editProduct(${product['id']})" class="btn btn-link text-success">Edit</button>
          </td>`
          rows += `</tr>`
        }

        $('#products').html(rows)
      })
    }

    function deleteProduct(id) {
      const answer = confirm("Are you sure you want to delete this product?")
      if (answer) {
        $.post('api/product_delete.php', { "id": id }, function(response) {
          const result = JSON.parse(response)
          if (result['status'] == 'success') {
            alert('deleted successfully')

            // get the new list of products
            getAllProducts()
          } else {
            alert('error while deleting the product')
          }
        })
      }
    }

    function editProduct(id) {
      // alert('editing product = ' + id)
      const answer = confirm("Are you sure you want to Edit this product?")
      if (answer) {
        // $.post('api/product_edit.php', { "id": id });
        const data = `id=${id}`;
        window.location = 'product_edit.php?'+ data;
      }
    }
    
    </script>
</body>
</html>
