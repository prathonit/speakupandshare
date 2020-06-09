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

    <title>Paper Kit by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/examples.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
    <?php include_once 'components/home_navbar.php';?>

    <div class="wrapper">
        <div class="profile-background">
            <div class="filter-black"></div>
        </div>
        <div class="profile-content section-nude">
            <div class="container">
                <div class="row owner">
                    <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                        <div class="avatar">
                            <img src="<?php echo $_SESSION['user_pic']; ?>" alt="Circle Image"
                                class="img-circle img-no-padding img-responsive">
                        </div>
                        <div class="name">
                            <h4><?php echo $_SESSION['user_name'];?><br /><small><?php echo $_SESSION['user_email']; ?></small>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <p id="user_bio"> <?php echo $_SESSION['user_bio']; ?> </p>
                        <br />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <button class="btn btn-default" data-toggle="modal" data-target="#password"><i
                                class="fa fa-key"></i> Change password</button>
                    </div>
                    <div class="col-md-6 text-center">
                        <button class="btn btn-default" data-toggle="modal" data-target="#ubio"><i class="fa fa-user"></i> Update bio</button>
                    </div>
                </div>
                <div class="profile-tabs">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <li class="active"><a href="#follows" data-toggle="tab">Posts</a></li>
                                <li><a href="#following" data-toggle="tab">Likes</a></li>
                                <!--                                 <li><a href="#following" data-toggle="tab">Following</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="follows">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <ul class="list-unstyled follows">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-2">
                                                    <img src="../assets/paper_img/flume.jpg" alt="Circle Image"
                                                        class="img-circle img-no-padding img-responsive">
                                                </div>
                                                <div class="col-md-7 col-xs-4">
                                                    <h6>Flume<br /><small>Musical Producer</small></h6>
                                                </div>
                                                <div class="col-md-3 col-xs-2">
                                                    <div class="unfollow" rel="tooltip" title="Unfollow">
                                                        <label class="checkbox" for="checkbox1">
                                                            <input type="checkbox" value="" id="checkbox1"
                                                                data-toggle="checkbox" checked>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <hr />
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-2">
                                                    <img src="../assets/paper_img/banks.jpg" alt="Circle Image"
                                                        class="img-circle img-no-padding img-responsive">
                                                </div>
                                                <div class="col-md-7 col-xs-4">
                                                    <h6>Banks<br /><small>Singer</small></h6>
                                                </div>
                                                <div class="col-md-3 col-xs-2">
                                                    <div class="unfollow" rel="tooltip" title="Unfollow">
                                                        <label class="checkbox" for="checkbox1">
                                                            <input type="checkbox" value="" id="checkbox1"
                                                                data-toggle="checkbox" checked>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center" id="following">
                            <h3 class="text-muted">Not following anyone yet :(</h3>
                            <btn class="btn btn-warning btn-fill">Find artists</btn>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include 'components/home_footer.php'; ?>

    <!-- MODALS HERE  -->
    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                </div>
                <div class="modal-body">
                    <form class="register-form">
                        <label>Current password</label>
                        <input type="password" id="current_password" class="form-control" placeholder="Current Password" required>

                        <label>New Password</label>
                        <input type="password" id="new_password" class="form-control" placeholder="New Password" required>

                        <label>Confirm New Password</label>
                        <input type="password" id="c_new_password" class="form-control" placeholder="Repeat Password" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="left-side">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never
                            mind</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button class="btn btn-danger btn-simple" onclick="changePassword()">Change Password</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- UPDATE BIO MODAL  BEGINS -->
    <div class="modal fade" id="ubio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Update Bio</h4>
                </div>
                <div class="modal-body">
                    <form class="register-form">
                        <label>UPDATE BIO</label>
                        <textarea id="new_bio" class="form-control" placeholder="Tell people about yourself" rows="3" required></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="left-side">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never
                            mind</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button class="btn btn-danger btn-simple" onclick="updateBio()">Update Bio</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UPDATE BIO MODAL END  -->
    <!-- ALL MODALS HERE  -->

</body>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
function updateBio() {
    var user_email = "<?php echo $_SESSION['user_email']; ?>";
    var user_bio = document.getElementById('new_bio').value;
    xhttps = new XMLHttpRequest();
      xhttps.onreadystatechange = function()
      {
        if (this.status == 200 && this.readyState == 4)
        {
          $('#ubio').modal('toggle');
          document.getElementById('user_bio').innerHTML = user_bio;
        }
      }
    xhttps.open("GET","lib/ajaxify/update_bio.php?user_email="+user_email+"&user_bio="+user_bio);
    xhttps.send();
}
function changePassword() {
    var user_email = "<?php echo $_SESSION['user_email']; ?>";
    var current_password = document.getElementById('current_password').value;
    var new_password = document.getElementById('new_password').value;
    var c_new_password = document.getElementById('c_new_password').value;
    if (new_password != c_new_password) {
        alert('Passwords dont match');
        throw new FatalError("Something went badly wrong!");
    }
    xhttps = new XMLHttpRequest();
      xhttps.onreadystatechange = function()
      {
        if (this.status == 200 && this.readyState == 4)
        {
          $('#password').modal('toggle');
          if (this.responseText == 1) {
              alert('Password changed');
          }
        }
      }
    xhttps.open("GET","lib/ajaxify/change_password.php?user_email="+user_email+"&current_password="+current_password+"&new_password="+new_password);
    xhttps.send();
}
</script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/ct-paper.js"></script>

</html>