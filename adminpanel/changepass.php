                      
                      <?php
session_start();
include "../db.php";

    
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




?>