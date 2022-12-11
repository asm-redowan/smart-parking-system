<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8 p-4">
        <div class="col-md-12 text-center">
        <h3 class="events">Transactions</h3>
        </div>
    </div>
    
    <div class="col-md-10">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th  scope="col">#</th>
                    <th scope="col">Parking Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">RFID No.</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Bills</th>
                    <th scope="col">Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $count = 1;
                    // while($row = mysqli_fetch_assoc($result)){
                        // $suser_id = $row['suser_id'];
                        // $location = $row['location'];
                        // echo $suser_id. ' '. $location;

                        // $q2 = "SELECT name FROM parking_spot
                        // where suser_id = '$suser_id' and location = '$location';";
                        // $res = mysqli_query($connection, $q2) or die("Failed");
                        // $rows = mysqli_fetch_assoc($res);
                        // $name = $rows['name'];
                        // $rfid = $row['rfid'];
                        // $location = $row['location'];
                        // $start_time = $row['start_time'];
                        // $end_time = $row['end_time'];
                        // $status = $row['status'];
                        // $token = $row['token_nu'];
                        // $suser_id = $row['suser_id'];

                        // $time = "SELECT TIME_TO_SEC(TIMEDIFF('$start_time', '$end_time')) as time;";
                        // $time_diff = mysqli_query($connection, $time) or die("Failed");
                        // $diffTime = mysqli_fetch_assoc($time_diff);
                        // $value = abs($diffTime['time']);
                        // $taka = ceil(($value / 3600) * 250);
                ?>
                <tr>
                    <th scope="row"><?php echo $count++; ?></th>
                    <td><?php // echo $name; ?></td>
                    <td><?php // echo $location; ?></td>
                    <td><?php // echo $rfid; ?></td>
                    <td><?php // echo $start_time; ?></td>
                    <td><?php // echo $end_time; ?></td>
                    <td><?php // echo $taka; ?></td>

                    <?php // if ($status == 'unpaid') { ?>
                    <th><a href="./payment.php?token=<?php // echo $token; ?>&taka=<?php // echo $taka; ?>&suser_id=<?php // echo $suser_id; ?>&location=<?php // echo $location ?>" class="btn btn-sm btn-success">Pay with Bkash</a></th>
                    <?php // } else { ?>
                    <th><a href="" class="btn btn-sm btn-success disabled">Payment Done</a></th>
                    <?php // } ?>
                </tr>

                <?php 
                    // }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../footer.php'; ?>