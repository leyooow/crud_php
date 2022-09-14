<?php 
    session_start();
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

    <title>ADD</title>

</head>

<body>

<script src="script.js"></script>

    <div class="container">

       
        <form class="add_form" action="info.php" method="post">
    

        <h4>Add User
        <a href="index.php" class="btn btn btn-info" style="float:right;"> View Records</a>
        </h4> 

     
        

            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="firstName"
                    placeholder="First Name" required onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">

            </div>



            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastName"
                onblur="this.capitalize(this.value);"
                    placeholder="Last Name" required onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">

            </div>


            <div class="form-group">
                <label for="cellNumber">Cellphone Number</label>
                <input type="number" class="form-control" id="cellNumber" name="cellNumber" aria-describedby="cellNumber"
                onblur="this.capitalize(this.value);"
                onkeypress="this.letters(this.value);"
                    placeholder="Cellphone Number" required>

            </div>


            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="address" placeholder="Address"
                onblur="this.value=removeSpaces(this.value);"
                    required>

            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email"
                    pattern="[^\s]+" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>

            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block" name="submit" id="form_btn">Add</button>

            

        </form>
    </div>





</body>

</html>