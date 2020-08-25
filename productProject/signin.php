<?php

session_start();

  // remove the value stored with key name in the session
    unset($_SESSION['name']);
  
    // remove the value stored with key email in the session
    unset($_SESSION['email']);

  // remove the value stored with key phone in the session
     unset($_SESSION['phone']);

  // remove the value stored with key userId in the session
     unset($_SESSION['userId']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <style>
        h2 {
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>

</head>

<body>

    <div class="container">
        <h2 class="text-center">SignIn</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required class="form-control" type="email" name="email" id="email"
                        placeholder="Enter email here">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required class="form-control" type="password" name="password" id="password"
                        placeholder="Enter Password here">
                </div>
                <div class="form-group">
                    <div>Don't have an account? <a href="signup.html">Signup here</a></div>
                    <button onclick="signin()" class="btn btn-success">SignIn</button>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>

        function signin() 
        {
            const email = $('#email').val()
            const password = $('#password').val()

            // JSON
            const data = {
                "email": email,
                "password": password
            }
            //Query String of input data generally used for get method 
            const queryString = `email=${email}&password=${password}`

                // Using .get method for calling php api(i.e. webservices)

            // $.get('api/signin.php?' + queryString, function (response) {
            //     console.log(response)
            //     // console.log(typeof(response))

            //     // converts a string to JSON object/array
            //     const result = JSON.parse(response)
            //     // console.log(result)
            //     // console.log(typeof(result))

            //     if (result['status'] == 'success') {
            //         window.location = "product_list.php"
            //         const user = result['data'];
            //         alert('Login Successful Welcome '+user['name']);
            //     } else {
            //         alert('invalid email or password')
            //     }
            // });

            // $.post('api/signin.php' , queryString, function (response) {

            $.post('api/signin.php' , data, function (response) {
                console.log(response) 

                // converts a string to JSON object/array
                const result = JSON.parse(response)

                if (result['status'] == 'success') {
                    window.location = "product_list.php"
                    const user = result['data'];
                    alert('Login Successful Welcome '+user['name']);
                } else {
                    alert('invalid email or password')
                }
            });
        }
    </script>
</body>

</html>