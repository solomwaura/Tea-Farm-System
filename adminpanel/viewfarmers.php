<?php
include "header.php";

?>
     <main id="main" class="main">
     <div class="pagetitle">
      <h1>FARMERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
          <li class="breadcrumb-item active">View Farmers</li>
        </ol>
      </nav>
    </div>

         <div class="card">
         <div class="card-body pb-0">
             
             <?php
include "../db.php";

$sql = "SELECT * FROM `users` WHERE usertype='user'ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

if ($result){

    $data = mysqli_num_rows($result);

       if ($data>0){

           echo "<table class='table table-hover'>";
           echo "<tr>";
           echo "<th>Image</th>";
           echo "<th>Full Name</th>";
           echo "<th> Email</th>";
           echo "<th>Farmer Id</th>";
           echo "<th>Collectio Center</th>";
           echo "<th>Actions</th>";
           echo "</tr>";
           while ($row=mysqli_fetch_array($result)){
               echo "<tr>";
               echo "<td>";
               ?>
               <img src="../uploads/<?php echo $row['profile'];?>" style="height:50px; width:50px; border-radius:50%">


              <?php

               echo "</td>";
               echo "<td>".$row['fname']." ".$row['sname']." ".$row['lname']. "</td>" ;
               echo "<td>".$row['email']."</td>" ;
               echo "<td>".$row['factoryid']."</td>" ;
               echo "<td>".$row['collectioncenter']."</td>" ;
               echo " <td>
                   
                    <a class='m-2' href='delete.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>
                    <a class='m-2' href='farmer_profile.php?id=".$row['id']."'><span class='fa fa-eye'></span></a>
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