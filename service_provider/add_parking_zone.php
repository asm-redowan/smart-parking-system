<?php include '../header.php'; ?>
<?php include './navbar.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events">Add Parking Zone</h3>
   </div>

    <div class="col-md-4 p-4">
        <form class="row g-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Your Location:</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Parking Area Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="col-12">
                <button class="btn btn-success" name="submit" type="submit">Submit</button>
            </div>
        </form>

        <?php 
        include './config.php';
        if (isset($_POST['submit'])) {
            $location = $_POST['location'];
            $name = $_POST['name'];
            $suser_id = $_SESSION['suser_id'];
            // echo $location. ' ' . $name . ' ' . $suser_id;

            $query = "INSERT INTO parking_spot values($suser_id, '$location', '$name')";
            $result = mysqli_query($connection,$query) or die("<br><div class='alert alert-danger' role='alert'>
            Something went wrong!
        </div>");
        ?>
                <br>
                <div class="alert alert-success" role="alert">
                    Your location has been updated successfully.
                </div>
        <?php                
            }
        ?>
    </div>
</div>

<?php include '../footer.php'; ?>