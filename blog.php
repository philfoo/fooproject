<?php
    session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Volton - Responsive Mobile Template</title>
        <meta name="description" content="">
        <!-- 
    	Volton Template
    	http://www.templatemo.com/preview/templatemo_441_volton
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
                $("#login").click(function(){
                    
                    $("#login").fadeOut(1000);
                    
                    $(".banner-bg").prepend($("<form id = 'login' method = 'post' action = 'checklogin.php'>Username: <input type = 'text' name = 'myusername'><br>Password: <input type = 'text' name = 'mypassword'><br><input type = 'submit' value = 'Submit'></form>").fadeIn(1000));
                    
                });

            });


        </script>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
        <div class="responsive-header visible-xs visible-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-section">
                            <div class="profile-image">
                                <img src="img/profile.jpg" alt="Volton">
                            </div>
                            <div class="profile-content">
                                <h3 class="profile-title">Philip Foo</h3>
                                <p class="profile-description">Student at Duke University</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                <div class="main-navigation responsive-menu">
                    <ul class="navigation">
                        <li><a href="#top"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="#about"><i class="fa fa-user"></i>About Me</a></li>
                        <li><a href="#projects"><i class="fa fa-newspaper-o"></i>My Gallery</a></li>
                        <li><a href="#contact"><i class="fa fa-envelope"></i>Contact Me</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="sidebar-menu hidden-xs hidden-sm">
            <div class="top-section">
                <div class="profile-image">
                    <img src="img/profile.jpg" alt="Volton">
                </div>
                <h3 class="profile-title">Philip Foo</h3>
                <p class="profile-description">Student at Duke University</p>
            </div> <!-- top-section -->
            <div class="main-navigation">
                <ul class="navigation">
                    <li><a href="#top"><i class="fa fa-globe"></i>Welcome</a></li>
                    <li><a href="#about"><i class="fa fa-pencil"></i>About Me</a></li>
                    <li><a href="#projects"><i class="fa fa-paperclip"></i>My Gallery</a></li>
                    <li><a href="#contact"><i class="fa fa-link"></i>Contact Me</a></li>
                </ul>
            </div> <!-- .main-navigation -->
            <div class="social-icons">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div> <!-- .social-icons -->
        </div> <!-- .sidebar-menu -->
        

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="fluid-container">

                <div class="content-wrapper">
                
                    <!-- ABOUT -->
                    <div class="page-section" id="about">

                    <!----SAMPLE POST -->
                    <div class = "row">
                        <div class = "col-md-12">
                        <h4 class = "widget-title">Example</h4>
                        <p>This is where the post would go</p>
                        <hr class = "blogborder">
                        </div>
                    </div>

                    <?php
                        //Initialize connection to SQL database
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $db_name = "LoginSystem";
                        $tbl_name = "posts";
                        $connect = mysqli_connect($host, $username, $password, $db_name)or die("Cannot Connect!");
                        //mysql_select_db($db_name)or die("Cannot select Database");

                        //Initialize query, get first post ID
                        $sql = "SELECT *FROM $tbl_name";
                        $lastPostID = mysqli_num_rows(mysqli_query($connect, $sql))-1;

                        //CREATE BLOG POSTS
                        for ($currPostID = $lastPostID; $currPostID >= 0; $currPostID--){
                            $sqlQuery =  "SELECT title, content FROM $tbl_name WHERE postID = '$currPostID'";
                            $title = mysqli_fetch_array(mysqli_query($connect, $sqlQuery))['title'];
                            $content = mysqli_fetch_array(mysqli_query($connect, $sqlQuery))['content'];
                            
                            //Add in data-id attribute
                            echo '<div class = "row" data-id ="' .$currPostID. '">';
                                echo '<div class = "col-md-12">';
                                    echo '<h4 class = "widget-title">' .$title. '</h4>';

                                    //NL2BR FOR LINE BREAKS
                                    echo '<p>' .nl2br($content). '</p>';
                                    echo '<hr class = "blogborder">';
                                echo '</div>';
                            echo '</div>';
                        }

                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">Learn About Me</h4>
                            <div class="about-image">
                                <img src="img/8.jpg" alt="about me">
                            </div>
                            <p>Volton is free <a rel="nofollow" href="http://www.templatemo.com/page/1">responsive mobile template</a> from <span class="blue">template</span><span class="green">mo</span> website. You can use this template for any purpose. Please tell your friends about it. Thank you. Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for images used in this design. You can <strong>change menu icons</strong> by checking <a rel="nofollow" href="http://fontawesome.info/font-awesome-icon-world-map/">Font Awesome</a> (version 4). Example: <strong>&lt;i class=&quot;fa fa-camera&quot;&gt;&lt;/i&gt;</strong></p>
                            <hr>
                        </div>
                    </div> <!-- #about -->

                    </div>
                    
                    <!-- PROJECTS -->

                    <!-- CONTACT -->
                    <div class="page-section" id="contact">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="widget-title">PLACE TO TALK WITH ME</h4>
                            <p>Vestibulum ac iaculis erat, in semper dolor. Maecenas et lorem molestie, maximus justo dignissim, cursus nisl. Nullam at ante quis ex pharetra pulvinar quis id dolor. Integer lorem odio, euismod ut sem sit amet, imperdiet condimentum diam.</p>
                        </div>
                    </div>
                    <div class="row">
                        <form action="#" method="post" class="contact-form">
                            <fieldset class="col-md-4 col-sm-6">
                                <input type="text" id="your-name" placeholder="Your Name...">
                            </fieldset>
                            <fieldset class="col-md-4 col-sm-6">
                                <input type="email" id="email" placeholder="Your Email...">
                            </fieldset>
                            <fieldset class="col-md-4 col-sm-12">
                                <input type="text" id="your-subject" placeholder="Subject...">
                            </fieldset>
                            <fieldset class="col-md-12 col-sm-12">
                                <textarea name="message" id="message" cols="30" rows="6" placeholder="Leave your message..."></textarea>
                            </fieldset>
                            <fieldset class="col-md-12 col-sm-12">
                                <input type="submit" class="button big default" value="Send Message">
                            </fieldset>
                        </form>
                    </div> <!-- .contact-form -->
                    </div>
                    <hr>

                    <div class="row" id="footer">
                        <div class="col-md-12 text-center">
                            <p class="copyright-text">Copyright &copy; 2084 Company Name</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/min/plugins.min.js"></script>
        <script src="js/min/main.min.js"></script>

    </body>
</html>