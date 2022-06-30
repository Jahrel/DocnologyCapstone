<?php
    include_once('dbconnect.php');

    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        
        $address = $_POST['address'];
        $phone = $_POST['phonenumber'];
        $dob = $_POST['dob'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bloodtype = $_POST['bloodtype'];
        $emergency = $_POST['emergency'];
        $pasthistory = $_POST['surgery'];
        $conditions = $_POST['conditions'];

        $sql = "INSERT INTO patients(fullname, sex, uaddress, uheight, uweight, DOB, phone_number, 
        bloodtype, medical_conditions, econtact, past_history) VALUES ($fullname, $address, $phone, $dob, $height, $weight,
        $bloodtype, $emergency, $pasthistory, $conditions)";
        $conn->query($sql);
        $conn->close();
        echo"<script>alert('Successfully Registered')</script>";
        echo"<script>window.location.href='../Pages/docdashboard.html'</script>";
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
    <div class="title">Patient Form</div>
    <div class="content">
        <form action="/PHP/patient-profile.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <input type="text" name="gender" placeholder="Enter your Gender" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phonenumber" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Emergency Contact</span>
            <input type="text" name="emergency" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
          <span class="details">Date of Birth </span>
          <input type="date" name="dob" placeholder="Date" value="Date" required>
        </div>
        <div class="input-box">
            <span class="details">Blood Type</span>
            <input type="text" name="bloodtype" placeholder="Enter your Height" required>
          </div>
          <div class="input-box">
            <span class="details">Height(metres)</span>
            <input type="number" name="height" placeholder="Enter your Height" required>
          </div>
          <div class="input-box">
            <span class="details">Weight(lbs)</span>
            <input type="number" name="weight" placeholder="Enter your Weight" required>
          </div>
          <div class="input-box">
            <span class="details">Past Surgeries</span>
            <input type="text" name="surgery" placeholder="Enter your Past Surgeries" required>
          </div>
          <div class="input-box">
            <span class="details">Medical Condition</span>
             <textarea type="text" name="conditions"  placeholder="Please enter your past medical history(Allergies,Habits)" rows="4" cols="50"> </textarea>
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
    
    </html>
