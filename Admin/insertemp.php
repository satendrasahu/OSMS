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
    define('TITLE', 'Insert Employee');
    define('PAGE','technitian');
    include('includes/header.php');



    if(isset($_REQUEST['empsubmit']))
    {
        $sql = "SELECT empemail FROM  technitian_db WHERE empemail = '".$_REQUEST['empemail']."'";
        $result = $conn->query($sql);
        if($result->num_rows==1)
        {
            $regmsg = '<div class="alert alert-warning mt-2 container-fluid" role="alert">"Oh - no" This email is already registerd ! </div>';   
        }
        
        else
        {
                        $rName = $_REQUEST['empname'];
                        $rcity = $_REQUEST['empcity'];
                        $rPhone = $_REQUEST['empmobile'];
                        $rEmail = $_REQUEST['empemail'];
                       
                        
                       

                       
                        $sql = " INSERT INTO  technitian_db(empname,empcity,empmobile,empemail) 
                        VALUES('$rName','$rcity','$rPhone','$rEmail')";

                         //   echo $sql;


                            if($conn->query($sql)== true)
                            {
                                $regmsg = '<div class="alert alert-success" role="alert"> Awesome, Technician Added successfully </div>';
                            }
                            else
                            {
                                $regmsg = '<div class="alert alert-danger mt-2 container-fluid" role="alert">"OHH - No" Something is wrong ! </div>';   
                            }
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
                            Add new Technitian

                        </div>
                        <div class="card-body">
                            <form action="" class=" text-white table-hover " method="POST">
                            <?php if(isset($regmsg)){echo $regmsg; } ?>
                                <!--name-->
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <label for="name">Emp Name</label>
                                    <input  name="empname" type="text" class="form-control text-primary" id="empname" required placeholder="Enter Name">
                                </div>

                                <!--email-->
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <label for="email">Emp Email</label>
                                    <input name="empemail" id="empemail" type="email" class="form-control text-primary" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter Email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                                </div>

                                
                                <!--contact no-->
                                <div class="form-group">
                                    
                                    <i class="fas fa-mobile"></i>
                                    <label for="empphone">Emp Phone</label>
                                    <input name="empmobile" id="empmobile" type="tel" class="form-control text-primary" onkeypress="isInputNumber(event)"  required  placeholder="Enter No">
                                    <small id="contactHelp" class="form-text text-muted">We'll never share your no with anyone else.</small>

                                </div>

                                <!--emp city-->
                                <div class="form-group">
                                    
                                    <i class="fas fa-mobile"></i>
                                    <label for="empcity">Emp City</label>
                                    <input name="empcity" id="empcity" type="text" class="form-control text-primary" required  placeholder="Enter No">
                                    <small id="contactHelp" class="form-text text-muted">We'll never share your no with anyone else.</small>

                                </div>

                                
                                <div class="container text-center">
                                    <button  type="submit" class="btn btn-primary text-white" name="empsubmit">Submit</button>
                                    <a href="technitian.php" class="btn btn-danger text-white" >Close </a> 
                                </div>

                                

                            </form>

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