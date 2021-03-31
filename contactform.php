<?php
// the contact form wont work with local host bu will work on live server

if(isset($_REQUEST['submit']))
{
//        $name = $_REQUEST['name'];
//        $subject = $_REQUEST['subject'];
//        $email = $_REQUEST['email'];
//        $message = $_REQUEST['message'];

//        $mailTo = "satendrasahu82@gmail.com";
//        $headers = "From: ".$email;
//        $txt = "You received an email from ".$name."\n\n".$message;
//        mail($mailTo,$subject,$txt,$headers);
//        $msg = '<div class="alert alert-success" role="alert">
//        msg sent successfully !
//      </div>';
}

?>




<div class="col-md-8 border ">


                    <form action="" method="POST" class="my-3">
                        <input type="text" class="form-control" name="name"
                               placeholder="Enter Name" required><br>

                        <input type="text" class="form-control" name="subject"
                               placeholder="Enter subject" required><br>

                        <input type="email" class="form-control" name="email"
                               placeholder="Enter Email" required><br>

                        <input type="tel" class="form-control" name="number"
                               placeholder="Enter Number" onkeypress="isInputNumber(event)" required><br>

                        <lable for="sussesion">Ask Your Query </lable>
                        <textarea class="form-control" name="message"
                                  placeholder="How  can we help you ? "
                                  style="height:150px;" required>
                        </textarea><br>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary " value="send"
                                   name="submit"><br>
                        </div>

                    </form>
                </div>
