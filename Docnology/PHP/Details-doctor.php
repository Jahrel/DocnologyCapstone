<?php
  include_once('dbconnect.php');
// so i made changes here 
  if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $about = $_POST['aboutme'];
    $dob = $_POST['dob'];
    $phone = $_POST['phonenumber'];

    session_start();
    require("dbconnect.php");
    $username = $_SESSION['susername'];
    $sql = 'SELECT `id`,`email` from `users` where username= "'. $username .'"';
    $result = mysqli_fetch_assoc($conn->query($sql));
    $email = $result['email'];
    $userid = $result['id'];

    $yop = $_POST['yop'];
    $specialization = $_POST['specialization'];

    $certification = $_FILES['certificate']['name'];
    $cert_temp = $_FILES['certificate']['tmp_name'];
    $cert_folder = "C:/xampp\Doc\htdocs\DocnologyCapstone\Docnology\Certificates/" . $certification;
    if (move_uploaded_file($cert_temp, $cert_folder)) {
      echo "<script>console.log('Certificate Uploaded');</script>";
    } else {
        echo "<script>console.log('Certificate Not Uploaded');</script>";
    }

    $licence = $_POST['licence'];

    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "C:/xampp\Doc\htdocs\DocnologyCapstone\Docnology\Images\img/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
      echo "<script>console.log('Image Uploaded');</script>";
    } else {
        echo "<script>console.log('Image Not Uploaded');</script>";
    }

    if (!isset($_POST['monday-s'])){
      $monday = array("Unavailable");
    } else {
      $monday = array($_POST['monday-s'], $_POST['monday-e']);
    }
    
    if (!isset($_POST['tuesday-s'])){
      $tuesday = array("Unavailable");
    } else {
      $tuesday = array($_POST['tuesday-s'], $_POST['tuesday-e']);
    }

    if (!isset($_POST['wednesday-s'])){
      $wednesday = array("Unavailable");
    } else {
      $wednesday = array($_POST['wednesday-s'], $_POST['wednesday-e']);
    }

    if (!isset($_POST['thursday-s'])){
      $thursday = array("Unavailable");
    } else {
      $thursday = array($_POST['thursday-s'], $_POST['thursday-e']);
    }

    if (!isset($_POST['friday-s'])){
      $friday = array("Unavailable");
    } else {
      $friday = array($_POST['friday-s'], $_POST['friday-e']);
    }

    if (!isset($_POST['saturday-s'])){
      $saturday = array("Unavailable");
    } else {
      $saturday = array($_POST['saturday-s'], $_POST['saturday-e']);
    }

    $availability = json_encode(array($monday,$tuesday,$wednesday,$thursday,$friday,$saturday));
    $approval_status = "Pending";
    $stmt = $conn->prepare("INSERT INTO doctors(id,fullname, gender, aboutme, dob, phone_number, contact_email,image, 
    availability, years_of_practice, specialty, certification, licence_number, approval_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("isssssssssssss", $userid,$name, $gender, $about, $dob, $phone, $email, $filename, $availability, $yop, $specialization, $certification, $licence, $approval_status);
            $stmt->execute();
            $stmt->close();
            $conn->close();


// to here
    echo "<script> alert('Application pending approval. You will be notified once approved') </script>";
    echo "<script> window.location.href='../Pages/Index.html' </script>";

    $conn->close();
  }


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Doctor Form</div>
    <div class="content">
        <form action="/PHP/details-doctor.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Profile Picture</span>
            <input type="file" id="img" name="img" accept="image/*">
          </div>
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <input type="text" name="gender" placeholder="Enter your Gender" required>
          </div>
          <div class="input-box">
            <span class="details">About Me</span>
             <textarea type="text" name="aboutme"  placeholder="Please tell us about you and Who you are" rows="4" cols="50"> </textarea>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="dob" placeholder="Enter Your Date of Birth" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phonenumber" placeholder="Enter Your Phone Number" required>
          </div>
          <!-- i removed the email field since its already in the database -->
          <div class="input-box">
            <span class="details">Years of Practice</span>
            <input type="text" name="yop" placeholder="Enter Your years of experience" required>
          </div>
          <div class="input-box">
            <span class="details">Specialization</span>
            <input type="text" name="specialization" placeholder="Enter your Specialization" required>
        </div>
        <div class="input-box">
            <span class="details">Medical Certificate </span>
            <input type="file" name="certificate" placeholder="Upload your certificate" required>
        </div>
        <div class="input-box">
            <span class="details">Medical License Number </span>
            <input type="text" name="licence" placeholder="Enter your Medical License Number " required>
        </div>
        <!-- below the users can enter their schedules from monday - saturday (9:00 am - 5:00PM) -->
        <!-- If the user presses the checkbox they are automatically seen as unavailable for the day -->
        <!-- Please fix up the css for the below -->
        <div class="title">Set Availability</div>
        <div>
          <span>Monday:</span>
          <input id="toggle-trigger" type="checkbox" data-toggle="toggle" name="unav-m" class="toggle-m" onclick="unavailable('monday','toggle-m')" />
          <label for="unav-m">Unavailable</p>
          <input type="time" id="monday" class="monday" name="monday-s" min="09:00" max="17:00">
          <span>-</span>
          <input type="time" id="monday" class="monday" name="monday-e" min="09:00" max="17:00">
        </div>
        <div>
          <span>Tuesday:</span>
          <input id="toggle-trigger" type="checkbox" data-toggle="toggle" name="unav-t" class="toggle-t" onclick="unavailable('tuesday','toggle-t')">
          <label for="unav-t">Unavailable</p>
          <input type="time" id="tuesday" class="tuesday" name="tuesday-s" min="09:00" max="17:00">
          <span>-</span>
          <input type="time" id="tuesday" class="tuesday" name="tuesday-e" min="09:00" max="17:00">
        </div>
        <div>
          <span>Wednesday:</span>
          <input id="toggle-trigger" type="checkbox" data-toggle="toggle" name="unav-w" class="toggle-w" onclick="unavailable('wednesday','toggle-w')">
          <label for="unav-w">Unavailable</p>
          <input type="time" id="wednesday" class="wednesday" name="wednesday-s" min="09:00" max="17:00">
          <span>-</span>
          <input type="time" id="wednesday" class="wednesday" name="wednesday-e" min="09:00" max="17:00">
        </div>
        <div>
          <span>Thursday:</span>
          <input id="toggle-trigger" type="checkbox" data-toggle="toggle" name="unav-r" class="toggle-r" onclick="unavailable('thursday','toggle-r')">
          <label for="unav-r">Unavailable</p>
          <input type="time" id="thursday" class="thursday" name="thursday-s" min="09:00" max="17:00">
          <span>-</span>
          <input type="time" id="thursday" class="thursday" name="thursday-e" min="09:00" max="17:00">
        </div>
        <div>
          <span>Friday:</span>
          <input id="toggle-trigger" type="checkbox" data-toggle="toggle" name="unav-f" class="toggle-f" onclick="unavailable('friday','toggle-f')">
          <label for="unav-f">Unavailable</p>
          <input type="time" id="friday" class="friday" name="friday-s" min="09:00" max="17:00">
          <span>-</span>
          <input type="time" id="friday" class="friday" name="friday-e" min="09:00" max="17:00">
        </div>
        <div>
          <span>Saturday:</span>
          <input id="toggle-trigger" type="checkbox" data-toggle="toggle" name="unav-s" class="toggle-s" onclick="unavailable('saturday','toggle-s')">
          <label for="unav-s">Unavailable</p>
          <input type="time" id="saturday" class="saturday" name="saturday-s" min="09:00" max="17:00">
          <span>-</span>
          <input type="time" id="saturday" class="saturday" name="saturday-e" min="09:00" max="17:00">
        </div>


        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
    <style> 
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(to right, #5bacdf, white);
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(to right, #5bacdf, white);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box textarea{
  height: 145px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(to right, #5bacdf, white);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(to right, #5bacdf, white);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
    </style>
    
    <script>
      function unavailable(date, toggle_class){
        console.log("hello");
        toggle = document.getElementsByClassName(toggle_class)[0];
        day = document.getElementsByClassName(date);
        if (toggle.checked){
          for (let i = 0; i < day.length; i++) {
            day[i].disabled = true;
            day[i].value = '00:00';
          }

          console.log("disabled");
        } else {
          
          for (let i = 0; i < day.length; i++) {
            day[i].disabled = false;
          }
          console.log("enabled");
        }
      }
    </script>
    </html>
