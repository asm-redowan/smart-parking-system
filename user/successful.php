<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>


<?php
include './config.php';
    if (isset($_POST['taka'])) {
        $taka = $_POST['taka'];
        $token = $_POST['token'];
        $cuser_id = $_SESSION['cuser_id'];
        $suser_id = $_POST['suser_id'];
        $trxid = $_POST['trxid'];
        $location = $_POST['location'];
        
        $query = "SELECT * from servo where location='$location' and suser_id='$suser_id';";
        
        $result = mysqli_query($connection, $query) or die("Failed");
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $q = "UPDATE servo set status='ON' where suser_id='$suser_id' and location='$location';";
            $r = mysqli_query($connection,$q) or die("Ekhane faild");
        } else {
            $q = "INSERT INTO servo values('$suser_id', '$location', 'ON')";
            $r = mysqli_query($connection,$q) or die("Okhane Failed");
        }
        $query = "INSERT INTO payment VALUES('$cuser_id', '$token', '$taka', '$trxid')";
        $result = mysqli_query($connection,$query) or die("Now Failed");

        $query = "UPDATE booking set status='paid' where token_nu='$token'";
        $result = mysqli_query($connection,$query) or die("Now Failed2");

    }

?>

<div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events">Payment Successful.</h3>
   </div>

    <div class="col-md-6">
        <p>Your payment has been successfully received. Thank you for using our serveice.</p>
        <a href="./home.php">Go back to homepage</a>
    </div>


</div>

<?php include '../footer.php'; ?>