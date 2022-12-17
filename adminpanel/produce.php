<?php
include "header.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>FARMERS TEA PRODUCE ADD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item">Tea Produce</li>
                <li class="breadcrumb-item active">Add Farmer's Tea Produce</li>
            </ol>
        </nav>
    </div>
    <hr>
    <form action="produce.php" method="post" id='myform'>

        <?php
        include "../db.php";


        if (isset($_POST['add'])) {
            $factoryid = $_POST['factoryid'];
            $payrates = $_POST['payrates'];
            $weight = $_POST['weight'];
            $dtpay = $_POST['dtpay'];


        ?>


            <?php




            $query = mysqli_query($conn, "SELECT * FROM produce WHERE factoryid='$factoryid' ORDER BY id DESC LIMIT 31");
            $count = 1;
            $total = 0;
            while ($row = mysqli_fetch_array($query)) {

            ?>

            <?php
                $total = $total + $row['weight'];
                $tot = $weight + $total;
                $count++;
            } ?>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM produce WHERE factoryid='$factoryid' ORDER BY id DESC LIMIT 31");
            $count1 = 1;
            $totalc = 0;
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <?php
                $totalc = $totalc + $row['dtpay'];
                $totc = $dtpay + $totalc;
                $count1++;
            } ?>
        <?php
            $sqlS = "SELECT * FROM users WHERE factoryid='$factoryid'";
            $re = mysqli_query($conn, $sqlS);
            while ($rowS = mysqli_fetch_assoc($re)) {
                $pnumber = $rowS['pnumber'];
                $email=$rowS['email'];
            }

            $to = $email;
            $subject = "Produce Record";
            $msg = 'Hello ' . $fname . ',
            Todays Tea Weight: ' . $weight . '
            Todays Tea Cash: ' . $dtpay . '
            cumulative weight This Month: ' . $tot ?? null . '
            cumulative Cash This Month: ' . $totc ?? null . '';
            $msg = wordwrap($msg,70);
            $headers = "From: coddiner123@gmail.com, Tea Farmers Company";
            mail($to, $subject, $msg, $headers);



            $sql = "INSERT INTO produce (factoryid,payrates,weight,dtpay)VALUES('$factoryid','$payrates','$weight','$dtpay')";
            $results = mysqli_query($conn, $sql);

            if ($results) {
                echo "<div class='alert alert-success'>";
                echo "Added succesfully";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning'>";
                echo "something went wrong";
                echo "</div>";
            }
        }
        ?>



        <div class="row p-2">
            <div class="col-md-12">
                <label class="form-label grey">Payrate(per KG)</label>
                <input class="form-control" type="float" name="payrates" value="60" readonly onkeyup="calculate()">
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12">
                <label class="form-label grey">weight</label>
                <input class="form-control" type="number" step="any" name="weight" placeholder="insert the weight here" required onkeyup="calculate()">
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12">
                <label class="form-label grey">Total Pay(Today)</label>
                <input class="form-control" type="float" name="dtpay" readonly>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-md-12">
                <label class="form-label grey">Select Farmer Id</label>
                <select class=form-control name="factoryid" id="myInput" type="text" required class="required">
                <option value="">Select Farmer's name/ID</option>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE usertype='user' ");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <option value="<?php echo $row['factoryid']; ?>  "><?php echo $row['fname']." ".$row['lname']." ".$row['factoryid']; ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row p-1">
            <div class="col-md-2">
                <input style="background-color:orange; color:white;" class="form-control" type="submit" name="add" value='ADD PRODUCE'>

            </div>
            <div class="col-md-2">
                <a href="produce.php"><input style="background-color:forestgreen; color:white;float:right;" class="form-control" type="button" value='REFRESH'></a>
            </div>
        </div>
    </form>


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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
    function calculate() {
        if (isNaN(document.forms["myform"]["payrates"].value) || document.forms["myform"]["payrates"].value == "") {
            var text1 = 0;
        } else {
            var text1 = parseInt(document.forms["myform"]["payrates"].value);
        }
        if (isNaN(document.forms["myform"]["weight"].value) || document.forms["myform"]["weight"].value == "") {
            var text2 = 0;
        } else {
            var text2 = parseFloat(document.forms["myform"]["weight"].value);
        }
        document.forms["myform"]["dtpay"].value = text1 * text2;
    }
</script>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("option").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script>
    select = document.getElementById('myInput'); // or in jQuery use: select = this;
if (select.value) {
  // value is set to a valid option, so submit form
  return true;
}
return false;
</script>


</body>

</html>