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
   
    define('TITLE', 'Request');
    define('PAGE','request');
    include('includes/header.php');
?>

<!-- end of first col in first row -->

<!-- start  2nd Column -->

<div class="col-sm-4 col-md-4 my-5 ">


<?php
                        $sql = "   SELECT request_id, request_info, request_desc, request_date FROM submitrequest_db";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        { 
                                        echo '<div class="table-responsive"  >';
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo '
                                                <div class = " card mx-5 mb-5 " style="heigth:200px;">
                                                    <div class="card-header bg-primary">
                                                       <b> Request ID :'.$row['request_id'].' </b>
                                                        <p class="card-text float-right"><b>Req-Date : </b>'.$row['request_date'].'</p>
                                                    </div>
                                                    <div class ="card-body  table-responsive" style="height: 180px;>
                                                        <p class="card-title"><b>Req-Title : </b>'.$row['request_info'].'</P>
                                                        <p class="card-text"><b>Req-Desc : </b>'.$row['request_desc'].'</p>
                                                       

                                                    </div>
                                                    <form>
                                                        <input type="hidden" name="id" value ='.$row['request_id'].'>
                                                        <div class="row">
                                                            <div class=" col-sm-6 col-md-12 col-lg-6 p-3 m-0">
                                                                <button type="submit" class="btn btn-success btn-lg btn-block " name="view" value="view">view</button>
                                                            </div>
                                                            <div class=" col-sm-6 col-md-12 col-lg-6 p-3 m-0">    
                                                                <button type="submit" class="btn btn-danger btn-lg btn-block" value="close" name="close">close</button>
                                                            </div>    
                                                        </div>
                                                    </form>
                                                </div>
                                                ';
                                        }    
                                        echo '</div>';
                        }
                        else{
                            echo '<div class="alert alert-success text-center mt-3" role="alert"> Sry Mr/Mrs. Admin, No one Request found !</div>';
                        }
 ?>


</div>
<!-- end second col -->



    
    <!-- 3rd col start-->
         
        <?php include('assignworkform.php'); ?>

  <!-- 3rd col end -->


<!-- opening tag of these to div is in includes/Header.php file -->
</div>
</div>
<!-- end of that first row -->
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
<?php include('includes/Footer.php'); ?>