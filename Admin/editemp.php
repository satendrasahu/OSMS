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
     define('TITLE', 'update technitian');
    define('PAGE','technitian');
    include('includes/header.php');
?>



<div class ="col-sm-8 col-md-8 m-5  ">
    
        <?php
           
            
            if(isset($_REQUEST['empupdate']))
            {  
                $empid = $_REQUEST['empid'];
                $empname = $_REQUEST['empname'];
                $empcity = $_REQUEST['empcity'];
                $empmobile = $_REQUEST['empmobile'];
                $empemail = $_REQUEST['empemail'];
               
                $sql = "Update technitian_db SET empcity = '$empcity', empname='$empname', empemail = '$empemail',empmobile ='$empmobile' WHERE empid = '$empid' ";
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
                $sql = "SELECT * FROM technitian_db WHERE empid = {$_REQUEST['id']}";
                $result = $conn-> query($sql);
                $row = $result->fetch_assoc();

            }
        ?>
        <div class="card-body bg-info text-white">
        <form action=" " method="POST">
            <?php if(isset($msg)) {echo $msg;} ?>
            <div class="form-group">
            
                <label for="empid"> Emp ID </label>
                <input type="text" class = "form-control text-primary " name = "empid" id= "empid" value="<?php if(isset($row['empid'])){echo $row['empid'];} ?> "readonly>
            </div>
        
            <div class="form-group">
                <label for="empid"> Emp Name </label>
                <input type="text" class = "form-control text-primary" name = "empname" id= "empname" value="<?php if(isset($row['empname'])){echo $row['empname'];} ?> "required>
            </div>
        
            <div class="form-group">
                <label for="empid"> Emp Email </label>
                <input type="email" class = "form-control text-primary" name = "empemail" id= "empemail" value="<?php if(isset($row['empemail'])){echo $row['empemail'];} ?> "required>
            </div>
      
            <div class="form-group">
                <label for="empid"> Emp Mobile </label>
                <input type="tel" class = "form-control text-primary" name = "empmobile" id= "empmobile" value="<?php if(isset($row['empmobile'])){echo $row['empmobile'];} ?> "required>
            </div>
            <div class="form-group">
                <label for="empid"> Emp City </label>
                <input type="text" class = "form-control text-primary" name = "empcity" id= "empcity" value="<?php if(isset($row['empcity'])){echo $row['empcity'];} ?> "required>
            </div>
        
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="empupdate" name="empupdate">Update</button>
            <a href="technitian.php" class="btn btn-secondary btn-lg btn-block">Close</a>
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