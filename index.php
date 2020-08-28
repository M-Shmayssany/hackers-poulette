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
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <li><a href="#">Contact</a></li>
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
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <main>
        <!-- Your content here -->
        <section class="row">
            <div class="col s4">
                <img class="responsive-img"  src="./assets/img/hackers-poulette-logo.png" alt="Hackers Poulette Logo">
            </div>
        
            <h1 class="col s8">Support page</h1>
            <form class="col s8" method="post" action="">
                <div class="col s4" >
                    <i class="material-icons">account_circle</i>
                    <label for="first_name">First Name</label>
                    <input placeholder="Enter first name!" id="first_name" type="text" class="validate">
                </div>
                <div class="col s4" >
                    <label for="last_name">Last Name</label>
                    <input  placeholder="Enter last name!" id="last_name" type="text" class="validate">
                </div>
                <div class="container">  
  <div class="row">
    <div class="input-field s6">      
      <select class="validate">
        <option value="" disabled selected>Choose your option</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </select>

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
                © 2017 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Materialize JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
        $("document").ready(function(){
            $(".button-collapse").sideNav();
        });
    </script>
</body>
</html>