<?php
include "header.php";

?>
     <main id="main" class="main">
         
    <div class="pagetitle">
      <h1>REGISTER FARMER</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Add farmer</li>
        </ol>
      </nav>
    </div>
         
         <div class="card p-5">
             <div class="card-title">
             <h5>Enter Detail To Add a farmer</h5><hr>
                
             </div>
             <div class="card-body" id="registeradminform">
                 <div class="row m-1">
                 <h4 class="col-12">
    <?php
    include "../db.php";
    if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pnumber=$_POST['pnumber'];
    $usertype=$_POST['usertype'];
    $collectioncenter=$_POST['collectioncenter'];
    $bankname=$_POST['bankname'];
    $bankbranch=$_POST['bankbranch'];
    $accountnumber=$_POST['accountnumber'];
    $accountname=$_POST['accountname'];

    $bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);

    $password=md5($pass);


    $token="SELECT * FROM `token` ORDER BY id DESC";
    $to=mysqli_query($conn,$token);
    $tokenrow=mysqli_fetch_array($to);
    $num=$tokenrow['token'];
    $name="TFMS";
    $number=++$num;
    $year=date("y");
    $factoryid= "$name"."/"."$number"."/"."$year";
   
    
    $user_query="SELECT * FROM users WHERE email='$email' OR factoryid='$factoryid'";
    $results=mysqli_query($conn, $user_query);
    $user=mysqli_fetch_array($results);
    if($user){
        if($user['email']==$email){
            echo "<div class='alert alert-danger'>";
            echo "Email already exist";
            echo "</div>";
        }
        
    }else{ 
        $sql3="INSERT INTO `users`(`fname`, `sname`, `lname`, `email`, `pnumber`, `usertype`,profile,`password`, `factoryid`, `bankname`, `bankbranch`, `accountnumber`, `accountname`, `collectioncenter`,`pass`) VALUES ('$fname','$sname','$lname','$email','$pnumber','$usertype','avatar.jpg','$password','$factoryid','$bankname','$bankbranch','$accountnumber','$accountname','$collectioncenter','$pass')";
        $results=mysqli_query($conn,$sql3);
            if($results){

                $sql4="INSERT INTO `token` (`token`) VALUES ('$number')";
                $sql4res=mysqli_query($conn,$sql4);
                
                echo "<div class='alert alert-success'>";
                echo "Registered Successfully Check Your Email For Farmer Id And Password";
                echo "</div>";


            }else{
                echo "something went wrong";
            }
        // $to = $email;
        // $subject = "Farmerid And Password";
        // $msg = 'Hello '.$fname.',
        // Your farmer Id is '.$factoryid.'
        // Your login password is: '.$pass.'';
        // $msg = wordwrap($msg,70);
        // $headers = "From:bablinetfms.tea.com";
        // ini_set('SMTP','smtp.gmail.com');
        // ini_set('smtp_port',587);
        // ini_set("sendmail_from", "babline@ tfms.com");
        // $mail=mail($to, $subject, $msg, $headers);
    }
    //   if($mail){

    //                 $sql3="INSERT INTO `users`(`fname`, `sname`, `lname`, `email`, `pnumber`, `usertype`,profile,`password`, `factoryid`, `bankname`, `bankbranch`, `accountnumber`, `accountname`, `collectioncenter`,`pass`) VALUES ('$fname','$sname','$lname','$email','$pnumber','$usertype','avatar.jpg','$password','$factoryid','$bankname','$bankbranch','$accountnumber','$accountname','$collectioncenter','$pass')";
    //                 $results=mysqli_query($conn,$sql3);
    //                     if($results){
        
    //                       $sql4="INSERT INTO `token` (`token`) VALUES ('$number')";
    //                       $sql4res=mysqli_query($conn,$sql4);
                          
    //                       echo "<div class='alert alert-success'>";
    //                       echo "Registered Successfully Check Your Email For Farmer Id And Password";
    //                       echo "</div>";
        
        
    //                     }else{
    //                         echo "something went wrong";
    //                     }  
    //   }else{
    //   echo "Email not Sent Register again";
    //   }
                
    }
        

?>
                 </h4>
             </div>
                 
                 <form action="add_farmer.php" method="post" enctype="multipart/form-data">
                      <div class="row m-1">
                         <div class="col">
                             <div>
                             <label>First Name</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="fname" required>
                                 </div>
                         </div>
                         <div class="col">
                             <div>
                             <label>Second Name</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="sname" required>
                                 </div>
                         </div>
                     </div>
                    
                     
                     
                     <div class="row m-1">
                         <div class="col-12">
                             <div>
                             <label>Last Name</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="lname" required>
                                 </div>
                         </div>
                     </div>
                     
                     <div class="row m-1">
                         <div class="col">
                             <div>
                             <label>Phone Number</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="tel" name="pnumber" placeholder="+254 format" required>
                                 </div>
                         </div>
                         <div class="col">
                             <div>
                             <label>Email Address</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="email" name="email" required>
                                 </div>
                         </div>
                     </div>
                     
                     <div class="row m-1">
                         <div class="col-12">
                             <div>
                             <label>User type</label>
                                 </div>
                             <div>
                                 <select name="usertype" class="col-12 p-2" style="border:1px solid green; border-radius:6px;">
                                     <option value="user">User</option>
                                 </select>
                                 </div>
                         </div>
                     </div>
                     
                      <div class="row m-1">
                         <div class="col">
                             <div>
                             <label>Collection Centers</label>
                                 </div>
                             <div>
                             <select name="collectioncenter" class="col-12 p-2" style="border:1px solid green; border-radius:6px;">
                                     <option value="center 1">center 1</option>
                                     <option value="center 2">center 2</option>
                                     <option value="center 3">center 3</option>
                                     <option value="center 4">center 4</option>
                                 </select>
                                 </div>
                         </div>
                         <div class="col">
                             <div>
                             <label>Bank Name</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="bankname" required>
                                 </div>
                         </div>
                     </div>
                     
                      <div class="row m-1">
                         <div class="col">
                             <div>
                             <label>Bank Branch</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="bankbranch" required>
                                 </div>
                         </div>
                         <div class="col">
                             <div>
                             <label>Account Number</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="accountnumber" required>
                                 </div>
                         </div>
                     </div>
                     
                      <div class="row m-1">
                         <div class="col">
                             <div>
                             <label>Account Name</label>
                                 </div>
                             <div>
                             <input class="col-12 p-2" style="border:1px solid green; border-radius:6px;" type="text" name="accountname" required>
                                 </div>
                                  </div>
                                 </div>
                         </div>
                     </div>
                     <div class="row m-1">
                     <div style="padding-top:5px;">
                     <input style="background-color:orange; color:white; width:150px; border-radius:10px;padding:1%; border:none;" type="submit" name="submit" value="REGISTER">
                         
                         <a href="add_farmer.php"><input style="background-color:forestgreen; color:white; width:150px; border-radius:10px;padding:1%; border:none;" type="button" name="submit" value="CLEAR FORM"></a>
                         </div>
                         </div>
                     
                 </form>
             
             </div>
         
         
         </div>
    
    
    
    
    
    </main>
    
    
    
    
    
    
    
    
     <footer id="footer" class="footer" style="background-color: forestgreen;">
    <div class="copyright" style=" color:white;">
      &copy; Copyright <strong><span>Tea Factoy</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a style="background-color:orange;"href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>