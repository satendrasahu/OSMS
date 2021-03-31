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

    define('TITLE', 'Assets');
    define('PAGE','assets');
    include('includes/header.php');
?>




<div class ="col-sm-10 col-md-10 mt-5">
    <div  class = " row mx-3 text-center ">
    
        <a type="button" class="btn btn-info btn-lg btn-block " > <i class =" fa fa-list"></i> <b> List of Assets </b> 
        </a>      
</div>
    <div  class = " row mx-3 ">
        <a type="button" class="btn btn-info btn-lg btn-block fixed-bottom" href = "addproduct.php"> <b> Add new Requesters </b>
        <i class =" fas fa-plus"></i>
        </a>

    </div>
    <div class="row ml-5 ">
        <?php
            $sql = "SELECT * FROM assets_db";
            $result = $conn-> query($sql);
            if($result->num_rows >0)
            {
                echo '
                    <table class="table table-borderedless table-hover table-responsive-lg text-white" style="height:550px;">
                        <thead class="bg-info ">
                            <th scope="col"> Product ID </th>
                            <th scope="col">  Name </th>
                            <th scope="col"> Date Of Purchase</th>
                            <th scope="col"> Available</th>
                            <th scope="col"> Total</th>
                            <th scope="col"> Original Cost Each</th>
                            <th scope="col"> Selling Cost Each</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Delete</th>
                            <th scope="col"> Billing</th>
                        </thead> 
            ';
            echo '  
    </div>    
    
    <div class= "row">    
                <tbody class="bg-secondary">';
                    while ($row = $result->fetch_assoc())
                    {
                        echo '<tr>
                                 <td>'.$row['pid'].'</td>
                                 <td>'.$row['pname'].'</td>
                                 <td>'.$row['pdop'].'</td>
                                 <td>'.$row['pava'].'</td>
                                 <td>'.$row['ptotal'].'</td>
                                 <td>'.$row['poriginalcost'].'</td>
                                 <td>'.$row['psellingcost'].'</td>
                                 
                                 <td>
                                    <form action="editproduct.php" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['pid'].'> 
                                        <button type="submit" class="btn btn-warning" value="Edit" name="edit"> <i class="fas fa-pen"></i></button>
                                    
                                    </form>
                                 </td>
                                 <td> 
                                    <form action="" method="POST">
                                        <input type ="hidden" name ="id" value='.$row['pid'].'> 
                                        <button type="submit" class="btn btn-secondary" value="delete" name="delete"> <i class="far fa-trash-alt"></i></button>
                                     
                                    </form>
                                 </td>
                                 <td>
                                 <form action="sellproduct.php" method="POST">
                                     <input type ="hidden" name ="id" value='.$row['pid'].'> 
                                     <button type="submit" class="btn btn-success" value="issue" name="issue"> <i class="fas fa-handshake"></i></button>
                                 
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
            $sql = " DELETE FROM assets_db WHERE pid  = {$_REQUEST['id']}";
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





<!-- opening tag of these to div is in includes/Header.php file -->
</div>
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>