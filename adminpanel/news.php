<?php
include "header.php";

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:../login/login.php");
    exit();
}

?>

    
    
    
 <main id="main" class="main">
      <div class="pagetitle">
      <h1>ADD NEWS AND EVENTS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item">News</li>
          <li class="breadcrumb-item active">Add news and events</li>
        </ol>
      </nav>
    </div>
     <hr>
        <form action="" method="post">
            <?php
include "../db.php";

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $sql="INSERT INTO news(title,description)VALUES('$title','$description')";
    $results=mysqli_query($conn,$sql);
    
    if($results){
         echo "<div class='alert alert-success'>";
            echo "Posted Successfully";
            echo "</div>";
    }else{
        echo "<div class='alert alert-success'>";
            echo "News Already Posted";
            echo "</div>";
    }
    
    
}
?>
            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">News Title</label>
                                    <input class="form-control" type="text" name="title" placeholder="News title...">
                                </div>
                            </div>
            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">Description</label>
                                    <input class="form-control" type="text" name="description" placeholder="write something...">
                                </div>
                            </div>
            <div class="row p-1">
                                <div class="col-md-2">
                                    <input style="background-color:orange; color:white;" class="form-control" type="submit" name="submit" value='POST NEWS'>
                                </div>
                            </div>
            
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