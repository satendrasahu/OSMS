<?php
    include('dbConnection.php');

    if(isset($_REQUEST['rSignup']))
    {
        if(
            ($_REQUEST['rName']=="") ||
            ($_REQUEST['rEmail']=="") ||
            ($_REQUEST['rPassword']=="") ||
            ($_REQUEST['rPhone']=="") ||
            ($_REQUEST['rGender']=="") ||
            ($_REQUEST['rAbout']=="") ||
            ($_REQUEST['rTermsAndCodition']=="")
        )
        {
            $regmsg = '<div class="alert alert-danger mt-2 container-fluid" role="alert">"Oh - no" Please fill all the details ! </div>';
        }
        else{
            
            
                $sql = "SELECT r_email FROM  requesterlogin_db WHERE r_email = '".$_REQUEST['rEmail']."'";
                $result = $conn->query($sql);
                if($result->num_rows==1)
                {
                    $regmsg = '<div class="alert alert-warning mt-2 container-fluid" role="alert">"Oh - no" This email is already registerd ! </div>';   
                }
                else{
                        $rName = $_REQUEST['rName'];
                        $rEmail = $_REQUEST['rEmail'];
                        $rPassword = $_REQUEST['rPassword'];
                        $rPhone = $_REQUEST['rPhone'];
                        $rGender = $_REQUEST['rGender'];
                        $rAbout = $_REQUEST['rAbout'];
                        $rTermAndCodition = $_REQUEST['rTermsAndCodition'];

                        echo "$rName";
                        echo "$rEmail";
                        echo "$rPassword";
                        echo "$rPhone";
                        echo "$rGender";
                        echo "$rAbout";
                        echo "$rTermAndCodition";

                        $sql = " INSERT INTO  requesterlogin_db(r_name,r_email,r_password,r_phone,r_gender,r_about,r_termandconditions) 
                        VALUES('$rName','$rEmail','$rPassword','$rPhone','$rGender','$rAbout','$rTermAndCodition')";

                         //   echo $sql;


                            if($conn->query($sql)== true)
                            {
                                $regmsg = '<div class="alert alert-success" role="alert"> Awesome, Your account created successfully </div>';
                            }
                            else
                            {
                                $regmsg = '<div class="alert alert-warning mt-2 container-fluid" role="alert">"Oh - no" Something is wrong ! </div>';   
                            }
                    }
             }
    }
?>





        <main class="primary-background p-5" id="registration">
            <div class="container">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header  text-white text-center bg-primary">
                            <i class="fa fa-3x fa-user-circle"></i> <br>
                            Create an account

                        </div>
                        <div class="card-body">
                            <form action="" class="" method="POST">
                            <?php if(isset($regmsg)){echo $regmsg; } ?>
                                <!--name-->
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <label for="name">User Name</label>
                                    <input  name="rName" type="text" class="form-control" required placeholder="Enter Name">
                                </div>

                                <!--email-->
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <label for="email">Email address</label>
                                    <input name="rEmail" type="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter Email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                                </div>

                                <!--password-->

                                <div class="form-group">

                                    <i class="fa fa-key fa-fw"></i>
                                    <label for="pass">Password</label>
                                    <input name="rPassword" type="password" class="form-control" id="exampleInputPassword1" required placeholder="Password">
                                </div>

                                <!--contact no-->
                                <div class="form-group">
                                    
                                    <i class="fas fa-mobile"></i>
                                    <label for="">phone no</label>
                                    <input name="rPhone" type="tel" class="form-control" onkeypress="isInputNumber(event)"  required  placeholder="Enter No">
                                    <small id="contactHelp" class="form-text text-muted">We'll never share your no with anyone else.</small>

                                </div>

                                <!--gender-->

                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <label for="gender">Select Gender</label><br>
                                    <input type="radio" id="gender" name="rGender" value="male"  required >Male
                                    <input type="radio" id="gender" name="rGender" value="female"  required >Female
                                </div>

                                <!--text Area about user-->
                                <div class="form-group">
                                    <textarea name="rAbout" class="form-control" id=""  rows="5" placeholder="write about your self"></textarea>
                                    <small id="emailHelp" class="form-text text-muted">don't use single quot ('' or ') here,else u will get error.
                                        but you can use double quot("") </small>

                                </div>


                                <!--check box for condition-->
                                <div class="form-group form-check">
                                    <input name="rTermsAndCodition" type="checkbox" class="form-check-input" id="exampleCheck1"  required value="checked">
                                    <label class="form-check-label" for="exampleCheck1"> Agree Terms & Conditions</label>
                                </div><br>
                                <div class="container text-center" id="loader" style="display : none;">
                                    <span class="fa fa-refresh fa-spin fa-4x"></span>
                                    <h4> Please Wait...</h4>
                                </div>
                                <div class="container text-center">
                                    <button  type="submit" class="btn btn-primary " name="rSignup">Submit</button>
                                </div>

                                

                            </form>

                        </div>
                        <div class="card-footer bg-primary text-white text-center">
                            <h3> Thanks for visiting ☻ </h3>
                        </div>


                    </div>
                </div>
            </div>
        </main>

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
