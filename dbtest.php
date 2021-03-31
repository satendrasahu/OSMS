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
    define('TITLE', 'Work');
    define('PAGE','work');
    include('includes/header.php');
?>

<!-- start second column -->
<div class ="col-sm-10 col-md-10 mt-5">
    <div class="row ml-4">
    <?php
        $sql = "SELECT * FROM assignwork_db";
        $result = $conn-> query($sql);
        if($result->num_rows >0)
        {
            echo '
                <table class="table table-borderedless table-responsive">
                    <thead class="bg-info ">
                        <th scope="col"> Request ID </th>
                        <th scope="col"> Request Title  </th>
                        <th scope="col"> Requester Name</th>
                        <th scope="col"> Requester Address  </th>
                        <th scope="col"> Requester Mobile </th>
                        <th scope="col"> RequesterEmail </th>
                        <th scope="col"> Reqest date </th>
                        <th scope="col"> Technitian </th>
                        <th scope="col"> Assigned Date </th>
                        <th scope="col"> Action view </th>
                        <th>Action Delete</th>
                    </thead> 
            ';
            echo ' 
    </div>        
    <div class= "row">    
    <tbody class="bg-light">';
                    while ($row = $result->fetch_assoc())
                    {
                        echo '<tr>
                                 <td>'.$row['request_id'].'</td>
                                 <td>'.$row['request_info'].'</td>
                                 <td>'.$row['requester_name'].'</td>
                                 <td>'.$row['requester_add1'].'</td>
                                 <td>'.$row['requester_mobile'].'</td>
                                 <td>'.$row['requester_email'].'</td>
                                 <td>'.$row['request_date'].'</td>
                                 <td>'.$row['assign_tech'].'</td>
                                 <td>'.$row['assign_date'].'</td>
                                 <td>
                                    <form action="viewassignwork.php" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['request_id'].'> 
                                        <button type="submit" class="btn btn-warning" value="view" name="view"> <i class="far fa-eye"></i></button>
                                    
                                    </form>
                                 </td>
                                 <td> 
                                    <form action="" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['request_id'].'> 
                                        <button type="submit" class="btn btn-secondary" value="delete" name="delete"> <i class="far fa-trash-alt"></i></button>
                                     
                                    </form>
                                 </td>
                             </tr> ';
                        
                    }
            echo '       
                </tbody>
                ';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert"> Sry No data Found ! </div>';
        }


        if(isset($_REQUEST['delete']))
        {
            $sql = " DELETE FROM assignwork_tb WHERE request_id  = {$_REQUEST['id']}";
            if($conn -> query($sql) == TRUE)
            {
                echo '<meta http-eqive="refresh" content = "0; URL =?deleted"/>';
            }
            else
            {
                echo "Unable to Delete Data ";
            }
        }
    ?>
</div>




<!-- opening tag of these to div is in includes/Header.php file -->

<!-- end of row div -->
</div>
<!-- end of container div -->
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>