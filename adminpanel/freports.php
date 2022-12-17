<?php
include "header.php";
include "generate_excel.php";

?>
<style>
    hr {
        color: black;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Farmers' Report</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body p-3">



            <hr>
            <a href="reports.php"><button class="btn P-1" style="background-color:gray;color:black;float:right;"><i class="bi bi-file-earmark-pdf-fill"></i></i>EXPORT PDF</button></a>
            
            <div class="row" style="background-color:azure">
            <a  id="export-to-excel" href="#"><button class="btn P-1" style="background-color:gray;color:black;float:right; margin-right:10px;"><i class="bi bi-file-earmark-spreadsheet-fill"></i>Export To Excel</button></a><br>
            </div>
            <form action="generate_excel.php" method="post" id="export-form">
                <input type="hidden" value='' id='hidden-type' name='ExportType' />
            </form>
            <div class="row">
             <?php
             include "../db.php";

             $sql10="SELECT * FROM users WHERE usertype='user' ORDER BY id DESC";
             $res10=mysqli_query($conn,$sql10);
             $numrows=mysqli_num_rows($res10);
             if($numrows>0){
                echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th>Full Name</th>";
                echo "<th> Email</th>";
                echo "<th>Farmer Id</th>";
                echo "<th>Collectio Center</th>";
                echo "</tr>";
                while ($row=mysqli_fetch_array($res10)){
                    echo "<tr>";
                    echo "<td>".$row['fname']." ".$row['sname']." ".$row['lname']. "</td>" ;
                    echo "<td>".$row['email']."</td>" ;
                    echo "<td>".$row['factoryid']."</td>" ;
                    echo "<td>".$row['collectioncenter']."</td>" ;
     
                    echo "</tr>";
     
     
     
                }
     
     
                echo "</table>";
     
     
     
     
            }else{
                echo "<p class='alert alert-primary'>No Record was found in the database</p>";
            }

             ?>
            </div>
        </div>
    </div>






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
<script src="../bootsrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script  type="text/javascript">
$(document).ready(function() {
jQuery('#export-to-excel').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
  case 'export-to-excel' :
  $('#hidden-type').val(target);
  //alert($('#hidden-type').val());
  $('#export-form').submit();
  $('#hidden-type').val('');
  break
}
});
    });
</script>
</body>

</html>