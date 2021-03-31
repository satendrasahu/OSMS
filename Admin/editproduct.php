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

    define('TITLE', 'Edit Product');
    define('PAGE','editproduct');
    include('includes/header.php');

    if(isset($_REQUEST['pupdate']))
    {
        $pid  = $_REQUEST['pid'];
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pava = $_REQUEST['pava'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];   

        $sql = "UPDATE assets_db SET pname = '$pname',pdop='$pdop',pava='$pava',ptotal='$ptotal',poriginalcost='$poriginalcost',psellingcost='$psellingcost' WHERE pid = '$pid'";

        if($conn->query($sql)==true)
        {
             $passmsg ='<div class="alert alert-success text-center" role="alert">Product Update successfully !</div>';
        }
        else
        {
             $passmsg ='<div class="alert alert-danger text-center" role="alert"> Unable to Update ! </div>';
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
                <h3> Update Product </h3>
            </div>
            <?php if(isset($_REQUEST['edit']))
            {
            $sql = "SELECT * FROM assets_db WHERE pid = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            }
            ?>
            <div class="card-body">
                <form action="" class="bg-light" method="POST">
                <div class="form-group">
                        <label for="pname">Product Id </label>
                        <input type="Number" class="form-control text-primary" id="pid" name="pid" value="<?php if(isset($row['pid'])){echo $row['pid'];} ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pname">Product Name </label>
                        <input type="text" class="form-control text-primary" id="pname" name="pname" value="<?php if(isset($row['pname'])){echo $row['pname'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pdop">Date of Purchase</label>
                        <input type="date" class="form-control text-primary" id="pdop" name="pdop" value="<?php if(isset($row['pdop'])){echo $row['pdop'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="product avalavility"> No Of Available </label>
                        <input type="number" class="form-control text-primary" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])){echo $row['pava'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label for=" toatal product"> Total No Of Product </label>
                        <input type="number" class="form-control text-primary" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)" value="<?php if(isset($row['ptotal'])){echo $row['ptotal'];} ?>">
                    </div>
                    <div class="form-group">
                        <label for="product original cost"> Original Cost Of Each </label>
                        <input type="number" class="form-control text-primary" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)" value="<?php if(isset($row['poriginalcost'])){echo $row['poriginalcost'];} ?>">
                    </div>
                    <div class="form-group">
                        <label for="product selling cost"> Selling Cost Of Each </label>
                        <input type="number" class="form-control text-primary" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" value="<?php if(isset($row['psellingcost'])){echo $row['psellingcost'];} ?>">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block" name = "pupdate" id="pupdate">Update</button>
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