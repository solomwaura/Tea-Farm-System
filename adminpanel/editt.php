<?php
include "header.php";
?>
    
    <main id="main" class="main">
    
     <div class="card m-5">
         <div class="card-body">
             
             <?php
include "../db.php";

$sql = "SELECT * FROM `tenders` ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

if ($result){

    $data = mysqli_num_rows($result);

       if ($data>0){

           echo "<table class='table table-striped table-hover'>";
           echo "<tr>";
           echo "<th> Tender</th>";
           echo "<th>dos</th>";
           echo "<th>tenderfile</th>";
           echo "<th>Actions</th>";
           echo "</tr>";
           while ($row=mysqli_fetch_array($result)){
               echo "<tr>";
               echo "<td>".$row['tender']. "</td>" ;
               echo "<td>".$row['dos']."</td>" ;
               echo "<td>".$row['tenderfile']."</td>" ;
               echo " <td>
                   
                    <a class='' href='deletet.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>
                    <a class='' href='updatet.php?id=".$row['id']."'><span class='fa fa-pencil'></span></a>
                    </td>";

               echo "</tr>";



           }


           echo "</table>";




       }else{
           echo "<p class='alert alert-primary'>No Record was found in the database</p>";
       }



}else{
    echo "Error executing query $sql".mysqli_error($conn);
}







?>

             
             
             </div>
         </div>
    
    
    
    
     </main><!-- End #main -->

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