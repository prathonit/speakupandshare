<?php 
/* CHECKING IF USER IS LOGGED IN */
session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
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
    <link href="assets/css/ct-paper.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/examples.css" rel="stylesheet" />
    <link href="assets/css/cards.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="wrapper">
    <?php include_once 'components/home_navbar.php';?>
    </div>
    <br><br><br><br><br><br>
    <div class="wrapper">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Feelings</a></li>
                    <li><a href="#articles" data-toggle="tab">Articles</a></li>
                    <li><a href="#edu" data-toggle="tab">Educational</a></li>
                    <li><a href="#phy" data-toggle="tab">Physical well being</a></li>
                </ul>
            </div>
        </div>
        <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="home">
                <p>Here is information about home.</p>
               
            </div>

            <div class="tab-pane" id="articles">
                <p>Here is something about articles</p>
            </div>

            <div class="tab-pane" id="edu">
                <p>Here is some education.</p>
            </div>
            
            <div class="tab-pane" id="phy">
                <p>Here are your messagesss.</p>
            </div>
        </div>
    </div>
    <?php include_once 'components/home_footer.php'; ?>
    
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