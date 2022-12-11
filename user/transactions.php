<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-12 text-center">
      <h3 class="events">Transactions Records</h3>
   </div>

   <?php 
    include './config.php';
    $cuser_id = $_SESSION['cuser_id'];

    $query = "select s.name, p.cuser_id, p.payment, p.trxid, b.suser_id, b.location, b.start_time, b.end_time
    from (
        booking as b
        INNER join parking_spot as s 
        on b.suser_id = s.suser_id
        INNER join payment p 
        on p.cuser_id = b.cuser_id
    )
    where b.status = 'paid' and p.cuser_id = '$cuser_id'
    GROUP BY p.cuser_id, p.token_nu";
    
    $result = mysqli_query($connection, $query) or die("Failed");
    $count = mysqli_num_rows($result);

    if($count > 0){
    ?>

    <div class="col-md-10">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th  scope="col">#</th>
                    <th scope="col">Parking Name</th>
                    <th scope="col">Entry Date and Time</th>
                    <th scope="col">Exit Date and Time</th>
                    <th scope="col">Total Cost(Taka)</th>
                    <th scope="col">TrxID</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        $trxid = $row['trxid'];
                        $payment = $row['payment'];
                        $location = $row['location'];
                        $start_time = $row['start_time'];
                        $end_time = $row['end_time'];
                        
                        
                        $time = "SELECT TIME_TO_SEC(TIMEDIFF('$start_time', '$end_time')) as time;";
                        $time_diff = mysqli_query($connection, $time) or die("Failed");
                        $diffTime = mysqli_fetch_assoc($time_diff);
                        $value = abs($diffTime['time']);
                        $taka = ceil(($value / 3600) * 250);
                ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $start_time; ?></td>
                    <td><?php echo $end_time; ?></td>
                    <td><?php echo $payment; ?></td>
                    <td><?php echo $trxid; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php 
    } else {
    ?>
    <div class="col-md-10 text-center">
        <p>No transactions completed yet!</p>
    </div>
    <?php }?>
</div>

<?php include '../footer.php'; ?>