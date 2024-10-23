<?php
include('config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
     
    $getData = "select * from user where id = $id";
    $result = mysqli_query($conn,$getData);
    $row = mysqli_fetch_assoc($result);
    // var_dump($row);

    if(empty($row['id'])){
        header('location: read.php');
    }
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
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?= ($row['name'] ?? "") ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?= ($row['email'] ?? "") ?>" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">DOB</label>
                <input type="date" name="dob" id="dob" placeholder="DOB" value="<?= ($row['dob'] ?? "") ?>"required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select name="country" id="country" >
                    <option value="<?= ($row['country'] ?? "") ?>"><?= ($row['country'] ?? "")?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
            
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </form>
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

<?php
if(isset($_POST['update'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $dob= $_POST['dob'];
    $country= $_POST['country'];
    $password= $_POST['password'];

    var_dump($_POST);

    $update = "update user set name = '$name', email = '$email', dob = '$dob',country = '$country', password = '$password' where id = $id ";
    echo $update;
    if(mysqli_query($conn,$update)){
        echo "<script>window.location.href = 'read.php';</script>";
    }
}
?>