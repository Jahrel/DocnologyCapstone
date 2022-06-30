<?php

  if (isset($_POST['appointment_btn'])){
    $doctorid = $_POST['appointment_btn']; //use this doctor id to store the appointment information in the database
  }

  // okay so create an appointments table in your database that will accept the following:
  // All the information from the form
  // the doctor and patient id
  // also in the form below show the doctor name and specialty so the user can know which doctor the choose
  // so maybe title the form - 
  //    APPOINTMENT FOR [DOCTOR_NAME]
  //           GYNAECOLOGIST
  // [//form contents                     ]


?>
<html lang="en">
<head>
<script type="text/javascript" src="https://github.com/rubyeffect/easy_fill/tree/master/lib/easy_fill-0.0.1.min.js"></script>
  <title>Reach Me</title>
  <link rel="stylesheet" type="text/css" href="../Styles/appointment.css" />
</head>

<body>
  <div id="container">
    <!--This is a division tag for body container-->
    <div id="body_header">
      <!--This is a division tag for body header-->
      <h1>Appointment Request Form</h1>
      
    </div>
    <form action="index.html" method="post">
      <fieldset>
        <legend><span class="number">1</span>Your basic details</legend>
        <label for="name">Name*:</label>
        <input type="text" id="name" name="user_name" placeholder="Atchyut (only first names)" required pattern="[a-zA-Z0-9]+">

        <label for="mail">Email*:</label>
        <input type="email" id="mail" name="user_email" placeholder="abc@xyz.com" required>

        <label for="tel">Contact Num:</label>
        <input type="tel" id="tel" placeholder="Include country code" name="user_num">

        <input type="hidden" id="doctorid" name="doctorid" value="<?php echo $doctorid;?>"/>

      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Appointment Details</legend>
        <label for="appointment_for">Appointment for*:</label>
        <select id="appointment_for" name="appointment_for" required>
          <option value="coffee">Coffee</option>
          <option value="meeting">Meeting</option>
          <option value="Business">Business</option>
          <option value="lunch">Lunch</option>
          <option value="skype">Skype</option>
          <option value="movie">Movie</option>
          <option value="couple_date">Date</option>
        </select>
        <label for="appointment_description">Appointment Description:</label>
        <textarea id="appointment_description" name="appointment_description" placeholder="I wish to get an appointment to skype for resolving a software problem."></textarea>
        <label for="date">Date*:</label>
        <input type="date" name="date" value="" required></input>
        <br>
        <label for="time">Time*:</label>
        <input type="time" name="time" value="" required></input>
        <br>
      </fieldset>
      <button type="submit">Request For Appointment</button>
    </form>
  </div>
</body>

</html>
