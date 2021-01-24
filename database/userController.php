<?php 
session_start();
require "./database/DBController.php";

$errors=array();
$username="";
$email="";
if(isset($_POST['signup-btn']))

{


    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordConf=$_POST['passwordConf'];

    if(empty($username))
    {
        $errors['username']="username required";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $errors['email']="Email address is invalid";
    }
    if(empty($email))
    {
        $errors['email']="Email required";
    }
    if(empty($password))
    {
        $errors['password']="password required";
    }

    if($password!==$passwordConf)
    {
        $errors['password']="password do not match";
    }

    $emailQuery="SELECT * FROM user WHERE email=? LIMIT 1";

    $stmt=$con->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result=$stmt->get_result();
    $userCount=$result->num_rows;
    $stmt->close();

    if($userCount>0)
    {
        $errors['email']="email is already exists";
    }
    
    if(count($errors)===0)
    {
        $password=password_hash($password,PASSWORD_DEFAULT);
        $token=bin2hex(random_bytes(50));
        $verified=false;

        $sql="INSERT INTO user (username,email,password,verified,token) VALUES (?,?,?,?,?)";
        $stmt=$con->prepare($sql);
        $stmt->bind_param('sssbs',$username,$email,$password,$verified,$token);
        
        if($stmt->execute())
        {
            $_SESSION['user_id']=$user_id;
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['verified']=$verified;

            $_SESSION['message']="You are now logged in ";
            $_SESSION['alert-class']="alert-success";

            header('location:index.php');
            exit();
        }else{
            $errors['db_error']="database error couldnt register";
        }
    }

}
?>