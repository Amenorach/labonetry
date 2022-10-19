<?php
require_once "./Settings/db_connection.php";
include "index.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Sign In</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="./CSS/._signin.css" rel="stylesheet">
    </head>

    <body class="text-center" style="background-image: url('blur.jpg');">


        <main class="form-signin">
            <form method="post" action="loginprocess.php">
                <img class="mb-4" src="./Images/phoneLogo.png" alt="Phone handle" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" name="email" placeholder="email" required="required">
                    <label>Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="password" required="required">
                    <label>Password</label>
                </div>

                <div class="checkbox mb-3 text-white">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <div >
                    <a href=" "><p class="h3 mb-3 fw-normal">Sign in as an Admin</p></a>
                </div>
                <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign In" name="customer_login">
                <p class="mt-5 mb-3 text-dark">&copy; 2021</p>
            </form>
        </main>


    </body>

    </html>