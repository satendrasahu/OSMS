<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

     <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom css / self css -->
    <link rel="stylesheet" href="../css/custom.css">

    <title><?php echo TITLE; ?></title>

</head>
<body>


<!-- navbar start -->


<nav class="navbar navbar-expand-sm navbar-dark bg-primary pl-5 fixed-top ">
  <a class="navbar-brand" href="dashboard.php">OSMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown"> 
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
      
      
    </ul>
        <form class="form-inline my-2 my-lg-0">
        <div class="searchbar">
          <input class="search_input pb-3" type="search" placeholder="Search" aria-label="Search..">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
    </form>
  </div>
</nav><br>

<!-- navbar end -->

 
<!-- side bar start -->


<!-- start container -->
<div class="container-fluid">
    <!-- start row -->
    <div class="row mt-3">
        <!-- sidebar start -->
        <!-- col 1st -->
        <nav class="col-sm-2 bg-light sidebar  my-5">
          <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php">
                            <i class="fa fa-line-chart"></i> DashBoard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'work'){echo 'active';} ?> " href="work.php">
                        <i class="fa fa-list-alt" aria-hidden="true"></i> Work Order
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'request'){echo 'active';} ?> " href="request.php">
                        <i class="fa fa-american-sign-language-interpreting"></i> Requests
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'assets'){echo 'active';} ?> " href="assets.php">
                        <i class=" fa fa-handshake-o"></i> Assets
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'technitian'){echo 'active';} ?> " href="technitian.php">
                        <i class="fab fa-accusoft"></i> technitian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'requester'){echo 'active';} ?> " href="requester.php">
                        <i class="fa fa-registered"></i> Requester
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'soldproductreport'){echo 'active';} ?> " href="soldproductreport.php">
                        <i class="	fa fa-send"></i> Sell Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'workreport'){echo 'active';} ?> " href="workreport.php">
                        <i class="	fa fa-link"></i> Work Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'adminchangepassword'){echo 'active';} ?> " href="adminchangepassword.php">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action <?php if(PAGE == 'RequesterProfile1'){echo 'active';} ?> "
                         href="../logout.php">
                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- end 1st col -->