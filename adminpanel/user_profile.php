<?php
include "header.php";
include "../db.php";


?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../uploads/<?php 
              echo $photo; 
              ?> "
               alt="" class="rounded-circle" style="width:150px; height:130px;">
               


<div class="row">
  <div class="col p-0">

              <i class="fa fa-pencil-square-o fa-2x text-success" aria-hidden="true" data-toggle="modal" data-target="#myModal"></i>
            </div>
            <div class="col p-0">
              <a href='removeprofile.php?id=<?php echo $id ?>'><i class="fa fa-trash fa-2x text-danger"></i></a>
            </div>
            </div>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
        <h4 style="color:green;" class="modal-title">Change profile picture</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <?php
          if(isset($_POST['submit'])){

            $profile=$_FILES['photo']['name'];
            $tempprofile=$_FILES['photo']['tmp_name'];
            $profilefolder="../uploads/".$profile;


            $up_sq = "UPDATE `users` SET profile='$profile' WHERE email ='$email'";
            $up_resul=mysqli_query($conn,$up_sq);
            if(move_uploaded_file($tempprofile,$profilefolder)){
            }

            if ($up_resul){
              echo "<a class='btn btn-primary col-md-4' href='user_profile.php'>BACK</a>";
             

            }else{
                echo "Error executing query $up_sq".mysqli_error($conn);
            }
            
          }


          ?>

        <div class="modal-body">
         <div class="form-group">
           <label>Browse Your Profile</label><br>

      <input style="width:100%;" type="file" name="photo" class="form-control-file border mt-2" required>
    </div>
          
        </div>
        <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-success">Change</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
</form>
        
      </div>
    </div>
  </div>

              <h2><?php echo $firstname?></h2>
              <h3><?php echo $type;?></h3>
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

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
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


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <form action="" method="post" enctype="multipart/form-data" id="myform1">
                    <div id="response">
                    </div>

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
                        <input name="pnumber" type="text" class="form-control" value="<?php echo $_SESSION['pnumber'];?>">
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
                  <form action="" method="post" id="myForm">

                    <div class="row mb-3" id="postData">
                    </div>
                    <div class="row mb-3" class="reset">
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
  <script src="../bootsrap/js/bootstrap.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#myForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "changepass.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $("#postData").html(data);
            },
            error: function(){
                alert("Form submission failed!");
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#myform1').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "change_userprofile.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $("#response").html(data);
            },
            error: function(){
                alert("Form submission failed!");
            }
        });
    });
});
</script>

</body>

</html>