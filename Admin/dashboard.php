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
    define('TITLE', 'Dashboard');
    define('PAGE','dashboard');
    include('includes/header.php');  

    // total  no of request receive till now
    $sql = "SELECT max(request_id) FROM submitrequest_db";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $submitrequest = $row[0];

    // total noof work assign till now
    $sql = "SELECT max(rno) FROM assignwork_db";
    $result = $conn->query($sql);
    $totaltech = $result->num_rows;

    // total noof work assign till now
    $sql = "SELECT * FROM technitian_db";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $assignwork = $row[0];
?>
        <!-- end 1st col -->

        <!-- start 2nd col -->
        <div class="col-sm-9 col-md-9 mt-5 mx-4 ">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="card text-center text-white ">
                        <div class="card-header bg-primary "style ="height:65px;">
                            Requests Received Till Now
                        </div>
                        <div class="card-body ">
                             <h3 class="card-title text-dark"><?php echo $submitrequest; ?></h3>
                        </div>
                        <div class="card-footer bg-info">
                             <a class="btn text-white" href="request.php">View</a>
                        </div>
                    </div>
                </div>
                 
                <div class="col-sm-4 col-md-4">
                    <div class="card text-center text-white ">
                        <div class="card-header bg-primary" style ="height:65px;">
                            Assigned Work Till Now
                        </div>
                        <div class="card-body ">
                             <h3 class="card-title text-dark"><?php echo $assignwork; ?></h3>
                        </div>
                        <div class="card-footer bg-info">
                             <a class="btn text-white" href="work.php">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="card text-center text-white">
                        <div class="card-header bg-primary "style ="height:65px;">
                            No of Technitians joined Till Now
                        </div>
                        <div class="card-body ">
                             <h3 class="card-title text-dark"><?php echo $assignwork; ?></h3>
                        </div>
                        <div class="card-footer bg-info">
                             <a class="btn text-white" href="technitian.php">View</a>
                        </div>
                    </div>
                </div>
             </div>
            <!-- end 1st row  -->
            <!-- start 2-nd row -->
            

            <div class="row border mt-4">
                <div class=" col-sm-12 col-md-12 bg-info text-white text-center">
                    <h3> List of Requesters </h3>
                </div>
                <div class=" col-sm-12 col-md-12 bg-secondary text-white text-center">
                    <?php
                        $sql = "   SELECT * FROM requesterlogin_db";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            echo '
                                <table class="table text-white table table-hover table-responsive-sm"style="height:550px;">
                                    <thead>
                                        <tr>
                                            <th scope="col"> Requester ID</th>
                                            <th scope="col"> Name</th>
                                            <th scope="col"> Email</th>
                                        <tr>
                                    <thead>
                                    <tbody>';
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo'<tr>';
                                            echo '<td>'.$row["r_login_id"].'</td>';
                                            echo '<td>'.$row["r_name"].'</td>';
                                            echo '<td>'.$row["r_email"].'</td>';
                                            echo'</tr>';
                                        }    
                                      echo '</tbody>
                                <table>
                            ';
                        }
                        else{
                            echo '<div class="alert alert-success text-center mt-3" role="alert"> Sry Mr/Mrs. Admin, No one Requester found !</div>';
                        }
                    ?>
                </div>
                 
            </div>
        
         
        <!-- end 3-rd col -->

<!-- opening tag of these to div is in includes/Header.php file -->
    </div>
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>