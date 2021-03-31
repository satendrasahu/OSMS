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
    define('TITLE', 'Technitian');
    define('PAGE','technitian');
    include('includes/header.php');
?>

<!-- ----------------------------------------------------------------------------------------------------------- -->


<div class ="col-sm-10 col-md-10 mt-5">
    <div  class = " row mx-3 text-center ">
    <a type="button" class="btn btn-info btn-lg btn-block " > <b> List of Technitians </b>
        <i class =" fa fa-list"></i>
        </a>      
    </div>
    <div  class = " row mx-3 ">
        <a type="button" class="btn btn-info btn-lg btn-block fixed-bottom" href = "insertemp.php"> <b> Add new Requesters </b>
        <i class =" fas fa-plus"></i>
        </a>

    </div>
    <div class="row ml-5 ">
        <?php
            $sql = "SELECT * FROM technitian_db";
            $result = $conn-> query($sql);
            if($result->num_rows >0)
            {
                echo '
                    <table class="table table-borderedless table-hover table-responsive-lg text-white" style="height:550px;">
                        <thead class="bg-info ">
                            <th scope="col"> Employee ID </th>
                            <th scope="col"> Employee Name </th>
                            <th scope="col"> Employee City</th>
                            <th scope="col"> Employee Mobile </th>
                            <th scope="col"> Employee Email</th>
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
                                 <td>'.$row['empid'].'</td>
                                 <td>'.$row['empname'].'</td>
                                 <td>'.$row['empcity'].'</td>
                                 <td>'.$row['empmobile'].'</td>
                                 <td>'.$row['empemail'].'</td>
                                 
                                 <td>
                                    <form action="editemp.php" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['empid'].'> 
                                        <button type="submit" class="btn btn-warning" value="Edit" name="edit"> <i class="fas fa-pen"></i></button>
                                    
                                    </form>
                                 </td>
                                 <td> 
                                    <form action="" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['empid'].'> 
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
            $sql = " DELETE FROM technitian_db WHERE empid  = {$_REQUEST['id']}";
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



<!-- ----------------------------------------------------------------------------------------------------------- -->


<!-- opening tag of these to div is in includes/Header.php file -->
</div>
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>