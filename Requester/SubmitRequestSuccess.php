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
    $sql = "SELECT * FROM submitrequest_db WHERE request_id = {$_SESSION['myid']}";
    $result= $conn->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        $passmsg = "
        <div id='printableTable'> 
        <table class='table table-borderless border'>
                
                <tbody>
                <tr>    
                    <th >Request ID</th>
                    <td>".$row['request_id']."</td>
                </tr>
                <tr>    
                        <th >user Name</th>
                        <td>".$row['requester_name']."</td>
                </tr>
                <tr>    
                        <th >Email ID</th>
                        <td>".$row['requester_email']."</td>
                </tr>
                <tr>    
                        <th >Request Info</th>
                        <td>".$row['request_info']."</td>
                </tr>
                <tr>    
                        <th >Request description</th>
                        <td>".$row['request_desc']."</td>
                </tr>
                <tr>    
                        <th >Request Mobile</th>
                        <td>".$row['requester_mobile']."</td>
                </tr>  
            </tbody>
            
        </table></div>";
    }
    else{
        $passmsg ='<div class="alert alert-danger" role="alert"> Unable to submit ! </div>';
    }
?>

<?php 

define('TITLE', 'request Success');
include('include/profileNavHeader.php');
?>

<div class="col-sm-6 col-md-6 my-5 mx-3">
    <?php if(isset($passmsg)) { echo $passmsg; } ?> 

    <div class="row">
        <div class="col-md-9 col-sm-9 text-center">
             <button type="submit" class="btn btn-primary btn-lg btn-block" value='print' onclick="printDiv()" >print</button>
             <iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>
        </div>
        <small class="text-danger text-center m-2"> Note - : please or save or print your request id, without request id you can't se your service status </small>

     </div>  
</div>     
 
 

<!-- footer -->
<?php 
include ('include/profileNavfooter.php');
?>


<script>
    function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
</script>