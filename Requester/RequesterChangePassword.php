<!--  headnav bar  + first col from RequesterProfile.php -->
<?php
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_login'])
    {
        $rEmail = $_SESSION['rEmail'];
    }
    else
    {
        echo "<script> location.href ='LoginDesktop.php'</script>";
    }



    $sql = "Select r_name, r_email,r_password,r_phone FROM requesterLogin_db WHERE r_email = '$rEmail'" ;
    $result = $conn ->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        $rName = $row['r_name'];
        $rPassword = $row['r_password'];
        $rPhone = $row['r_phone'];
     
    }
    
    if(isset($_REQUEST['update']))
    {
        $rName = $_REQUEST['rName'];
        $rPassword = $_REQUEST['rPassword'];
        $rPhone = $_REQUEST['rPhone'];
        
                            
        $sql = "UPDATE requesterlogin_db SET r_password='$rPassword',r_phone='$rPhone' WHERE r_email = '$rEmail' " ;
                                
        if($conn->query($sql)==true)
        {
            echo $sql;
            $passmsg ='<div class="alert alert-success text-center" role="alert">Profile update successfully !</div>';
        }
        else
        {
            $passmsg ='<div class="alert alert-danger text-center" role="alert"> Unable to update ! </div>';
        }
    }

?>

<?php
    define('TITLE', 'Change Password');
    define('PAGE', 'RequesterChangePassword');
    include('include/profileNavHeader.php');
?>

<!-- second col -->


<div class="col-lg-3 col-sm-6 m-5">
    <div class="card">                           
        <div class="card-header text-center bg-white">
            <img src="../img/user4.webp" class="card-img-top ing-img-fluid text-center" alt="..."  style="height:200px;width:200px;border-radius:100px;" >
            <h5 class="card-title text-center mt-3 font-weight-bold"><?php echo $rName ?> </h5>
        </div>
        <div class="card-body">
                                    <!-- 2nd col start-->

            <form action="" method="POST" enctype="multipart/form-data">
                <?php if(isset($passmsg)) { echo $passmsg; } ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="rEmail" class="form-control bg-light" id="exampleInputEmail1" aria-describedby="emailHelp" readonly 
                    value="<?php echo $rEmail ?>">
                </div>
                
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input name="rPassword" type="password" class="form-control" id="exampleInputPassword1" required value="<?php echo $rPassword ?>">
                </div>

                <!--contact no-->
                <div class="form-group">
                    <label for="">phone no</label>
                    <input name="rPhone" type="tel" class="form-control" required onkeypress="isInputNumber(event)" value="<?php echo $rPhone ?>">
                    <small id="contactHelp" class="form-text text-muted">We'll never share your no with anyone else.</small>
                </div>

                
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg btn-block " name="update">Change Password</button>
                    
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

<?php 
include ('include/profileNavfooter.php');
?>