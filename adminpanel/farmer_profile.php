<?php
include "header.php";

?>
    
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active"><?php echo $fname;?> profile</li>
        </ol>
      </nav>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../uploads/<?php echo $_SESSION['profile']?>" alt="Profile" class="rounded-circle" style="width:150px; height:130px;">
              
              <h2><?php echo $_SESSION['fname'];?></h2>
              <h3><?php echo $_SESSION['usertype'];?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['fname']." ".$_SESSION['sname']." ".$_SESSION['lname'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['pnumber'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Factory Id</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['factoryid'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">bank name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['bankname'];?></div>
                  </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">bank branch</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['bankbranch'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">account number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['accountnumber'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">account name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['accountname'];?></div>
                  </div>
                    
                    <div class="row">
                    <div class="col-lg-3 col-md-4 label">collection center</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['collectioncenter'];?></div>
                  </div>


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="" method="post" enctype="multipart/form-data">
                      <?php


include "../db.php";



if (isset($_POST["update"])) {
  $id=$_GET['id'];

    $fname= $_POST["fname"];
    $sname= $_POST["sname"];
    $lname= $_POST["lname"];
    $email = $_POST["email"];
    $pnumber = $_POST["pnumber"];
    $bankname = $_POST["bankname"];
    $bankbranch = $_POST["bankbranch"];
    $accountnumber = $_POST["accountnumber"];
    $accountname = $_POST["accountname"];
    $collectioncenter= $_POST["collectioncenter"];

    $up_sql = "UPDATE `users` SET  `fname`='$fname',`sname`='$sname',`lname`='$lname',
                    `email`='$email',`pnumber`='$pnumber',`bankname`='$bankname',`bankbranch`='$bankbranch',`accountnumber`='$accountnumber',`accountname`='$accountname',`collectioncenter`='$collectioncenter' WHERE id ='$id'";

    $up_result=mysqli_query($conn,$up_sql);
    $up_result=mysqli_query($conn,$up_sql);

    if ($up_result){

        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-success'>Records have been updated!</p>";
        echo "</div>";


    }else{
        echo "Error executing query $up_sql".mysqli_error($conn);
    }



}


?>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" value="<?php echo $_SESSION['fname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">second name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sname" type="text" class="form-control" value="<?php echo $_SESSION['sname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">last name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lname" type="text" class="form-control" value="<?php echo $_SESSION['lname'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" value="<?php echo $_SESSION['email'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pnumber" type="tell" class="form-control" value="<?php echo $_SESSION['pnumber'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">bank name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="bankname" type="text" class="form-control" value="<?php echo $_SESSION['bankname'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">bank branch</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="bankbranch" type="text" class="form-control" value="<?php echo $_SESSION['bankbranch'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">account number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="accountnumber" type="text" class="form-control" value="<?php echo $_SESSION['accountnumber'];?>">
                      </div>
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">account name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="accountname" type="text" class="form-control" value="<?php echo $_SESSION['accountname'];?>">
                      </div>
                        
                    </div>
                      
                      <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">collection center</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="collectioncenter" type="text" class="form-control" value="<?php echo $_SESSION['collectioncenter'];?>">
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name='update' class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="" method="post">
                      
                      <?php


if(isset($_POST['reset'])){
    
    $password=md5($_POST['password']);
    $newpassword=$_POST['newpassword'];
    $renewpassword=$_POST['renewpassword'];
    $id=$_SESSION['id'];
    if($newpassword==$renewpassword){
        
        if(strlen($renewpassword)>=6){
            $storerenewpassword=md5($renewpassword);
    
    
    $rsql="SELECT password FROM users WHERE password='$password' and id='$id'";
    $rresults=mysqli_query($conn,$rsql);
    $datar=mysqli_num_rows($rresults);
    if($datar==1){
    if($rresults){
        
            
            $usql="UPDATE users SET password='$storerenewpassword' WHERE id='$id'";
            $uresults=mysqli_query($conn,$usql);
            if($uresults){
                echo "<div class='row m-2 text-center'>";
                echo "<p class='alert alert-success'>Password Changed successfully</p>";
                echo "</div>";
            }
            
        
    }
        
        
        
    }else{
        echo "<div class='row m-2 text-center'>";
           echo "<p class='alert alert-danger'>incorrect old password</p>";
           echo "</div>";
    }
        }else{
         echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>password should have atleast 6 characters</p>";
        echo "</div>";   
        }
        
        
}else{
        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>new  and confirm new password mismatch.</p>";
        echo "</div>";
    }
    }




?>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="reset" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <footer id="footer" class="footer" style="background-color: forestgreen;">
    <div class="copyright" style=" color:white;">
      &copy; Copyright <strong><span>Tea Factoy</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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