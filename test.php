<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- boot strap  -->
        <!-- bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- font awesome css -->
        <link rel="stylesheet" href="css/all.min.css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" 
              rel="stylesheet">
        <!-- Custom css / self css -->
        <link rel="stylesheet" href="css/custom.css">
        <title>OSMS</title>


    </head>
    <body>
        <?php include("Navbar.php"); ?>

        <!--  start jumbotron -->


        <header class="jumbotron back-image"
                style="background-image:url('img/onlineservice2.jpg');">

            <div class="mainHeading myclass" style="float:right;">
                <h1 class="text-uppercase text-h1  font-weight-bold">Welcome to OSMS </h1>
                <p class="font-italic text-white " > Your Smile is our Goal </p>
                
                <a class="btn btn-success mr-4 dropdown-toggle" id="loginoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">Login</a>
                    <div class="dropdown-menu bg-transparent" aria-labelledby="loginoption">
                    <a class="dropdown-item text-h " href="Requester/LoginDesktop.php">desktop</a>
                    <a class="dropdown-item text-h " href="Requester/LoginMobile.php">mobile</a>
                    </div>
               <a href="#registration" class="btn btn-danger mr-4">Sign Up </a>   
                
            </div>

        </header>

        <!-- end header -->



        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/onlineservice2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h1 class="text-uppercase text-h1  font-weight-bold">Welcome to OSMS </h1>
                <p class="font-italic text-white " > Your Smile is our Goal </p>
                
                <a class="btn btn-success mr-4 dropdown-toggle" id="loginoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">Login</a>
                    <div class="dropdown-menu bg-transparent" aria-labelledby="loginoption">
                    <a class="dropdown-item text-h " href="Requester/LoginDesktop.php">desktop</a>
                    <a class="dropdown-item text-h " href="Requester/LoginMobile.php">mobile</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/onlineservice4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h1 class="text-uppercase text-h1  font-weight-bold">Welcome to OSMS </h1>
                <p class="font-italic text-white " > Your Smile is our Goal </p>
                
                <a class="btn btn-success mr-4 dropdown-toggle" id="loginoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">Login</a>
                    <div class="dropdown-menu bg-transparent" aria-labelledby="loginoption">
                    <a class="dropdown-item text-h " href="Requester/LoginDesktop.php">desktop</a>
                    <a class="dropdown-item text-h " href="Requester/LoginMobile.php">mobile</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/onlineservice5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h1 class="text-uppercase text-h1  font-weight-bold">Welcome to OSMS </h1>
                <p class="font-italic text-white " > Your Smile is our Goal </p>
                
                <a class="btn btn-success mr-4 dropdown-toggle" id="loginoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">Login</a>
                    <div class="dropdown-menu bg-transparent" aria-labelledby="loginoption">
                    <a class="dropdown-item text-h " href="Requester/LoginDesktop.php">desktop</a>
                    <a class="dropdown-item text-h " href="Requester/LoginMobile.php">mobile</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

















        <!-- start introduction section -->
        <div class="container bg-primary">
            <div class="jumbotron">
                <h1 class="display-4 text-center">OSMS Services</h1>
                <p class="lead">OSMS is a multi-platform based Campus Management System for educational institutions like Schools and Colleges. It provides completely automated tools to simplify the process of managing all your on-campus and off-campus chores. It provides active monitoring of what's happening in your institution by interconnecting students, parents and teachers all in one place</p>
                <hr class="my-4">
                <p class="text-center">We provide most beautiful services for your</p>
                <div class="text-center">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
            </div>
        </div>

        <!-- end introduction section -->


        <!-- start services section -->
        <div class="container text-center border-bottom id="services">
            <h2> Our Services </h2>
            <div class="row mt-4">
                <div class="col-sm-4 mb-4">
                    <a href="#"><i class="fas fa-tv fa-8x text-success"></i> </a>
                    <h4 class="mt-4">Electroic Applications </h4>
                </div>

                <div class="col-sm-4 mb-4">
                    <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i> </a>
                    <h4 class="mt-4">Preventive Maintenance </h4>
                </div>

                <div class="col-sm-4 mb-4">
                    <a href="#"><i class="fas fa-cogs fa-8x text-danger"></i> </a>
                    <h4 class="mt-4">Fault Repair</h4>
                </div>
            </div>
        </div>


        <!-- end services section -->


        <!-- start registration form -->
            <?php include('UserRegistration.php') ?>
        <!-- end registration -->

        <!-- start hapyy Customer -->

        <div class="jumbotron jumbotron-fluid bg-primary">
            <div class="container">
                <h1 class="display-4 text-center text-white ">Happy Customer</h1>

                <!-- 1st row -->
                <div class="row my-5">

                    <!-- 1st col -->
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card">
                             <div class="card-header text-center bg-white">
                                 <img src="img/user2.webp" class="card-img-top ing-img-fluid text-center" alt="..."  style="height:250px;border-radius:100px;" >
                                 <h5 class="card-title text-center mt-3 font-weight-bold"> Bhoolu</h5>
                             </div>
                            <div class="card-body text-center">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            </div>
                            <a href="#" class="  card-footer btn btn-primary   bg-primary btn-lg"> Show Profile</a>
                            
                        </div>
                    </div>

                    <!-- 2nd col -->
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card">
                             <div class="card-header text-center bg-white">
                                 <img src="img/user4.webp" class="card-img-top ing-img-fluid text-center" alt="..."  style="height:250px;border-radius:100px;" >
                                 <h5 class="card-title text-center mt-3 font-weight-bold">Bhootni</h5>
                             </div>
                            <div class="card-body text-center">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            </div>
                            <a href="#" class="  card-footer btn btn-primary   bg-primary btn-lg"> Show Profile</a>
                            
                        </div>
                    </div>
                    <!-- 3rd col -->
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card">
                            
                        <div class="card-header text-center bg-white">
                                    <img src="img/user3.webp" class="card-img-top ing-img-fluid text-center" alt="..."  style="height:250px;border-radius:100px;" >
                                    <h5 class="card-title text-center mt-3 font-weight-bold"> Chimpangi</h5>
                                </div>
                            <div class="card-body text-center">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            </div>
                            <a href="#" class="  card-footer btn btn-primary   bg-primary btn-lg"> Show Profile</a>
                        </div>
                    </div>

                    <!-- 4th col -->
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card">
                             <div class="card-header text-center bg-white">
                                 <img src="img/user6.jpg" class="card-img-top ing-img-fluid text-center" alt="..."  style="height:250px;border-radius:100px;" >
                                 <h5 class="card-title text-center mt-3 font-weight-bold"> chudail</h5>
                             </div>
                            <div class="card-body text-center">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            </div>
                            <a href="#" class="  card-footer btn btn-primary   bg-primary btn-lg"> Show Profile</a>
                            
                        </div>
                    </div>







                <!--  -->
                </div>
                <!--  -->
                <!--  -->


                </div>    
            </div>
        </div>


        



        <!-- end happy customer -->

        <!-- start contact us -->
        <div class="container" id="contact">
            <h1 class="text-center text-danger mb-4">Contact US </h1>
            <div class="row my-3">

                <!-- start 1st col -->
                <?php include('contactform.php') ?>
                <!-- end first col -->

                <!-- start 2nd -->
                <div class="col-md-4 text-center">
                    <strong> HeadQuarter : </strong><br>
                    OSMS pvt LTd,<br>
                    Vijay Nager-Indore,mp (India),<br>
                    BIT Mesra - Ranchi, Jh (India),<br>
                    ph : 1234567890 <br>

                    <a href="#" target="_blank">www.osms.com </a><br>
                    <br><br>

                    <Strong> Branch : </Strong><br>
                    OSMS pvt LTd, </br>

                    Madhupur-Bhopal, mp(India),<br>
                    Kanika-Mumbai,mp(India),<br>
                    mp - 07456 <br>
                    ph : 012346987 <br>
                    <a href="#" target="_blank">www.osms.com </a><br>



                </div>
            </div>
        </div>    


        <!-- start footer -->
        <footer class="container-fluid bg-dark mt-5 text-white">
            <div class="container">
                <!-- cil 1st -->
                <div class="row py-3">
                    <div clas="col-md-6">
                        <span class="pr-2"> Follow Us : </span>
                        <a href="#" target="_blank" class="pr-2 fi-color m-2">
                            <i class="fab fa-facebook-f"></i></a>

                        <a href="#" target="_blank" class="pr-2 fi-color m-2">
                            <i class="fab fa-twitter"></i></a>

                        <a href="#" target="_blank" class="pr-2 fi-color m-2">
                            <i class="fab fa-youtube"></i></a>

                        <a href="#" target="_blank" class="pr-2 fi-color m-2">
                            <i class="fab fa-google-plus-g"></i></a>

                        <a href="#" target="_blank" class="pr-2 fi-color m-2 ">
                            <i class="fas fa-rss"></i></a>

                        <a href="#" target="_blank" class="pr-2 fi-color m-2 ">
                        <i class="fa fa-instagram" aria-hidden="true"></i></a>


                    </div>

                    <!-- 2nd col -->

                    <div class="col-md-6 text-right">
                        <small> Designed by sahu's &copy; 2020</small>
                        <small class="ml-2"><a href="Admin/adminLogin.php">Admin Login</a></small>
                    </div>


                </div>
            </div>
        </footer>


        <!-- end footer -->



        <!-- bootstrap java script-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/all.min.js"></script>


        <!-- self js -->
        
  <script>
      function isInputNumber(event)
      {
          var ch = String.fromCharCode(event.which);
          if(!(/[0-9]/.test(ch)))
          {
              event.preventDefault();
          }
      }
  </script>


    </body>
</html>