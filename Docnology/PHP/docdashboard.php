<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title>Landing Page With Light/Dark Mode</title>
    <link rel="stylesheet" href="../Styles/docdashboard.css">
</head>

<body>
    <main>
        <div class="big-wrapper light">
        <?php include('../PHP/header.php');?>

            <div class="showcase-area">
                <div class="container">
                    <div class="left">
                        <div class="big-title">
                            <h1>Welcome to Docnology!</h1>
                        <!--    <h1>Start Exploring now.</h1> -->
                        </div>
                        <p class="text">
                            Our goal is to provide affordable, easily accessible and a high standard of healthcare services to our users.
Docnology caters to doctors who have an interest in expanding their practice from the comfort of their home or office.
As a doctor on Docnology you will be able to accept your patients and view their medical history.
You can also edit your own profile, appointment schedule, take notes and accept payments via the platform. 
                       <br> Thank you for signing up with Docnology.
                        </p>
                    <!--    <div class="cta">
                            <a href="#" class="btn">Get started</a>
                        </div> -->
                    </div>
                    


                    <div class="right">
                        <img src="../Images/img/docroom.jpg" alt="Person Image" class="person"> 

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