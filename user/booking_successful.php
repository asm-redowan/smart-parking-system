
<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>



<?php
    include './config.php';

    if (isset($_POST['submit'])) {
        $suser = $_POST['suser_id'];
        $location = $_POST['location']; 
        $b_date = date("Y-m-d H:i:s",strtotime($_POST['b_date']));
        $e_date = date("Y-m-d H:i:s",strtotime($_POST['e_date']));

        $q = "select max(rfid) as rfid
        from rfid
        where rfid NOT IN(
            select rfid
            from booking
            WHERE location = '$location' and status = 'unpaid'
        ) and location =  '$location';";

        $res = mysqli_query($connection, $q) or die("Failed");
        $row = mysqli_fetch_assoc($res);
        $rfid = $row['rfid'];
        $cuser_id = $_SESSION['cuser_id'];
        
        $query = "INSERT INTO `booking` (`cuser_id`, `suser_id`, `location`, `rfid`, `start_time`, `end_time`, `status`) 
        VALUES ('$cuser_id', '$suser', '$location', '$rfid', '$b_date', '$e_date', 'unpaid');";

        
        $res = mysqli_query($connection, $query) or die("Failed");
?>


<div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events">Booking Successful.</h3>
   </div>

    <div class="col-md-6">
        <p>One slot has been booked for you. We are waiting for your arival.</p>
        <p>Your card no is: <b><?php echo $row['rfid']; ?></b></p>
        <p>Collect this card from our parking zone!</p>
        <p>Thank you.</p>
        <a href="./home.php">Go back to homepage</a>
    </div>


</div>

<?php } else { ?>
    <div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events">Sorry!! Something Went Wrong. Please Try again later.</h3>
   </div>
</div>

<?php }?>

<?php include '../footer.php'; ?>