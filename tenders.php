<?php
include "header.php";
?>

  <main id="main">

    
    <section id="breadcrumbs" class="breadcrumbs" style="background-color:forestgreen;">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Supply and Procurement Opportunities</h2>
        </div>
          

      </div>
    </section>
      
      <div class="row mt-5 mb-5" style="width:80%; margin-left:auto; margin-right:auto;">
      <div class="col-8">
          
          <div class="card p-3" style="border:none;">
              <div class="body">
                  <h4>TENDERS</h4><hr>
                  <?php
                  include "db.php";
                  
                  $sql="SELECT * FROM tenders ORDER BY dos DESC LIMIT 15";
                  $results=mysqli_query($conn,$sql);
                  if($results){
                      $data=mysqli_num_rows($results);
                      if($data>0){
                          
                          echo "<table class='table table-hover'>";
                          echo "<tr>";
                          echo "<th></th>";
                          echo "</tr>";
                          
                      }
                      while($row=mysqli_fetch_array($results)){
                          $tenderfile=$row['tenderfile'];
                          $filepath = "uploads/$tenderfile";
                                                    
                          echo "<tr>";
                          echo "<td>".$row['tender']."<br>".$row['dos']."</td>";
                          echo "<td><a class='m-2' href='$filepath?id=".$row['tender']."'><span style='color:forestgreen;' class='fa fa-arrow-down'></span></a></td>";
                          echo "</tr>";
                          
                    
                        
                          
                      }
                      echo "</a>";
                      echo "</table>";
                      
                  }
                  
                  
                  ?>
              <p><a href="newsevent.php"> <span style="color: black;">« Older Entries</span> </a></p>
              </div>
              
          
          </div>
          </div>
          <div class="col-4">
          
          <div class="card p-3" style="border:none;">
              <div class="body">
                  <h4>RECENT NEWS AND EVENTS</h4><hr>
                            <?php
include "db.php";
 $sql="SELECT * FROM news ORDER BY timestamp DESC LIMIT 3 ";
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
                echo "no records found";
            }
            }else{
                echo "error executing query $sql";
            }

?>
              
              </div>
          
          </div>
          </div>
      
      
      </div>

  

  </main>

  
   <footer id="footer" style="background-color: #f4f5f6!important;">
      
      
      <div class="row pt-5" style=" width:80%;margin-left: auto;margin-right: auto;color:black;">
          <div class="col">
              <div class="card bg-transparent" style="border:none;">
                  <div class="card-body">
                      <h4>Tea Factory</h4>
                      <p>Tea Farmers Building<br>
                      Nyahurur-Nakuru Road<br>
                      11km From Nyahururu<br>
                      PO BOX 2 0300 (or 20300) NYAHURURU<br>
                      KENYA</p>
                  </div>
              </div>
          
          
          </div>
          <div class="col">
              
               <div class="card bg-transparent" style="border:none;">
                  <div class="card-body">
                      <h4>Contacts</h4>
                      <p><a href="mailto:info@teafactory.com" style="color:black">Infor@teafactory.com</a>
                          Call<br>
                          (+254) 0721977429<br>
                          (+254) 0721977429<br>
                          (+254) 0721977429<br>
              
              </p>
                  </div>
              </div>
          
          
          
          </div>
          <div class="col">
              
              <div class="card bg-transparent" style="border:none;">
                  <div class="card-body">
                      <h4>Useful Link</h4>
              
                      <a href="" style="color:black">Report a Bug</a><br>
                      <a href="" style="color:black">Login</a><br>
                      <a href="" style="color:black">Tenders</a><br>
                      <a href="" style="color:black">Staff webmail.</a><br>
                  </div>
              </div>
          
    
          </div>
      </div>
      

    

    <div class="contain d-md-flex py-4" style="background-color:forestgreen;color:white;width:100; padding-left:5%;padding-right:5%;">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Tea Factory</span></strong>. All Rights Reserved
        </div>
       
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a style="color:green; background-color:orange;" href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a  style="color:green; background-color:orange;" href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color:orange;"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>