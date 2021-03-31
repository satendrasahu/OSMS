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


    define('TITLE', 'Service Status');
    define('PAGE', 'checkStatus');
    include('include/profileNavHeader.php');
    
?>

<!-- search card start -->

        <div class="col">
            <div class="row">
                <div class="col">
                    <div class=" card m-5" >
                        <div class="card-header bg-info text-white text-center "style="">
                                Enter Request ID
                        </div>
                        <div class="card-body mt-3 ">
                            <form action =" " method="POST" id="myForm">
                                <div class="form-group">
                                    
                                    <input type="number" class="form-control" id="checkid" name="checkid"  onkeypress="isInputNumber(event)" required>
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input type="email" class="form-control" id="checkid" name="checkemail" value="<?php echo $rEmail ?> " readonly>
                                    
                                </div>

                                <button type="submit" class=" card-footer btn btn-primary bg-info btn-block btn-lg"   style="height:50px;">Search</button>
                          
                            </form>

                        </div>
                        <!-- <button type="button" class=" card-footer btn btn-primary bg-info btn-block btn-lg"  id="submitBtn" style="height:50px;">Search</button> -->
                           
                    </div>
                </div>    
            </div>
    <!-- search card-end -->
            <?php
                
                // $rows = $results->fetch_assoc();
                
                if(isset($_REQUEST['checkid']))
                {
                    $sql = "SELECT * FROM assignwork_db WHERE request_id = {$_REQUEST['checkid']}";
                    
                    $result = $conn-> query($sql);
                    $row = $result->fetch_assoc();
                    //echo $row;
                    if($row['requester_email'] != $rEmail)
                    {
                        if($row['requester_email'] == null)
                        {
                            echo '<div class="alert alert-info text-center" role="alert"> Sry Not Assigned yet! So no record found </div>';
                            exit;
                        }
                        echo '<div class="alert alert-warning text-center" role="alert"> it is not your request id, Please Enter Valid ID ! </div>'; 
                        exit;
                    }
                    if($row['requester_email'] == $rEmail)
                    {  
                        if($row['request_id'] == $_REQUEST['checkid'])
                        {       
                                
                                ?> 
            
                                <div class="row border  mx-5" id="printableTable">
                                    <div class=" col-sm-12 col-md-12 bg-info text-white text-center"> 
                                        <h3> Assigned Work Details </h3>
                                    </div>
                                    <div class=" col-sm-12 col-md-12 bg-secondary text-white ">
                                        <!-- <table class="table text-white table-responsive"> -->
                                        
                                            <table class='table table-bordered text-white table-responsive-sm' >                    
                                                <tbody>
                                                    <tr>
                                                        <td> Request ID </td>
                                                        <td> <?php if(isset($row['request_id'])) { echo $row['request_id']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Request Title </td>
                                                        <td> <?php if(isset($row['request_info'])) { echo $row['request_info']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Request Description </td>
                                                        <td> <?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Requester Name  </td>
                                                        <td> <?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Requester Address 1 </td>
                                                        <td> <?php if(isset($row['requester_add1'])) { echo $row['requester_add2']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Requester Address 2 </td>
                                                        <td> <?php if(isset($row['requester_add2'])) { echo $row['requester_add2']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Requester City </td>
                                                        <td> <?php if(isset($row['requester_city'])) { echo $row['requester_city']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Requester State </td>
                                                        <td> <?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Requester Zip </td>
                                                        <td> <?php if(isset($row['requester_zip'])) { echo $row['requester_zip']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Requester Email </td>
                                                        <td> <?php if(isset($row['requester_email'])) { echo $row['requester_email']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Requester Mobile </td>
                                                        <td> <?php if(isset($row['requester_mobile'])) { echo $row['requester_mobile']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Request Date </td>
                                                        <td> <?php if(isset($row['request_date'])) { echo $row['request_date']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Assigned Technitian Detail </td>
                                                        <td> <?php if(isset($row['assign_tech'])) { echo $row['assign_tech']; } ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Technitian Availability Date </td>
                                                        <td> <?php if(isset($row['assign_date'])) { echo $row['assign_date']; } ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Technitian Sign </td>
                                                        <td> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Customer Sign </td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            <table>
                                    </div>        
                                </div> 
                                
                                <div class="row mx-5">
                                    <div class=" col-sm-12 col-md-12 text-white text-center d-print-none">
                                        <form action="">
                                        <input type="button" id="submtbtn" class="btn btn-outline-primary btn-lg btn-block  text-center text-white d-print-none" value='Print' onclick="printDiv()" >
                                        <input type="submit" id ="closebtn" class="btn btn-outline-danger btn-lg btn-block  text-center text-white d-print-none" value='Close' >
                                        <iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe> </form>
                                    </div>
                                </div>
                                 <?php 
                        } 
                       
                    }
                   
                 }?>
        
            

        

</div>
    <!-- end row -->
</div>

<!-- end container -->
 
<!-- side bar end -->



<script>
    function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
         window.frames["print_frame"].window.hide();

       }
</script>
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

<!-- bootstrap 3 links -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>