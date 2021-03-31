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
    define('TITLE', 'Edit Request');
    define('PAGE','edit');
    include('includes/header.php');
?>



<div class ="col-sm-8 col-md-8 m-5  ">
    
        <?php
           
            
            if(isset($_REQUEST['requpdate']))
            {
                $rid = $_REQUEST['r_login_id'];
                $rname = $_REQUEST['r_name'];
                $remail = $_REQUEST['r_email'];
                $rphone = $_REQUEST['r_phone'];
                // $rprofileimage = $_REQUEST['r_profileimage'];

                $sql = "Update requesterlogin_db SET r_login_id = '$rid', r_name='$rname', r_email = '$remail',r_phone ='$rphone' WHERE r_login_id = '$rid' ";
                if($conn -> query($sql)==TRUE)
                {
                    $msg = '<div class="alert alert-success text-center" role="alert"> Profile Update SuccessFully ! </div>';
                }
                else
                {
                    $msg = '<div class="alert alert-warning text-center" role="alert"> unable to Update ! </div>';
                }
                
            }
            if(isset($_REQUEST['edit'])){
                $sql = "SELECT * FROM requesterlogin_db WHERE r_login_id = {$_REQUEST['id']}";
                $result = $conn-> query($sql);
                $row = $result->fetch_assoc();

            }
        ?>
        <div class="card-body bg-dark text-white">
        <form action=" " method="POST">
            <?php if(isset($msg)) {echo $msg;} ?>
            <div class="form-group">
            
                <label for="r_login_id"> Requester ID </label>
                <input type="text" class = "form-control text-primary " name = "r_login_id" id= "r_login_id" value="<?php if(isset($row['r_login_id'])){echo $row['r_login_id'];} ?> "readonly>
            </div>
        
            <div class="form-group">
                <label for="r_login_id"> Requester Name </label>
                <input type="text" class = "form-control text-primary" name = "r_name" id= "r_name" value="<?php if(isset($row['r_name'])){echo $row['r_name'];} ?> "required>
            </div>
        
            <div class="form-group">
                <label for="r_login_id"> Requester Email </label>
                <input type="email" class = "form-control text-primary" name = "r_email" id= "r_email" value="<?php if(isset($row['r_email'])){echo $row['r_email'];} ?> "required>
            </div>
      
            <div class="form-group">
                <label for="r_login_id"> Requester Mobile </label>
                <input type="tel" class = "form-control text-primary" name = "r_phone" id= "r_phone" value="<?php if(isset($row['r_phone'])){echo $row['r_phone'];} ?> "required>
            </div>
        
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="requpdate" name="requpdate">Update</button>
            <a href="requester.php" class="btn btn-secondary btn-lg btn-block">Close</a>
        <form>
        
        </div>


</div>








<!-- opening tag of these to div is in includes/Header.php file -->

<!-- end of row div -->
</div>
<!-- end of container div -->
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>