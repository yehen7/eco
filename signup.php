<?php

require_once './database/userController.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstap-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <!--Bootstrap-->
    <link rel="stylesheet" href="signup.css">
    <title>Register page</title>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-4 form-div">
            <form action="signup.php" method="POST">
                <h3 class="text-center">Register</h3>

            <?php
            
            if(count($errors)>0):
                
            
            ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach;?>

            </div>
                <?php endif;  ?>


                <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
                </div>
                
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-control-lg">
                </div>
                 
                <div class="form-group">
                <label for="passwordConf">Confirm Password</label>
                <input type="password" name="passwordConf" class="form-control form-control-lg">
                </div>

                <div class="form-grop">
                    <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                </div>
                <p class="text-center">Already a member?<a href="login.php">Sign In</a></p>
            </form>


        </div>
    </div>
</div>

<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>


