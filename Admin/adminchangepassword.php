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

    define('TITLE', 'Admin Change Password');
    define('PAGE','adminchangepassword');
    include('includes/header.php');

    $aEmail = $_SESSION['aEmail'];
    
    $sql = "Select a_name, a_email,a_password FROM adminlogin_db WHERE a_email = '$aEmail'" ;
    $result = $conn ->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        $aName = $row['a_name'];
        $aPassword = $row['a_password'];
      
    }
    
    if(isset($_REQUEST['passupdate']))
    {
        // $aName = $_REQUEST['aName'];
        $aPassword = $_REQUEST['aPassword'];
        
        echo $aEmail;

        
                            
        $sql = "UPDATE adminlogin_db SET a_password='$aPassword' WHERE a_email = '$aEmail' " ;
                                
        if($conn->query($sql)==true)
        {
        //     echo $sql;
            $passmsg ='<div class="alert alert-success text-center" role="alert">Profile update successfully !</div>';
        }
        else
        {
            $passmsg ='<div class="alert alert-danger text-center" role="alert"> Unable to update ! </div>';
        }
    }

?>


<!-- second col -->


<div class="col-lg-3 col-sm-6 m-5">
    <div class="card">                           
        <div class="card-header text-center bg-white">
            <img src="../img/user4.webp" class="card-img-top ing-img-fluid text-center" alt="..."  style="height:200px;width:200px;border-radius:100px;" >
            <h5 class="card-title text-center mt-3 font-weight-bold"><?php echo $aName ?> </h5>
        </div>
        <div class="card-body">
                                    <!-- 2nd col start-->

            <form action="" method="POST" enctype="multipart/form-data">
                <?php if(isset($passmsg)) { echo $passmsg; } ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="aEmail" class="form-control bg-light" id="exampleInputEmail1" aria-describedby="emailHelp" readonly 
                    value="<?php echo $aEmail ?>">
                </div>
                
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input name="aPassword" type="password" class="form-control" id="exampleInputPassword1" required value="<?php echo $aPassword ?>">
                </div>

                
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg btn-block " name="passupdate">Change Password</button>
                    
                </div>
            </form>
        </div>  
            
            <!-- <button class="card-footer btn btn-success  bg-primary btn-lg name="update"> Change Password</button> -->
        
    </div>
</div>    

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






<!-- opening tag of these to div is in includes/Header.php file -->
</div>
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>