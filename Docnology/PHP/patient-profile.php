<?php
    
    if(isset($_POST["submit"]))
        {
          session_start();
          require("dbconnect.php");
          $username = $_SESSION['susername'];
          $sql = 'SELECT `id`,`email` from `users` where username= "'. $username .'"';
          $result = mysqli_fetch_assoc($conn->query($sql));
          $email = $result['email'];
          $userid = $result['id'];
          $name = $_POST["name"];
          $address= $_POST["address"];
          $date = $_POST["dob"];
          $height = $_POST["height"];
          $weight = $_POST["weight"];
          $conditions = $_POST["conditions"];
          $gender = $_POST["gender"];
          $phonenumber = $_POST["phonenumber"];
          $bloodtype = $_POST["bloodtype"];
          $econtact = $_POST["emergency"];
          $past_history = $_POST["surgery"];
          $submit = $_POST["submit"];
          $stmt = $conn->prepare("INSERT INTO patients(id,fullname,sex,uaddress,uweight,uheight,dob,phone_number,bloodtype,medical_conditions,econtact,past_history) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('isssidssssss',$userid,$name,$gender,$address,$weight,$height,$date,$phonenumber,$bloodtype,$conditions,$econtact,$past_history);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Docnology Paitent Profile</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

   
    <link rel="stylesheet" href="../Styles/patient-profile.css" />
    <script src="../Scripts/patient-profile.js"></script>
    
</head>
<body>
		
<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Docnology Patient Profile</h1>
                <p>The Best Telemedicine</p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
             <h3> <?php echo $name ?> </h3> 
          </div>
          <div class="card-body">
          <p class='mb-0'><strong class='pr-1'>Date Of Birth:</strong>  <?php echo $_POST["dob"] ?></p>
            <p class='mb-0'><strong class='pr-1'>Address:</strong><?php echo $_POST["address"] ?></p>
            <p class='mb-0'><strong class='pr-1'>Email:</strong><?php echo $email ?></p>
            <p class='mb-0'><strong class='pr-1'>Phone Number:</strong><?php echo $_POST["phonenumber"] ?></p>
            <p class='mb-0'><strong class='pr-1'>Emergency Contact:</strong><?php echo $_POST["emergency"] ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Patient Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td><?php echo $_POST["gender"]?></td>
              </tr>
              <tr>
                <th width="30%">Weight</th>
                <td width="2%">:</td>
                <td><span id='result'><?php echo $_POST["weight"]?>  </span></td>
              </tr>
              <tr>
                <th width="30%">Height</th>
                <td width="2%">:</td>
                <td><?php echo $_POST["height"]?></td>
              </tr>
              <tr>
                <th width="30%">Blood Type</th>
                <td width="2%">:</td>
                <td><?php echo $_POST["bloodtype"]?></td>
              </tr>
              <tr>
                <th width="30%">Past Surgery</th>
                <td width="2%">:</td>
                <td><?php echo $_POST["surgery"]?></td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Medical Condition</h3>
          </div>
          <div class="card-body pt-0">
              <p><?php echo $_POST["conditions"]?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->

	</body>
    <style> 
            body {
            background: linear-gradient(to right, #5bacdf, white);
            padding: 0;
            margin: 0;
            font-family: 'Lato', sans-serif;
            color: #000;
        }

        .student-profile .card {
            border-radius: 10px;
        }

        .ScriptHeader .rt-container .col-rt-12 .rt-heading{
        
                color: #777;
                margin: 0 0 40px;
                padding: 0;
                text-align: center;

        }

        .student-profile .card .card-header .profile_img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 10px auto;
            border: 10px solid #ccc;
            border-radius: 50%;
        }

        .student-profile .card h3 {
            font-size: 20px;
            font-weight: 700;
        }

        .student-profile .card p {
            font-size: 16px;
            color: #000;
        }

        .student-profile .table th,
        .student-profile .table td {
            font-size: 14px;
            padding: 5px 10px;
            color: #000;
        }


    </style>
</html>

  