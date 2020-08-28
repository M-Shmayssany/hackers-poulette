<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$firstName;
$lastName;
$gender;
$country;
$email;
$subject;
$message;
$sendSuccess;
$serverMessage = "";
$serverMessages = [];
$errors = 0;
$messageColor = "red lighten-4";

if(isset($_GET['submit'])){
    if(isset($_GET['first_name'])){
        $firstName = $_GET['first_name'];
        if(strlen($firstName) <= 2){
        $serverMessage = "first name is too short.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
        }
    }else{
        $messageColor = "red lighten-4";
        $serverMessage = "Please enter your first name.";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    if(isset($_GET['last_name'])){
        $lastName = $_GET['last_name'];
        if(strlen($lastName) <= 2){
            $serverMessage = "last name is too short.";
            $messageColor = "red lighten-4";
            array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
            $errors += 1;
        }
    }else{
        $serverMessage = "Please enter your last name.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    if(isset($_GET['gender'])){
        $gender = $_GET['gender'];
        $genderCall = ($gender == "male") ? "Mr." : "Mme.";
    }else{
        $serverMessage = "Please provide your gender.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    if(isset($_GET['country'])){
        $country = $_GET['country'];
        if(strlen($country) <= 2){
            $serverMessage = "Country is too short.";
            $messageColor = "red lighten-4";
            array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
            $errors += 1;
        }
    }else{
        $serverMessage = "Please provide your country.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $serverMessage = "Invalid email format";
            $messageColor = "red lighten-4";
            array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
            $errors += 1;
        }
    }else{
        $serverMessage = "Please enter your email address.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    if(isset($_GET['subject'])){
        $subject = $_GET['subject'];
    }else{
        $serverMessage = "Please specify your subject.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    if(strlen($_GET['message']) > 0){
        $message = $_GET['message'];
        if(strlen($message) < 25){
            $serverMessage = "The message is too short, minimum 25 characters.";
            $messageColor = "red lighten-4";
            array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
            $errors += 1;
        }
    }else{
        $serverMessage = "please enter your message.";
        $messageColor = "red lighten-4";
        array_push($serverMessages, "<div class='chip $messageColor'>$serverMessage<i class='close material-icons'>close</i></div>");
        $errors += 1;
    }
    
if ($errors == 0) {
    try {
        $sendSuccess;
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'matrix0130@gmail.com';                     // SMTP username
        $mail->Password   = 'mkahm1391422';                               // SMTP password
        $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('matrix0130@gmail.com', $firstName . ' ' . $lastName);
        $mail->addAddress('m.shmayssany@gmail.com', 'Mohammed Shmayssany');     // Add a recipient
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<html>
        <body>
        <h1>$genderCall $firstName $lastName</h1>
        <h5>From : $country   Email : $email</h5>
        <p><strong>$subject</strong></p>
        <p>$message</p>
        </body>
        </html>";     
        $mail->send();
        $user_message = "Your email has been sent.";
        $messageColor = "green lighten-3";
        $sendSuccess = "<div class='chip $messageColor'>$user_message<i class='close material-icons'>close</i></div>";
    } catch (Exception $e) {
        $user_message = "There was a problem sending your email. Error: {$mail->ErrorInfo}";
        $messageColor = "red lighten-4";
        $sendSuccess = "<div class='chip $messageColor'>$user_message<i class='close material-icons'>close</i></div>";
    }
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HP | Support page</title>
    <!-- Material Icon CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
    
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <div class="container">
                    <a href="#" class="brand-logo">Hackers Poulette</a>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="index.php">Contact</a></li>
                    </ul>
                <ul class="side-nav" id="mobile-menu">
                    <li>
                        <div class="userView">
                            <div class="background">
                                <img src="./assets/img/raspberry-pi-3-raspberry-pi-the-complete-manual-printed-circuit-board-camera-module-computer.jpg" width="300px" alt="Background Sidenav">
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="index.php">Contact</a></li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <main>
        <!-- Your content here -->
        <section class="row">
            <div class="col s4">
                <img class="responsive-img"  src="./assets/img/hackers-poulette-logo.jpg" alt="Hackers Poulette Logo">
            </div>
        
            <h1 class="col s8">Support page</h1>
            <?php //echo "<p class='col s4 $messageColor'>$serverMessage $serMessage</p>" ?>
            <?php
            foreach($serverMessages as $serverMessage){
                echo $serverMessage;
            } 
            echo $sendSuccess;
            ?>
            <form class="col s8" method="get" action="index.php">
                <div class="col s4" >
                    <i class="material-icons">account_circle</i>
                    <label for="first_name">First Name</label>
                    <input placeholder="Enter first name!" name="first_name" id="first_name" type="text" class="validate">
                </div>
                <div class="col s4" >
                    <label for="last_name">Last Name</label>
                    <input  placeholder="Enter last name!" name="last_name" id="last_name" type="text" class="validate">
                </div>
                <div class="col s12">
                    <div class="input-field col s4">
                        <select name="gender">
                            <option value="" disabled selected>Choose your gender</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                        <label>Gender</label>
                    </div>
                    <div class="col s4" >
                        <label for="country">Country</label>
                        <input  placeholder="Country" name="country" id="country" type="text" class="validate">
                    </div>
                </div>
                <div class="col s12">
                    <div class="col s4" >
                        <i class="material-icons">email</i>
                        <label for="email">Email</label>
                        <input  placeholder="Enter your email!" name="email" id="email" type="email" class="validate">
                    </div>
                    <div class="input-field col s4">
                        <select name="subject" id="subject">
                            <option value="" disabled selected>Choose your subject</option>
                            <option value="1">Technical problem</option>
                            <option value="2">Hardware defect</option>
                            <option value="3">Warranty claim</option>
                        </select>
                        <label>Subject</label>
                    </div>
                </div>
                <div class="input-field col s8">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="textarea1" name="message" class="materialize-textarea"></textarea>
                    <label for="textarea1">Message</label>
                    <button class="btn waves-effect waves-light" type="reset">Reset
                        <i class="material-icons right">refresh</i>
                    </button>
                    <button class="btn waves-effect waves-light" type="submit" name="submit"  value="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </section>
        <section>

        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l6">
                    <h5 class="white-text">First Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col s12 m4 l6">
                    <h5 class="white-text">Second Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2017 Copyright Mohamed Shmayssany @ Becode.org
                
            </div>
        </div>
    </footer>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Materialize JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>

        $('select').material_select();
        $("document").ready(function(){
            $(".button-collapse").sideNav();
        });
    </script>
</body>
</html>