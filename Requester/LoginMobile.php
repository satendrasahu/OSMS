<?php

include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_login']))
{
    if(isset($_REQUEST['rEmail']))
    {
        $rEmail = mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));

        $sql = "SELECT r_email, r_password FROM requesterlogin_db WHERE r_email ='".$rEmail."' AND r_password = '".$rPassword."' limit 1";

        $result = $conn->query($sql);
         if($result->num_rows == 1)
        {
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail']= $rEmail;
            echo "<script> location.href = 'RequesterProfile.php';</script>";
            exit;
        }
        else
        {
            $msg = '<div class="alert alert-warning" role="alert">
                  "OHH -NOO.." Your entered something wrong either email or password !
                   </div>';
        }
    }
}
else
{
    echo "<script> location.href = 'RequesterProfile.php';</script>";

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- boot strap  -->
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <!-- font awesome css -->
        <link rel="stylesheet" href="../css/all.min.css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" 
              rel="stylesheet">
        <!-- Custom css / self css -->
        <link rel="stylesheet" href="../css/custom.css">
        <title>Login</title>
        <style>
            .banner-backgrond
            {
                clip-path: polygon(30% 0%, 70% 0%, 100% 0, 100% 100%, 84% 76%, 66% 93%, 0 100%, 0 0);

            }
        </style>


    </head>
    <body>
        <!-- navbar start -->
            
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary pl-5 fixed-top ">
        <a class="navbar-brand" href="#">OSMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Services
                </a>
                <div class="dropdown-menu bg-transparent" aria-labelledby="navbarDropdown">
                    <div class="container">
                    <a class="dropdown-item text-h" href="">Electroic Applications</a>
                    <a class="dropdown-item text-h" href="">Preventive Maintenance</a>
                    <a class="dropdown-item text-h" href="">Fault Repair</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../#registration"></span>Register</a>       
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="searchbar">
                <input class="search_input pb-3" type="search" placeholder="Search" aria-label="Search..">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                </div>
            </form>
        </div>
        </nav>

        <!-- navbar close -->


        <main class="d-flex align-items-center my-3 logincss bg-primary banner-backgrond" style="height:90vh">
            <div class="container">
                <div class="row">
                <div class=" col-sm-8 offset-sm-2 my-3 text-center text-white"  style="font-size: 30px">
                    <i class="fas fa-strikethrough"></i>
                    <span> Online Service Management System </span>
                    <i class="fas fa-stethoscope"></i>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div class="card">
                            <div class="card-header bg-info text-white text-center">
                                <span class="fa fa-user-plus fa-3x"></span>
                                <hr>
                                <p> Login Here</p>
                            </div>
                          
                            <div class="card-body">
                            <div class="card-body">
                               <?php if(isset($msg)){echo $msg;} ?>
                                <form action="" method="POST">
                                    <!--email-->
 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="rEmail" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>

                                    <!--password-->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="rPassword" required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                    <div class="container text-center text-white">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                            <div class="card--footer bg-info text-center text-white">
                                <h2>thank you ☻</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


             <!-- bootstrap java script-->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/all.min.js"></script>

   </body>
</html>


       