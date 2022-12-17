<?php
include "header.php";
?>
    
    
 <main id="main" class="main">
      <div class="pagetitle">
      <h1>ADD FACTORIE'S TENDERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item">Tender</li>
          <li class="breadcrumb-item active">Add Tenders</li>
        </ol>
      </nav>
    </div>
     <hr>
     <?php
include '../db.php';
if(isset($_POST['submit'])){
    
    $tender=$_POST['tender'];
    $date=$_POST['dos'];
    
    $tenderfile=$_FILES['tenderfile']['name'];
    $tempname=$_FILES['tenderfile']['tmp_name'];
    $tendersfolder="../uploads/".$tenderfile;
    
    $sql="INSERT INTO `tenders`(`tender`, `dos`, `tenderfile`) VALUES ('$tender','$date','$tenderfile')";
    
    $result=mysqli_query($conn,$sql);
    if(move_uploaded_file($tempname,$tendersfolder)){
         echo "<div class='alert alert-success'>";
            echo "Photo/file uploadded successfully";
            echo "</div>";
    }else{
    }
    if($result){
         echo "<div class='alert alert-success'>";
            echo "submitted successfully";
            echo "</div>";
    }else{
         echo "<div class='alert alert-danger'>";
            echo "Tender was already posted";
            echo "</div>";
    }
}
?>

        <form action="tendersform.php" method="POST" enctype="multipart/form-data">
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">Tender Description</label>
                                    <input class="form-control" type="text" name="tender" placeholder="">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">Date</label>
                                    <input class="form-control" type="date" name="dos" required >
                                </div>
                            </div>

                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Upload Tender File</label>
                                        <input class="form-control" type="file" name="tenderfile">

                                    </div>

                                </div>


                            
                        <input style="border:none; background-color:orange; color:white;" type="submit" name="submit" class="col-3 btn btn-outline-danger m-2" value="POST TENDER">
            
            <a href="tendersform.php"><input style="border:none; background-color:green; color:white;" type="submit" class="col-3 btn btn-outline-danger m-2" value="RESET"></a>
                    

                    </form>
    </main>
    
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