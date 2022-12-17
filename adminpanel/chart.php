<?php
include "header.php";
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
                <li class="breadcrumb-item active">Converse...</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div class="chat">
                        <div class="chat-header clearfix" style="background-color:azure;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="../uploads/avatar.jpg" alt="Profile" class="rounded-circle" style='width:50px; height:50px;'>

                                    </a>
                                    <div class="chat-about" style="font-size:30px; color:blue;">
                                        <h1 class="m-b-0"><?php
                                                            include "../db.php";
                                                            $email = $_GET['email'];
                                                            $sq = "SELECT * FROM messages WHERE email='$email'";
                                                            $sw = mysqli_query($conn, $sq);
                                                            $nu = mysqli_num_rows($sw);
                                                            if ($nu > 0) {
                                                                $ro = mysqli_fetch_array($sw);
                                                                echo $ro['name'];
                                                            }
                                                            ?>
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0">
                                <?php
                                include "../db.php";
                                $email = $_GET['email'];
                                $sql = "SELECT * FROM messages WHERE email='$email' ORDER BY tm asc";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        if ($row['response'] == 'reply') {
                                ?>
                                            <li class="clearfix">
                                                <div class="message-data text-right">
                                                    <span class="message-data-time"><?php echo $row['timestamp'] ?>,
                                                        <?php

                                                        $date = $row['timestamp'];
                                                        $newDate = date('l', strtotime($date));

                                                        echo $newDate;
                                                        ?>
                                                    </span>
                                                    <img src="../uploads/<?php echo $photo ?>" alt="Profile" class="rounded-circle" style='width:50px; height:50px;'>
                                                </div>
                                                <div class="message other-message float-right"> <?php echo $row['message'] ?>
                                            </div><br><br><br>
                                            <div style="float:right; color:gray;font-size:14px;">
                                            <?php
                                                $tim=$row['tm'];
                                                $dt=date("Y-m-d H:i:s");
                                                        $datetime1 =new DateTime;
                                                        $datetime2 = new DateTime("$tim");//end time
                                                        $interval = $datetime1->diff($datetime2);
                                                        $year=$interval->format('%Y');
                                                        $month=$interval->format('%m');
                                                        $day=$interval->format('%d');
                                                        $hour=$interval->format('%H');
                                                        $min=$interval->format('%i');
                                                        $sec=$interval->format('%s');
                                                        if($year=='0' AND $month=='0' AND $day=='0' AND $hour=='0' AND $min=='0'){
                                                            echo $sec .'sec ago';
                                                        }
                                                        elseif($year=='0' AND $month=='0' AND $day=='0' AND $hour=='0'){
                                                            echo 60-$min .'mins ago';
                                                        }
                                                        elseif($year=='0' AND $month=='0' AND $day=='0'){
                                                            echo number_format($hour) .'hr(s) ago';
                                                        }
                                                        elseif($year=='0' AND $month=='0'){
                                                            echo $day .'day(s) ago';
                                                        }
                                                        elseif($year=='0'){
                                                            echo $month .'month(s) ago';
                                                        }
                                                        else{
                                                            echo number_format($year).'year(s) ago';
                                                        }


                                                ?>
                                            </div>

                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="clearfix">
                                                <div class="message-data">
                                                    <img src="../uploads/avatar.jpg" alt="Profile" class="rounded-circle" style='width:50px; height:50px;'>
                                                    <span class="message-data-time"><?php echo $row['timestamp'] ?>,
                                                        <?php
                                                        $date = $row['timestamp'];
                                                        $newDate = date('l', strtotime($date));
                                                        echo $newDate;
                                                        ?></span>

                                                </div>
                                                <div class="message my-message"><?php echo $row['message'] ?></div><br>
                                                <span style="color:gray;font-size:14px;">
                                                <?php
                                                        $tim=$row['tm'];
                                                        $datetime1 = new DateTime();
                                                        $datetime2 = new DateTime("$tim");//end time
                                                        $interval = $datetime1->diff($datetime2);
                                                        $year=$interval->format('%Y');
                                                        $month=$interval->format('%m');
                                                        $day=$interval->format('%d');
                                                        $hour=$interval->format('%H');
                                                        $min=$interval->format('%i');
                                                        $sec=$interval->format('%s');
                                                        if($year=='0' AND $month=='0' AND $day=='0' AND $hour=='0' AND $min=='0'){
                                                            echo $sec .'sec ago';
                                                        }
                                                        elseif($year=='0' AND $month=='0' AND $day=='0' AND $hour=='0'){
                                                            echo $min .'mins ago';
                                                        }
                                                        elseif($year=='0' AND $month=='0' AND $day=='0'){
                                                            echo number_format($hour) .'hr(s) ago';
                                                        }
                                                        elseif($year=='0' AND $month=='0'){
                                                            echo $day .'day(s) ago';
                                                        }
                                                        elseif($year=='0'){
                                                            echo $month .'month(s) ago';
                                                        }
                                                        else{
                                                            echo number_format($year).'year(s) ago';
                                                        }


                                                ?>
                                                </span>
                                            </li>
                                <?php
                                        }
                                    }
                                }


                                ?>
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <?php
                            include "../db.php";
                            if (isset($_POST['submit'])) {
                                $email = $_GET['email'];
                                $mess = $_POST['mess'];
                                $sql1 = "INSERT INTO messages (name,email,subject,message,status,response) VALUES('','$email','','$mess','','reply')";
                                $res = mysqli_query($conn, $sql1);
                                if ($res) {
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                            }

                            ?>
                            <form action="" method="POST">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text" type="submit" name="submit"><i class="fa fa-send"></i></button>
                                    </div>
                                    <input type="text" name='mess' class="form-control" placeholder="Enter text here..." required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            background-color: #f4f7f6;
            margin-top: 20px;
        }

        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>

    <script type="text/javascript">

    </script>




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
</body>

</html>