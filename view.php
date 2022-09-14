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

    <title>View</title>

</head>

<body>

    <script src="script.js"></script>

    <div class="container">

        <?php 

        if(isset($_GET['id'])){
            $user_id = mysqli_real_escape_string($conn, $_GET['id']); 
            $query = "SELECT * FROM users WHERE id='$user_id' ";
            $query_run  = mysqli_query($conn, $query); 

            if(mysqli_num_rows($query_run) > 0 ){

                $user = mysqli_fetch_array($query_run);
                ?>
        <form action="info.php" method="post" class="view_form"> 
            <input type="hidden" name="user_id" value="<?= $user['id']; ?>" />

            <h2 style="text-align:center;">User Information
                <a href="index.php" class="btn btn btn-primary" style="float:right;"> Back</a>
            </h2>

            <div class="form-group">
                <label for="firstName">First Name</label>
                <p class="form-control" id="firstName"> <?= $user['firstName']; ?> </p>

            </div>



            <div class="form-group">
                <label for="lastName">Last Name</label>
                <p class="form-control" id="lastName"> <?= $user['lastName']; ?> </p>

            </div>


            <div class="form-group">
                <label for="cellNumber">Cellphone Number</label>
                <p class="form-control" id="cellNumber"> <?= $user['cellNumber']; ?> </p>

            </div>


            <div class="form-group">
                <label for="address">Address</label>
                <p class="form-control" id="address"> <?= $user['address']; ?> </p>

            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <p class="form-control" id="email"> <?= $user['email']; ?> </p>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>

            </div>

            <!-- <button type="submit" class="btn btn-primary mx-auto d-block" name="save_edit">Save</button> -->



        </form>


        <?php

            }
        }

    ?>



    </div>





</body>

</html>