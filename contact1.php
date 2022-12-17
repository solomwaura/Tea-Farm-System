              <?php
              
              include 'db.php';
                  $name=$_POST['name'];
                  $email=$_POST['email'];
                  $subject=$_POST['subject'];
                  $message=$_POST['message'];
                  
                  $sql="INSERT INTO messages(name,email,subject,message,status,response )VALUES('$name','$email','$subject','$message','','')";
                  $results=mysqli_query($conn,$sql);
                  if($results){
                      echo "<div class='alert alert-success'>";
                        echo "Message Sent successfully";
                        echo "</div>";
                  }else{
                      echo "<div class='alert alert-success'>";
                        echo "Failed!!";
                        echo "</div>";
                              }
              
              
              
              ?>