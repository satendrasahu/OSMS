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

    define('TITLE', 'Sell Product');
    define('PAGE','sellproduct');
    include('includes/header.php');

    if(isset($_REQUEST['psubmit']))
    {
        $pid  = $_REQUEST['pid'];
        $pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];

        $custname = $_REQUEST['cname'];
        $custadd = $_REQUEST['cadd'];
        $cpname = $_REQUEST['pname'];
        $cpquantity = $_REQUEST['pquantity'];
        $cptotal = $_REQUEST['ptotalcost'];
        $cpeach = $_REQUEST['psellingcost'];
        $cpdate = $_REQUEST['selldate'];   

        $sql = "INSERT INTO customer_db (custname,custadd,cpname,cpquantity,cpeach,cptotal,cpdate) 
        VALUES ('$custname','$custadd','$cpname','$cpquantity','$cpeach','$cptotal','$cpdate')" ;

        if($conn -> query($sql) == TRUE)
        {
            $genid = mysqli_insert_id($conn);

            //session_start();
            $_SESSION['myid'] = $genid;
            echo "<script> location.href ='productsellsuccess.php';</script>"; 
        }

        $sqlup = "UPDATE assets_db SET pava = '$pava' WHERE pid = '$pid'";
        $conn->query($sqlup);
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
                <h3> Customer Bill </h3>
            </div>
            <?php if(isset($_REQUEST['issue']))
            {
            $sql = "SELECT * FROM assets_db WHERE pid = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            }
            ?>
            <div class="card-body">
                <form action="" class="bg-light" method="POST">
                <div class="form-group">
                <?php if(isset($row['pid'])){echo $row['pid'];} ?>
                        <label for="pic">Product Id </label>
                        <input type="Number" class="form-control text-primary" id="pid" name="pid" value="<?php if(isset($row['pid'])){echo $row['pid'];} ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cname">Customer Name </label>
                        <input type="text" class="form-control text-primary" id="cname" name="cname"  required>
                    </div>
                    <div class="form-group">
                        <label for="cadd">Customer Address </label>
                        <input type="text" class="form-control text-primary" id="cadd" name="cadd"  required>
                    </div>
                    <div class="form-group">
                        <label for="pname">Product Name </label>
                        <input type="text" class="form-control text-primary" id="pname" name="pname" value="<?php if(isset($row['pname'])){echo $row['pname'];} ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="product avalavility"> No Of Available </label>
                        <input type="number" class="form-control text-primary" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])){echo $row['pava'];} ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for=" quantity"> Quantity</label>
                        <input type="number" class="form-control text-primary" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="price of each product"> Price Of Each Product </label>
                        <input type="number" class="form-control text-primary" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" value="<?php if(isset($row['psellingcost'])){echo $row['psellingcost'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="total price"> Total Price Of Product </label>
                        <input type="number" class="form-control text-primary" id="ptotalcost" name="ptotalcost" onkeypress="isInputNumber(event)"  required>
                    </div>
                    <div class="form-group">
                        <label for="total price"> Delivery Date </label>
                        <input type="date" class="form-control text-primary" id="selldate" name="selldate" onkeypress="isInputNumber(event)"  required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block" name = "psubmit" id="psubmit">Create Bill</button>
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