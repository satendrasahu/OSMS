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

    define('TITLE', 'Product Sell Success');
    define('PAGE','productsellsuccess');
    include('includes/header.php');

    $sql = "SELECT * FROM customer_db Where custid = {$_SESSION['myid']}";
    $result = $conn-> query($sql);
    
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        echo '<div class="ml-5 mt-5">
                  <div id="printableTable">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Customer ID</th>
                                <td>'.$row['custid'].'</td>
                            <tr>
                            <tr>
                                <th> Customer Name</th>
                                <td>'.$row['custname'].'</td>
                            <tr>
                            <tr>
                                <th> Cust Address </th>
                                <td>'.$row['custadd'].'</td>
                            <tr>
                            <tr>
                                <th> Product Name </th>
                                <td>'.$row['cpname'].'</td>
                            <tr>
                            <tr>
                                <th> Qunantity </th>
                                <td>'.$row['cpquantity'].'</td>
                            <tr>
                            <tr>
                                <th> Cost Each Product </th>
                                <td>'.$row['cpeach'].'</td>
                            <tr>
                            <tr>
                                <th> Total Price</th>
                                <td>'.$row['cptotal'].'</td>
                            <tr>
                            <tr>
                                <th> Selling Date </th>
                                <td>'.$row['cpdate'].'</td>
                            <tr>
                            <tr>
                            
                            </tr>
                        <tbody>
                    </table>
                    
                  </div>  
                  <input class="btn btn-danger" type="submit" value="print" onclick="printDiv()">
                  <iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>
                   <a href="assets.php" class="btn btn-secondary ">Close</a>
                               
            </div>';

    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">
              Failed!
             </div>';
    }       
?>



<script>
    function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
</script>

<!-- opening tag of these to div is in includes/Header.php file -->
</div>
</div>
<!-- end of that first row -->
<?php include('includes/Footer.php'); ?>