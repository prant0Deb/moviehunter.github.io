<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require "include/cheak-admin.php";
require "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php include "include/navbar.php"; ?>


    <div class="table-responsive py-5 mx-3">
        <h2 class="text-danger text-center pb-4">All Users</h2>
        <table class="table table-dark table-hover text-white" style="font-size: .9em;">
            <thead class="thead-dark text-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">'User = 1' , 'Admin = 2'</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "select * from users where 1";
                $allusers = $connection->query($select);
                while ($row = $allusers->fetch_assoc()) {
                    echo "<tr>
                    <th scope='row'>" . $row['id'] . "</th>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['role'] . "</td>
                    <td>" . $row['created_at'] . "</td>
                    <td><a onclick=\"return confirm('Are you sure want to delete this?');\" class='text-decoration-none text-danger' href='deleteusers.php?id={$row['id']}'>Delete</a></td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

 

    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>