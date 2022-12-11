<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-8 p-4">
        <?php 
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
        ?>

        <div class="col-md-12 text-center">
        <h3 class="events">Available Parking Zone On <?php echo $search ?></h3>
        </div>
        <?php } else { ?>
        <div class="col-md-12 text-center">
        <h3 class="events">Please enter the location.</h3>
        </div>
        <?php } ?>
    
        <div class="row">
            <?php 
                    include './config.php';
    
                    $query = "SELECT * FROM parking_spot where location LIKE '%{$search}%' or name like '%{$search}%'";
                    $result = mysqli_query($connection,$query) or die("Failed");
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        while($row = mysqli_fetch_assoc($result)){
            ?>

                    <div class="col-sm-6 p-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                <?php
                                    $loc = $row['location'];
                                    $user = $row['suser_id'];

                                    $q2 = "SELECT count(*) as countr from rfid where location = '$loc' and suser_id = '$user'";
                                    $res = mysqli_query($connection,$q2) or die("Failed");
                                    $rows = mysqli_fetch_assoc($res);

                                    $q3 = "select count(*) as c from booking where location = '$loc' and STATUS = 'unpaid'";
                                    $res3 = mysqli_query($connection,$q3) or die("Failed");
                                    $rows3 = mysqli_fetch_assoc($res3);
                                    $available_slot = $rows['countr'] - $rows3['c']; 
                                ?>

                                <p class="card-text">Available Slot: <?php echo $available_slot; ?></p>
                                <?php if ($available_slot == '0') {   ?>
                                <a href="./booking.php?id=<?php echo $user; ?>&location=<?php echo $loc; ?>" class="btn btn-success disabled">Want to book?</a>
                                <?php } else { ?>
                                <a href="./booking.php?id=<?php echo $user; ?>&location=<?php echo $loc; ?>" class="btn btn-success">Want to book?</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
            <?php }} else {?>
                <p>Sorry! Not Available at this moment.</p>
            <?php } ?>
        </div>
    </div>
</div>


<?php include '../footer.php'; ?>