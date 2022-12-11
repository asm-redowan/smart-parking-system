<?php include '../header.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-12 text-center pt-4">
      <h3 class="events">Sign UP</h3>
   </div>

    <div class="col-md-6">
        <form class="row g-3" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" name="fname" class="form-control" placeholder="Maikel" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" name="lname" class="form-control" placeholder="Jack" required>
            </div>

            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Email Address</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="email" class="form-control" placeholder="maikel.jack@gmail.com"
                        aria-describedby="inputGroupPrepend" required>
                </div>
            </div>



            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="*******" id="validationCustom03" required>
                
            </div>

            <div class="col-12">
                <button class="btn btn-success" name="submit" type="submit">Sign Up</button>
            </div>
        </form>

        <div class="row">
            <p class="pt-4">Already have an account? <a class="link-primary" href="./login.php">Go back to Login</a></p>
        </div>

        <?php 
            include './config.php';
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $fullName = $fname . ' ' . $lname;

                $query = "INSERT INTO client(name, email, password) VALUES('$fullName', '$email', '$password')";
                $result = mysqli_query($connection, $query) or die("<br><div class='alert alert-danger' role='alert'>
                Something went wrong!
            </div>");

                ?>
                <br>
                <div class="alert alert-success" role="alert">
                    Your account has been successfully created.
                </div>
                <?php
            }
        ?>
    </div>


</div>

<?php include '../footer.php'; ?>