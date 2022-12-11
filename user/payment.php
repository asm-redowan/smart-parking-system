<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>

<?php
    if (isset($_GET['taka'])) {
        $taka = $_GET['taka'];
        $suser_id = $_GET['suser_id'];
        $token = $_GET['token'];
        $location = $_GET['location'];
    }


?>


<div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events">Make Payment</h3>
   </div>

    <div class="col-md-6">
        <form class="row g-3" method="post" action="successful.php">
        <p>You have to pay <b><?php echo $taka; ?> taka</b></p>

            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Bkash Tnrx No:</label>
                <input type="text" name="trxid" class="form-control" required>
            </div>
            <input type="text" name="taka" value="<?php echo $taka; ?>" hidden>
            <input type="text" name="token" value="<?php echo $token; ?>" hidden>
            <input type="text" name="suser_id" value="<?php echo $suser_id; ?>" hidden>
            <input type="text" name="location" value="<?php echo $location; ?>" hidden>
            

            <div class="col-12">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>


</div>

<?php include '../footer.php'; ?>