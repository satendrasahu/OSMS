<?php
if(session_id()=='')
{
    session_start();
}
if($_SESSION['is_adminlogin'])
{
    $aEmail = $_SESSION['aEmail'];
}
else
{
    echo "<script> location.href ='adminLogin.php'</script>";
}

?>


<?php
   
if(isset($_REQUEST['close']))
{
    $sql = "DELETE FROM submitrequest_db WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE)
    {
        echo '<meta http-eqive ="refresh" content ="0; URL =?closed"/>';
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert"> Unable to Delete ! </div>';
    }
}

?>



<?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM submitrequest_db WHERE request_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        
        if(isset($_REQUEST['assign']))
        {
                
                
                    $rid = $_REQUEST['requestid'];
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
                    $atech = $_REQUEST['assigntech'];
                    $adate = $_REQUEST['assigndate'];

                    $sql = "INSERT INTO assignwork_db(request_id,request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip, requester_email,requester_mobile,request_date,assign_tech,assign_date)
                     VALUES ('$rid','$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate','$atech','$adate')";

                    
                   if($conn->query($sql)==true)
                    {
                       $passmsg ='<div class="alert alert-success text-center" role="alert">Assigned successfully !</div>';
                    }
                    else
                    {
                       $passmsg ='<div class="alert alert-danger text-center" role="alert"> Unable to Assigned ! </div>';
                    }
                
            
        }
    ?>


<div class="col-sm-6 col-md-6 my-5">
        <div class="text-center">   
            <?php if(isset($passmsg)) { echo $passmsg; } ?>   
        </div>
        <div class="card-header bg-primary text-center text-white"> 
            <h3>Assign Work Order Request </h3>
        </div>
        <form action="" method="POST">
        
            <div class="form-group">
                <label for="requestinfo">Request ID </label>
                <input type="text" class="form-control" id="request_id" name="requestid" readonly value="<?php if(isset($row['request_id'])){echo $row['request_id'];} ?>">
            </div>
            <div class="form-group">
                <label for="requestinfo">Request Info / title </label>
                <input type="text" class="form-control" id="inputRequestInfo" name="requestinfo" readonly value="<?php if(isset($row['request_info'])){echo $row['request_info'];} ?>" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="inputRequestDescription" name="requestdesc" readonly value="<?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?>">
            </div>
            
            <div class="form-group">
                <label for="reqoestinfo">Name</label>
                <input type="text" class="form-control" id="inputName" name="requestername" readonly  value="<?php if(isset($row['requester_name'])){echo $row['requester_name'];} ?>">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-6">
                    <label for="reqoestinfo">Address Line 1 </label>
                    <input type="text" class="form-control" id="inputAddress" name="requesteradd1" readonly value="<?php if(isset($row['requester_add1'])){echo $row['requester_add1'];} ?>" >
                </div>
                <div class="form-group col-md-6 col-sm-6">
                    <label for="reqoestinfo">Address Line 2 </label>
                    <input type="text" class="form-control" id="inputAddress2" name="requesteradd2" readonly value="<?php if(isset($row['requester_add2'])){echo $row['requester_add2'];} ?>" >
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-5 col-sm-5">
                    <label for="inputCity">City </label>
                    <input type="text" class="form-control" id="inputCity" name="requestercity" readonly value="<?php if(isset($row['requester_city'])){echo $row['requester_city'];} ?>">
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="inputState">state</label>
                    <input type="text" class="form-control" id="inputState" name="requesterstate" readonly value="<?php if(isset($row['requester_state'])){echo $row['requester_state'];} ?>">
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="requesterzip" readonly value="<?php if(isset($row['requester_zip'])){echo $row['requester_zip'];} ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5 col-sm-5">
                    <label for="inputEmail">Email </label>
                    <input type="email" class="form-control" id="inputEmail" name="requesteremail" readonly value="<?php if(isset($row['requester_email'])){echo $row['requester_email'];} ?>">
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="inputMobile">Mobile</label>
                    <input type="tel" class="form-control" id="inputMobile"  name="requestermobile" readonly value="<?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];} ?>">
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="inputDate">R Date</label>
                    <input type="text" class="form-control" id="inputDate" name="requestdate" readonly value="<?php if(isset($row['request_date'])){echo $row['request_date'];} ?>">
                </div>
                
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-6">
                    <label for="inputEmail">Assign to Technician </label>
                    <input type="text" class="form-control" id="inputEmail" placeholder = "Enter Detail of Technitian" name="assigntech" required>
                </div>
                <div class="form-group col-md-6 col-sm-6">
                    <label for="inputDate"> Assign Date</label>
                    <input type="Date" class="form-control" id="inputDate"  name="assigndate" onkeypress="isInputNumber(event)" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name = "assign">Assign</button>
                </div>

                <div class="form-group col-md-6 col-sm-6">
                    <button type="reset" class="btn btn-secondary btn-lg btn-block">Reset</button>
                </div>
            </div>
     </form>
    </div>