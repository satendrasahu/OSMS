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

    define('TITLE', 'Add Product');
    define('PAGE','addproduct');
    include('includes/header.php');

    if(isset($_REQUEST['psubmit']))
    {
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pava = $_REQUEST['pava'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];   

        $sql = "INSERT INTO assets_db(pname,pdop,pava,ptotal,poriginalcost,psellingcost)
        VALUES ('$pname','$pdop','$pava','$ptotal','$poriginalcost','$psellingcost')";

        if($conn->query($sql)==true)
        {
             $passmsg ='<div class="alert alert-success text-center" role="alert">Product Added successfully !</div>';
        }
        else
        {
             $passmsg ='<div class="alert alert-danger text-center" role="alert"> Unable to Add ! </div>';
        }

    }
    
?>


<!-- ************************************************************************************************************************************ -->



<div class="col-sm-10 col-md-10 my-5 table-responsive jumbotron">
        <div class="text-center">   
            <?php if(isset($passmsg)) { echo $passmsg; } ?>   
        </div>
        <div class="card">
            <div class="card-header bg-info text-center text-white"> 
                <h3>Assign New Product </h3>
            </div>
            <div class="card-body">
                <form action="" class="bg-light" method="POST">
                
                    <div class="form-group">
                        <label for="pname">Product Name </label>
                        <input type="text" class="form-control text-primary" id="pname" name="pname" placeholder="enter product name" required>
                    </div>
                    <div class="form-group">
                        <label for="pdop">Date of Purchase</label>
                        <input type="date" class="form-control text-primary" id="pdop" name="pdop" required>
                    </div>
                    <div class="form-group">
                        <label for="product avalavility"> No Of Available </label>
                        <input type="number" class="form-control text-primary" id="pava" name="pava" onkeypress="isInputNumber(event)" placeholder="enter product Availability" required>
                    </div>
                    <div class="form-group">
                        <label for=" toatal product"> Total No Of Product </label>
                        <input type="number" class="form-control text-primary" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)" placeholder="enter total no of product" required>
                    </div>
                    <div class="form-group">
                        <label for="product original cost"> Original Cost Of Each </label>
                        <input type="number" class="form-control text-primary" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)" placeholder="enter Original cost" required>
                    </div>
                    <div class="form-group">
                        <label for="product selling cost"> Selling Cost Of Each </label>
                        <input type="number" class="form-control text-primary" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" placeholder="enter sellling cost" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block" name = "psubmit" id="psubmit">Submit</button>
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <a href="assets.php" class="btn btn-secondary btn-lg btn-block">Close</a>
                        </div>
                    </div>
                 </form>
            </div>
        </div>    
    </div>

<!-- ************************************************************************************************************************************** -->

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