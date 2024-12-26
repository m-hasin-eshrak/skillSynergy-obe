
<?php

$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'db.php';

    $ID = $_POST['id'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    if ($userType == 'student') {
        $std = "SELECT * from students where s_id='$ID' and password='$password'";
        $result = mysqli_query($conn, $std);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $invalid = 0;
                session_start();
                $_SESSION['ID'] = $ID;
                $_SESSION['userType'] = $userType;
                header('location:student_dashboard.php');
            }
        }
    } 
    elseif ($userType == 'instructor') {
        $std = "SELECT * from instructors where i_id='$ID' and password='$password'";
        $result = mysqli_query($conn, $std);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $invalid = 0;
                session_start();
                $_SESSION['ID'] = $ID;
                $_SESSION['userType'] = $userType;
                header('location:instructor_dashboard.php');
            }
        }
    } 
    elseif ($userType == 'admin') {
        $std = "SELECT * from admins where i_id='$ID' and password='$password'";
        $result = mysqli_query($conn, $std);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $invalid = 0;
                session_start();
                $_SESSION['ID'] = $ID;
                $_SESSION['userType'] = $user;
                header('location:admin_dashboard.php');
            }
        }
    } 
    else {
        $invalid = 1;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <link rel="stylesheet" href="style.css">
    <title>Skill Synergy</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="navbar_custom nav-container">
            <img src="skill-Synergy.png" alt="" class="nav__logo">
            
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="homepage.php" class="nav__link">Home</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">About Us</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Services</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Featured</a>
                    </li>

                    <li class="nav__item">
                        <a href="contact_page.php" class="nav__link">Contact Us</a>
                    </li>
                </ul>

                <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__actions">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
                <!-- Login button -->
                <i class="ri-user-line nav__login" id="login-btn"></i>

                <!-- Toggle button -->

            </div>
        </nav>
    </header>

    <!--==================== LOGIN ====================-->

    <div class="login" id="login">
        <form action="homepage.php" class="login__form" method="POST">
            <h2 class="login__title">Log In</h2>

            <div class="login__group">
                <div>
                    <label for="id" class="login__label">ID</label>
                    <input type="text" placeholder="Enter your ID" id="id" name="id" class="login__input">
                </div>

                <div>
                    <label for="password" class="login__label">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" name="password" class="login__input">
                </div>
                <div>
                    <label for="userType" class="login__label">User Type</label>
                    <select id="userType" name="userType" class="login__select" required>
                        <option value="" selected disabled hidden>Select User Type</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div>
                <p class="login__signup">
                    You do not have an account? <a href="#">Sign up</a>
                </p>

                <a href="#" class="login__forgot">
                    You forgot your password
                </a>

                <button type="submit" class="login__button">Log In</button>
            </div>
        </form>

        <i class="ri-close-line login__close" id="login-close"></i>
    </div>


 <!--=============== IMAGE CONTAINER ===============-->
 <div class="image-container">
        <img src="bg.jpg" alt="Your image">
        <div class="overlay">
            <div class="tagline">
                <p>Welcome to Skill-Synergy</p>
            </div>
            <div class="description">
                <p>We believe in learning through hands-on project.<br> Join us and unleash your
                    creativity and innovation</p>
            </div>
            <div class="overlay-buttons">
                <a href="">
                    <button class="overlay-button-1"><a href="#">Learn More</a></button>
                </a>
                <a href="">
                    <button class="overlay-button-2"><a href="contact_page.php">Contact Us</a></button>
                </a>
            </div>
        </div>
    </div>

    <div class="empowering-container">
        <div class="empowering-img">
            <img src="bg.jpg" alt="">
        </div>
        <div class="empowering-content">
            <div class="empowering-heading">
                <h1>Empowering Students <br>
                    Through Practical Projects</h1>
            </div>
            <div class="empowering-bottom">
                <div class="empowering-benefits">
                    <i class="ri-user-line"></i>
                    <h3>Benefits:</h3>
                    <p>Develop critical thinking <br>
                        problem-solving and teamwork <br>abilities through immense project <br> experiences</p>
                </div>
                <div class="empowering-projects">
                    <i class="ri-user-line"></i>
                    <h3>Projects:</h3>
                    <p>Develop critical thinking <br>
                        problem-solving and teamwork <br>abilities through immense project <br> experiences</p>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-container">
        <div class="contact-us-details">
            <p>Get Help!</p>
            <h1>Contact Us</h1>
            <p>if you have any questions or need assistance with your project, <br> please feel free to reach out to us. </p>
        </div>
        <div class="contact-us-info">
            <div class="logo">
                <div style="
                margin-bottom: 30px; margin-top: 2px;
            "><i class="ri-mail-line"></i></div>
                <div style="
                margin-bottom: 30px;
            ">
                    <i class="ri-phone-line"></i>
                </div>
            </div>
            <div class="details">
                <div class="email">
                    <h3>Email</h3>
                    <a href="2121028@iub.edu.bd">2121028@iub.edu.bd</a>
                </div>
                <div class="phone">
                    <h3>Phone</h3>
                    <p>01753624072</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-container">
        <div class="footer-logo">
            <img src="skill-Synergy.png" alt="">
        </div>
        <div class="footer-col-1">
            <ul>
                <li>About Us</li>
                <li>Contact Us</li>
                <li>FAQs</li>
                <li>Support</li>
                <li>Blog</li>
            </ul>
        </div>
        <div class="footer-col-2">
            <ul>
                <li>Services</li>
                <li>Products</li>
                <li>Features</li>
                <li>Case Studies</li>
                <li>Testimonials</li>
            </ul>
        </div>
        <div class="footer-social-icon">
            <div style="
            margin-bottom: 10px; color: hsl(230, 12%, 40%); font-size: 40px;"><i class="ri-facebook-circle-fill"></i></div>
            <div style="
            margin-bottom: 10px; color: hsl(230, 12%, 40%); font-size: 40px;"><i class="ri-linkedin-box-fill"></i></div>
            <div style="
            margin-bottom: 10px; color: hsl(230, 12%, 40%); font-size: 40px;"><i class="ri-instagram-fill"></i></div>
        </div>
    </div>
    <script src="homepage.js"></script>
</body>

</html>