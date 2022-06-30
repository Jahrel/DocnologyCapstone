<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title>Landing Page With Light/Dark Mode</title>
    <link rel="stylesheet" href="../Styles/Index.css">
</head>

<body>
    <main>
        <div class="big-wrapper light">
            <img src="../Images/img/shape.png" alt="" class="shape">

            <header>
                <div class="container">
                    <div class="logo">
                        <img src="../Images/img/logo.png" alt="Logo">
                        <h3>Docnology</h3>
                    </div>

                    <div class="links">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="Signup.php" class="btn">Sign up</a></li>
                        </ul>
                    </div>

                    <div class="overlay"></div>

                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </header>

            <div class="showcase-area">
                <div class="container">
                    <div class="left">
                        <div class="big-title">
                            <h1>Future is here,</h1>
                            <h1>Start Exploring now.</h1>
                        </div>
                        <p class="text">
                            Docnology is a healthcare application created to bridge the gap between patients and medical professionals. 
One of Docnology’s main goals is increasing the convenience of all our users; both doctors and patients with our easy to navigate platform which
                            facilitates the scheduling of appointments, payments and communication between patients and doctors.
                        </p>
                        <div class="cta">
                            <a href="signup.php" class="btn">Get started</a>
                        </div>
                    </div>

                    <div class="right">
                        <img src="../Images/img/person.png" alt="Person Image" class="person">
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


