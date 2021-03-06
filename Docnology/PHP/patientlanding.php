<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title>Patient landing page</title>
    <link rel="stylesheet" href="../Styles/patient landing.css">
</head>

<body>
    <main>
        <?php include('../PHP/header.php');?>

            <div class="showcase-area">
                <div class="container">
                    <div class="left">
                        <div class="big-title">
                            <h1>Welcome to Docnology!</h1>
                            
                        </div>
                        <p class="text">
                            Our goal is to provide affordable, easily accessible, high standard healthcare services to our users.
                            <br>With over 50 qualified healthcare professionals registered on our system, we are able to provide world class health services 
                            in a jiffy to our valid customers from the comfort of any location which they are currently in. As a member of docnology you are able to schedule 
                            an appointment with one of our pristine doctors, make payments for your doctor visit, edit your user profile as well as view and download your medical 
                            history present on docnology.
                            <br> Thank you for signing up with Docnology.
                        </p>
                        <div class="cta">
                            <a href="../PHP/doctors.php" class="btn">Schedule appointment</a>
                        </div>
                    </div>

                    <div class="right">
                        <img src="../Images/img/tele.jpg" alt="Person Image" class="person">
                    </div>
                </div>
            </div>

            <div class="bottom-area">
                <div class="container">
                    <button class="toggle-btn">
              <i class="far fa-moon"></i>
              <i class="far fa-sun"></i>
            </button>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="../Scripts/app.js"></script>
</body>

</html>