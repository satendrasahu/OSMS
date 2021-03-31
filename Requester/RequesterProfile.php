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



$sql = "Select r_name, r_email,r_password,r_phone,r_gender,r_about,r_profileimage FROM requesterLogin_db WHERE r_email = '$rEmail'" ;
$result = $conn ->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
    $rPassword = $row['r_password'];
    $rPhone = $row['r_phone'];
    $rGender = $row['r_gender'];
    $rAbout = $row['r_about'];
    $rProfileimage = $row['r_profileimage'];
}

if(isset($_REQUEST['update']))
{
    $rName = $_REQUEST['rName'];
    $rPassword = $_REQUEST['rPassword'];
    $rPhone = $_REQUEST['rPhone'];
    $rGender = $_REQUEST['rGender'];
    $rAbout = $_REQUEST['rAbout'];
    $rProfilemage = $_REQUEST['rProfileimage'];
                        
    $sql = "UPDATE requesterlogin_db SET r_name = '$rName',r_password='$rPassword',r_phone='$rPhone',r_gender='$rGender', r_profileimage='$rProfileimage', r_about='$rAbout' WHERE r_email = '$rEmail' " ;
    if($conn->query($sql)==true)
    {
      //  echo $sql;
        $passmsg ='<div class="alert alert-success text-center" role="alert">Profile update successfully !</div>';
    }
    else
    {
        $passmsg ='<div class="alert alert-danger text-center" role="alert"> Unable to update ! </div>';
    }
}

?>
<?php
    
    define('TITLE', 'Requester Profile');
    define('PAGE', 'RequesterProfile');
    include('include/profileNavHeader.php');
    
?>
 
<!-- 2nd col start-->
<div class="col-sm-6 my-5 mx-5">
    <div class="card">                           
        <div class="card-header text-center bg-white">
            <img src="<?php echo $rProfileimage ?>" class="card-img-top ing-img-fluid text-center" alt="user profile"  style="height:200px;width:200px;border-radius:100px;" >
            <h5 class="card-title text-center mt-3 font-weight-bold"><?php echo $rName ?> </h5>
        </div>
        <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
                <?php if(isset($passmsg)) { echo $passmsg; } ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="rEmail" class="form-control bg-light" id="exampleInputEmail1" aria-describedby="emailHelp" readonly 
                    value="<?php echo $rEmail ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="rName"class="form-control" id="exampleInputPassword1"required value="<?php echo $rName ?>">
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

                <!--gender-->

                <div class="form-group">
                    <input class="form-control bg-light" value="<?php echo "your gender : ".$rGender ?>" readonly>
                    <label for="gender">Select Gender</label><br>
                    <input type="radio" id="gender" name="rGender" value="male" required>Male
                    <input type="radio" id="gender" name="rGender" value="female" required>Female
                </div>
                <!-- update image -->
                <div class="form-group">
                    <lable for="image">selec image </lable>
                    <input type="file" name="rImage" >
                </div>
                <!--text Area about user-->
                <div class="form-group">
                    <lable for="about">About yourself</lable>
                    <input class="form-control bg-light" value="<?php echo $rAbout ?>" readonly>
                    <textarea type="text" name="rAbout" class="form-control" id=""  rows="3" placeholder="update new status, or paste your above status else you will get error" required></textarea>
                    <small id="emailHelp" class="form-text text-muted">don't use single quot ('' or ') here,else u will get error.but you can use double quot("") </small>

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg btn-block mb-2 " name="update">Update</button>
                    
                </div>
            </form>
        <div>
    </div>
</div>        

        <!-- 2nd col end -->
        
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


