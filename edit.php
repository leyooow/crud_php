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

    <title>Edit</title>

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
        <form action="info.php" method="post" class="edit_form">
            <input type="hidden" name="user_id" value="<?= $user['id']; ?>" />

            <h4>Edit User
                <a href="index.php" class="btn btn btn-primary" style="float:right;"> Back</a>
            </h4>

            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" 
                name="firstName" aria-describedby="firstName" value="<?= $user['firstName']; ?>"
                    placeholder="First Name" required onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">

            </div>



            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" 
                value="<?= $user['lastName']; ?>" aria-describedby="lastName"
                    onblur="this.capitalize(this.value);" placeholder="Last Name" required
                    onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">

            </div>


            <div class="form-group">
                <label for="cellNumber">Cellphone Number</label>
                <input type="text" class="form-control" id="cellNumber" 
                value="<?= $user['cellNumber']; ?>" name="cellNumber"
                    aria-describedby="cellNumber" onblur="this.capitalize(this.value);" placeholder="Cellphone Number"
                    required>

            </div>


            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address"
                value="<?= $user['address']; ?>" name="address" aria-describedby="address"
                    placeholder="Address" onblur="this.value=removeSpaces(this.value);" required>

            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                value="<?= $user['email']; ?>" aria-describedby="email"
                    placeholder="Email" pattern="[^\s]+" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>

            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block" name="save_edit" id="form_btn">Save</button>



        </form>


        <?php

            }
        }

    ?>



    </div>





</body>

</html>