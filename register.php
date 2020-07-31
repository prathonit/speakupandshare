<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['password'] != $_POST['cpassword']) {
            header('location:register.php?q=password');
        }
        include_once 'lib/config.php';
        if (isset($_POST['user_email']) && isset($_POST['user_name']) && isset($_POST['password'])) {
            $user_email = sanitize_input($_POST['user_email']);
            $user_name = sanitize_input($_POST['user_name']);
            $password = sanitize_input($_POST['password']);
            $pic = "media/avatars/" . round(rand(1, 10)) . ".svg";
            $bio = 'Hi there! Nice to meet you';
            $auth = new Auth;
            if ($auth->registerUser($user_name, $user_email, $password, $pic, $bio)) {
                session_start();
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_pic'] = $pic;
                $_SESSION['user_bio'] = $bio;
                header('location:home.php');
            } else {
                header('location:register.php?q=em');
            }
        } else {
            header('location:register.php?q=em');
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>SpeakUp&Share</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      
</head>
<body>
    <nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SpeakUp&Share</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="index.php" class="btn btn-simple">Login</a>
            </li>
            <li>
                <a href="#" class="btn btn-simple">About Us</a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav> 
    
    <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Register</h3>
                                <?php 
                                    if (isset($_GET['q']) && $_GET['q'] == 'em') {
                                        echo 
                                        '
                                        <div class="form-group has-error has-feedback">

                                        <input type="text" value="Email/Username taken :(" class="form-control"/>
                                
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                
                                        </div>
                                        ';
                                    }
                                    if (isset($_GET['q']) && $_GET['q'] == 'password') {
                                        echo 
                                        '
                                        <div class="form-group has-error has-feedback">

                                        <input type="text" value="Passwords do not match:(" class="form-control"/>
                                
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                
                                        </div>
                                        ';
                                    }
                                ?>
                                <form class="register-form" method="POST" action="register.php">
                                    <label>Username</label>
                                    <input type="text" name="user_name" class="form-control" placeholder="Username" required>
                                    
                                    <label>Email</label>
                                    <input type="email" name="user_email" class="form-control" placeholder="Email" required>

                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>

                                    <label>Confirm Password</label>
                                    <input type="password"  name="cpassword" class="form-control" placeholder="Repeat Password" required>
                                    <button class="btn btn-danger btn-block">Register</button>
                                </form>
                                <div class="forgot">
                                    <a href="#" class="btn btn-simple btn-danger">Forgot password?</a>
                                </div>
                                <div class="forgot">
                                    <a href="index.php" class="btn btn-simple btn-danger">Already have an account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            <div class="footer register-footer text-center">
                    <h6>&copy; SpeakUp&Share</h6>
            </div>
        </div>
    </div>      

</body>

<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/ct-paper.js"></script>  
</html>
