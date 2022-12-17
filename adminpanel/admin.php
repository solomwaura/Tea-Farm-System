<?php
include "header.php";

?>
    

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Tea Produce <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        
                           <?php

          

     $id = '$factoryid';
     $query =mysqli_query($conn,"SELECT * FROM produce ORDER BY id DESC LIMIT 31");
     $count =1;
     $total = 0;
     while($row = mysqli_fetch_array($query)){
      
        ?>

        <?php
        $total = $total + $row['weight'];
    $count++;
    } ?>
    <tr>
    <td><?php echo $total; ?></td> <span style="color:green;">Kilograms</span>
                        
                        </h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Revenue Owed To Farmers<span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        
                          <?php

          

     $id = '$factoryid';
     $query =mysqli_query($conn,"SELECT * FROM produce ORDER BY id DESC LIMIT 31");
     $count =1;
     $total = 0;
     while($row = mysqli_fetch_array($query)){
      
        ?>

        <?php
        $total = $total + $row['dtpay'];
    $count++;
    } ?>
    <tr>
    <td><?php echo $total; ?></td> <span style="color:green;">KSH</span>
                        
                        
                        </h6>
                  

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">TOTAL FARMERS </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                          $sel="SELECT * FROM users WHERE usertype='user'";
                          $query=mysqli_query($conn,$sel);
                          if($query){
                              $number=mysqli_num_rows($query);
                              if($number>0){
                                  echo $number;
                              }else{
                                  echo "No Farmer";
                              }
                          }
                          ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">New Farmers</h5>
                    <?php
 $sql="SELECT * FROM users WHERE usertype='user' ORDER BY id DESC LIMIT 10";
            $results=mysqli_query($conn,$sql);
            if($results){
            $data=mysqli_num_rows($results);
            if($data>0){
                echo "<table class='table table-strip-hover'>";
                echo "<tr style='background:transparent;'>";
                
                echo "<th scope='col'>Image</th>";
                echo "<th scope='col'>Farmer Id</th>";
                echo "<th scope='col'>Full Names</th>";
                echo "<th scope='col'>Collection Center</th>";
                
                echo "</tr>";
                while ($row=mysqli_fetch_array($results)){
                   echo "<tr>";
                   echo "<td>";
                   ?>
                   <img src="../uploads/<?php echo $row['profile'];?>">


                  <?php

                   echo "</td>";
                   
                   echo "<td>".$row['factoryid']."</td>" ;
                   echo "<td>".$row['fname']." ".$row['lname']."</td>" ;
                    echo "<td>".$row['collectioncenter']."</td>" ;
            

               echo "</tr>";
                }
                echo "</table>";
                
                    
            }else{
                echo " no data found";
            }
            }else{
                echo "error executing query $sql";
            }

?>


                </div>

              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-12">
          <div class="card">
            
            <div class="card-body pb-0">
              <h5 class="card-title">Recent News &amp; Events </h5>
                <?php
 $sql="SELECT * FROM news ORDER BY timestamp DESC LIMIT 5";
            $results=mysqli_query($conn,$sql);
            if($results){
            $data=mysqli_num_rows($results);
            if($data>0){
                echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th></th>";
                echo "</tr>";
                while ($row=mysqli_fetch_array($results)){
                   echo "<tr>";
                   
                   echo "<td>".$row['title'].": ".$row['description']."<br>".$row['timestamp']."</td>" ;
            

               echo "</tr>";
                }
                echo "</table>";
                
                    
            }else{
                echo "No news found";
            }
            }else{
                echo "error executing query $sql";
            }

?>


              

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

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