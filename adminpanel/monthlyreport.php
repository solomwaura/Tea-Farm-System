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
                <li class="breadcrumb-item active">Current Month Report</li>
            </ol>
        </nav>
    </div>

    <?php
                include "../db.php";
                $fdaymonth=date('Y-m-01');
                echo $fdaymonth;
                $ldaymonth=date('Y-m-t');
                echo $ldaymonth;

                $sql10 = "SELECT users.*,SUM(produce.weight),SUM(produce.dtpay)
                 FROM users CROSS JOIN produce WHERE users.usertype='user' AND 
                 users.factoryid=produce.factoryid 
                AND produce.date BETWEEN '$fdaymonth' AND '$ldaymonth' GROUP BY produce.factoryid";
                $res10 = mysqli_query($conn, $sql10);
                $numrows = mysqli_num_rows($res10);
                if ($numrows > 0) {
                    echo "<table class='table table-hover'>";
                    echo "<tr>";
                    echo "<th>Full Name</th>";
                    echo "<th> Email</th>";
                    echo "<th>Farmer Id</th>";
                    echo "<th>Collectio Center</th>";
                    echo "<th>Cumulative weight</th>";
                    echo "<th>Cumulative wage</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($res10)) {
                        echo "<tr>";
                        echo "<td>" . $row['fname'] . " " . $row['sname'] . " " . $row['lname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['factoryid'] . "</td>";
                        echo "<td>" . $row['collectioncenter'] . "</td>";
                        echo "<td>" . $row[15] . "</td>";
                        echo "<td>" . $row[16] . "</td>";

                        echo "</tr>";



                    }
                    ?>
                    <tr style="background-color:gray; color:white; font-size:30px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td >
                        <?php
                        include "../db.php";

                        $sql10 = "SELECT SUM(weight) FROM users JOIN produce WHERE users.usertype='user' AND 
                        users.factoryid=produce.factoryid AND produce.date BETWEEN '$fdaymonth' AND '$ldaymonth'";
                        $res101 = mysqli_query($conn, $sql10);
                        $numrows = mysqli_num_rows($res101);
                        if ($numrows > 0) {
                            while ($row1 = mysqli_fetch_array($res101)) {
                                echo "Total: " . $row1['0'] . "<br>";
                            }
                        } else {
                            echo "0";
                        }

                        ?>
                    </td>
                    <td>
                    <?php
                        include "../db.php";

                        $sql12= "SELECT SUM(dtpay) FROM users JOIN produce WHERE users.usertype='user' AND 
                        users.factoryid=produce.factoryid AND produce.date BETWEEN '$fdaymonth' AND '$ldaymonth'";
                        $res102 = mysqli_query($conn, $sql12);
                        $numrows1 = mysqli_num_rows($res102);
                        if ($numrows1 > 0) {
                            while ($row2 = mysqli_fetch_array($res102)) {
                                echo "Total: " . $row2['0'] . "<br>";
                            }
                        } else {
                            echo "0";
                        }

                        ?>
                    </td>
                    <td></td>
                </tr>
                <?php


                    echo "</table>";
                } else {
                    echo "<p class='alert alert-primary'>No Record was found in the database</p>";
                }

                ?>






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