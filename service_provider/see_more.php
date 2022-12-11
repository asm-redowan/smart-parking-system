<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>

<?php 
    include './config.php';

    if (isset($_GET['loc'])) {
        $location = $_GET['loc'];
        $parking_name = $_GET['name'];
        $suser_id = $_SESSION['suser_id'];

        // echo $location . ' \n' . $parking_name . ' ' . $suser_id;

        $query = "SELECT * 
        FROM booking as b 
        inner join client as c
        where suser_id = $suser_id
        and location = '$location' 
        and status = 'unpaid'
        and b.cuser_id = c.cuser_id";

        $result = mysqli_query($connection,$query) or die("Failed");
        $count = mysqli_num_rows($result);
        // echo $count;
    

        if($count > 0) {
?>


<div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events"><?php echo $parking_name ?></h3>
      <h6>Current Status</h6>
   </div>

   
   <div class="col-md-10">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th  scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Entry Time</th>
                    <th scope="col">RFID</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        $suser_id = $row['suser_id'];
                        $name = $row['name'];
                        $rfid = $row['rfid'];
                        $location = $row['location'];
                        $start_time = $row['start_time'];
                ?>
                <tr>
                    <th scope="row"><?php echo $count++; ?></th>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $location; ?></td>
                    <td><?php echo $start_time; ?></td>
                    <td><?php echo $rfid; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php } else { ?>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center pt-4">
        <h3 class="events">Not available</h3>
    </div>
<?php }} ?>

<?php include '../footer.php'; ?>