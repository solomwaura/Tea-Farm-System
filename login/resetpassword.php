<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body id="body">
    <div class="card" style="width:500px; padding-top: 20px; padding-top: 20px; margin-left: auto; margin-right: auto;width: 570px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    
    ">


        <div class="card-body">
            <div style="text-align:center; padding-bottom: 2%;">
                <h3>Forgot your password?..</h3>
                Enter your email address and we'll send you a link to<br> reset your password.
            </div>

            <form action="" method="post">
                <div class="form-group">
                <?php

                    include "../db.php";

                    if(isset($_POST['submit'])){
                        $email=$_POST['email'];

                        $sql="SELECT * FROM `users` WHERE email='$email'";
                        $results=mysqli_query($conn,$sql);
                        if($results){
                        $data=mysqli_num_rows($results);
                        if($data>0){
                            while($row=mysqli_fetch_array($results)){
                                $email=$row['email'];
                                $fname=$row['fname'];
                            }

                            $link="http://waltercoddiner.elementfx.com/Tfms/login/newpass.php?key=".$email. " right here";
                            
                            $to = $email;
                            $subject = "Password Recovery";
                            $msg = 'Hello '.$fname.',
                            Forgot your password? Don’t worry, it happens to the best of us.
                            Create your new password '.$link.'';
                            $msg = wordwrap($msg,70);
                            $headers = "From:waltercoddiner.elementfx.com";
                            $emaill=mail($to, $subject, $msg, $headers);
                            if($emaill)
                            {
                            echo "<div class='alert alert-success'>";
                            echo "Check Your Email and Click on the link sent to your email";
                            echo "</div>";
                            }
                            else
                            {
                            echo "Mail Error";
                            }


                        }else{
                            echo "<div class='alert alert-danger'>";
                            echo "Email doesn't exist";
                            echo "</div>";
                        }
                        }
                    }

                ?>
                <label for="usr">Email:</label>
                <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                <input style="width: 100%;border-radius: 4px; margin-top: 15px; background-color: green; color:white; border: none; padding:2%" type="submit" name="submit" class="form-group" value="Send">
                </div>
                <div style="text-align: center; margin-top: 15px;">
                    Remember your password? <a style="text-decoration: none;"href="login.php">Sign in</a>
                </div>


            </form>

          
        </div>
      </div>
      <style>
          body {
               background-image: url('images/tea6.jpg');
               background-repeat: none;
               background-size: cover;
               background-position: center center;
               width: 100%;  
               min-height: 100vh;
               display: -webkit-box;
               display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }
      </style>

    </body>
    </html>
    