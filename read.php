<?php
session_start();
include('config/config.php');
$getdata = "select * from user";
$result = mysqli_query($conn,$getdata);

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
//   if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {

    header('location: index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container-sm">
    <a href="create.php" class="btn btn-primary">Add User</a>
    <?= ($_SESSION['id']) ?? "Hello" ?>
    <?= ($_COOKIE['name']) ?? "Hello" ?>
    <a href="logout.php">Logout</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Country</th>
      <th scope="col">DOB</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".($row['id'] ?? "-")."</td>";
        echo "<td>".($row['name'] ?? "-")."</td>";
        echo "<td>".($row['email'] ?? "-")."</td>";
        echo "<td>".($row['country'] ?? "-")."</td>";
        echo "<td>".(date('d-m-y', strtotime($row['dob'])) ?? "-")."</td>";
        echo "<td>".($row['password'] ?? "-")."</td>";
        echo "<td>".($row['role'] ?? "-")."</td>";
        echo "<td><a href='update.php?id=".$row['id'] ."'>Update</a><a href='delete.php?id=".$row['id'] ."'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    
  </tbody>
</table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
