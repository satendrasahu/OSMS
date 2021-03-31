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

    define('TITLE', 'Requester');
    define('PAGE','requester');
    include('includes/header.php');
?>

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->


<div class ="col-sm-10 col-md-10 mt-5">
    <div  class = " row mx-3 ">
        <a type="button" class="btn btn-info btn-lg btn-block fixed-bottom" href = "insertreq.php"> <b> Add new Requesters </b>
        <i class =" fas fa-plus"></i>
        </a>

    </div>
    <div class="row ml-5 ">
        <?php
            $sql = "SELECT * FROM requesterlogin_db";
            $result = $conn-> query($sql);
            if($result->num_rows >0)
            {
                echo '
                    <table class="table table-borderedless table-hover table-responsive-lg" style="height:550px;">
                        <thead class="bg-info ">
                            <th scope="col"> Request ID </th>
                            <th scope="col"> Name  </th>
                            <th scope="col"> Email</th>
                            <th scope="col"> Mobile  </th>
                            <th scope="col"> Profile</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Delete</th>
                            
                        </thead> 
            ';
            echo '  
    </div>    
    
    <div class= "row">    
                <tbody class="bg-secondary">';
                    while ($row = $result->fetch_assoc())
                    {
                        echo '<tr>
                                 <td>'.$row['r_login_id'].'</td>
                                 <td>'.$row['r_name'].'</td>
                                 <td>'.$row['r_email'].'</td>
                                 <td>'.$row['r_phone'].'</td>
                                 <td>'.$row['r_profileimage'].'</td>
                                 
                                 <td>
                                    <form action="editreq.php" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['r_login_id'].'> 
                                        <button type="submit" class="btn btn-warning" value="Edit" name="edit"> <i class="fas fa-pen"></i></button>
                                    
                                    </form>
                                 </td>
                                 <td> 
                                    <form action="" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['r_login_id'].'> 
                                        <button type="submit" class="btn btn-secondary" value="delete" name="delete"> <i class="far fa-trash-alt"></i></button>
                                     
                                    </form>
                                 </td>
                             </tr> ';
                        
                    }
            echo '       
                </tbody>
        </div>        
                ';
        }

        else
        {
            echo '<div class="alert alert-danger" role="alert"> Sry Admin, So No data Found ! </div>';
        }


        if(isset($_REQUEST['delete']))
        {
            $sql = " DELETE FROM requesterlogin_db WHERE r_login_id  = {$_REQUEST['id']}";
            if($conn -> query($sql) == TRUE)
            {
                echo '<meta http-eqive="refresh" content = "0; URL =?deleted"/>';
            }
            else
            {
                echo '<div class="alert alert-danger" role="alert"> Sry Unable to Delete! </div>';
            }
        }

        ?>
</div>
<!-- --------------------------------------------------------------------------------------------------------------------------------- -->

<!-- end of 1st row -->
</div>
<!-- end of container -->
</div>


<?php include('includes/Footer.php'); ?>