<?php 
include_once 'lib/config.php';
/* CHECKING IF USER IS LOGGED IN */
session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
<?php
    include_once 'components/home_header.php';
?>
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
                                <li class="active"><a href="#feed0" data-toggle="tab">My Posts</a></li>
                                <!--                                 <li><a href="#following" data-toggle="tab">Following</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div id="my-tab-content" class="tab-content">
                        <section class="tab-pane active" id="feed0">
                            <?php 
                                $post = new Post;
                                echo $post->getPosts($_SESSION['user_email'], 0, 0, 1);
                            ?>
                        </section>
                        <button class="btn btn-default" id="id0" count="9" onclick="loadPosts(0, 1)"><i class="fa fa-repeat"></i> Load more posts</button>
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
<?php
include_once 'components/home_footer_scripts.php';
?>

</html>