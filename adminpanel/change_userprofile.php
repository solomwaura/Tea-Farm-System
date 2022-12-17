                      <?php
                     session_start();

                      include "../db.php";
                          $fname= $_POST["fname"];
                          $sname= $_POST["sname"];
                          $lname= $_POST["lname"];
                          $email = $_POST["email"];
                          $pnumber = $_POST["pnumber"];


                          $up_sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`lname`='$lname',
                                          `email`='$email',`pnumber`='$pnumber' WHERE email ='$email'";
                          $up_result=mysqli_query($conn,$up_sql);

                          if ($up_result){


                              echo "<div class='row m-2 text-center'>";
                              echo "<p class='alert alert-success'>Records have been updated!</p>";
                              echo "</div>";


                          }else{
                              echo "Error executing query $up_sql".mysqli_error($conn);
                          }



                      ?>