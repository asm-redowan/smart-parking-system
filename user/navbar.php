<?php include '../header.php'; ?>
<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./home.php">Smart Parking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
        <a class="nav-link" href="./booking_records.php">Booking Records</a>
        <a class="nav-link" href="./transactions.php">Transactions</a>
        <a class="nav-link" href="./logout.php">Logout</a>
      </div>

    </div>

    <form class="d-flex" method="get" action="./search.php">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

  </div>
</nav>