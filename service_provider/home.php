<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8 p-4">
        <div class="col-md-12 text-center">
        <h3 class="events">Your Parking Zones</h3>
        </div>

        <?php
        include './config.php';
        $suser_id = $_SESSION['suser_id'];
        // echo $suser_id;
        
        $query = "SELECT * FROM parking_spot where suser_id = '$suser_id'";

        $result = mysqli_query($connection,$query) or die("Failed");
        $count = mysqli_num_rows($result);

        if($count > 0) {

        ?>
        <div class="row">
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-sm-6 p-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name'] ?></h5>


                        <?php
                        $loc = $row['location'];
                        
                        $q2 = "SELECT count(*) as countr from rfid where location = '$loc' and suser_id = '$suser_id'";
                        $res = mysqli_query($connection,$q2) or die("Failed");
                        $rows = mysqli_fetch_assoc($res);

                        $q3 = "select count(*) as c from booking where location = '$loc' and STATUS = 'unpaid'";
                        $res3 = mysqli_query($connection,$q3) or die("Failed");
                        $rows3 = mysqli_fetch_assoc($res3);
                        $available_slot = $rows['countr'] - $rows3['c']; 
                        ?>

                        <h6 class="card-text">Location: <?php echo $loc ?> </h6>
                        <p class="card-text">Available Slot: <?php echo $available_slot ?> </p>

                        <a href="./see_more.php?loc=<?php echo $loc; ?>&name=<?php echo $row['name'] ?>" class="btn btn-success">See More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } else { ?>
        <div class="row justify-content-center">
            <div class="col-sm-6 p-4">
                <p>You have no parking zone available.</p>
                <a href="./add_parking_zone.php">Click here to create your parking zone</a>
            </div>
        </div>
    <?php } ?>
</div>



<?php include '../footer.php'; ?>