<!--  headnav bar  + first col from RequesterProfile.php -->
<?php
    
    // include('../dbConnection.php');
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

    if(isset($_REQUEST['submitrequest']))
    {
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requestdate'];

        $sql  = "INSERT INTO submitrequest_db (request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,request_date)
        VALUES ('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate')";
        if($conn->query($sql)==true)
        {
            $passmsg ='<div class="alert alert-success" role="alert">Request sumitted successfully !</div>';
            $genid = mysqli_insert_id($conn);
            $_SESSION['myid'] = $genid;
            echo "<script> location.href ='SubmitRequestSuccess.php'</script>";
        }
        else
        {
            $passmsg ='<div class="alert alert-danger" role="alert"> Unable to submit ! </div>';
        }
    }



?>

<?php 

    define('TITLE', 'Submit request');
    define('PAGE', 'submitRequest');
    include('include/profileNavHeader.php');
?>
<!-- second col -->
    <!-- 2nd col start-->
    <div class="col-sm-9 col-md-9 my-5 mx-3">
     <div class="text-center">   
        <?php if(isset($passmsg)) { echo $passmsg; } ?>   
    </div>
    <form action="" method="POST">
            
    <div class="form-group">
        <label for="requestinfo">Request Info / title </label>
        <input type="text" class="form-control" id="inputRequestInfo" placeholder = "Request info" name="requestinfo" required >
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write description" name="requestdesc" required>
    </div>
    
    <div class="form-group">
        <label for="reqoestinfo">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Enter name" name="requestername" required>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 col-sm-6">
            <label for="reqoestinfo">Address Line 1 </label>
            <input type="text" class="form-control" id="inputAddress" placeholder = "House No. 123" name="requesteradd1"required >
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="reqoestinfo">Address Line 2 </label>
            <input type="text" class="form-control" id="inputAddress2" placeholder = "Colony no" name="requesteradd2" >
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6 col-sm-6">
            <label for="inputCity">City </label>
            <input type="text" class="form-control" id="inputCity" placeholder = "Enter City Name" name="requestercity" required>
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" placeholder = "Enter state" name="requesterstate" required >
        </div>
        <div class="form-group col-md-2 col-sm-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" placeholder = "Enter Zip / Pin code" name="requesterzip" onkeypress="isInputNumber(event)" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 col-sm-6">
            <label for="inputEmail">Email </label>
            <input type="email" class="form-control" id="inputEmail" placeholder = "Enter Email" name="requesteremail">
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="inputMobile">Mobile</label>
            <input type="tel" class="form-control" id="inputMobile" placeholder = "Enter No" name="requestermobile" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group col-md-2 col-sm-2">
            <label for="inputDate">Date</label>
            <input type="Date" class="form-control" id="inputDate" placeholder = "Enter Current Date" name="requestdate" onkeypress="isInputNumber(event)" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 col-sm-6">
             <button type="submit" class="btn btn-primary btn-lg btn-block" name = "submitrequest">Submit</button>
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <button type="reset" class="btn btn-danger btn-lg btn-block">Reset</button>
        </div>
    </div>
</form>
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
<!--  headnav bar  + first col from RequesterProfile.php -->
<?php 
include ('include/profileNavfooter.php');
?>