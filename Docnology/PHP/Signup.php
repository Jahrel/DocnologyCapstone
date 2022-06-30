<?php

    //Making connection to Docnology database
    include_once('dbconnect.php');

    //Handling of user of they are a patient
    if(isset($_POST['patient'])){
        $username = $_POST['username'] ;
        session_start();
        $_SESSION["susername"] = $username;
        echo '<script>alert "'. $_SESSION['susername'] .'"</script>';
        $email =  $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $ret = mysqli_query($conn, "SELECT username FROM users WHERE username='$username' OR email='$email'");
        $result = mysqli_fetch_array($ret);
        if($result>0){
            echo "<script>alert('This email or username already associated with another account')</script>";
        }else{
            $stmt = $conn->prepare("INSERT INTO users(username,email,upassword) VALUES (?,?,?)");
            $stmt->bind_param("sss", $username,$email,$password);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo"<script>alert('Successfully Registered')</script>";
            echo"<script>window.location.href='../PHP/Details-patient.php'</script>";
            }
        }

    //Handling of user if they are a medical professional
    if(isset($_POST['professional'])){
        $username = $_POST['username'] ;
        session_start();
        $_SESSION["susername"] = $username;
        echo '<script>alert "'. $_SESSION['susername'] .'"</script>';
        $email =  $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $ret = mysqli_query($conn, "SELECT username FROM users WHERE username='$username' OR email='$email'");
        $result = mysqli_fetch_array($ret);
        if($result>0){
            echo "<script>alert('This email or username already associated with another account')</script>";
        }else{
            $stmt = $conn->prepare("INSERT INTO users(username,email,upassword) VALUES (?,?,?)");
            $stmt->bind_param("sss", $username,$email,$password);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo"<script>alert('Successfully Registered')</script>";
            echo"<script>window.location.href='../PHP/Details-doctor.php'</script>";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Styles/Signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <h1>Registration</h1>
        <form  action = "../PHP/Signup.php" method="POST">
                <div class="input-box">
                   <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required="">
                </div>
                <div class="input-box">
                    <input type="password" name="rpassword" placeholder="Repeat Password" required>
                </div>
            
                <div class="input-box">
                    <input type="submit" id="patient_btn" name="patient" value="Patient ">
                    <input type="submit" id="medical_btn" name="professional" value="Medical Professional ">
                </div>
                <div class="signin">
                    <a href="Login.php">Already have an account? Sign in</a>
                </div>
        </form>
    </div>
    <!-- <script src="/Scripts/Userhandling.js"></script> -->
</body>

</html>