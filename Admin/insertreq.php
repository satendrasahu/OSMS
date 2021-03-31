<?php
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_adminlogin'])
    {
        $aEmail = $_SESSION['aEmail'];
    }
    else
    {
        echo "<script> location.href ='adminLogin.php'</script>";
    }

    include('../dbConnection.php');
    define('TITLE', 'Insert Request');
    define('PAGE','insertreq');
    include('includes/header.php');



    if(isset($_REQUEST['reqsubmit']))
    {
        
                        $rName = $_REQUEST['r_name'];
                        $rEmail = $_REQUEST['r_email'];
                        $rPassword = $_REQUEST['r_password'];
                        $rPhone = $_REQUEST['r_phone'];
                        $rGender = $_REQUEST['r_gender'];
                        $rAbout = $_REQUEST['r_about'];
                        

                       
                        $sql = " INSERT INTO  requesterlogin_db(r_name,r_email,r_password,r_phone,r_gender,r_about) 
                        VALUES('$rName','$rEmail','$rPassword','$rPhone','$rGender','$rAbout')";

                         //   echo $sql;


                            if($conn->query($sql)== true)
                            {
                                $regmsg = '<div class="alert alert-warning" role="alert"> Awesome, Requester account created successfully </div>';
                            }
                            else
                            {
                                $regmsg = '<div class="alert alert-danger mt-2 container-fluid" role="alert">"Oh - no" Something is wrong ! </div>';   
                            }
                    
             
    }

?>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------->

<!-- start second col -->

<div class="col-sm-10 col-md-10">

    <div class="row m-5">

    <div class="card bg-info">
                        <div class="card-header  text-white text-center bg-primary">
                            <i class="fa fa-3x fa-user-circle"></i> <br>
                            Create New Requester

                        </div>
                        <div class="card-body">
                            <form action="" class=" text-white table-hover " method="POST">
                            <?php if(isset($regmsg)){echo $regmsg; } ?>
                                <!--name-->
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <label for="name">User Name</label>
                                    <input  name="r_name" type="text" class="form-control text-primary" id="r_name" required placeholder="Enter Name">
                                </div>

                                <!--email-->
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <label for="email">Email address</label>
                                    <input name="r_email" id="r_email" type="email" class="form-control text-primary" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter Email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                                </div>

                                <!--password-->

                                <div class="form-group">

                                    <i class="fa fa-key fa-fw"></i>
                                    <label for="pass">Password</label>
                                    <input name="r_password" id="r_password" type="password" class="form-control text-primary" id="exampleInputPassword1" required placeholder="Password">
                                </div>

                                <!--contact no-->
                                <div class="form-group">
                                    
                                    <i class="fas fa-mobile"></i>
                                    <label for="">phone no</label>
                                    <input name="r_phone" id="r_phone" type="tel" class="form-control text-primary" onkeypress="isInputNumber(event)"  required  placeholder="Enter No">
                                    <small id="contactHelp" class="form-text text-muted">We'll never share your no with anyone else.</small>

                                </div>

                                <!--gender-->

                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <label for="gender">Select Gender</label><br>
                                    <input type="radio" id="gender" name="r_gender" value="male"  required >Male
                                    <input type="radio" id="gender" name="r_gender" value="female"  required >Female
                                </div>

                                <!--text Area about user-->
                                <div class="form-group">
                                    <textarea name="r_about" class="form-control text-primary" id=""  rows="5" placeholder="write about your self"></textarea>
                                    <small id="emailHelp" class="form-text text-muted">don't use single quot ('' or ') here,else u will get error.
                                        but you can use double quot("") </small>

                                </div>


                                
                                <div class="container text-center">
                                    <button  type="submit" class="btn btn-primary text-white" name="reqsubmit">Submit</button>
                                    <a href="requester.php" class="btn btn-danger text-white" >Close </a> 
                                </div>

                                

                            </form>

                        </div>
                        <div class="card-footer bg-primary text-white text-center">
                            <h3> Thanks for visiting ☻ </h3>
                        </div>


                    </div>

    </div>

<!-- end second col -->




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

<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- end of row div -->
</div>
<!-- end of container div -->
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>