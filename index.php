<?php 
session_start();

require 'db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <title>Records</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Records
                            <a  href="add.php" class="btn btn-primary" id="btn-add">Add+</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Cellphone Number</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0 ) {

                                        foreach($query_run as $user) {
                                            ?>
                                        <tr>
                                            <td><?= $user['id']; ?></td>
                                            <td><?= $user['firstName']; ?></td>
                                            <td><?= $user['lastName']; ?></td>
                                            <td><?= $user['cellNumber']; ?></td>
                                            <td><?= $user['address']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td>
                                                <a href="view.php?id=<?= $user['id']; ?>" class="btn btn-info">View</a>
                                                <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-success">Edit</a>
                                                
                                                <form action="info.php" method="POST" class="d-inline"> 
                                                    
                                                    <button type="submit" name="delete_btn" value="<?= $user['id']; ?>" class="btn btn-danger">Delete</button>

                                                </form>
                                               
                                            

                                            </td>
                                        </tr>
                                            <?php
                                        }

                                    }else{
                                        echo "windows.alert('no records found')";
                                    }
                                ?>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>