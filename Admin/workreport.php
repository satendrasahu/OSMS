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
?>


<?php
    
    define('TITLE', 'Work Report');
    define('PAGE','workreport');
    include('includes/header.php');
?>



<!-- search card start -->

<div class="col-sm-9 col-md-9 ml-3">
            <div class="row">
                <div class="col">
                    <div class=" card m-5" >
                        <div class="card-header bg-info text-white text-center "style="">
                                Enter Request Detail
                        </div>
                        <div class="card-body mt-3 ">
                            <form action =" " method="POST" id="myForm">
                                <div class="form-group">
                                    <label for="startdate">Start Date</label>
                                    <input type="date" class="form-control" id="startdate" name="startdate"  onkeypress="isInputNumber(event)" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="enddate">End Date</label>
                                    <input type="date" class="form-control" id="checkid" name="enddate" onkeypress="isInputNumber(event)" required>
                                    
                                </div>

                                <button type="submit" value="search" class=" card-footer btn btn-primary bg-info btn-block btn-lg" name="searchsubmit"  style="height:50px;">Search</button>
                          
                            </form>

                        </div>
                        <!-- <button type="button" class=" card-footer btn btn-primary bg-info btn-block btn-lg"  id="submitBtn" style="height:50px;">Search</button> -->
                           
                    </div>
                </div>    
            </div>

            <!-- second row start -->
            <?php
           
                if(isset($_REQUEST['searchsubmit']))
                {
                    $startdate = $_REQUEST['startdate'];
                    $enddate = $_REQUEST['enddate'];
                    $sql = "SELECT * FROM assignwork_db WHERE assign_date BETWEEN '$startdate' AND '$enddate' ";
                    
                    $result = $conn-> query($sql);
                    if($row = $result->num_rows > 0 )
                    {         
                        echo ' 
                       
                        <div class = "row  m-0 p-0">
                            <div class=" card bg-info borderless col-12" >
                                <div id="printableTable">
                                    <div class="card-header bg-info text-center">
                                        <h3> Assigned Work Details </h3>
                                    </div>
                                    <div class="card-body bg-dark" >
                                        <table class="table table-bordered text-white table-responsive"style="height:500px;" >                    
                                            <thead>
                                                <th scope="col">Request ID</th>
                                                <th scope="col">Request Info</th>
                                                <th scope="col">Requester Name</th>
                                                <th scope="col">Requester Address</th>
                                                <th scope="col">Requester City</th>
                                                <th scope="col">Requester Mobile</th>
                                                <th scope="col">Technitian</th>
                                                <th scope="col">Assigned Date</th>
                                                                    
                                            </thead>
                                            <tbody>';
                                                while($row = $result->fetch_assoc())
                                                {
                                                    echo'
                                                        <tr>
                                                            <td>'.$row['request_id'].'</td>
                                                            <td>'.$row['request_info'].'</td>
                                                            <td>'.$row['requester_name'].'</td>
                                                            <td>'.$row['requester_add1'].'</td>
                                                            <td>'.$row['requester_city'].'</td>
                                                            <td>'.$row['requester_mobile'].'</td>
                                                            <td>'.$row['assign_tech'].'</td>
                                                            <td>'.$row['assign_date'].'</td>
                                                        </tr>';
                                                }
                                                                
                                                echo '</tbody>
                                            
                                        </table>
                                        
                                    </div>
                                    
                                </div>    
                                <div class="card-footer bg-dark">
                                    <input type="button" id="submtbtn" class="btn btn-outline-primary btn-lg btn-block  text-center text-white" value="Print" onclick="printDiv()" >
                                    <a href="" type="submit" id ="closebtn" class="btn btn-outline-danger btn-lg btn-block  text-center text-white" value="Close" >Close</a>
                                    <iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>
                                </div>
                            </div>


                        </div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger" role="alert"> Sry No Records Found! </div>';
                    } 

                }
           ?>

</div>

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




<!-- opening tag of these to div is in includes/Header.php file -->
</div>
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>