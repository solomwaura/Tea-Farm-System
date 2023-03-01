<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:../login/login.php");
    exit();
}
include '../db.php';
$id=$_GET['id'] ?? $_SESSION['id'];
$sql="SELECT * FROM users WHERE id='$id'";
$results=mysqli_query($conn,$sql);
if($results){
        $data=mysqli_num_rows($results);
        if($data==1){
            while($row=mysqli_fetch_assoc($results)){
              $id=$row['id'];
                 $fname=$row['fname'];
                 $sname=$row['sname'];
                 $lname=$row['lname'];
                 $email=$row['email'];
                 $pnumber=$row['pnumber'];
                 $usertype=$row['usertype'];
                 $profile=$row['profile'];
                 $password=$row['password'];
                 $factoryid=$row['factoryid'];
                 $bankname=$row['bankname'];
                 $bankbranch=$row['bankbranch'];
                 $accountnumber=$row['accountnumber'];
                 $accountname=$row['accountname'];
                 $collectioncenter=$row['collectioncenter'];
                
                
                        $_SESSION['fname']=$fname;
                        $_SESSION['email']=$email;
                        $_SESSION['factoryid']=$factoryid;
                        $_SESSION['profile']=$profile;
                        $_SESSION['usertype']=$usertype;
                        $_SESSION['pnumber']=$pnumber;
                        $_SESSION['usertype']=$usertype;
                        $_SESSION['sname']=$sname;
                        $_SESSION['lname']=$lname;
                        $_SESSION['bankbranch']=$bankbranch;
                        $_SESSION['bankname']=$bankname;
                        $_SESSION['accountnumber']=$accountnumber;
                        $_SESSION['accountname']=$accountname;
                        $_SESSION['collectioncenter']=$collectioncenter;
            }
        }
}

?>
<?php
include '../db.php';
$id=$_SESSION['id'];
$sql="SELECT * FROM users WHERE id='$id'";
$results=mysqli_query($conn,$sql);
if($results){
        $data=mysqli_num_rows($results);
        if($data==1){
            while($row=mysqli_fetch_assoc($results)){
                 $firstname=$row['fname'];
                 $secondname=$row['sname'];
                 $lastname=$row['lname'];
                 $emailaddress=$row['email'];
                 $phonenumber=$row['pnumber'];
                 $type=$row['usertype'];
                 $photo=$row['profile'];
            }
        }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>admin panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


 
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

 
  <link href="assets/css/style.css" rel="stylesheet">
 
    

</head>

<body>

  
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/log.png" alt="">
        <span class="d-none d-lg-block">Admin Dashboard</span>

        
      </a>
       <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number"><?php
              include "../db.php";
                $r="SELECT * FROM messages WHERE RESPONSE!='reply' AND status!='1'";
                $rr=mysqli_query($conn,$r);
                if($rr){
                  $rnum=mysqli_num_rows($rr);
                  if($rnum>0){
                    echo " $rnum";
                  }else{
                    echo "0";
                  }
                }
                ?> </span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
            
              <?php
              include "../db.php";
                $r="SELECT * FROM messages WHERE RESPONSE!='reply'";
                $rr=mysqli_query($conn,$r);
                if($rr){
                  $rnum=mysqli_num_rows($rr);
                  if($rnum>0){
                    echo "You Have $rnum messages";
                  }else{
                    echo "Yo have NO messages";
                  }
                }
                ?> 
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <?php
              include "../db.php";
                $r="SELECT * FROM messages WHERE RESPONSE!='reply' ORDER BY id DESC";
                $rr=mysqli_query($conn,$r);
                if($rr){
                  $rnum=mysqli_num_rows($rr);
                  if($rnum>0){

                    while($row=mysqli_fetch_array($rr)){
                      echo '<li class="message-item">';
                      ?>
                      <a href="messageview.php?email=<?php echo $row['email'].'&&message='.$row['message'].'&&time='.$row['time'].'&&tm='.$row['tm']; ?>">
                      <?php
                      
                      echo '<div>';
                      echo "<h4>";
                      echo $row['name']."_".$row['email'];
                      echo "</h4>";
                      echo '<p style="color:green; font-size:14px;">'.$row['message'].'</p>';
                      echo '<p>'.$row['timestamp'].'</p>';
                      echo '</div>';
                      echo '</li>';
                      echo '</a>';
                

                    }
                  }else{
                    echo "Yo have NO messages";
                  }
                }
                ?> 

            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>

        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../uploads/<?php echo $photo?>" alt="Profile" class="rounded-circle"style='width:40px; height:50px;'>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $firstname; ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $firstname; ?></h6>
              <span><?php echo $type; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Farmers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_farmer.php">
              <i class="bi bi-person-plus bi-2x"></i><span>Add Farmer</span>
            </a>
          </li>
            <li>
            <a href="viewfarmers.php">
              <i class="bi bi-person-lines-fill"></i><span>View Farmers</span>
            </a>
                <a href="produce.php">
              <i class="bi bi-person-lines-fill"></i><span>Add Farmer's Produce</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#notice-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Notice Board</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="notice-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="news.php">
              <i class="bi bi-circle"></i><span>Add Notice Board</span>
            </a>
          </li>
          <li>
            <a href="updaten.php">
              <i class="bi bi-circle"></i><span>View and edit Notice/s</span>
            </a>
          </li>
        </ul>
      </li>
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tenders-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-server"></i><span>Tenders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tenders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tendersform.php">
              <i class="bi bi-circle"></i><span>Add Tender</span>
            </a>
          </li>
          <li>
            <a href="editt.php">
              <i class="bi bi-circle"></i><span>Edit Tenders</span>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-heading">Useful Links</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="user_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="admin_register.php">
          <i class="bi bi-person-plus-fill"></i>
          <span>Add Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-break"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="freports.php">
              <i class="bi bi-person-plus bi-2x"></i><span>Farmers Report</span>
            </a>
          </li>
            <li>
            <a href="preport.php">
              <i class="bi bi-person-lines-fill"></i><span>Produce Report</span>
            </a>
          </li>
          <li>
            <a href="monthlyreport.php">
              <i class="bi bi-person-lines-fill"></i><span> Monthly Reports</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- <li class="nav-item" id="void-chat">
        <a class="nav-link collapsed" href="chart.php">
        <i class="bi bi-chat-dots-fill"></i>
          <span>Chart</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside>
    
    
    